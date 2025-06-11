{{-- Breadcrumbs --}}
@if($breadcrumbs ?? false)
    <nav class="mb-4 text-sm">
        <ul class="flex items-center space-x-1 text-gray-700 dark:text-gray-300">
            <li>
                <a href="{{ route('shop.index') }}"
                    class="underline hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">
                    Home
                </a>
            </li>
            @foreach ($breadcrumbs as $crumb)
                <li class="text-gray-400 dark:text-gray-500">/</li>
                <li>
                    <a href="{{ route('shop.category', $crumb->slug) }}"
                        class="underline hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">
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
                    <a href="{{ route('shop.category', $cat->slug) }}" class="px-3 py-1 border rounded 
                                      bg-white dark:bg-gray-800 
                                      border-gray-200 dark:border-gray-700 
                                      text-gray-800 dark:text-gray-200 
                                      hover:bg-gray-100 dark:hover:bg-gray-700 
                                      transition-colors duration-200">
                        {{ $cat->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
@endif