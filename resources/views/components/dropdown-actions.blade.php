<div class="relative inline-flex" x-data="{ open: false }">
    <div class="relative inline-block h-full text-left">
        <button class="text-slate-400 hover:text-slate-500 rounded-full"
            :class="{ 'bg-slate-100 dark:bg-slate-900 text-slate-500': open }" aria-haspopup="true"
            @click.prevent="open = !open" :aria-expanded="open">
            <span class="sr-only">Menu</span>
            <svg class="w-8 h-8 fill-current" viewBox="0 0 32 32">
                <circle cx="16" cy="16" r="2" />
                <circle cx="10" cy="16" r="2" />
                <circle cx="22" cy="16" r="2" />
            </svg>
        </button>
        <div class="origin-top-right  z-10 absolute transform  -translate-x-3/4  top-full left-0 min-w-36 bg-white dark:bg-slate-800 border border-slate-200 py-1.5 rounded shadow-lg overflow-hidden mt-1  ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none"
            @click.outside="open = false" @keydown.escape.window="open = false" x-show="open"
            x-transition:enter="transition ease-out duration-200 transform"
            x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-out duration-200" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" x-cloak>
            <ul>
                {{ $slot }}

            </ul>


        </div>
    </div>

</div>
