<?php namespace Saphira\Posts;

class PostRepository {

    public function save(Post $post)
    {
        $post->save();
    }

    public function getPaginated($howMany = 25)
    {
        return Post::orderBy('id', 'asc')->paginate($howMany);
    }

    public function findBySlug($slug)
    {
        return Post::whereSlug($slug)->first();
    }

    public function findById($id)
    {
        return Post::findOrFail($id);
    }
}