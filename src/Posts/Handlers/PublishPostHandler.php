<?php namespace Saphira\Posts\Handlers;


use Saphira\Core\CommandBus\CommandHandlerInterface;
use Saphira\Core\CommandBus\CommandInterface;
use Saphira\Core\Events\DispatchableTrait;
use Saphira\Posts\Post;
use Saphira\Posts\PostRepository;


class PublishPostHandler implements CommandHandlerInterface {

    use DispatchableTrait;
    /**
     * @var PostRepository
     */
    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {

        $this->postRepository = $postRepository;
    }

    public function handle(CommandInterface $command)
    {
        $post = Post::publishPost($command->title, $command->content);

        $this->postRepository->save($post);

        $this->dispatchEventsFor($post);

        return $post;

    }
}