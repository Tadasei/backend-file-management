<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\File;
use Symfony\Component\HttpFoundation\StreamedResponse;

use Illuminate\Support\Facades\{Gate, Storage};

class FileController extends Controller
{
	/**
	 * Download the specified resource.
	 */
	public function download(File $file): StreamedResponse
	{
		Gate::authorize("download", $file);

		return Storage::download($file->path);
	}
}
