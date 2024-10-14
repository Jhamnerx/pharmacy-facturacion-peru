<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
@props(['data','rightIcon'])
<x-text-field :data="$data" :right-icon="$rightIcon" {{ $attributes }}>
<x-slot name="prepend" >{{ $prepend }}</x-slot>
<x-slot name="append" >{{ $append }}</x-slot>
{{ $slot ?? "" }}
</x-text-field>