@extends('layouts.app')

@section('contenido')

    @livewire('admin.devoluciones.create')

@stop

@push('modals')
@endpush


{{-- section de js --}}
@section('js')

@endsection
