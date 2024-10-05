@extends('layouts.app')

@section('contenido')

    @livewire('admin.ventas.index')

@stop

@push('modals')
    @livewire('admin.ventas.delete')
    @livewire('admin.payments.create', [], key('create-payment'))
    @livewire('admin.payments.delete', [], key('delete-payment'))
    {{-- @livewire('admin.facturacion.ventas.anular-comprobante', [], key('anular-comprobante'))

    @livewire('admin.facturacion.utiles.consulta-cdr', [], key('consulta-comprobante')) --}}
@endpush
