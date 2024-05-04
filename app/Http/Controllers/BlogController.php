<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.inform.blog.index', [
            'title' => 'Blog',
            'heading' => 'Data Blog',
            'collection' => Blog::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.inform.blog.create', [
            'title' => 'Blog',
            'heading' => 'Create Blog',
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
        Blog::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'photo' => md5($request->file('photo')) . '.' . $eks,
            // 'image' => md5($request->file('image')),
            'id_category' => $request->id_category,
            'description' => $request->description,
        ]);
        return redirect('dashboard/inform/blog')->with('success', 'Blog Added Successfully');
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
        $blog = Blog::where('slug', $slug)->first();
        return view('admin.pages.inform.blog.update', [
            'title' => 'Blog',
            'heading' => 'Update Blog',
            'blog' => $blog,
            'category' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $blog = Blog::where('slug', $slug)->first();
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
            Storage::delete('assets/image/' . $blog->photo);
            $eks = $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->storeAs('assets/image', md5($request->file('photo')) . '.' . $eks);
            $blog->photo = md5($request->file('photo')) . '.' . $eks;
        }
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->slug = $request->slug;
        $blog->id_category = $request->id_category;
        $blog->save();

        return redirect('dashboard/inform/blog')->with('success', 'Blog Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Blog::where('id', $id)->first();

        if ($post) {
            if ($post->image) {
                Storage::delete('assets/image/' . $post->image);
            }
            $post->delete();

            return response()->json([
                'status' => 'true',
                'title' => 'Berhasil',
                'description' => 'Blog Deleted.',
                'icon' => 'success',
            ]);
        } else {
            return response()->json([
                'status' => 'false',
                'title' => 'Gagal',
                'description' => 'Blog Not Found',
                'icon' => 'error',
            ]);
        }
    }
}
