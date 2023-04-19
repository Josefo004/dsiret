@if (count($breadcrumbs))

    <ol class="breadcrumb2">
        @foreach ($breadcrumbs as $breadcrumb)

            @if ($breadcrumb->url && !$loop->last)
                <li class="breadcrumb2-item"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
            @else
                <li class="breadcrumb2-item active">{{ $breadcrumb->title }}</li>
            @endif

        @endforeach
    </ol>

@endif