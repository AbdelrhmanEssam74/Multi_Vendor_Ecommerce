@if ($paginator->hasPages())
    <div class="pager-info">
        Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }}
        of {{ $paginator->total() }} results
    </div>

    <nav class="pager" role="navigation" aria-label="Pagination">
        <ul class="pager__list">
            {{-- Previous --}}
            <li class="pager__item">
                @if ($paginator->onFirstPage())
                    <span class="pager__link is-disabled" aria-disabled="true" aria-label="Previous">&laquo;</span>
                @else
                    <a class="pager__link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="Previous">&laquo;</a>
                @endif
            </li>

            {{-- Numbers --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="pager__item"><span class="pager__ellipsis">{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        <li class="pager__item">
                            @if ($page == $paginator->currentPage())
                                <span class="pager__link is-active" aria-current="page">{{ $page }}</span>
                            @else
                                <a class="pager__link" href="{{ $url }}">{{ $page }}</a>
                            @endif
                        </li>
                    @endforeach
                @endif
            @endforeach

            {{-- Next --}}
            <li class="pager__item">
                @if ($paginator->hasMorePages())
                    <a class="pager__link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Next">&raquo;</a>
                @else
                    <span class="pager__link is-disabled" aria-disabled="true" aria-label="Next">&raquo;</span>
                @endif
            </li>
        </ul>
    </nav>

    <style>
        .pager { display:flex; justify-content:center; margin-top:1rem; }
        .pager__list { display:flex; gap:.5rem; list-style:none; padding:0; margin:0; }
        .pager__link {
            display:inline-flex; align-items:center; justify-content:center;
            min-width:2.25rem; height:2.25rem; padding:0 .75rem;
            border:1px solid #e5e7eb; border-radius:.5rem; text-decoration:none; color:#111827;
        }
        .pager__link:hover { background:#f9fafb; }
        .pager__link.is-active { background:#111827; color:#fff; border-color:#111827; cursor:default; }
        .pager__link.is-disabled { opacity:.5; pointer-events:none; cursor:not-allowed; }
        .pager__ellipsis { padding:.5rem .75rem; color:#6b7280; }

        .pager-info {
            text-align:center;
            margin-bottom:.5rem;
            font-size:.875rem;
            color:#374151;
        }
    </style>
@endif
