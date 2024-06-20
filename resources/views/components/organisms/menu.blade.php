<div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
    <ul
        class="flex flex-col text-secondary-900 p-4 md:p-0 mt-4 font-medium  md:flex-row md:space-x-8 md:mt-0 md:border-0">
        @foreach($navigation as $link)
            <x-atoms.link :label="$link['label']" :route="$link['route']" :icon="$link['icon']"/>
        @endforeach
    </ul>
</div>
