<div class="w-full px-4 md:px-10 py-16 flex ">

    {{-- LEFT SIDE --}}
    <div class="relative bg-gray-100 rounded-3xl py-12 pl-32 px-8  overflow-visible w-2/5 ">

        <div class="relative max-w-5xl flex flex-col justify-between gap-8">
            {{-- HEADING --}}
            <h2 class="text-5xl text-start font-semibold text-gray-900 leading-tight mt-4">
                How can I help you?<br>
                Let's get in touch 👋
            </h2>

            {{-- IMAGE --}}
            <div class="relative">
                <img src="{{ asset('assets/images/feature_section.png') }}"
                     alt="Contact"
                     class="w-[90%] h-72 object-cover rounded-2xl shadow-md mx-auto translate-x-24"/>
            </div>

            {{-- REACH ME + CONTACTS --}}
            <div class="space-y-4">

                {{-- Floating x-label + arrow --}}
                <div class="flex items-start gap-3 mt-10">
                    <h3 class="text-2xl max-w-[180px] ml-1 -rotate-[5deg] leading-snug text-gray-700">
                        You can <span class="text-indigo-500 font-medium">reach me</span>
                        at the following
                    </h3>
                    <svg class="w-[70px] text-gray-700 mt-2 -rotate-90" viewBox="0 0 124 121" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_257_335)">
                            <path
                                d="M101.672 26.3321C96.8237 38.134 92.186 44.0573 79.0339 44.4141C70.6979 44.6403 60.8529 42.694 53.4527 38.7688C49.1632 36.4936 56.8633 35.9887 58.3238 36.046C75.2213 36.7084 91.469 47.7751 94.8076 64.9225C96.9834 76.0979 88.4245 81.9067 78.6041 84.1752C63.6278 87.6349 47.752 81.2525 36.0397 72.0991C32.1436 69.0541 19.8172 60.5149 22.0934 54.2698C23.9793 49.0954 31.7507 55.0061 34.018 56.9118C37.2506 59.6288 44.0244 65.7437 43.9149 70.3449C43.7576 76.9438 32.7995 78.0771 28.2217 77.7848C19.5283 77.2298 10.3327 73.6012 2.05876 71.0225C1.4496 70.8325 5.37871 69.9759 6.06477 69.8198C8.02976 69.3721 9.72632 68.1441 11.7325 67.8657C13.2208 67.6592 21.2769 68.287 16.2554 69.947C14.4855 70.532 2.71379 69.3189 2.58655 69.7453C2.06535 71.4868 10.2182 79.8642 11.7371 81.4008C15.3955 85.1003 14.5874 73.4626 14.2296 71.9325"
                                stroke="currentColor" stroke-width="1.75" stroke-linecap="round"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_257_335">
                                <rect width="106" height="67" fill="white"
                                      transform="matrix(-0.748497 0.663138 0.663138 0.748497 79.3407 0)"/>
                            </clipPath>
                        </defs>
                    </svg>
                </div>

                {{-- Contact items --}}
                <div class="grid grid-cols-2 gap-6 pt-2 mt-8">
                    @foreach($contacts as $contact)
                        <div class="flex items-start gap-3">
                            <x-dynamic-component :component="$contact['icon']"
                                                 class="text-indigo-500 text-base mt-1 w-6"/>
                            <div class="mt-1 space-y-4">
                                <p class="font-semibold text-gray-900 text-base">{{$contact['title']}}</p>
                                <p class="text-sm text-gray-500 mt-0.5">{{$contact['description']}}</p>
                                <p class="text-indigo-500 text-base mt-1">{{$contact['value']}}</p>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

    {{-- RIGHT SIDE FORM --}}
    <div class="rounded-3xl py-12 pl-32 px-8 w-3/5 ">

        <h2 class="text-2xl font-semibold text-gray-900">
            Fill out the form below to get started
        </h2>

        <p class="text-sm text-gray-500 mt-2">
            Tell us a little about your project.
        </p>

        @if (session()->has('success'))
            <div class="mt-4 bg-green-50 text-green-700 text-sm rounded-xl px-4 py-3">
                {{ session('success') }}
            </div>
        @endif

        <form wire:submit="submit" class="mt-8 space-y-6">

            {{-- Name --}}
            <div>
                <x-label class="block text-sm text-gray-700 mb-1.5">Name</x-label>
                <x-input type="text"
                         placeholder="John Doe"
                         wire:model="name"
                         class="w-full rounded-xl bg-gray-200 border border-transparent
                              px-4 py-3 text-sm text-gray-900
                              focus:bg-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200
                              outline-none transition placeholder-gray-400"/>
            </div>

            {{-- Email --}}
            <div>
                <x-label class="block text-sm text-gray-700 mb-1.5">Email</x-label>
                <x-input type="email"
                         placeholder="john@email.com"
                         wire:model="email"
                         class="w-full rounded-xl bg-gray-200 border border-transparent
                              px-4 py-3 text-sm text-gray-900
                              focus:bg-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200
                              outline-none transition placeholder-gray-400"/>
            </div>

            {{-- Phone --}}
            <div>
                <x-label class="block text-sm text-gray-700 mb-1.5">Phone</x-label>
                <x-input type="text"
                         placeholder="+213 XXX XXX XXX"
                         wire:model="phone"
                         class="w-full rounded-xl bg-gray-200 border border-transparent
                              px-4 py-3 text-sm text-gray-900
                              focus:bg-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200
                              outline-none transition placeholder-gray-400"/>
            </div>

            {{-- Message --}}
            <div>
                <x-label class="block text-sm text-gray-700 mb-1.5">Message</x-label>
                <x-textarea wire:model="message"
                            placeholder="Tell me a little bit about your project..."
                            rows="4"
                            class="w-full rounded-xl bg-gray-200 border border-transparent
                                 px-4 py-3 text-sm text-gray-900
                                 focus:bg-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200
                                 outline-none transition resize-none placeholder-gray-400"></x-textarea>
            </div>

            {{-- Services --}}
            <div>
                <x-label class="block text-sm text-gray-700 mb-3">Expected services</x-label>

                <div class="grid  gap-3 text-sm text-gray-700 mt-4">
                    @foreach($services as $service=>$value)
                        <x-label class="flex items-center gap-2 cursor-pointer">
                            <x-checkbox
                                label="{{ $service }}"
                                value="{{ $value }}"
                                wire:model="services.{{$service}}"
                                class="rounded border-gray-300 text-indigo-500 focus:ring-indigo-400 w-4 h-4"/>
                        </x-label>
                    @endforeach
                </div>
            </div>

            {{-- Submit --}}
            <button type="submit"
                    wire:loading.attr="disabled"
                    wire:target="submit"
                    class="w-full mt-2 bg-gray-900 text-white py-4 text-sm font-medium rounded-full
           hover:bg-gray-800 disabled:opacity-50 disabled:cursor-not-allowed
           transition">

    <span wire:loading.remove wire:target="submit">
        Get started
    </span>

                <span wire:loading wire:target="submit">
        Sending...
    </span>
            </button>

        </form>
    </div>

</div>
