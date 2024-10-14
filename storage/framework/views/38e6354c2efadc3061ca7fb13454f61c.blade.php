<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
@props(['data','withErrorIcon','padding'])
<x-text-field :data="$data" :with-error-icon="$withErrorIcon" :padding="$padding" {{ $attributes }}>

{{ $slot ?? "" }}
</x-text-field>