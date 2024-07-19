@extends('layouts.app')

@section('contenido')

    @livewire('admin.lotes.index')

@stop

@push('modals')
    @livewire('admin.lotes.edit')
    @livewire('admin.lotes.delete')
@endpush


{{-- section de js --}}
@section('js')

@stop
