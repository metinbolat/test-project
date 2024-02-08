<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryCreateRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index ()
    {
        $categories = Category::get()->take(10);
        return view('category.index', ['categories' => $categories]);
    }

    public function create ()
    {
        return view('category.create');
    }

    public function store(CategoryCreateRequest $request) 
    {
        $category = Category::create($request->validated());
        if ($category) {
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
        return view('category.create', ['status' => $status]);
    }
}
