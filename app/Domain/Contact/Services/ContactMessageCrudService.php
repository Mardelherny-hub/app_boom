<?php

namespace App\Domain\Contact\Services;

use App\Domain\Common\Services\BaseCrudService;
use App\Domain\Contact\Models\ContactMessage;
use Illuminate\Database\Eloquent\Model;

class ContactMessageCrudService extends BaseCrudService
{
    protected function getModel(): Model
    {
        return new ContactMessage();
    }

    protected function applyFilters($query, array $filters = [])
    {
        if (!empty($filters['search'])) {
            $search = $filters['search'];
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('subject', 'like', "%{$search}%")
                  ->orWhere('message', 'like', "%{$search}%");
            });
        }

        if (isset($filters['read'])) {
            if ($filters['read'] === 'read') {
                $query->whereNotNull('read_at');
            } elseif ($filters['read'] === 'unread') {
                $query->whereNull('read_at');
            }
        }

        return $query;
    }

    public function markAsRead(int $id): bool
    {
        $message = $this->findOrFail($id);
        $message->read_at = now();
        return $message->save();
    }

    public function markAsUnread(int $id): bool
    {
        $message = $this->findOrFail($id);
        $message->read_at = null;
        return $message->save();
    }

    public function getUnreadCount(): int
    {
        return $this->model->whereNull('read_at')->count();
    }
}