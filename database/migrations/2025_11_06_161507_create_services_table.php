<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
public function up(): void
{
Schema::create('services', function (Blueprint $table) {
$table->id();
$table->uuid('uuid')->unique();
$table->string('title');
$table->string('slug')->unique();
$table->text('description')->nullable();
$table->longText('content')->nullable();
$table->string('icon')->nullable(); // Path to icon file
$table->boolean('featured')->default(false);
$table->integer('order')->default(0);
$table->timestamp('published_at')->nullable();
$table->timestamps();
$table->softDeletes();
 // Indexes
$table->index('slug');
$table->index('featured');
$table->index('published_at');
});
}
 public function down(): void
{
Schema::dropIfExists('services');
}
};