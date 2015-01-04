<?php namespace Saphira\Users;

use Saphira\Core\Presenter\Presenter;

/**
 * Class UserPresenter
 * @package Saphira\Users
 */
class UserPresenter extends Presenter {

    /**
     * Return user's Gravatar URL
     * @param int $size
     * @return string
     */
    public function gravatar($size = 30)
    {
        $email = md5($this->email);

        return "//www.gravatar.com/avatar/{$email}?s={$size}";
    }
}