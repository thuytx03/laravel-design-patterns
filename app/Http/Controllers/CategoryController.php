<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Repositories\Interface\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller

{

    protected $categoryRepository;
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->all(['*']);
        return response()->json($categories);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
        ]);

        // $category = Category::create($validatedData);
        $category = $this->categoryRepository->create($validatedData);
        return response()->json($category, 201);
    }

    public function show($id)
    {
        // $category = Category::findOrFail($id);
        $category = $this->categoryRepository->find($id);
        return response()->json($category);
    }

    public function update(Request $request, $id)
    {
        $category = $this->categoryRepository->find($id);

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
        ]);

        $category->update($validatedData);
        return response()->json($category);
    }

    public function destroy($id)
    {
        $category = $this->categoryRepository->find($id);

        $category->delete();

        return response()->json(null, 204);
    }
}
