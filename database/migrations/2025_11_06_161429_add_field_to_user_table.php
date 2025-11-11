<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
public function up(): void
{
Schema::table('users', function (Blueprint $table) {
$table->uuid('uuid')->unique()->after('id');
$table->string('phone')->nullable()->after('email');$table->text('bio')->nullable()->after('phone');
$table->softDeletes();
});
}
 public function down(): void
{
Schema::table('users', function (Blueprint $table) {
$table->dropColumn(['uuid', 'phone', 'bio']);
$table->dropSoftDeletes();
});
}
};