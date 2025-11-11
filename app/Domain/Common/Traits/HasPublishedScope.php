<?php

namespace App\Domain\Common\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasPublishedScope
{
    /**
     * Scope a query to only include published records.
     */
    public function scopePublished(Builder $query): Builder
    {
        return $query->whereNotNull('published_at')
                    ->where('published_at', '<=', now());
    }

    /**
     * Scope a query to only include draft records.
     */
    public function scopeDraft(Builder $query): Builder
    {
        return $query->whereNull('published_at');
    }

    /**
     * Scope a query to only include scheduled records.
     */
    public function scopeScheduled(Builder $query): Builder
    {
        return $query->whereNotNull('published_at')
                    ->where('published_at', '>', now());
    }

    /**
     * Check if the record is published.
     */
    public function isPublished(): bool
    {
        return !is_null($this->published_at) 
               && $this->published_at->isPast();
    }

    /**
     * Check if the record is draft.
     */
    public function isDraft(): bool
    {
        return is_null($this->published_at);
    }

    /**
     * Check if the record is scheduled.
     */
    public function isScheduled(): bool
    {
        return !is_null($this->published_at) 
               && $this->published_at->isFuture();
    }

    /**
     * Publish the record.
     */
    public function publish(): bool
    {
        $this->published_at = now();
        return $this->save();
    }

    /**
     * Unpublish the record.
     */
    public function unpublish(): bool
    {
        $this->published_at = null;
        return $this->save();
    }

    /**
     * Schedule the record for publication.
     */
    public function schedulePublish(\DateTimeInterface $date): bool
    {
        $this->published_at = $date;
        return $this->save();
    }
}