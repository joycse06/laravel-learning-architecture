<?php namespace Saphira\Core\Presenter;


trait PresentableTrait {

    protected $presenterInstance;

    public function present()
    {
        if( ! $this->presenter or ! class_exists($this->presenter)){
            throw new PresenterException('Please set the Presenter path to your fully qualified Presenter class Name');
        }

        if( ! $this->presenterInstance )
        {
            $this->presenterInstance = new $this->presenter($this);
        }

        return $this->presenterInstance;
    }
}