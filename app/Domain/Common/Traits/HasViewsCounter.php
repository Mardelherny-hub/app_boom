<?php
namespace App\Domain\Common\Traits;
trait HasViewsCounter
{
/**
* Increment the views counter.
*/
public function incrementViews(int $count = 1): bool
{
return $this->increment('views', $count);
}
 /**
* Scope a query to order by most viewed.
*/
public function scopeMostViewed($query, int $limit = 10)
{
return $query->orderBy('views', 'desc')->limit($limit);
}
 /**
* Get formatted views count.
*/
public function getFormattedViewsAttribute(): string
{
$views = $this->views ?? 0;
 if ($views >= 1000000) {
return number_format($views / 1000000, 1) . 'M';
}
 if ($views >= 1000) {
return number_format($views / 1000, 1) . 'K';
}
 return (string) $views;
}
}