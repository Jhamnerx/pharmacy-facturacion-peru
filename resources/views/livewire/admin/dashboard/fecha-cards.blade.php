<div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">


    <div class="relative">
        <x-form.datetime.picker id="fecha" name="fecha" wire:model.live="fecha" :min="now()->subDays(1)" :max="now()->addDays(90)"
            without-time parse-format="YYYY-MM-DD" display-format="DD-MM-YYYY" :clearable="false" />
    </div>


</div>
