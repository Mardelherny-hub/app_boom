<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Portfolio\Services\ProjectCrudService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProjectRequest;
use App\Http\Requests\Admin\UpdateProjectRequest;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct(
        protected ProjectCrudService $projectCrudService
    ) {

    }

    public function index(Request $request)
    {
        $projects = $this->projectCrudService->paginate();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $categories = \App\Domain\Portfolio\Models\ProjectCategory::ordered()->get();
        return view('admin.projects.create', compact('categories'));
    }

    public function edit(int $id)
    {
        $project = $this->projectCrudService->findOrFail($id);
        $categories = \App\Domain\Portfolio\Models\ProjectCategory::ordered()->get();
        return view('admin.projects.edit', compact('project', 'categories'));
    }

    public function store(StoreProjectRequest $request)
    {
        $project = $this->projectCrudService->create($request->validated());
        
        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            $project->addMediaFromRequest('featured_image')->toMediaCollection('featured_image');
        }
        
        // Handle gallery images upload (multiple)
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $image) {
                $project->addMedia($image)->toMediaCollection('gallery');
            }
        }

         // Limpiar cache


        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project created successfully.');
    }

    public function show(int $id)
    {
        $project = $this->projectCrudService->findOrFail($id);
        return view('admin.projects.show', compact('project'));
    }

    public function update(UpdateProjectRequest $request, int $id)
    {
        $project = $this->projectCrudService->findOrFail($id);
        $this->projectCrudService->update($project, $request->validated());
        
        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            $project->clearMediaCollection('featured_image');
            $project->addMediaFromRequest('featured_image')->toMediaCollection('featured_image');
        }
        
        // Handle gallery images upload (multiple)
        if ($request->hasFile('gallery')) {
            // Note: This ADDS to gallery, doesn't replace
            foreach ($request->file('gallery') as $image) {
                $project->addMedia($image)->toMediaCollection('gallery');
            }
        }

         // Limpiar cache


        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project updated successfully.');
    }

    public function destroy(int $id)
    {
        $project = $this->projectCrudService->findOrFail($id);
        $this->projectCrudService->delete($project);

         // Limpiar cache

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }

    /**
     * Delete a media item from project gallery
     */
    public function deleteMedia(int $projectId, int $mediaId)
    {
        $project = $this->projectCrudService->findOrFail($projectId);
        
        $media = $project->media()->find($mediaId);
        
        if ($media) {
            $media->delete();
            return redirect()->back()->with('success', 'Image deleted successfully.');
        }
        
         // Limpiar cache

        return redirect()->back()->with('error', 'Image not found.');
    }
}
