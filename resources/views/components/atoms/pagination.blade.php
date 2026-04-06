@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-center space-x-2">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span
                class="px-6 py-3 text-sm font-medium text-gray-300 bg-slate-50/50 border border-slate-100 rounded-full cursor-not-allowed">
                Prev
            </span>
        @else
            <button wire:click="previousPage" wire:loading.attr="disabled"
                    class="px-6 py-3 text-sm font-medium text-slate-500 bg-slate-50 hover:bg-slate-100 border border-slate-100 rounded-full transition-colors">
                Prev
            </button>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span
                    class="w-12 h-12 flex items-center justify-center text-sm text-slate-400 bg-slate-50/50 rounded-full">
                    {{ $element }}
                </span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span
                            class="w-12 h-12 flex items-center justify-center text-sm font-bold text-white bg-[#0081C9] shadow-lg shadow-blue-200 rounded-full">
                            {{ $page }}
                        </span>
                    @else
                        <button wire:click="gotoPage({{ $page }})"
                                class="w-12 h-12 flex items-center justify-center text-sm font-medium text-slate-600 bg-slate-50 hover:bg-slate-100 border border-slate-100 rounded-full transition-colors">
                            {{ $page }}
                        </button>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <button wire:click="nextPage" wire:loading.attr="disabled"
                    class="px-6 py-3 text-sm font-medium text-slate-700 bg-slate-50 hover:bg-slate-100 border border-slate-100 rounded-full transition-colors">
                Next
            </button>
        @else
            <span
                class="px-6 py-3 text-sm font-medium text-gray-300 bg-slate-50/50 border border-slate-100 rounded-full cursor-not-allowed">
                Next
            </span>
        @endif
    </nav>
@endif
