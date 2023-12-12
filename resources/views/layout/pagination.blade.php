<div class="col-md-6">
    <ul class="pagination">
        @if ($paginator->onFirstPage())
            <li class="d-none"><span>&laquo;</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>
        @endif

        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <li class="{{ ($paginator->currentPage() == $i) ? 'active' : '' }}">
                <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>
        @else
            <li class="d-none"><span>&raquo;</span></li>
        @endif
    </ul>
</div>
