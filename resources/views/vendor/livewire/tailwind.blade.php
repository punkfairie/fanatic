<div>
    @if ($paginator->hasPages())
        @php(isset($this->numberOfPaginatorsRendered[$paginator->getPageName()]) ? $this->numberOfPaginatorsRendered[$paginator->getPageName()]++ : $this->numberOfPaginatorsRendered[$paginator->getPageName()] = 1)

        <nav class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                    <span class="pagination__item--disabled">
                        &lt;
                    </span>
            @else
                <a class="pagination__item"
                    wire:click="previousPage('{{ $paginator->getPageName() }}')">
                    &lt;
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                        <span class="pagination__item">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="pagination__item--disabled"
                                    wire:key="paginator-{{ $paginator->getPageName() }}-{{ $this->numberOfPaginatorsRendered[$paginator->getPageName()] }}-page{{ $page }}">
                                {{ $page }}
                            </span>
                        @else
                            <a wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')"
                                class="pagination__item">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a class="pagination__item"
                    wire:click="nextPage('{{ $paginator->getPageName() }}')">
                    &gt;
                </a>
            @else
                <span class="pagination__item--disabled">
                    &gt;
                </span>
            @endif
        </nav>
    @endif
</div>
