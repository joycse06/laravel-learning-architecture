<?php
use Saphira\Posts\Commands\PublishPostCommand;
use Saphira\Posts\PostRepository;
use Saphira\Posts\Validators\PublishPostValidator;

/**
 * Created by PhpStorm.
 * User: joy
 * Date: 1/5/15
 * Time: 7:48 PM
 */

class PostsController extends BaseController {

    /**
     * @var PostRepository
     */
    private $postRepository;
    /**
     * @var PublishPostValidator
     */
    private $postValidator;

    public function __construct(PostRepository $postRepository, PublishPostValidator $postValidator)
    {
        $this->beforeFilter('auth');
        $this->postRepository = $postRepository;
        $this->postValidator = $postValidator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $posts = $this->postRepository->getPaginated(10);

        return View::make('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
       $posts = $this->execute(PublishPostCommand::class);

       Flash::success('Post was created successfully');

       return Redirect::to('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return Response
     */
    public function show($slug)
    {
        $post = $this->postRepository->findBySlug($slug);

        return View::make('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($slug)
    {
        $post = $this->postRepository->findBySlug($slug);

        if (is_null($post))
        {
            return Redirect::route('posts.index');
        }

        return View::make('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {

//        $validation = Validator::make($input, Post::$rules);
        $this->postValidator->validate(Input::only('title'));
//        $post = Post::find($id);
//        $post->update($input);
        Redirect::home();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->postRepository->findById($id)->delete();

        return Redirect::route('posts.index');
    }

    public function upload()
    {
        $file = Input::file('file');
        $input = array('image' => $file);
        $rules = array(
            'image' => 'image'
        );
        $validator = Validator::make($input, $rules);
        if ( $validator->fails()) {
            return Response::json(array('success' => false, 'errors' => $validator->getMessageBag()->toArray()));
        }

        $fileName = time() . '-' . $file->getClientOriginalName();
        $destination = public_path() . '/uploads/';
        $file->move($destination, $fileName);

        echo url('/uploads/'. $fileName);
    }

}