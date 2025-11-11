<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Portfolio\Services\ProjectCategoryCrudService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProjectCategoryRequest;
use App\Http\Requests\Admin\UpdateProjectCategoryRequest;

class ProjectCategoryController extends Controller
{
    public function __construct(
        protected ProjectCategoryCrudService $categoryCrudService
    ) {

    }

    public function index()
    {
        $categories = $this->categoryCrudService->paginate();
        return view('admin.project-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.project-categories.create');
    }

    public function store(StoreProjectCategoryRequest $request)
    {
        $this->categoryCrudService->create($request->validated());
         // Limpiar cache

        return redirect()->route('admin.project-categories.index')->with('success', 'Category created successfully.');
    }

    public function show(int $id)
    {
        $category = $this->categoryCrudService->findOrFail($id);
        return view('admin.project-categories.show', compact('category'));
    }

    public function edit(int $id)
    {
        $category = $this->categoryCrudService->findOrFail($id);
        return view('admin.project-categories.edit', compact('category'));
    }

    public function update(UpdateProjectCategoryRequest $request, int $id)
    {
        $category = $this->categoryCrudService->findOrFail($id);
        $this->categoryCrudService->update($category, $request->validated());
         // Limpiar cache

        return redirect()->route('admin.project-categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(int $id)
    {
        $category = $this->categoryCrudService->findOrFail($id);
        $this->categoryCrudService->delete($category);
         // Limpiar cache

        return redirect()->route('admin.project-categories.index')->with('success', 'Category deleted successfully.');
    }
}
