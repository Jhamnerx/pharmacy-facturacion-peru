@extends('layouts.app')

@section('contenido')

    @livewire('admin.clientes.index')

@stop

@push('modals')
    @livewire('admin.clientes.create')
    @livewire('admin.clientes.edit')
    @livewire('admin.clientes.delete')
@endpush


{{-- section de js --}}
@section('js')

@stop
