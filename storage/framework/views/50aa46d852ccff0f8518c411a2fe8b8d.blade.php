<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
@props(['data'])
<x-text-field :data="$data" {{ $attributes }}>
<x-slot name="append" >{{ $append }}</x-slot>
{{ $slot ?? "" }}
</x-text-field>