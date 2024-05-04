<?php

namespace App\Http\Controllers;

use App\Models\PostCar;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostCarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.inform.post.index', [
            'title' => 'Post',
            'heading' => 'Data Post',
            'collection' => PostCar::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.inform.post.create', [
            'title' => 'Post',
            'heading' => 'Create Post',
            'category' => Category::latest()->get()

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'photo' => 'required|image',
        ], [
            'title.required' => 'Judul Tidak Boleh Kosong.',
            'description.required' => 'Deskripsi Tidak Boleh Kosong.',
            'slug.required' => 'Slug Tidak Boleh Kosong',
            'slug.required' => 'Deskripsi Tidak Boleh Kosong',
            'photos.required' => 'Gambar harus diunggah.',
            'photos.image' => 'File yang diunggah harus berupa gambar.',
        ]);

        $eks = $request->file('photo')->getClientOriginalExtension();
        $request->file('photo')->storeAs('assets/image', md5($request->file('photo')) . '.' . $eks);
        PostCar::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'photo' => md5($request->file('photo')) . '.' . $eks,
            'id_category' => $request->id_category,
            'description' => $request->description,
        ]);
        return redirect('dashboard/inform/post-car')->with('success', 'Post Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $blog = PostCar::where('slug', $slug)->first();
        return view('admin.pages.inform.post.update', [
            'title' => 'Post',
            'heading' => 'Update Post',
            'post' => $blog,
            'category' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $blog = PostCar::where('slug', $slug)->first();
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'description' => 'required',
        ], [
            'title.required' => 'Judul Tidak Boleh Kosong.',
            'slug.required' => 'Slug Tidak Boleh Kosong',
            'slug.required' => 'Deskripsi Tidak Boleh Kosong',
        ]);
        if ($request->file('photo')) {
            Storage::delete('assets/blog/' . $blog->photo);
            $eks = $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->storeAs('assets/image', md5($request->file('photo')) . '.' . $eks);
            $blog->photo = md5($request->file('photo')) . '.' . $eks;
        }
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->slug = $request->slug;
        $blog->id_category = $request->id_category;
        $blog->save();

        return redirect('dashboard/inform/blog')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = PostCar::where('id', $id)->first();

        if ($post) {
            if ($post->photo) {
                Storage::delete('assets/image/' . $post->photo);
            }
            $post->delete();

            return response()->json([
                'status' => 'true',
                'title' => 'Berhasil',
                'description' => 'Post Deleted.',
                'icon' => 'success',
            ]);
        } else {
            return response()->json([
                'status' => 'false',
                'title' => 'Gagal',
                'description' => 'Post Not Found',
                'icon' => 'error',
            ]);
        }
    }
}
