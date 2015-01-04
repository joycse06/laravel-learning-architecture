<?php namespace Saphira\Core\Flash;

use Illuminate\Session\Store;

class FlashMessage {
    private $session;


    function __construct(Store $session){

        $this->session = $session;
    }

    public function success($message)
    {
        $this->message($message, 'success');
    }

    public function error($message)
    {
        $this->message($message, 'danger');
    }

    public function warning($message){
        $this->message($message, 'warning');
    }

    public function message($message, $level= 'info', $title = 'Notice')
    {
        $this->session->flash('spahira.flash_notification.message', $message);
        $this->session->flash('spahira.flash_notification.level', $level);
    }


}