@extends('layouts.app')

@section('contenido')

    @livewire('admin.compras.index')

@stop

@push('modals')
@endpush


{{-- section de js --}}
@section('js')

@stop
