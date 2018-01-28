@if ($paginator->hasPages())
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <a class="f-left nav disabled" disabled> 
            <i class="fa fa-angle-left" aria-hidden="true"></i>
            <span>Prev</span>
        </a>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" class="f-left nav" rel="prev">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
            <span>Prev</span>
        </a>
    @endif
    <div class="pages">
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <a class="disabled">{{ $element }}</a>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="active">{{ $page }}</a>
                    @else
                        <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach
    </div>
    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="f-right nav" rel="next"> 
            <span>Next</span> 
            <i class="fa fa-angle-right" aria-hidden="true"></i>
        </a>
    @else
        <a href="#" class="f-right nav disabled" rel="next" disabled> 
            <span>Next</span> 
            <i class="fa fa-angle-right" aria-hidden="true"></i>
        </a>
    @endif
@endif