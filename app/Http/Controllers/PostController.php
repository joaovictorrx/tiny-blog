<?php

namespace App\Http\Controllers;

use App\Author;
use App\Tag;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        $tags = Tag::all();
        return view('admin.create')
            ->with('tags', $tags)
            ->with('authors', $authors);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = $this->validate(request(), [
            'title' => 'required|string|max:100',
            'body' => 'required',
            'image' => 'nullable|string|max:100',
            'author_id' => 'required',
            'published' => 'required',
        ]);

        $post['slug'] = Str::slug($post['title']);
        $post = Post::create($post);
        if($request->tags){
            $post->tags()->sync($request->tags);
        }
        return back()->with('success', 'Post criado!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $authors = Author::all();
        $tags = Tag::all();

        return view('admin.edit')
        ->with('post', $post)
        ->with('tags', $tags)
        ->with('authors', $authors);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $validate = $this->validate(request(), [
            'title' => 'required|string|max:100',
            'body' => 'required',
            'image' => 'nullable|string|max:100',
            'author_id' => 'required',
            'published' => 'required',
        ]);

        $validate['slug'] = Str::slug($validate['title']);
        $post->fill($validate);
        if($request->tags){
            $post->tags()->sync($request->tags);
        }
        $post->save();
        return back()->with('success', 'Post atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        return back()->with('success', 'Post excluído!');
    }
}
