<?php namespace Saphira\Users;

class UserRepository {

    public function save(User $user)
    {
        $user->save();
    }

    public function getPaginated($howMany = 25)
    {
        return User::orderBy('username', 'asc')->paginate($howMany);
    }

    public function findByUsername($username)
    {
        return User::whereUsername($username)->first();
    }

    public function findById($id)
    {
        return User::findOrFail($id);
    }
}