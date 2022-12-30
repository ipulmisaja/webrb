<?php

namespace App\Http\Livewire\Setting\User;

use App\Repositories\Setting\UserRepository;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Create extends Component
{
    public $name;
    public $email;
    public $role;

    protected $rules = [
        'name'  => 'required|string|min:3',
        'email' => 'required|string|min:3',
        'role'  => 'required'
    ];

    public function render()
    {
        return view('livewire.setting.user.create', [
            'roles' => Role::get()
        ])->layout('layouts.backend.app');
    }

    public function save(UserRepository $userRepository)
    {
        $this->validate($this->rules);

        $result = $userRepository->store($this);

        session()->flash('message', $result);

        return redirect(env('APP_URL') . 'setting/user');
    }
}
