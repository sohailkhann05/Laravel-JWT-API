<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">{{ $page_title }}</h4>
        <?php $count = count($links); $total = 1; ?>
        @if ($count > 0)
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('home') }}">Dashboard</a>
                </li>
                @foreach ($links as $key => $link)
                    <li>
                        <a href="{{ $key }}" class="{{ $count == $total ? 'active' : '' }}">
                            {{ $link }}
                        </a>
                    </li>
                @endforeach
            </ol>
            <?php $total++; ?>
        @else
            <p class="text-muted page-title-alt">Welcome to {{ env('APP_NAME') }} admin dashboard</p>
        @endif
    </div>
</div>
