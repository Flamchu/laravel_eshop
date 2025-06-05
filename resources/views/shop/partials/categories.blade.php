{{-- Breadcrumbs --}}
@if($breadcrumbs ?? false)
    <nav class="mb-4 text-sm text-gray-700">
        <ul class="flex items-center space-x-1">
            <li><a href="{{ route('shop.index') }}" class="underline">Domů</a></li>
            @foreach ($breadcrumbs as $crumb)
                <li>/</li>
                <li>
                    <a href="{{ route('shop.category', $crumb->slug) }}" class="underline">
                        {{ $crumb->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
@endif

{{-- Child categories --}}
@if(count($categories))
    <nav class="mb-6">
        <ul class="flex flex-wrap gap-2">
            @foreach($categories as $cat)
                <li>
                    <a href="{{ route('shop.category', $cat->slug) }}" class="px-3 py-1 border rounded hover:bg-gray-100">
                        {{ $cat->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
@endif