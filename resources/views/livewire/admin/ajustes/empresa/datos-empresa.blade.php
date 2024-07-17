<div class="grow">

    <!-- Panel body -->
    <div class="p-6" x-data="{ activeTab: 'datos' }">
        <h2 class="text-2xl text-slate-800 dark:text-slate-100 font-bold mb-5">CONFIGURACIÓN EMPRESA</h2>

        <!-- General -->
        <div class="mb-6">
            <!-- Filters -->
            <div class="mb-4 border-b border-slate-200 dark:border-slate-700">
                <ul class="text-sm font-medium flex flex-nowrap overflow-x-scroll no-scrollbar">

                    <li @click="activeTab = 'datos'" :class="{ 'border-b-2 border-indigo-500': activeTab === 'datos' }"
                        class="pb-3 mr-6 last:mr-0 first:pl-4 sm:first:pl-6 lg:first:pl-8 last:pr-4 sm:last:pr-6 lg:last:pr-8">
                        <a :class="activeTab === 'datos' ? 'text-indigo-500' :
                            'text-slate-500 dark:text-slate-400 hover:text-slate-600 dark:hover:text-slate-300'"
                            href="#0">Datos Empresa</a>
                    </li>

                    <li @click="activeTab = 'digemid'"
                        :class="{ 'border-b-2 border-indigo-500': activeTab === 'digemid' }"
                        class="pb-3 mr-6 last:mr-0 first:pl-4 sm:first:pl-6 lg:first:pl-8 last:pr-4 sm:last:pr-6 lg:last:pr-8">

                        <a :class="activeTab === 'digemid' ? 'text-indigo-500' :
                            'text-slate-500 dark:text-slate-400 hover:text-slate-600 dark:hover:text-slate-300'"
                            href="#0">Datos Producto Digemid</a>
                    </li>
                    <li @click="activeTab = 'imagenes'"
                        :class="{ 'border-b-2 border-indigo-500': activeTab === 'imagenes' }"
                        class="pb-3 mr-6 last:mr-0 first:pl-4 sm:first:pl-6 lg:first:pl-8 last:pr-4 sm:last:pr-6 lg:last:pr-8">

                        <a :class="activeTab === 'imagenes' ? 'text-indigo-500' :
                            'text-slate-500 dark:text-slate-400 hover:text-slate-600 dark:hover:text-slate-300'"
                            href="#0">Imagenes</a>
                    </li>
                    <li @click="activeTab = 'terminos'"
                        :class="{ 'border-b-2 border-indigo-500': activeTab === 'terminos' }"
                        class="pb-3 mr-6 last:mr-0 first:pl-4 sm:first:pl-6 lg:first:pl-8 last:pr-4 sm:last:pr-6 lg:last:pr-8">

                        <a :class="activeTab === 'terminos' ? 'text-indigo-500' :
                            'text-slate-500 dark:text-slate-400 hover:text-slate-600 dark:hover:text-slate-300'"
                            href="#0">Terminos</a>
                    </li>
                </ul>
            </div>
        </div>

        <!--  DATOS EMPRESA -->
        <section x-show="activeTab === 'datos'" class="pb-6 border-b border-slate-200 dark:border-slate-700">
            <div class="grid grid-cols-12 gap-4">

                <!-- Card 1 -->
                <div
                    class="col-span-full bg-white dark:bg-slate-800 shadow-md rounded-sm border border-slate-200 dark:border-slate-700">
                    <!-- Card content -->
                    <div class="flex flex-col h-full p-5">
                        <div class="grow grid grid-cols-12 gap-2">

                            <div class="col-span-12 sm:col-span-2">
                                <x-form.input maxlength="11" label="R.U.C (*):" wire:model.live='ruc'
                                    placeholder="ingresa el ruc" required />

                            </div>

                            <div class="col-span-12 sm:col-span-5">
                                <x-form.input label="Razon social (*):" wire:model.live='razon_social'
                                    placeholder="ingresa la razon social" />

                            </div>

                            <div class="col-span-12 sm:col-span-5">
                                <x-form.input label="Nombre comercial (*):" placeholder="ingresa nombre comercial"
                                    wire:model.live='nombre_comercial' />

                            </div>
                            <div class="col-span-12 sm:col-span-3">
                                <x-form.input label="Título (nombre web):" placeholder="ingresa nombre comercial"
                                    wire:model.live='nombre_web' />

                            </div>

                            <div class="col-span-12 sm:col-span-3">
                                <x-form.phone label="Telefono (*):" wire:model.live='telefono'
                                    placeholder="Ejemplo: 987654321" maxlength="9" mask="#########" />

                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <x-form.input label="I.G.V (*):" placeholder="ingresa igv" prefix="%"
                                    wire:model.live='igv' />

                            </div>
                            <div class="col-span-6 sm:col-span-3">

                                <x-form.currency label="Impuesto a la bolsa plastica" placeholder="ingresa icper"
                                    wire:model.live="icbper" />

                            </div>

                            <div class="col-span-12 sm:col-span-3">

                                <div class="w-full ">
                                    <div class="flex justify-between items-end mb-1">
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                                            Modo Sistema
                                        </label>
                                    </div>
                                    <div class="relative rounded-md">

                                        <x-form.toggle md label="Produccion" wire:model.live="modo" />

                                    </div>

                                </div>

                            </div>

                            <div class="col-span-12 sm:col-span-3">

                                <x-form.button wire:click="testPrint" spinner="testPrint" loading-delay="short" black
                                    label="Probar Impresora" />

                            </div>
                        </div>

                        <!-- Card footer -->
                        <footer class="mt-4">
                            <div class="flex justify-end">
                                <!-- Right side -->
                                <x-form.button wire:click="saveData" spinner="saveData" loading-delay="short" black
                                    label="Guardar" />
                            </div>
                        </footer>
                    </div>
                </div>
                <!-- Card 2 -->
                <div
                    class="col-span-full bg-white dark:bg-slate-800 shadow-md rounded-sm border border-slate-200 dark:border-slate-700">
                    <!-- Card content -->
                    <div class="flex flex-col h-full p-5">
                        <div class="flex flex-wrap justify-between items-center mb-8">
                            <!-- Left side -->
                            <h3 class="text-lg text-slate-800 dark:text-slate-100 font-semibold">LISTA DE LOCALES
                            </h3>
                            <!-- Right side -->

                            <x-form.button wire:click.prevent="openModalCreateLocal" label="Añadir" outline emerald
                                icon="plus-circle" />
                        </div>

                        <div class="grow">

                            {{-- TABLA LOCALES --}}
                            <x-settings.tabla-locales :locales="$locales" />
                        </div>
                        <!-- Card footer -->
                        <footer class="mt-4">
                            {{ $locales->links() }}
                        </footer>
                    </div>
                </div>

            </div>
        </section>

        <!--  DATOS DIGEMID -->
        <section x-show="activeTab === 'digemid'" class="pb-6 border-b border-slate-200 dark:border-slate-700">
            <div class="grid grid-cols-12 gap-4">

                <!-- Card 1 -->
                <div
                    class="col-span-full bg-white dark:bg-slate-800 shadow-md rounded-sm border border-slate-200 dark:border-slate-700">
                    <!-- Card content -->
                    <div class="flex flex-col h-full p-5">


                        <label class="block text-sm font-medium text-gray-700"> Elegir Archivo </label>

                        <div x-data="{ file: @entangle('file').live, files: null }"
                            class="mt-1 relative flex justify-center px-6 pt-5 pb-6 border-2 cursor-pointer border-gray-300 border-dashed rounded-md"
                            x-on:dragover="$el.classList.add('border-emerald-400')"
                            x-on:dragleave="$el.classList.remove('border-emerald-400')">
                            <input wire:model.live="file" type="file"
                                class="absolute inset-0 z-50 m-0 p-0 w-full h-full outline-none opacity-0 cursor-pointer"
                                id="file"
                                x-on:change="files = $event.target.files; console.log($event.target.files);"
                                accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                            <div class="space-y-1 text-center">
                                <svg x-show="!file" class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor"
                                    fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path
                                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <svg x-show="file" class="mx-auto h-12 w-12" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 48 48" width="48px" height="48px">
                                    <path fill="#4CAF50"
                                        d="M41,10H25v28h16c0.553,0,1-0.447,1-1V11C42,10.447,41.553,10,41,10z" />
                                    <path fill="#FFF"
                                        d="M32 15H39V18H32zM32 25H39V28H32zM32 30H39V33H32zM32 20H39V23H32zM25 15H30V18H25zM25 25H30V28H25zM25 30H30V33H25zM25 20H30V23H25z" />
                                    <path fill="#2E7D32" d="M27 42L6 38 6 10 27 6z" />
                                    <path fill="#FFF"
                                        d="M19.129,31l-2.411-4.561c-0.092-0.171-0.186-0.483-0.284-0.938h-0.037c-0.046,0.215-0.154,0.541-0.324,0.979L13.652,31H9.895l4.462-7.001L10.274,17h3.837l2.001,4.196c0.156,0.331,0.296,0.725,0.42,1.179h0.04c0.078-0.271,0.224-0.68,0.439-1.22L19.237,17h3.515l-4.199,6.939l4.316,7.059h-3.74V31z" />
                                </svg>
                                <div x-show="!file" class="flex text-sm text-gray-600">
                                    <label for="file"
                                        class="relative cursor-pointer z-60 bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span>Subir Archivo</span>
                                        {{-- <input id="file-upload" name="file-upload" type="file" class="sr-only"
                                        accept="image/*"> --}}



                                    </label>
                                    <p class="pl-1">o arrastra y suelta</p>
                                </div>
                                <template x-if="file !== null">
                                    <template x-for="(_,index) in Array.from({ length: files.length })">

                                        <div class="flex text-sm text-gray-600">
                                            Archivo Selecionado:
                                            <p class="pl-1" x-text="files[index].name">Subiendo</p>

                                        </div>
                                    </template>

                                </template>

                                <p class="text-xs text-gray-500">XLSl, XLS 10MB</p>
                            </div>


                        </div>
                        <div wire:loading wire:target="file">
                            <span class="text-emerald-500">Cargando...</span>
                        </div>
                        @error('file')
                            <p class="mt-2 peer-invalid:visible text-pink-600 text-sm">
                                {{ $message }}
                            </p>
                        @enderror
                        @foreach ($errorInfo as $error)
                            <p class="mt-2 peer-invalid:visible text-pink-600 text-sm">
                                {{ $error['errores'] }} => {{ $error['values'] }}
                            </p>
                        @endforeach
                        {{-- <div>
                            <p class="mt-1 text-slate-500 text-sm">
                                Descargar archivo formato
                                <a class="text-blue-800" href="{{ Storage::url('excel/clientes.xlsx') }}" download>
                                    Haz click aqui
                                </a>
                            </p>
                        </div> --}}

                        <!-- Card footer -->
                        <footer class="mt-4">
                            <div class="flex justify-end">
                                <!-- Right side -->
                                <x-form.button wire:click="importExcel" spinner="importExcel" loading-delay="short"
                                    black label="Importar" />
                            </div>
                        </footer>
                    </div>
                </div>

                @livewire('admin.ajustes.empresa.catalago-digemid')

            </div>
        </section>

        {{-- LOGO --}}
        <section x-show="activeTab === 'imagenes'" class="pb-6 border-b border-slate-200 dark:border-slate-700">
            <div class="grid grid-cols-12 gap-4">
                <!-- Card 1 -->
                <div
                    class="col-span-full bg-white dark:bg-slate-800 shadow-md rounded-sm border border-slate-200 dark:border-slate-700">
                    <!-- Card content -->
                    <div class="flex flex-col h-full p-5">
                        @livewire('admin.ajustes.empresa.logo', ['empresa' => $empresa])

                        <!-- Card footer -->
                        {{-- <footer class="mt-4">
                            <div class="flex justify-end">
                                <!-- Right side -->
                                <x-form.button wire:click="save" spinner="save" loading-delay="short" black
                                    label="Guardar" />
                            </div>
                        </footer> --}}
                    </div>
                </div>


            </div>
        </section>

        {{-- terminos --}}
        <section x-show="activeTab === 'terminos'" class="pb-6 border-b border-slate-200 dark:border-slate-700">
            <div class="grid grid-cols-12 gap-4">
                <!-- Card 1 -->
                <div
                    class="col-span-full bg-white dark:bg-slate-800 shadow-md rounded-sm border border-slate-200 dark:border-slate-700">
                    <!-- Card content -->
                    <div class="flex flex-col h-full p-5">
                        <div class="grow grid grid-cols-12 gap-2">
                            <div class="flex flex-auto gap-2 mx-4 py-2 col-span-12">
                                <div class=""></div>
                                <div class="w-full">

                                    <x-form.mini.button rounded wire:click.prevent="addItem" spinner="addItem" primary
                                        label="+" class="float-right" />

                                </div>
                            </div>
                            @if ($terminos->isEmpty())

                                <div class="col-span-12">
                                    <span class="w-full text-red-500">Agregar Terminos</span>
                                </div>
                            @else
                                @foreach ($terminos as $clave => $termino)
                                    <div class="col-span-12 py-2">
                                        <div class="flex gap-2">

                                            <div class="col-span-12 sm:col-span-12 w-full">

                                                <x-form.textarea label="TERMINO {{ $clave + 1 }}:"
                                                    placeholder="ESCRIBA AQUI"
                                                    wire:model.live='terminos.{{ $clave }}' />

                                            </div>

                                            <button type="button"
                                                wire:click.prevent="eliminar('{{ $clave }}')"
                                                class="text-rose-500 hover:text-rose-600 rounded-full">
                                                <span class="sr-only">Eliminar</span>
                                                <svg class="w-8 h-8 fill-current" viewBox="0 0 32 32">
                                                    <path d="M13 15h2v6h-2zM17 15h2v6h-2z" />
                                                    <path
                                                        d="M20 9c0-.6-.4-1-1-1h-6c-.6 0-1 .4-1 1v2H8v2h1v10c0 .6.4 1 1 1h12c.6 0 1-.4 1-1V13h1v-2h-4V9zm-6 1h4v1h-4v-1zm7 3v9H11v-9h10z" />
                                                </svg>
                                            </button>

                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <!-- Card footer -->
                        <footer class="mt-4">
                            <div class="flex justify-end">
                                <!-- Right side -->
                                <x-form.button wire:click="saveTerminos" spinner="saveTerminos" loading-delay="short"
                                    black label="Guardar" />
                            </div>
                        </footer>
                    </div>
                </div>


            </div>
        </section>

    </div>

</div>

@push('scripts')
    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('imprimir-test', (event) => {
                //imprimirHolaMundo(IMPRESORA_POR_DEFECTO);
                pc_print(event.datos);
            });


            function pc_print(data) {
                var socket = new WebSocket("ws://127.0.0.1:40213/");
                socket.bufferType = "arraybuffer";
                socket.onerror = function(error) {
                    @this.notifyError();
                };
                socket.onopen = function() {
                    socket.send(data);
                    socket.close(1000, "Work complete");
                };
            }

        });
    </script>
@endpush
