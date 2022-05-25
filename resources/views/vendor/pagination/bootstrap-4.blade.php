@if ($paginator->hasPages())
    <nav>
        <ul class="custom-pagination justify-content-end mt-4">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                {{-- <li class="pagination-link prev disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <i class="fas fa-angle-left"></i>
                </li> --}}
                <li aria-disabled="true" aria-label="@lang('pagination.previous')"><a href="#"
                        class="pagination-link prev disabled">
                        <i class="fas fa-angle-left"></i><!-- <i class="fas fa-angle-left"></i> -->
                    </a>
                </li>
            @else
                <li>
                    <a class="pagination-link prev" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                        aria-label="@lang('pagination.previous')"><i class="fas fa-angle-left"></i></a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="pagination-link disabled" aria-disabled="true"><span
                            class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><a class="pagination-link">{{ $page }}</a></li>
                        @else
                            <li><a class="pagination-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a class="pagination-link next" href="{{ $paginator->nextPageUrl() }}" rel="next"
                        aria-label="@lang('pagination.next')"><i class="fas fa-angle-right"></i></a>
                </li>
            @else
                <li aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="pagination-link next" aria-hidden="true"><i class="fas fa-angle-right"></i></span>
                </li>
            @endif
        </ul>
    </nav>
@endif
