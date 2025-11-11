<?php

namespace App\Domain\Common\Enums;

enum PublicationStatus: string
{
case ARCHIVED = 'archived';
case DRAFT = 'draft';
case PUBLISHED = 'published';
case SCHEDULED = 'scheduled';

/**
* Get the label for the status.
*/
public function label(): string
{
return match($this) {
self::DRAFT => 'Draft',
self::PUBLISHED => 'Published',
self::SCHEDULED => 'Scheduled',
self::ARCHIVED => 'Archived',
};
}
/**
* Get the color for the status badge.
*/
public function color(): string
{
return match($this) {
self::DRAFT => 'gray',
self::PUBLISHED => 'green',
self::SCHEDULED => 'blue',
self::ARCHIVED => 'red',
};
}
/**
* Get all cases as array.
*/
public static function toArray(): array
{
return array_column(self::cases(), 'value');
}

}