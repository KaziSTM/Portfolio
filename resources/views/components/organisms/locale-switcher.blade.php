<div class="flex items-center gap-2 rounded-full border border-slate-200 bg-white px-2 py-1">
    @foreach ($locales as $locale)
        <a
            href="{{ $locale['url'] }}"
            wire:navigate
            @class([
                'rounded-full px-3 py-1 text-xs font-semibold transition',
                'bg-slate-900 text-white' => $locale['active'],
                'text-slate-500 hover:bg-slate-100' => ! $locale['active'],
            ])
        >
            {{ $locale['label'] }}
        </a>
    @endforeach
</div>
