<?php

use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;

Route::middleware(["auth:sanctum"])->group(function () {
	Route::get("/files/{file:path}", [FileController::class, "download"])
		->where("file", ".*")
		->name("files.download");
});
