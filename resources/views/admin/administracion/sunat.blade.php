@extends('layouts.app')

@section('contenido')

    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Page header -->
        <div class="mb-8">

            <!-- Title -->
            <h1 class="text-2xl md:text-3xl text-slate-800 dark:text-slate-100 font-bold">Ajustes ✨</h1>

        </div>

        <div class="bg-white dark:bg-slate-800 shadow-lg rounded-sm mb-8">
            <div class="flex flex-col md:flex-row md:-mr-px">

                <!-- Sidebar -->
                <x-settings.navigation></x-settings.navigation>

                <!-- Panel -->
                <div class="grow">
                    <div class="p-6">
                        <div class="mb-6 lg:mb-0">

                            <header class="mb-6">
                                <!-- Title -->
                                <h1 class="text-2xl md:text-3xl text-slate-800 dark:text-slate-100 font-bold mb-2">
                                    CONFIGURACIÓN DE SUNAT ✨
                                </h1>
                                <p>Ingresa las credenciales, y el modo del sistema.</p>
                            </header>

                            @livewire('admin.ajustes.sunat.datos', ['empresa' => $empresa], key('dat' . $empresa->id))

                            <!-- Divider -->
                            <hr class="my-6 pt-2 border-t border-slate-200 dark:border-slate-700" />

                            @livewire('admin.ajustes.sunat.guia-api-datos', ['empresa' => $empresa], key('guia' . $empresa->id))

                            <!-- Divider -->
                            <hr class="my-6 border-t border-slate-200 dark:border-slate-700" />

                            @livewire('admin.ajustes.sunat.sire-datos', ['empresa' => $empresa], key('sire' . $empresa->id))

                            <!-- Divider -->
                            <hr class="my-6 border-t border-slate-200 dark:border-slate-700" />

                            <div>
                                <div class="text-slate-800 dark:text-slate-100 font-semibold mb-4 mt-2">Certificado (CDT):
                                </div>
                                <form>
                                    <div class="space-y-4">
                                        <div class="grid grid-cols-12 gap-4 mt-4 pt-4 pb-4 px-3 mb-2">

                                            @livewire('admin.ajustes.sunat.certificado', ['empresa' => $empresa], key('cdt' . $empresa->id))
                                            @livewire('admin.ajustes.sunat.certificado-pem', ['empresa' => $empresa], key('cdt-pem' . $empresa->id))

                                        </div>

                                    </div>
                                </form>
                            </div>

                        </div>

                        {{-- <div
                            class="col-span-full bg-white dark:bg-slate-800 shadow-md rounded-sm border border-slate-200 dark:border-slate-700">
                            <!-- Card content -->
                            <div class="flex flex-col h-full p-5">
                                <div class="grow grid grid-cols-12 gap-2">
                                    @livewire('admin.ajustes.sunat.certificado', ['empresa' => $empresa], key('cdt' . $empresa->id))
                                    @livewire('admin.ajustes.sunat.certificado-pem', ['empresa' => $empresa], key('cdt' . $empresa->id))
                                </div>
                            </div>
                        </div> --}}

                        {{-- <div
                            class="col-span-full bg-white dark:bg-slate-800 shadow-md rounded-sm border border-slate-200 dark:border-slate-700">
                            <!-- Card content -->
                            <div class="flex flex-col h-full p-5">
                                <div class="grow grid grid-cols-12 gap-2">
                                    @livewire('admin.ajustes.sunat.certificado-pem', ['empresa' => $empresa], key('cdt' . $empresa->id))
                                </div>
                            </div>
                        </div> --}}


                    </div>

                </div>
            </div>
        </div>
    </div>

@stop

@push('modals')
@endpush


{{-- section de js --}}
@section('js')

@stop
