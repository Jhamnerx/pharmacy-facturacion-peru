@extends('layouts.app')

@section('contenido')

    @livewire('admin.cajas.index')

@stop

@push('modals')
    @livewire('admin.cajas.create')
    {{-- @livewire('admin.categorias.create')
    @livewire('admin.categorias.edit')
    @livewire('admin.categorias.delete') --}}
@endpush


{{-- section de js --}}
@section('js')

@stop
