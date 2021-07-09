<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePostingRequest;
use App\Http\Requests\UpdatePostingRequest;
use App\Models\Posting;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Auth;
use Illuminate\Support\Str;

class PostingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posting = Posting::all();

        return view('posting.index', compact('posting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posting.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        /* Posting::create($request->validated());

         */
        /* $post                   = new Posting;
        $post->title            = $request->title;
        $post->post_url         = Str::slug($request->title);
        $post->content          = $request->content;
        $post->meta_description = $request->meta;
        $post->save(); */

        $post = Posting::create([
            'title' => $request->input('title'),
            'slug' => $request->input('slug'),
            'content' => $request->input('content'),
            'meta_description' => $request->input('meta'),
            'post_by' => Auth::user()->name
        ]);

        return redirect()->route('posting.index')->with('success', 
        'Posts Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Posting $posting)
    {
        //
        return view('posting.show', compact('posting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Posting::find($id)->first();

        return view('posting.edit')->with('post', $post);
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
        //$request->update($request->validated());

        $post = Posting::where('id', $id)->update([
            'title' => $request->input('title'),
            'slug' => $request->input('slug'),
            'content' => $request->input('content'),
            'meta_description' => $request->input('meta'),
            'post_by' => Auth::user()->name
        ]);

        return redirect()->route('posting.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // $posting->delete();

        $post = Posting::find($id)->first();
        $post->delete();

        return redirect()->route('posting.index');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Posting::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }
}
