<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Services\Services\ServiceCrudService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreServiceRequest;
use App\Http\Requests\Admin\UpdateServiceRequest;
use Illuminate\Http\Request;


class ServiceController extends Controller
{
    public function __construct(
        protected ServiceCrudService $serviceCrudService
    ) {

    }

    public function index(Request $request)
    {
        $filters = [
            'search' => $request->input('search'),
            'featured' => $request->input('featured'),
            'status' => $request->input('status'),
        ];

        $services = $this->serviceCrudService->paginate(15, $filters);

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(StoreServiceRequest $request)
    {
        $service = $this->serviceCrudService->create($request->validated());
        
        // Handle image upload
        if ($request->hasFile('image')) {
            $service->addMediaFromRequest('image')->toMediaCollection('image');
        }
        
        // Handle icon upload
        if ($request->hasFile('icon')) {
            $service->addMediaFromRequest('icon')->toMediaCollection('icon');
        }
         // Limpiar cache

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service created successfully.');
    }

    public function show(int $id)
    {
        $service = $this->serviceCrudService->findOrFail($id);

        return view('admin.services.show', compact('service'));
    }

    public function edit(int $id)
    {
        $service = $this->serviceCrudService->findOrFail($id);

        return view('admin.services.edit', compact('service'));
    }

    public function update(UpdateServiceRequest $request, int $id)
    {
       

        $service = $this->serviceCrudService->findOrFail($id);
        $this->serviceCrudService->update($service, $request->validated());
        
        // Handle image upload - SIN CLEAR
        if ($request->hasFile('image')) {
            // Eliminar imagen anterior si existe
            $service->getMedia('image')->each->delete();
            // Agregar nueva
            $service->addMediaFromRequest('image')->toMediaCollection('image');
        }
        
        // Handle icon upload - SIN CLEAR
        if ($request->hasFile('icon')) {
            // Eliminar icono anterior si existe
            $service->getMedia('icon')->each->delete();
            // Agregar nuevo
            $service->addMediaFromRequest('icon')->toMediaCollection('icon');
        }

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service updated successfully.');
    }

    public function destroy(int $id)
    {
        $service = $this->serviceCrudService->findOrFail($id);
        $this->serviceCrudService->delete($service);
         // Limpiar cache

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service deleted successfully.');
    }
}