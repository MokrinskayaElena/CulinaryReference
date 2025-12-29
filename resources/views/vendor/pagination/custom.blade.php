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