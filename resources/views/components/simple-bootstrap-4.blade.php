@if ($paginator->hasPages())
    <nav class="navigation paging-navigation text-center mt-5" role="navigation">
        <div class="pagination loop-pagination d-flex justify-content-center align-items-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span aria-current="page" class="page-numbers fs-4 fw-normal mx-3 current">
                    <iconify-icon icon="ic:baseline-keyboard-arrow-left" class="pagination-arrow fs-1"></iconify-icon>
                </span>
                
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="pagination-arrow d-flex align-items-center fw-normal mx-3" wire:navigate>
                    <iconify-icon icon="ic:baseline-keyboard-arrow-left" class="pagination-arrow fs-1"></iconify-icon>
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span aria-current="page" class="page-numbers fs-4 fw-normal mx-3 current">{{ $page }}</span>
                        @else
                            <a class="page-numbers fs-4 fw-normal mx-3" href="{{ $url }}" wire:navigate>{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="pagination-arrow d-flex align-items-center fw-normal mx-3" wire:navigate>
                    <iconify-icon icon="ic:baseline-keyboard-arrow-right" class="pagination-arrow fs-1"></iconify-icon>
                </a>            
            @else
                <span aria-current="page" class="page-numbers fs-4 fw-normal mx-3 current">
                    <iconify-icon icon="ic:baseline-keyboard-arrow-right" class="pagination-arrow fs-1"></iconify-icon>
                </span>
            @endif
        </div>
    </nav>
@endif
