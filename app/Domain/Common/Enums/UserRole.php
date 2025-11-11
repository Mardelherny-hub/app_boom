<?php
namespace App\Domain\Common\Enums;
enum UserRole: string
{
case SUPER_ADMIN = 'super_admin';
case ADMIN = 'admin';
case EDITOR = 'editor';
case USER = 'user';
 /**
* Get the label for the role.
*/
public function label(): string
{
return match($this) {
self::SUPER_ADMIN => 'Super Admin',
self::ADMIN => 'Admin',
self::EDITOR => 'Editor',
self::USER => 'User',
};
}
 /**
* Get all cases as array.
*/
public static function toArray(): array
{
return array_column(self::cases(), 'value');
}

/**
* Get permissions for the role.
*/
public function permissions(): array
{
return match($this) {
self::SUPER_ADMIN => ['*'],
self::ADMIN => [
'users.*',
'services.*',
'projects.*',
'posts.*',
'pages.*',
'messages.*',
'settings.view',
'settings.edit',
],
self::EDITOR => [
'services.*',
'projects.*',
'posts.*',
'pages.*',
'messages.view',
],
self::USER => [
'posts.view',
'projects.view',
'services.view',
],
};
}
}