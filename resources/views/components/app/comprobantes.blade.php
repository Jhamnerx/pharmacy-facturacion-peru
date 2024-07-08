<header class="sticky top-0 bg-white dark:bg-[#182235] border-b border-slate-200 dark:border-slate-700 z-10">

    <div class="px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-end h-16 -mb-px">

            <!-- Header: Right side -->
            <div class="flex items-center space-x-3 ">
                <!-- Divider -->
                <hr class="w-px h-6 bg-slate-200" />
                <!-- invoice button -->
                <a>
                    <button wire:click.prevent="emitNotaVenta" type="button"
                        class="btn bg-purple-500 hover:bg-purple-600 text-white">
                        <svg class="w-5 h-5 fill-current shrink-0" xmlns="http://www.w3.org/2000/svg" style=""
                            viewBox="0 0 64 64">
                            <g stroke-width="2" fill="#fff" class="nc-icon-wrapper">
                                <polyline data-cap="butt" points="56 20 39 20 39 3" fill="none" stroke="#fff"
                                    stroke-miterlimit="10"></polyline>
                                <polygon points="56 20 56 61 8 61 8 3 39 3 56 20" fill="none" stroke="#fff"
                                    stroke-linecap="square" stroke-miterlimit="10"></polygon>
                                <line x1="19" y1="49" x2="45" y2="49" fill="none"
                                    stroke="#fff" stroke-linecap="square" stroke-miterlimit="10"></line>
                                <line x1="19" y1="39" x2="45" y2="39" fill="none"
                                    stroke="#fff" stroke-linecap="square" stroke-miterlimit="10"></line>
                                <line x1="19" y1="29" x2="45" y2="29" fill="none"
                                    stroke="#fff" stroke-linecap="square" stroke-miterlimit="10"></line>
                                <line x1="19" y1="19" x2="30" y2="19" fill="none"
                                    stroke="#fff" stroke-linecap="square" stroke-miterlimit="10"></line>
                            </g>
                        </svg>
                        <span class="hidden xs:block ml-2">EMITIR NOTA DE VENTA</span>
                    </button>
                </a>

            </div>

        </div>
    </div>
</header>
