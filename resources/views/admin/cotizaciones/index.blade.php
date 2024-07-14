@extends('layouts.app')

@section('contenido')

    @livewire('admin.comprobantes.cotizaciones.index')

@stop

@push('modals')
    @livewire('admin.comprobantes.cotizaciones.send')
    @livewire('admin.comprobantes.cotizaciones.delete')
@endpush
