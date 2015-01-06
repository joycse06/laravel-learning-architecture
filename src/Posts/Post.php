<?php namespace Saphira\Posts;

use Saphira\Core\Events\EventGenerator;
use Saphira\Core\Presenter\PresentableTrait;
use Saphira\Core\Sluggable\SluggableInterface;
use Saphira\Core\Sluggable\SluggableTrait;
use Saphira\Posts\Events\PostPublished;

class Post extends \Eloquent implements SluggableInterface {

    use EventGenerator, PresentableTrait, SluggableTrait;

    protected $presenter = "Saphira\Posts\PostPresenter";

    protected $table = "posts";

    protected $fillable = ['title', 'slug', 'content', 'image', 'type', 'published_date','active'];

    protected $hidden = ['type', 'active'];


    protected $sluggable = array(
        'build_from' => 'title',
        'save_to'    => 'slug',
    );

    public function author()
    {
        return $this->belongsTo('Saphira\Users\User','user_to_post');
    }

    public static function publishPost($title, $content)
    {
        $post = new static(compact('title', 'content', 'image','published_date'));

        $post->raise(new PostPublished($post));

        return $post;
    }
}