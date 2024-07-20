@extends('layouts.app')

@section('contenido')

    @livewire('admin.compras.index')

@stop

@push('modals')
    @livewire('admin.compras.anular')
@endpush


{{-- section de js --}}
@section('js')

@stop
