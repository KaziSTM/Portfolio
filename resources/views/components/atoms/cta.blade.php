<div class="z-50">
    <a wire:navigate class="text-sm font-medium text-primary-500 flex items-center space-x-2 group"
       href="{{ route('projects.show',['projectId'=>$projectId]) }}"
       target="_blank">
        <span>{{ $isPackage ? 'View package' : 'View case study' }}</span>
        <x-heroicon-o-arrow-up-right
            class="h-4 w-4 transform transition-transform duration-300 group-hover:translate-y-[-2px]"/>
    </a>
</div>
