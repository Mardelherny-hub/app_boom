<?php
namespace App\Domain\Common\Traits;
use Cviebrock\EloquentSluggable\Sluggable;
trait HasSlug
{
use Sluggable;
 /**
* Return the sluggable configuration array for this model.
*/
public function sluggable(): array
{
return [
'slug' => [
'source' => 'title',
'onUpdate' => false,
]
];
}
 /**
* Get the route key for the model.
*/
public function getRouteKeyName(): string
{
return 'slug';
}
}