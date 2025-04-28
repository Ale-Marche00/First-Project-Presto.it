{{--  @if ($paginator->hasPages())
    <ul class="pagination">
        <!-- Pulsante Precedente -->
        @if ($paginator->onFirstPage())
            <li class="page-item disabled"><span class="page-link">&laquo; Precedente</span></li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo; Precedente</a></li>
        @endif

        <!-- Pagine: Mostra solo un range di 4 pagine -->
        @php
            $start = max(1, $paginator->currentPage() - 2); // Inizio: massimo tra 1 e la pagina corrente - 2
            $end = min($start + 3, $paginator->lastPage()); // Fine: massimo tra (start + 3) e l'ultima pagina
        @endphp

        @for ($page = $start; $page <= $end; $page++)
            @if ($page == $paginator->currentPage())
                <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $paginator->url($page) }}">{{ $page }}</a></li>
            @endif
        @endfor

        <!-- Pulsante Successivo -->
        @if ($paginator->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">Successivo &raquo;</a></li>
        @else
            <li class="page-item disabled"><span class="page-link"> Successivo &raquo;</span></li>
        @endif
    </ul>
@endif --}}



<div class="container">
    @if ($paginator->hasPages())
        <ul class="pagination">
            {{-- Pulsante prima pagina --}}
            @if ($paginator->onFirstPage())
                <li class="disabled"><span>&laquo;</span></li> <!-- << -->
            @else
                <li><a href="{{ $paginator->url(1) }}" rel="first">&laquo;</a></li> <!-- << -->
            @endif

            {{-- Pulsante precedente --}}
            @if ($paginator->onFirstPage())
                <li class="disabled"><span>&lt;</span></li> <!-- < -->
            @else
                <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&lt;</a></li> <!-- < -->
            @endif

            <!-- Pagine: Mostra solo un range di 4 pagine -->
            @php
                $start = max(1, $paginator->currentPage() - 2); // Inizio: massimo tra 1 e la pagina corrente - 2
                $end = min($start + 3, $paginator->lastPage()); // Fine: massimo tra (start + 3) e l'ultima pagina
            @endphp
            @for ($page = $start; $page <= $end; $page++)
                @if ($page == $paginator->currentPage())
                    <li><span>{{ $page }}</span></li>
                @else
                    <li><a href="{{ $paginator->url($page) }}">{{ $page }}</a></li>
                @endif
            @endfor

            {{-- Pulsante successivo --}}
            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">&gt;</a></li> <!-- > -->
            @else
                <li class="disabled"><span>&gt;</span></li> <!-- > -->
            @endif

            {{-- Pulsante ultima pagina --}}
            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->url($paginator->lastPage()) }}" rel="last">&raquo;</a></li> <!-- >> -->
            @else
                <li class="disabled"><span>&raquo;</span></li> <!-- >> -->
            @endif
        </ul>
    @endif
</div>


