<<<<<<< HEAD
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
=======
@php
    // Общее количество страниц
    $total = $paginator->lastPage();
    // Текущая страница
    $current = $paginator->currentPage();

    // Формируем список страниц для отображения
    $pages = [];

    // всегда показываем первую страницу
    $pages[] = 1;

    // добавляем страницы вокруг текущей
    for ($i = max(1, $current - 1); $i <= min($total - 1, $current + 1); $i++) {
        $pages[] = $i;
    }

    // добавляем последнюю страницу, если больше 1
    if ($total > 1) {
        $pages[] = $total;
    }

    // удаляем дубли и сортируем
    $pages = array_unique($pages);
    sort($pages);
@endphp

<div class="pagination ">
    {{-- Предыдущая страница --}}
    @if ($paginator->onFirstPage())
        <span class="page-number disabled">&laquo;</span>
    @else
        <a class="page-number" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a>
    @endif

    {{-- Вывод страниц с точками --}}
    @php
        $lastPage = 0;
    @endphp

    @foreach ($pages as $page)
        {{-- Проверка, есть ли пропуск между страницами --}}
        @if ($page - $lastPage > 1)
            <span class="page-number dots">...</span>
        @endif

        {{-- Текущая страница --}}
        @if ($page == $current)
            <span class="page-number current">{{ $page }}</span>
        @else
            <a class="page-number" href="{{ $paginator->url($page) }}">{{ $page }}</a>
        @endif

        @php
            $lastPage = $page;
        @endphp
    @endforeach

    {{-- Следующая страница --}}
    @if ($paginator->hasMorePages())
        <a class="page-number" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a>
    @else
        <span class="page-number disabled">&raquo;</span>
    @endif
</div>
>>>>>>> 857e460c99daa90c8d3a6f945bcfd54ed7e8850e
