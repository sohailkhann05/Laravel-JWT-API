<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\AttachmentTrait;
use App\Models\Expense;
use Carbon\Carbon;
use Str;
use DB;

class ExpensesController extends Controller
{
    use AttachmentTrait;

    public function index()
    {
        if (!in_array('EX', session('permissions')))
            return redirect(route('home'))->with('warning', 'You do not have permission.');

        $expenses = Expense::get();
        return view('admin.expenses.index', compact('expenses'));
    }

    public function create()
    {
        if (!in_array('AEX', session('permissions')))
            return redirect(route('home'))->with('warning', 'You do not have permission.');

        $accounts = DB::table('bank_accounts')->select('id', 'bank_name', 'account_number')->get();
        return view('admin.expenses.create', compact('accounts'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'bank_account_id' => 'required',
            'amount' => 'required',
            'type' => 'required',
            'expense_date' => 'required',
            'description' => 'required',
            'reference_id' => 'required',
        ]);

        try {
            $expense_date = Carbon::createFromFormat('m/d/Y', $request->expense_date)->format('Y-m-d');
        } catch (\Exception $e) {
            $expense_date = Carbon::createFromFormat('m-d-Y', $request->expense_date)->format('Y-m-d');
        }

        $slug = 'expense-' . (DB::table('expenses')->count() + 1) . rand(0000,9999);

        if ($request->has('attachment'))
            $attachment_id = $this->addAttachment($request->attachment);
        else
            $attachment_id = '';

        Expense::create([
            'bank_account_id' => $request->bank_account_id,
            'attachment_id' => $attachment_id,
            'amount' => $request->amount,
            'type' => $request->type,
            'expense_date' => $expense_date,
            'description' => $request->description,
            'reference_id' => $request->reference_id,
            'slug' => $slug
        ]);

        return redirect(route('expenses.index'))->with('success', 'Action performed successfully.');
    }

    public function show($slug)
    {
        if (!in_array('VEX', session('permissions')))
            return redirect(route('home'))->with('warning', 'You do not have permission.');

        $expense = Expense::where('slug', $slug)->first();
        return view('admin.expenses.show', compact('expense'));
    }

    public function edit($slug)
    {
        if (!in_array('EEX', session('permissions')))
            return redirect(route('home'))->with('warning', 'You do not have permission.');

        $accounts = DB::table('bank_accounts')->select('id', 'bank_name', 'account_number')->get();
        $expense = Expense::where('slug', $slug)->first();
        return view('admin.expenses.edit', compact('expense', 'accounts'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'bank_account_id' => 'required',
            'amount' => 'required',
            'type' => 'required',
            'expense_date' => 'required',
            'description' => 'required',
            'reference_id' => 'required',
        ]);

        $expense = Expense::find($request->id);
        
        try {
            $expense_date = Carbon::createFromFormat('m/d/Y', $request->expense_date)->format('Y-m-d');
        } catch (\Exception $e) {
            $expense_date = Carbon::createFromFormat('m-d-Y', $request->expense_date)->format('Y-m-d');
        }

        $slug = 'expense-' . $request->id . rand(0000,9999);

        if ($request->has('attachment')) {
            $this->removeAttachment($attachment_id);
            $attachment_id = $this->addAttachment($request->attachment);
        } else {
            $attachment_id = $expense->attachment_id;
        }

        $expense->update([
            'bank_account_id' => $request->bank_account_id,
            'attachment_id' => $attachment_id,
            'amount' => $request->amount,
            'type' => $request->type,
            'expense_date' => $expense_date,
            'description' => $request->description,
            'reference_id' => $request->reference_id,
            'slug' => $slug
        ]);

        return redirect(route('expenses.index'))->with('success', 'Action performed successfully.');
    }

    public function delete(Request $request)
    {
        if (!in_array('DEX', session('permissions')))
            return redirect(route('home'))->with('warning', 'You do not have permission.');

        $expense = Expense::find($request->id);
        $this->removeAttachment($expense->attachment_id);
        $expense->delete();

        return redirect(route('expenses.index'))->with('success', 'Action performed successfully.');
    }
}
