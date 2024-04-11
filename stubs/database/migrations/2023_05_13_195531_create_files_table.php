<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create("files", function (Blueprint $table) {
			$table->id();
			$table->string("name");
			$table->string("path")->unique();
			$table->string("mime_type");
			$table->unsignedBigInteger("size");
			$table->string("fileable_type");
			$table->unsignedBigInteger("fileable_id");
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists("files");
	}
};
