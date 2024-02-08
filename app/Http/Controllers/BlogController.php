<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BlogCreateRequest;
use App\Models\Blog;
use App\Models\Category;


class BlogController extends Controller
{

    public function __construct ()
    {
        $this->blogs = Blog::get()->take(10);
        $this->categories = Category::all();
    }
    public function index ()
    {
        return view('blog.index', ['blogs' => $this->blogs]);
    }

    public function create ()
    {
        return view('blog.create', ['categories' => $this->categories]);
    }

    public function store(BlogCreateRequest $request) 
    {
        $category = Category::find($request->category);
        $blog = $category->blogs()->create([
            'title' => $request->title,
            'slug' => $request->slug,
            'body' => $request->body,
        ]);
        if ($blog) {
            $status = [
                'type' => 'success',
                'message' => 'Kategori oluşturuldu.'
            ];
        } else {
            $status = [
                'type' => 'danger',
                'message' => 'Kategori oluşturulamadı.'
            ];
        }
        return view('blog.create', ['status' => $status, 'categories' => $this->categories]);
    }

    public function edit (Blog $blog)
    {
        return view('blog.edit', ['categories' => $this->categories, 'blog' => $blog]);
    }

    public function update ($blogId, Request $request)
    {
        $blog= Blog::find($blogId);
        $updateBlog = $blog->update([
            'category_id' => $request->category,
            'title' => $request->title,
            'slug' => $request->slug,
            'body' => $request->body,
        ]);
        if ($updateBlog) {
            $status = [
                'type' => 'success',
                'message' => 'Blog düzenlendi.'
            ];
        } else {
            $status = [
                'type' => 'danger',
                'message' => 'Blog düzenlenemedi.'
            ];
        }
        return redirect()->back();
    }

    public function destroy (Blog $blog)
    {
        $blog->delete();
        return view('blog.index', ['categories' => $this->categories, 'blogs' => $this->blogs]);
    }
}
