<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Blog\Services\PostCrudService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePostRequest;
use App\Http\Requests\Admin\UpdatePostRequest;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(
        protected PostCrudService $postCrudService
    ) {

    }

    public function index(Request $request)
    {
        // En admin mostramos TODOS los posts (publicados y drafts)
        $query = \App\Domain\Blog\Models\Post::query()
            ->with(['author', 'category'])
            ->latest();
        
        $posts = $query->paginate(15);
        
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = \App\Domain\Blog\Models\PostCategory::ordered()->get();
        return view('admin.posts.create', compact('categories'));
    }

    public function store(StorePostRequest $request)
    {
        $data = $request->validated();
        $post = $this->postCrudService->create($data);

        if ($request->hasFile('featured_image')) {
            $post->addMediaFromRequest('featured_image')->toMediaCollection('featured_image');
        }

         // Limpiar cache

        return redirect()->route('admin.posts.index')->with('success', 'Post created successfully.');
    }

    public function show(int $id)
    {
        $post = $this->postCrudService->findOrFail($id);
        return view('admin.posts.show', compact('post'));
    }

    public function edit(int $id)
    {
        $post = $this->postCrudService->findOrFail($id);
        $categories = \App\Domain\Blog\Models\PostCategory::ordered()->get();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(UpdatePostRequest $request, int $id)
    {
        $post = $this->postCrudService->findOrFail($id);
        $data = $request->validated();
        $this->postCrudService->update($post, $data);

        if ($request->hasFile('featured_image')) {
            $post->clearMediaCollection('featured_image');
            $post->addMediaFromRequest('featured_image')->toMediaCollection('featured_image');
        }

         // Limpiar cache

        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(int $id)
    {
        $post = $this->postCrudService->findOrFail($id);
        $this->postCrudService->delete($post);

         // Limpiar cache

        return redirect()->route('admin.posts.index')->with('success', 'Post deleted successfully.');
    }

    /**
     * Upload image from Trix editor.
     */
    public function uploadContentImage(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,webp,gif|max:2048',
        ]);

        // Crear un post temporal para almacenar la imagen
        // O usar el usuario actual como contexto
        $user = auth()->user();
        
        $media = $user->addMedia($request->file('file'))
            ->toMediaCollection('temp_images');

        return response()->json([
            'url' => $media->getUrl()
        ]);
    }
}
