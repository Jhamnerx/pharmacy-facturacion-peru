<div>
    <div class="text-slate-800 dark:text-slate-100 font-semibold mb-4">
        Guías electrónicas:
    </div>
    <form>
        <div class="space-y-4">
            <div class="grid grid-cols-12 gap-4 mt-4 pt-4 pb-4 px-3 mb-2">

                <div class="col-span-12 sm:col-span-3 md:col-span-6">

                    <x-form.input label="Cliente ID:" wire:model.live='cliente_id' autocomplete="off" />

                </div>

                <div class="col-span-12 sm:col-span-3 md:col-span-6">
                    <x-form.password label="Cliente Secret:" wire:model.live='cliente_secret' autocomplete="off" />

                </div>

            </div>

            <div class="text-right">
                <x-form.button wire:click.prevent="save" xs spinner="save" loading-delay="short" black
                    label="GUARDAR" />
            </div>
        </div>
    </form>
</div>
