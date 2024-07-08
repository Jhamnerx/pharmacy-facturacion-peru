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
                {{-- @livewire('admin.ajustes.cuenta.update-profile-information') --}}
                <div class="grow">
                    <div class="p-6">

                        <div
                            class="col-span-full bg-white dark:bg-slate-800 shadow-md rounded-sm border border-slate-200 dark:border-slate-700">
                            <!-- Card content -->
                            <div class="flex flex-col h-full p-5">
                                <div class="grow grid grid-cols-12 gap-2">
                                    @livewire('admin.ajustes.sunat.datos', ['empresa' => $empresa], key('dat' . $empresa->id))
                                </div>
                            </div>
                        </div>


                        <div
                            class="col-span-full bg-white dark:bg-slate-800 shadow-md rounded-sm border border-slate-200 dark:border-slate-700">
                            <!-- Card content -->
                            <div class="flex flex-col h-full p-5">
                                <div class="grow grid grid-cols-12 gap-2">
                                    @livewire('admin.ajustes.sunat.certificado', ['empresa' => $empresa], key('cdt' . $empresa->id))
                                    @livewire('admin.ajustes.sunat.certificado-pem', ['empresa' => $empresa], key('cdt' . $empresa->id))
                                </div>
                            </div>
                        </div>
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
