<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
@props(['data','id','name','disabled','readonly'])
<x-text-field :data="$data" :id="$id" :name="$name" :disabled="$disabled" :readonly="$readonly" {{ $attributes }}>
<x-slot name="append" class="flex items-center pr-2.5 gap-x-1">{{ $append }}</x-slot>
<x-slot name="after" >{{ $after }}</x-slot>
{{ $slot ?? "" }}
</x-text-field>