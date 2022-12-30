<?php

namespace App\Repositories\Setting;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;

class UserRepository
{
    public function store($data) : string
    {
        try {
            DB::beginTransaction();

            $user = User::create([
                'name'     => $data->name,
                'username' => explode('@', $data->email)[0],
                'email'    => $data->email,
                'password' => bcrypt('secretRB7600')
            ]);

            $user->assignRole($data->role);

            $message = "Informasi user telah disimpan";

            DB::commit();
        } catch(Exception $error) {
            DB::rollBack();

            $message = "Gagal menyimpan informasi user.";
        }

        return $message;
    }
}
