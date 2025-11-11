<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Blog\Models\Post;
use App\Domain\Contact\Models\ContactMessage;
use App\Domain\Portfolio\Models\Project;
use App\Domain\Services\Models\Service;
use App\Domain\Users\Models\User;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'users' => User::count(),
            'services' => Service::count(),
            'projects' => Project::count(),
            'posts' => Post::count(),
            'unread_messages' => ContactMessage::whereNull('read_at')->count(),
        ];

        // OPTIMIZADO: eager load relaciones
        $recentPosts = Post::with(['author:id,name', 'category:id,name'])
            ->latest()
            ->take(5)
            ->get();

        $recentMessages = ContactMessage::latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentPosts', 'recentMessages'));
    }
}