<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Domain\Contact\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class ContactController extends Controller
{
    /**
     * Display contact form.
     */
    public function index()
    {
        seo()
            ->title(settings('seo_contact_title', 'Contact'))
            ->description(settings('seo_contact_description', ''))
            ->canonical(route('contact'));
            
        return view('frontend.contact');
    }

    /**
     * Store contact message.
     */
    public function store(Request $request)
    {
        // Rate limiting: 3 mensajes por hora por IP
        $key = 'contact-' . $request->ip();
        
        if (RateLimiter::tooManyAttempts($key, 3)) {
            $seconds = RateLimiter::availableIn($key);
            return back()->with('error', "Too many contact attempts. Please try again in {$seconds} seconds.");
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
            'honeypot' => 'nullable|max:0', // Anti-spam honeypot
        ]);

        // Honeypot check
        if (!empty($validated['honeypot'])) {
            return back()->with('success', 'Thank you for your message!');
        }

        // Crear mensaje
        ContactMessage::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'subject' => $validated['subject'],
            'message' => $validated['message'],
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        // Rate limiter hit
        RateLimiter::hit($key, 3600); // 1 hora

        // TODO: Enviar email notification (opcional)
        
        return back()->with('success', 'Thank you for your message! We will get back to you soon.');
    }
}