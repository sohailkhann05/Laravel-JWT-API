<?php

namespace App\Traits;

use App\Models\Attachment;
use Str;

trait AttachmentTrait {

	public function addAttachment($file)
	{
		$size = $file->getSize();
		$extension = $file->getClientOriginalExtension();
		$filename = time() . Str::random(6) . '.' . $extension;
		$file->move('public/uploads', $filename);

		$attachment = Attachment::create([
	        'attachment' => $filename,
	        'extention' => $extension,
	        'size' => $size
		]);

		return $attachment->id;
	}

	public function removeAttachment($id)
	{
		$attachment = Attachment::find($id);

		if (file_exists('public/uploads/' . $attachment->attachment))
			unlink(('public/uploads/' . $attachment->attachment));
		$attachment->delete();

		return true;
	}

}
