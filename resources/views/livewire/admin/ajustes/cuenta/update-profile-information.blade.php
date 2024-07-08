<div class="grow">
    <form wire:submit="updateProfileInformation">
        <!-- Panel body -->
        <div class="p-6 space-y-6 " x-data="{ photoName: null, photoPreview: null }">
            <h2 class="text-2xl text-slate-800 dark:text-slate-100 font-bold mb-5">Mi Cuenta</h2>

            <!-- Picture -->
            <section>
                <div class="flex items-center gap-2">
                    <!-- Profile Photo File Input -->
                    <input type="file" id="photo" class="hidden" wire:model.live="photo" x-ref="photo"
                        x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                    <x-label for="photo" value="{{ __('Photo') }}" />

                    <!-- Current Profile Photo -->
                    <div class="mt-2 mr-2" x-show="! photoPreview">
                        <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}"
                            class="rounded-full h-20 w-20 object-cover">
                    </div>

                    <!-- New Profile Photo Preview -->
                    <div class="mt-2" x-show="photoPreview" style="display: none;">
                        <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                            x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                        </span>
                    </div>

                    <button x-on:click.prevent="$refs.photo.click()"
                        class="btn-sm bg-indigo-500 hover:bg-indigo-600 text-white">Cambiar</button>

                    @if ($this->user->profile_photo_path)
                        <button wire:click="deleteProfilePhoto" type="button"
                            class="mr-2 btn-sm bg-red-500 hover:bg-red-600
                    text-white">Eliminar
                            Foto</button>
                    @endif

                </div>
            </section>

            <!--  Profile -->
            <section>
                <h3 class="text-xl leading-snug text-slate-800 dark:text-slate-100 font-bold mb-1">Perfil</h3>
                <div class="text-sm">Actualice la información de su cuenta y la dirección de correo electrónico.</div>
                <div class="sm:flex sm:items-center space-y-4 sm:space-y-0 sm:space-x-4 mt-5">
                    <div class="sm:w-1/3">
                        <label class="block text-sm font-medium mb-1" for="name">Nombre:</label>
                        <input id="name" class="form-input w-full" type="text" value="Acme Inc." required
                            autocomplete="name" wire:model.live="state.name" />
                        <x-input-error for="name" class="mt-2" />
                    </div>
                </div>
            </section>

            <!-- Email -->
            <section>
                <h3 class="text-xl leading-snug text-slate-800 dark:text-slate-100 font-bold mb-1">Email</h3>
                <div class="text-sm">Asegúrese que su cuenta esté usando un email unico.</div>
                <div class="flex flex-wrap mt-5">
                    <div class="mr-2">
                        <label class="sr-only" for="email">email</label>
                        <input id="email" class="form-input" type="email" wire:model.live="state.email" />
                    </div>
                    {{-- <button
                        class="btn border-slate-200 dark:border-slate-700 hover:border-slate-300 dark:hover:border-slate-600 shadow-sm text-indigo-500">Change</button>
                --}}
                </div>
                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) &&
                        !$this->user->hasVerifiedEmail())
                    <p class="text-sm mt-2 dark:text-white">
                        {{ __('Your email address is unverified.') }}

                        <button type="button"
                            class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                            wire:click.prevent="sendEmailVerification">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if ($this->verificationLinkSent)
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                @endif
            </section>

            <!-- Password -->
            <section>
                <h3 class="text-xl leading-snug text-slate-800 dark:text-slate-100 font-bold mb-1">Contraseña</h3>
                <div class="text-sm">Asegúrese que su cuenta esté usando una contraseña larga y aleatoria para
                    mantenerse seguro.</div>
                <div class="mt-5">
                    <button wire:click.prevent="openModalPassword"
                        class="btn border-slate-200 dark:border-slate-700 hover:border-slate-300 dark:hover:border-slate-600 shadow-sm text-indigo-500">
                        Nueva Contraseña
                    </button>
                </div>
            </section>

        </div>

        <!-- Panel footer -->
        <footer>
            <div class="flex flex-col px-6 py-5 border-t border-slate-200 dark:border-slate-700">
                <div class="flex self-end">
                    {{-- <button
                        class="btn dark:bg-slate-800 border-slate-200 dark:border-slate-700 hover:border-slate-300 dark:hover:border-slate-600 text-slate-600 dark:text-slate-300">Cancel</button>
                     --}}

                    <x-action-message class="me-3" on="saved">
                        {{ __('Saved.') }}
                    </x-action-message>

                    <button type="submit" wire:loading.attr="disabled" wire:target="photo"
                        class="btn bg-indigo-500 hover:bg-indigo-600 text-white mx-3">Guardar Cambios</button>

                </div>
            </div>
        </footer>
    </form>

    @livewire('admin.ajustes.cuenta.update-password')
    <x-section-border />

    <div class="mx-2">
        @livewire('admin.ajustes.cuenta.logout-other-browser')

    </div>

    <x-section-border />
</div>
