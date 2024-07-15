@extends('layouts.app')

@section('contenido')

    @livewire('admin.comprobantes.pos.steps.cart-step')

@stop

@push('modals')
    @livewire('admin.comprobantes.pos.modal-finish')
    @livewire('admin.clientes.create')
@endpush


{{-- section de js --}}
@section('js')

@stop
