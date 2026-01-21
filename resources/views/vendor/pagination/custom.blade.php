@if ($paginator->hasPages())
    <nav>
        <ul class="pagination justify-content-center">

             <!-- Предыдущая страница -->
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true"><span class="page-link">&laquo;</span></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>
            @endif

             <!-- Первая страница и "..." если есть пропуск -->
            @if ($paginator->currentPage() > 2)
                <li class="page-item"><a class="page-link" href="{{ $paginator->url(1) }}">1</a></li>
                @if ($paginator->currentPage() > 3)
                    <li class="page-item disabled"><span class="page-link">...</span></li>
                @endif
            @endif

             <!-- Ближайшие страницы вокруг текущей -->
            @foreach (range(1, $paginator->lastPage()) as $page)
                @if ($page >= $paginator->currentPage() - 1 && $page <= $paginator->currentPage() + 1)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $paginator->url($page) }}">{{ $page }}</a></li>
                    @endif
                @endif
            @endforeach

             <!-- Последняя страница и "..." если есть пропуск  -->
            @if ($paginator->currentPage() < $paginator->lastPage() - 1)
                @if ($paginator->currentPage() < $paginator->lastPage() - 2)
                    <li class="page-item disabled"><span class="page-link">...</span></li>
                @endif
                <li class="page-item"><a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a></li>
            @endif

             <!-- Следующая страница  -->
            @if ($paginator->hasMorePages())
                <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>
            @else
                <li class="page-item disabled" aria-disabled="true"><span class="page-link">&raquo;</span></li>
            @endif
            
        </ul>
    </nav>
@endif