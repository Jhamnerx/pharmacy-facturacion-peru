@extends('layouts.app')

@section('contenido')

    @livewire('admin.proveedores.index')

@stop

@push('modals')
    @livewire('admin.proveedores.create')
    @livewire('admin.proveedores.edit')
    @livewire('admin.proveedores.delete')
@endpush


{{-- section de js --}}
@section('js')

@stop
