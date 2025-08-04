<?php

namespace App\Rules;

use App\Models\File;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\UploadedFile;

class FileUpdate implements ValidationRule
{
	public function __construct(
		protected ?array $allowedMimeTypes = null,
		protected ?int $maxFileSize = null,
		protected ?Closure $recordsFilteringQueryFactory = null,
		protected bool $usesUuid = false
	) {
	}

	/**
	 * Run the validation rule.
	 *
	 * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
	 */
	public function validate(
		string $attribute,
		mixed $value,
		Closure $fail
	): void {
		if (
			!(
				$this->isAValidFileId($value) ||
				($value instanceof UploadedFile &&
					$this->hasValidFileSize($value) &&
					$this->hasValidMimeType($value))
			)
		) {
			$fail(__("Invalid $attribute"));
		}
	}

	private function hasValidFileSize(UploadedFile $file): bool
	{
		return is_null($this->maxFileSize) ||
			$file->getSize() / 1024 <= $this->maxFileSize;
	}

	private function hasValidMimeType(UploadedFile $file): bool
	{
		return is_null($this->allowedMimeTypes) ||
			in_array($file->getMimeType(), $this->allowedMimeTypes);
	}

	private function hasValidIdDataType(mixed $value): bool
	{
		return $this->usesUuid ? is_string($value) : is_numeric($value);
	}

	private function isAValidFileId(mixed $value): bool
	{
		return $this->hasValidIdDataType($value) &&
			File::when(
				$this->recordsFilteringQueryFactory,
				fn(Builder $query) => $query->whereIn(
					"id",
					call_user_func($this->recordsFilteringQueryFactory)->select(
						"id"
					)
				)
			)
				->where("id", $value)
				->exists();
	}
}
