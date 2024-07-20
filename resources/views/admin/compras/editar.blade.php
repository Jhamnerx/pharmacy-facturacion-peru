@extends('layouts.app')

@section('contenido')

    @livewire('admin.compras.edit', ['compra' => $compra])

@stop

@push('modals')
    @livewire('admin.clientes.create')
    {{-- @livewire('admin.productos.create-modal')

    @livewire('admin.comprobates.ventas.modal-detraccion') --}}
@endpush


{{-- section de js --}}
@section('js')

@endsection
