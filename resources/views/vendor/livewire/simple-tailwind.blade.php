<div>
    @if ($paginator->hasPages())
        <nav class="pagination">
            {{-- previous page --}}
            <span>
                @if ($paginator->onFirstPage())
                    <a class="pagination__previous pagination--disabled">
                        {!! __('pagination.previous') !!}
                    </a>
                @else
                    <a class="pagnation__previous" wire:click="previousPage" wire:loading.attr="disabled">
                        {!! __('pagination.previous') !!}
                    </a>
                @endif
            </span>

            {{-- next page --}}
            <span>
                @if ($paginator->hasMorePages())
                    <a class="pagination__next" wire:click="nextPage" wire:loading.attr="disabled">
                        {!! __('pagination.next') !!}
                    </a>
                @else
                    <a class="pagination__next pagination--disabled">
                        {!! __('pagination.next') !!}
                    </a>
                @endif
            </span>
        </nav>
    @endif
</div>