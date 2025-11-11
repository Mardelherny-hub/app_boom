<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Blog\Services\PostCategoryCrudService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePostCategoryRequest;
use App\Http\Requests\Admin\UpdatePostCategoryRequest;

class PostCategoryController extends Controller
{
    public function __construct(
        protected PostCategoryCrudService $categoryCrudService
    ) {
       
    }

    public function index()
    {
        $categories = $this->categoryCrudService->paginate();
        return view('admin.post-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.post-categories.create');
    }

    public function store(StorePostCategoryRequest $request)
    {
        $this->categoryCrudService->create($request->validated());
         // Limpiar cache

        return redirect()->route('admin.post-categories.index')->with('success', 'Category created successfully.');
    }

    public function show(int $id)
    {
        $category = $this->categoryCrudService->findOrFail($id);
        return view('admin.post-categories.show', compact('category'));
    }

    public function edit(int $id)
    {
        $category = $this->categoryCrudService->findOrFail($id);
        return view('admin.post-categories.edit', compact('category'));
    }

    public function update(UpdatePostCategoryRequest $request, int $id)
    {
        $category = $this->categoryCrudService->findOrFail($id);
        $this->categoryCrudService->update($category, $request->validated());
         // Limpiar cache

        return redirect()->route('admin.post-categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(int $id)
    {
        $category = $this->categoryCrudService->findOrFail($id);
        $this->categoryCrudService->delete($category);
         // Limpiar cache

        return redirect()->route('admin.post-categories.index')->with('success', 'Category deleted successfully.');
    }
}