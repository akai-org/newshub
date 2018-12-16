@if ($paginator->hasPages())
<nav class="pagination" role="navigation" aria-label="pagination">
    
    <ul class="pagination-list">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li>
                <a class="pagination-previous" aria-label="@lang('pagination.previous')" disabled>Poprzedni</a>
            </li>
        @else
            <li>
                <a class="pagination-previous" href="{{ $paginator->previousPageUrl() }}" aria-label="@lang('pagination.previous')">Poprzedni</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <li>
                <span class="pagination-ellipsis">&hellip;</span>
            </li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li>
                        <a class="pagination-link is-current" aria-label="Page {{ $page }}" aria-current="page">{{ $page }}</a>
                    </li>
                @else
                    <li>
                        <a class="pagination-link" aria-label="Goto page {{ $page }}" href="{{ $url }}">{{ $page }}</a>
                    </li>
                
                @endif
            @endforeach
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a class="pagination-next" href="{{ $paginator->nextPageUrl() }}">Dalej</a>
            </li>
        @else
            <li>
                <a class="pagination-next" disabled>Dalej</a>
            </li>
        @endif
    </ul>
</nav>
@endif