@extends('layouts.app')

@section('contenido')

    @livewire('admin.productos.index')

@stop

@push('modals')
    @livewire('admin.productos.create')
    @livewire('admin.productos.edit')
    @livewire('admin.productos.delete')
@endpush


{{-- section de js --}}
@section('js')

@stop
