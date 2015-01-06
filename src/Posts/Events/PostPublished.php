<?php namespace Saphira\Posts\Events;

use Saphira\Posts\Post;

class PostPublished {

    /**
     * @var Post
     */
    public $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }
}