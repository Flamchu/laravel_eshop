@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation">
        <ul class="flex items-center gap-1">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li aria-disabled="true">
                    <span class="px-3 py-1 rounded-md text-gray-400 dark:text-gray-500 cursor-default">
                        &laquo;
                    </span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}"
                        class="px-3 py-1 rounded-md text-indigo-600 dark:text-indigo-300 hover:bg-indigo-50 dark:hover:bg-indigo-900/70 transition-colors"
                        rel="prev">
                        &laquo;
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li aria-disabled="true">
                        <span class="px-3 py-1 rounded-md text-gray-400 dark:text-gray-500 cursor-default">
                            {{ $element }}
                        </span>
                    </li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li aria-current="page">
                                <span
                                    class="px-3 py-1 rounded-md bg-indigo-100 dark:bg-indigo-900/80 text-indigo-700 dark:text-indigo-200 font-medium">
                                    {{ $page }}
                                </span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}"
                                    class="px-3 py-1 rounded-md text-indigo-600 dark:text-indigo-300 hover:bg-indigo-50 dark:hover:bg-indigo-900/70 transition-colors">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}"
                        class="px-3 py-1 rounded-md text-indigo-600 dark:text-indigo-300 hover:bg-indigo-50 dark:hover:bg-indigo-900/70 transition-colors"
                        rel="next">
                        &raquo;
                    </a>
                </li>
            @else
                <li aria-disabled="true">
                    <span class="px-3 py-1 rounded-md text-gray-400 dark:text-gray-500 cursor-default">
                        &raquo;
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif