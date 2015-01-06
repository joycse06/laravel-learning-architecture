<?php namespace Saphira\Posts\Commands;


use Saphira\Core\CommandBus\CommandInterface;

class PublishPostCommand implements CommandInterface {

    /**
     * @var
     */
    public $title;
    /**
     * @var
     */
    public $content;

    public function __construct($title, $content)
    {

        $this->title = $title;
        $this->content = $content;
    }
}