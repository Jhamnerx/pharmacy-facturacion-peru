@extends('layouts.app')

@section('contenido')

    @livewire('admin.comprobantes.cotizaciones.index')

@stop

@push('modals')
    {{-- @livewire('admin.facturacion.ventas.anular-comprobante', [], key('anular-comprobante'))

    @livewire('admin.facturacion.utiles.consulta-cdr', [], key('consulta-comprobante')) --}}
@endpush
