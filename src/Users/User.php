<?php namespace Saphira\Users;


use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\UserTrait;
use Saphira\Core\Events\EventGenerator;
use Saphira\Core\Presenter\PresentableTrait;

use Hash;
use Saphira\Users\Events\UserHasRegistered;


class User extends \Eloquent implements UserInterface, RemindableInterface {
    use UserTrait, RemindableTrait, EventGenerator, PresentableTrait;

    protected $fillable = ['username', 'email', 'password', 'confirmation_code', 'confirmed'];

    protected $table = 'users';

    protected $presenter = 'Saphira\Users\UserPresenter';

    protected $hidden = array('password', 'remember_token', 'confirmation_token');

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public static function register($username, $email, $password, $confirmation_code, $confirmed = 0)
    {

        $user = new static(compact('username', 'email','password', 'confirmation_code', 'confirmed'));

        $user->raise(new UserHasRegistered($user));

        return $user;
    }


}
