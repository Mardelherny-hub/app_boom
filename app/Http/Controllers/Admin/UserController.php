<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Users\Services\UserCrudService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(
        protected UserCrudService $userCrudService
    ) {

    }

    public function index(Request $request)
    {
        $users = $this->userCrudService->paginate();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(StoreUserRequest $request)
    {
        $data = $request->except('role');
        $role = $request->input('role');
        
        $this->userCrudService->createWithRole($data, $role);
         // Limpiar cache

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    public function show(int $id)
    {
        $user = $this->userCrudService->findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    public function edit(int $id)
    {
        $user = $this->userCrudService->findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, int $id)
    {
        $user = $this->userCrudService->findOrFail($id);
        $data = $request->except('role');
        $role = $request->input('role');
        
        $this->userCrudService->updateWithRole($user, $data, $role);
         // Limpiar cache

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(int $id)
    {
        $user = $this->userCrudService->findOrFail($id);
        $this->userCrudService->delete($user);
         // Limpiar cache

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}