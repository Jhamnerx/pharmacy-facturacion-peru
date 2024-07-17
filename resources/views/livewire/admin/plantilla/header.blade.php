<header class="sticky top-0 bg-white dark:bg-[#182235] border-b border-slate-200 dark:border-slate-700 z-30">
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 -mb-px">

            <!-- Header: Left side -->
            <div class="flex">

                <!-- Hamburger button -->
                <button class="text-slate-500 hover:text-slate-600 lg:hidden" @click.stop="sidebarOpen = !sidebarOpen"
                    aria-controls="sidebar" :aria-expanded="sidebarOpen">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <rect x="4" y="5" width="16" height="2" />
                        <rect x="4" y="11" width="16" height="2" />
                        <rect x="4" y="17" width="16" height="2" />
                    </svg>
                </button>

            </div>

            <div class="hover text-left mx-2 hidden md:flex">
                <p class="text-talentus-200 text-wrap text-xs md:text-base ">LOCAL: <b
                        class="hover:text-talentus-200">{{ $local_actual }}</b>
                </p>
            </div>
            <div class="relative inline-flex gap-1">
                <div id="status" class="disconnected"></div>
                <span id="status-text">Disconnected</span>
            </div>

            <!-- Header: Right side -->
            <div class="flex items-center space-x-3">

                <!-- Search Button with Modal -->
                {{-- <x-modal-search /> --}}
                <div class="m-1.5">

                    <!-- Start -->
                    @if (!Cache::has('precioVenta'))
                        Obtener TC <x-form.mini.button wire:click.prevent="getTipoCambio()" spinner="getTipoCambio"
                            positive icon="arrow-path" xs />
                    @else
                        <div
                            class="text-sm hidden md:inline-flex font-medium bg-amber-100 text-amber-600 rounded-full text-center px-2.5 py-1">
                            TC - Venta: {{ Cache::get('precioVenta') }} Compra: {{ Cache::get('precioCompra') }}


                        </div>
                    @endif


                    <!-- End -->
                </div>


                <!-- Notifications button -->
                {{-- <x-dropdown-notifications align="right" /> --}}

                <!-- Empresa button -->
                <div class="relative inline-flex" x-data="{ open: false }">
                    <button
                        class="w-8 h-8 flex items-center justify-center bg-slate-100 hover:bg-slate-200 transition duration-150 rounded-full"
                        :class="{ 'bg-slate-200': open }" aria-haspopup="true" @click.prevent="open = !open"
                        :aria-expanded="open">
                        <span class="sr-only">Local</span>

                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <g fill="none" class="nc-icon-wrapper">
                                <path class="fill-current text-slate-500"
                                    d="M12 7V3H2v18h20V7H12zM6 19H4v-2h2v2zm0-4H4v-2h2v2zm0-4H4V9h2v2zm0-4H4V5h2v2zm4 12H8v-2h2v2zm0-4H8v-2h2v2zm0-4H8V9h2v2zm0-4H8V5h2v2zm10 12h-8v-2h2v-2h-2v-2h2v-2h-2V9h8v10zm-2-8h-2v2h2v-2zm0 4h-2v2h2v-2z"
                                    fill="currentColor"></path>
                            </g>
                        </svg>
                    </button>
                    <div class="origin-top-right z-10 absolute top-full right-0 min-w-44 bg-white border border-slate-200 py-1.5 rounded shadow-lg overflow-hidden mt-1"
                        @click.outside="open = false" @keydown.escape.window="open = false" x-show="open"
                        x-transition:enter="transition ease-out duration-200 transform"
                        x-transition:enter-start="opacity-0 -translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-out duration-200" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0" x-cloak>
                        <div class="text-xs font-semibold text-slate-400 uppercase pt-1.5 pb-2 px-3">
                            Selecciona Local
                        </div>
                        <ul x-data="{ selected: {{ session('local_id') }} }">


                            @foreach ($locales as $local)
                                <li>

                                    <a wire:click.prevent="changeBussines({{ $local->id }})"
                                        class="hover:bg-violet-400 focus:outline-none focus:ring font-medium text-sm hover:text-white flex items-center py-1 px-3"
                                        :class="selected === {{ $local->id }} &&
                                            'border-transparent shadow-sm bg-violet-700 text-white'"
                                        href="#0" @click="open = false; selected = {{ $local->id }}"
                                        @focus="open = true" @focusout="open = false">
                                        <svg class="w-3 h-3 fill-current text-indigo-300 shrink-0 mr-2"
                                            viewBox="0 0 12 12">
                                            <rect y="3" width="12" height="9" rx="1" />
                                            <path d="M2 0h8v2H2z" />
                                        </svg>
                                        <span class="truncate">{{ $local->nombre }}</span>
                                    </a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <!-- Info button -->
                {{-- <x-dropdown-help align="right" /> --}}


                <!-- Dark mode toggle -->
                <x-theme-toggle />

                <!-- Divider -->
                <hr class="w-px h-6 bg-slate-200 dark:bg-slate-700 border-none" />

                <!-- User button -->
                <x-dropdown-profile align="right" />

            </div>

        </div>
    </div>
</header>

@push('scripts')
    <script>
        const statusElement = document.getElementById('status');
        const statusTextElement = document.getElementById('status-text');

        function updateStatus(connected) {
            console.log('updateStatus', connected);
            if (connected) {
                statusElement.classList.remove('disconnected');
                statusElement.classList.add('connected');
                statusTextElement.textContent = ' Impresora Conectada';
            } else {
                statusElement.classList.remove('connected');
                statusElement.classList.add('disconnected');
                statusTextElement.textContent = ' Impresora Desconectada';
            }
        }

        const socket = new WebSocket("ws://127.0.0.1:40213/");

        socket.addEventListener('open', function(event) {
            console.log('WebSocket is connected.');
            updateStatus(true);
        });

        socket.addEventListener('close', function(event) {
            console.log('WebSocket is closed.');
            updateStatus(false);
        });

        socket.addEventListener('error', function(event) {
            console.log('WebSocket error:', event);
            updateStatus(false);
        });

        // Check periodically to see if the connection is still open
        setInterval(function() {
            if (socket.readyState !== WebSocket.OPEN) {
                updateStatus(false);
            }
        }, 5000); // Check every 5 seconds
    </script>
@endpush
