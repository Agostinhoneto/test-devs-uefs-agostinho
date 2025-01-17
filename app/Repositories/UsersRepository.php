<?php

namespace App\Repositories;

use App\Models\User;

class UsersRepository
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getAllUsers()
    {
        return User::all();
    }

    public function getById($id)
    {
        return User::findOrFail($id);
    }


    public function salvar($name, $email, $password)
    {
        try {
            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->password  = $password;
            $user->save();

            return $user;
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public function update($id, $name, $email, $password)
    {
        try {
            if ($id != null) {
                $user = User::find($id);
                $user->id = $id;
                $user->name = $name;
                $user->email = $email;
                $user->password  = $password;
                $user->update();
                return $user->fresh();
            }
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public function delete($id)
    {
        try {
            if ($id != null) {
                $user = $this->user->findOrFail($id);
                $user->delete();
            }
            return $user;
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }
}
