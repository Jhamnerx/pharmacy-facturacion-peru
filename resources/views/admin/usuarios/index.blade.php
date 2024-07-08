@extends('layouts.app')

@section('contenido')

    @livewire('admin.usuarios.index')

@stop

@push('modals')
    @livewire('admin.usuarios.create')
    @livewire('admin.usuarios.edit')
@endpush


{{-- section de js --}}
@section('js')

@stop
