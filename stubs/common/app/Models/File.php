<?php

namespace App\Models;

use App\Enums\FileableType;

use Illuminate\Database\Eloquent\{
	Factories\HasFactory,
	Relations\MorphTo,
	Model
};

class File extends Model
{
	use HasFactory;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = ["name", "path", "mime_type", "size"];

	/**
	 * Get the attributes that should be cast.
	 *
	 * @return array<string, string>
	 */
	protected function casts(): array
	{
		return [
			"fileable_type" => FileableType::class,
		];
	}

	/**
	 * Get the parent fileable model.
	 */
	public function fileable(): MorphTo
	{
		return $this->morphTo();
	}
}
