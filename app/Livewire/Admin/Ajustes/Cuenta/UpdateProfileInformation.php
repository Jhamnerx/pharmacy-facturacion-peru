<?php

namespace App\Livewire\Admin\Ajustes\Cuenta;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateProfileInformation extends Component
{

    use WithFileUploads;
    public $state = [];

    public $photo;
    public $verificationLinkSent = false;


    protected $listeners = [
        'render' => 'render'
    ];

    public function mount()
    {
        $user = Auth::user();

        $this->state = array_merge([
            'email' => $user->email,
        ], $user->withoutRelations()->toArray());
    }


    public function render()
    {
        return view('livewire.admin.ajustes.cuenta.update-profile-information');
    }

    public function updateProfileInformation(UpdatesUserProfileInformation $updater)
    {
        $this->resetErrorBag();

        $updater->update(
            Auth::user(),
            $this->photo
                ? array_merge($this->state, ['photo' => $this->photo])
                : $this->state
        );

        if (isset($this->photo)) {
            return redirect()->route('admin.ajustes.cuenta');
        }

        $this->dispatch('saved');
        $this->dispatch('refresh-navigation-menu');

        $this->render();
    }
    public function deleteProfilePhoto()
    {
        Auth::user()->deleteProfilePhoto();
        $this->dispatch('refresh-navigation-menu');
    }
    public function sendEmailVerification()
    {
        Auth::user()->sendEmailVerificationNotification();

        $this->verificationLinkSent = true;
    }

    public function getUserProperty()
    {
        return Auth::user();
    }

    public function openModalPassword()
    {
        $this->dispatch('open-modal-password');
    }
}
