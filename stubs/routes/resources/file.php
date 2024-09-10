<?php

use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;

Route::get("/files/{file:path}", [FileController::class, "download"])
	->where("file", ".*")
	->name("files.download");
