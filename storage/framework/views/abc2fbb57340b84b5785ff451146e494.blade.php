<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
@props(['name'])
<x-form.icon :name="$name" {{ $attributes }}>

{{ $slot ?? "" }}
</x-form.icon>