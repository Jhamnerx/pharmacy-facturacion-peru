<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
@props(['data','name','id','disabled','readonly'])
<x-text-field :data="$data" :name="$name" :id="$id" :disabled="$disabled" :readonly="$readonly" {{ $attributes }}>
<x-slot name="label" class="cursor-pointer select-none" x-on:click="toggle">{{ $label }}</x-slot>
<x-slot name="append" class="flex items-center pr-2.5 gap-x-1">{{ $append }}</x-slot>
<x-slot name="after" >{{ $after }}</x-slot>
{{ $slot ?? "" }}
</x-text-field>