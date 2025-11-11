<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Domain\Settings\Services\SettingsCacheService;
use App\Support\Settings\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SettingController extends Controller
{
    public function __construct(
        protected SettingsCacheService $cacheService
    ) {}

    public function index()
    {
        $settings = Setting::orderBy('group')->orderBy('order')->get()->groupBy('group');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'settings' => 'required|array',
            'settings.*' => 'nullable|string',
        ]);

        foreach ($validated['settings'] as $key => $value) {
            DB::table('settings')->updateOrInsert(
                ['key' => $key],
                ['value' => $value, 'updated_at' => now()]
            );
        }

        // Clear cache after update
        $this->cacheService->flush();

        return redirect()->route('admin.settings.index')
            ->with('success', 'Settings updated successfully.');
    }
}