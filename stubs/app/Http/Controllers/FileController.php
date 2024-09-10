<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class FileController extends Controller
{
	/**
	 * Download the specified resource.
	 */
	public function download(File $file): StreamedResponse
	{
		return Storage::download($file->path);
	}
}
