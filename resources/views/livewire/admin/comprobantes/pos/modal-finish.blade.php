<x-form.modal.card name="finish-modal" wire:model.live="showModal" align="center" persistent width="6xl">
    <div class="container mx-auto p-2">
        @if ($venta)
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md">
                <div class="flex items-center justify-between p-4 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        <h2 class="ml-2 text-md font-semibold text-gray-700 dark:text-gray-300">Venta exitosa :
                            comprobante
                            {{ $venta->serie_correlativo }}</h2>
                    </div>
                    <div class="mb-4 md:mb-0">
                        <p class="text-xs font-semibold text-gray-700 dark:text-gray-300">Estado de comprobante:
                            {{ $venta->fe_estado !== '0' ? 'Enviado' : 'No Enviado' }}</p>
                        <p class="text-xs font-semibold text-gray-700 dark:text-gray-300">Envío automático: Activado</p>
                    </div>
                </div>
                <div class="p-4 flex flex-col md:flex-row justify-between items-center">

                    @if ($venta->tipo_comprobante_id !== '02')
                        <div class="flex space-x-2">
                            <x-form.button primary label="Imprimir Ticket" target="_blank"
                                href="{{ route('facturacion.ver.pdf', ['ventas' => $venta, 'formato' => 'ticket']) }}" />
                            <x-form.button primary label="Imprimir A4" target="_blank"
                                href="{{ route('facturacion.ver.pdf', ['ventas' => $venta, 'formato' => 'pdf']) }}" />
                        </div>
                    @else
                        <div class="flex space-x-2">
                            <x-form.button primary label="Imprimir Ticket" target="_blank"
                                href="{{ route('facturacion.ver.pdf.nota', ['ventas' => $venta, 'formato' => 'ticket']) }}" />
                            <x-form.button primary label="Imprimir A4" target="_blank"
                                href="{{ route('facturacion.ver.pdf.nota', ['ventas' => $venta, 'formato' => 'pdf']) }}" />
                        </div>
                    @endif

                </div>
                <div class="p-4">
                    @if ($venta->tipo_comprobante_id !== '02')
                        <embed type="application/pdf"
                            src="{{ route('facturacion.ver.pdf', ['ventas' => $venta, 'formato' => 'pdf']) }}"
                            class="w-full h-96 md:h-128">
                    @else
                        <embed type="application/pdf"
                            src="{{ route('facturacion.ver.pdf.nota', ['ventas' => $venta, 'formato' => 'pdf']) }}"
                            class="w-full h-96 md:h-128">
                    @endif


                    {{-- <iframe src="path-to-your-pdf" class="w-full h-96 md:h-128" frameborder="0"></iframe> --}}
                </div>
                <div class="p-4 flex flex-col md:flex-row justify-between items-center">
                    <div class="mb-4 md:mb-0 flex space-x-2">

                        <x-form.input type="email" wire:model.blur="email" />
                        <x-form.button slate label="Enviar" wire:click.prevent="sendEmailInvoice()"
                            spinner="sendEmailInvoice()" />
                    </div>
                    <div class="flex space-x-2">
                        <x-form.phone wire:model.blur="numero_celular" placeholder="+51" :mask="['#########']" />
                        @if ($cel_verificado)
                            <x-form.button emerald label="Enviar" href="{{ $ruta }}" target="_blank" />
                        @else
                            <x-form.button emerald label="Enviar" disabled target="_blank" />
                        @endif

                    </div>
                </div>
            </div>
        @endif
    </div>

    <x-slot name="footer" class="flex justify-end gap-x-4">
        <x-form.button primary label="Nueva Venta" id="btn-print" />
    </x-slot>
</x-form.modal.card>
@push('scripts')
    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('imprimir-ticket', (event) => {
                //imprimirHolaMundo(IMPRESORA_POR_DEFECTO);
                pc_print(event.datos);
            });


            function pc_print(data) {
                var socket = new WebSocket("ws://127.0.0.1:40213/");
                socket.bufferType = "arraybuffer";
                socket.onerror = function(error) {
                    @this.notifyError(error);
                };
                socket.onopen = function() {
                    socket.send(data);
                    socket.close(1000, "Work complete");
                };
            }

        });
    </script>

    {{-- <script>
        function pc_print(data) {
            var socket = new WebSocket("ws://127.0.0.1:40213/");
            socket.bufferType = "arraybuffer";
            socket.onerror = function(error) {
                alert("Error");
            };
            socket.onopen = function() {
                socket.send(data);
                socket.close(1000, "Work complete");
            };
        }
    </script> --}}
@endpush
