<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Models\Type;
use App\Models\Lead;
use App\Mail\ConfirmPost;
use App\Models\Technology;
use Illuminate\Support\Facades\Mail;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $posts = Post::all();
       return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.posts.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {

        $form_data = $request->validated();
        $slug = Post::generateSlug($request->title);
        $form_data['slug'] = $slug;

        $newPost = new Post();
        if($request->has('cover_image')){
            $path = Storage::disk('public')->put('post_images', $request->cover_image);

            $form_data['cover_image'] = $path;
        }

        $newPost->fill($form_data);
        $newPost->save();
        if($request->has('technologies')){
            $newPost->technologies()->attach($request->technologies);
        }

        $new_lead = new Lead();
        $new_lead->title = $form_data['title'];
        $new_lead->slug = $form_data['slug'] ;
        $new_lead->language = $form_data['language'] ;
        $new_lead->description = $form_data['description'] ;

        $new_lead->save();

        Mail::to('hello@example.com')->send(new ConfirmPost($new_lead));
        return redirect()->route('admin.posts.index')->with('message','post creato correttamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $types=Type::all();
        $technologies = Technology::all();
        return view('admin.posts.edit', compact('post','types','technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $form_data = $request->validated();
        $slug = Post::generateSlug($request->title);
        $form_data['slug'] = $slug;

        if($request->has('cover_image')){
            if($post->cover_image){
                Storage::delete($post->cover_image);
            }
            $path = Storage::disk('public')->put('post_images', $request->cover_image);

            $form_data['cover_image'] = $path;
        }


       $post->update($form_data);
        return redirect()->route('admin.posts.index')->with('message','post modificato correttamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('message','progetto eliminato correttamente');
    }
}
