<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Pages\Services\PageCrudService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePageRequest;
use App\Http\Requests\Admin\UpdatePageRequest;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct(
        protected PageCrudService $pageCrudService
    ) {
       
    }

    public function index(Request $request)
    {
        $pages = $this->pageCrudService->paginate();
        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(StorePageRequest $request)
    {
        $this->pageCrudService->create($request->validated());
         // Limpiar cache

        return redirect()->route('admin.pages.index')->with('success', 'Page created successfully.');
    }

    public function show(int $id)
    {
        $page = $this->pageCrudService->findOrFail($id);
        return view('admin.pages.show', compact('page'));
    }

    public function edit(int $id)
    {
        $page = $this->pageCrudService->findOrFail($id);
        return view('admin.pages.edit', compact('page'));
    }

    public function update(UpdatePageRequest $request, int $id)
    {
        $page = $this->pageCrudService->findOrFail($id);
        $this->pageCrudService->update($page, $request->validated());
         // Limpiar cache

        return redirect()->route('admin.pages.index')->with('success', 'Page updated successfully.');
    }

    public function destroy(int $id)
    {
        $page = $this->pageCrudService->findOrFail($id);
        $this->pageCrudService->delete($page);
         // Limpiar cache

        return redirect()->route('admin.pages.index')->with('success', 'Page deleted successfully.');
    }
}