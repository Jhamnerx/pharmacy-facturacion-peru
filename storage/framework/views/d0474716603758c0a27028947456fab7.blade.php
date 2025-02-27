<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>

<x-form.card  {{ $attributes }}>
<x-slot name="action" >{{ $action }}</x-slot>
<x-slot name="footer" >{{ $footer }}</x-slot>
{{ $slot ?? "" }}
</x-form.card>