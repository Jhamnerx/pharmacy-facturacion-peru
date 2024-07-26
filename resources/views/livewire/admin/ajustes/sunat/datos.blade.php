<div>
    <div class="text-slate-800 dark:text-slate-100 font-semibold mb-4">Datos de acceso a SUNAT:
    </div>
    <form>
        <div class="space-y-4">
            <div class="grid grid-cols-12 gap-4 mt-4 pt-4 pb-4 px-3 mb-2">

                <div class="col-span-12 md:col-span-4">

                    <x-form.select label="Regimen:" id="regimen_type" name="regimen_type" :options="[
                        ['name' => 'Nuevo Régimen Único Simplificado', 'id' => 'NRUS'],
                        ['name' => 'Régimen Especial de Renta ', 'id' => 'RER'],
                        ['name' => 'Régimen MYPE Tributario', 'id' => 'RMT'],
                        ['name' => 'Régimen General de Renta', 'id' => 'RG'],
                    ]"
                        option-label="name" option-value="id" wire:model.live="regimen_type" :clearable="false" />

                </div>
                <div class="col-span-12 md:col-span-4">

                    <x-form.select label="Entorno del sistema:" id="modo" name="modo" :options="[['name' => 'Demo', 'id' => 'local'], ['name' => 'Producción', 'id' => 'produccion']]"
                        option-label="name" option-value="id" wire:model.live="modo" :clearable="false" />

                </div>
                <div class="col-span-12 md:col-span-4">

                    <x-form.select label="SOAP Envio:" id="soap_type" name="soap_type" :options="[
                        ['name' => 'Sunat', 'id' => 'sunat'],
                        ['name' => 'Ose', 'id' => 'ose'],
                        ['name' => 'Qpse', 'id' => 'qpse'],
                    ]"
                        option-label="name" option-value="id" wire:model.live="soap_type" :clearable="false" />

                </div>

                <div class="col-span-12 sm:col-span-3 md:col-span-6">

                    <x-form.input label="SOAP Usuario:" wire:model.live='sunat.usuario_sol_sunat' />

                </div>

                <div class="col-span-12 sm:col-span-3 md:col-span-6">
                    <x-form.password label="SOAP Contraseña:" wire:model.live='sunat.clave_sol_sunat' />

                </div>

                <div class="col-span-12 sm:col-span-3 md:col-span-6">
                    <x-form.password label="Contraseña CDT:" wire:model.live='sunat.clave_certificado_cdt'
                        description="Para subir certificado en pfx o p12" />

                </div>

                @if ($soap_type == 'qpse')
                    <div class="col-span-full">
                        <hr class="my-6 border-t border-slate-200 dark:border-slate-700" />
                    </div>
                    <div class="col-span-full">
                        <header class="mb-6">
                            <!-- Title -->
                            <h1 class="text-2xl text-slate-800 dark:text-slate-100 font-bold mb-2">
                                DATOS DE QPSE
                            </h1>
                            <p>Ingresa las credenciales</p>
                        </header>

                    </div>
                    <div class="col-span-12 sm:col-span-3 md:col-span-4">
                        <x-form.input label="Usuario" wire:model.live='qpse_datos.usuario'
                            description="Requerido si el Soap Envio es Qpse" />

                    </div>
                    <div class="col-span-12 sm:col-span-3 md:col-span-4">
                        <x-form.input label="Contraseña" wire:model.live='qpse_datos.clave'
                            description="Requerido si el Soap Envio es Qpse" />

                    </div>
                @endif

            </div>

            <div class="text-right">
                <x-form.button wire:click.prevent="saveSunat" xs spinner="saveSunat" loading-delay="short" black
                    label="GUARDAR" />
            </div>
        </div>
    </form>
</div>
