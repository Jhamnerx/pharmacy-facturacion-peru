@extends('layouts.app')

@section('contenido')

    @livewire('admin.compras.create')

@stop

@push('modals')
@endpush


{{-- section de js --}}
@section('js')

@stop
