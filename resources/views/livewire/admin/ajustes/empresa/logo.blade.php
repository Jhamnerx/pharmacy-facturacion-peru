<div class="grow grid grid-cols-12 gap-2 ">
    <div class="col-span-12 sm:col-span-6 lg:col-span-4 xl:col-span-3 border border-secondary-600">
        <div class="bg-white dark:bg-slate-800 rounded shadow-lg overflow-auto w-full max-h-full"
            @keydown.escape.window="modalOpen = false, files = null">
            <div class="px-5 py-3 border-b border-slate-200 dark:border-slate-700">
                <div class="flex justify-between items-center">
                    <div class="font-semibold text-slate-800 dark:text-slate-200 uppercase">IMAGEN LOGO</div>
                </div>
            </div>
            <!-- content -->
            @if ($empresa->logo)
                <div class="px-4 py-5 bg-white dark:bg-slate-800 sm:p-6">
                    <img src="{{ Storage::url($empresa->logo) }}" alt="">
                </div>
            @else
                <div class="px-4 py-5 bg-white dark:bg-slate-800 sm:p-6" x-data="{ file: @entangle('logo').live, files: null }">
                    @if ($file)
                        <div class="px-5 py-2 border-b dark:border-slate-700">
                            <div class="flex justify-between items-center">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                </label>
                                <button wire:click="$set('file', null)" @click="files = null" type="button"
                                    class="mr-2 btn-sm bg-red-500 hover:bg-red-600 text-white">
                                    <div class="sr-only">Close</div>
                                    <svg class="w-4 h-4 fill-current">
                                        <path
                                            d="M7.95 6.536l4.242-4.243a1 1 0 111.415 1.414L9.364 7.95l4.243 4.242a1 1 0 11-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 01-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 011.414-1.414L7.95 6.536z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @else
                        <div class="px-5 py-2 border-b dark:border-slate-700">
                            <div class="flex justify-between items-left place-items-end">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"> Elegir
                                    Archivo
                                </label>
                                <button wire:click="$set('file', null)" @click="files = null" type="button"
                                    class="mr-2 btn-sm bg-red-500 hover:bg-red-600 text-white sr-only">
                                    <div class="sr-only">Close</div>
                                    <svg class="w-4 h-4 fill-current">
                                        <path
                                            d="M7.95 6.536l4.242-4.243a1 1 0 111.415 1.414L9.364 7.95l4.243 4.242a1 1 0 11-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 01-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 011.414-1.414L7.95 6.536z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @endif


                    <div class="mt-1 relative flex justify-center px-6 pt-5 pb-6 border-2 cursor-pointer border-gray-300 dark:border-gray-600 border-dashed rounded-md"
                        x-on:dragover="$el.classList.add('border-emerald-400')"
                        x-on:dragleave="$el.classList.remove('border-emerald-400')">
                        <input wire:model.live="file" type="file"
                            class="absolute inset-0 z-50 m-0 p-0 w-full h-full outline-none opacity-0 cursor-pointer"
                            id="file" x-on:change="files = $event.target.files; console.log($event.target.files);"
                            accept="image/*">
                        <div class="space-y-1 text-center">
                            @if ($file)
                                <img src="{{ $file->temporaryUrl() }}">
                            @endif
                            <div x-show="!file" class="flex text-sm text-gray-600 dark:text-gray-300">
                                <label for="file"
                                    class="relative cursor-pointer z-60 bg-white dark:bg-slate-800 rounded-md font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-500 dark:hover:text-indigo-300 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500 dark:focus-within:ring-indigo-400">
                                    <span>Subir Archivo</span>

                                </label>
                                <p class="pl-1">o arrastra y suelta</p>
                            </div>
                            <p class="text-xs text-gray-500 dark:text-gray-400">ARCHIVOS ACEPTADOS PNG, JPG 10MB</p>
                        </div>


                    </div>
                    <div wire:loading wire:target="file">
                        <span class="text-emerald-500 dark:text-emerald-400">Cargando...</span>
                    </div>

                </div>
            @endif
            @error('file')
                <p class="mt-2 peer-invalid:visible text-pink-600 dark:text-pink-400 text-sm">
                    {{ $message }}
                </p>
            @enderror
            <!-- Modal footer -->
            <div class="px-5 py-4 border-t border-slate-200 dark:border-slate-700">
                <div class="flex flex-wrap justify-end space-x-2">


                    @if ($empresa->logo)
                        <button wire:click.prevent="deleteLogo()" type="button"
                            class="mr-2 btn-sm bg-red-500 hover:bg-red-600 text-white">
                            Eliminar
                        </button>
                    @else
                        <button @click="files = null" wire:click='save'
                            class="btn-sm bg-indigo-500 hover:bg-indigo-600 text-white">Guardar</button>
                    @endif

                </div>
            </div>
        </div>
    </div>

</div>
