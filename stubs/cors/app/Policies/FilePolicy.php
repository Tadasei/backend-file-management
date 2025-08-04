<?php

namespace App\Policies;

use App\Models\{File, User};

class FilePolicy
{
	/**
	 * Determine whether the user can view any models.
	 */
	public function viewAny(User $user): bool
	{
		// return $user->can("view files");
		return false;
	}

	/**
	 * Determine whether the user can lazyily view any models.
	 */
	public function lazyViewAny(User $user): bool
	{
		return $this->viewAny($user);
	}

	/**
	 * Determine whether the user can create models.
	 */
	public function create(User $user): bool
	{
		// return $user->can("create files");
		return false;
	}

	/**
	 * Determine whether the user can store the model.
	 */
	public function store(User $user, $context = null): bool
	{
		return $this->create($user);
	}

	/**
	 * Determine whether the user can view the model.
	 */
	public function view(User $user, File $file): bool
	{
		return $this->viewAny($user);
	}

	/**
	 * Determine whether the user can edit the model.
	 */
	public function edit(User $user, File $file): bool
	{
		// return $user->can("edit files");
		return false;
	}

	/**
	 * Determine whether the user can update the model.
	 */
	public function update(User $user, File $file, $context = null): bool
	{
		return $this->edit($user, $file);
	}

	/**
	 * Determine whether the user can delete the model.
	 */
	public function delete(User $user, File $file, $context = null): bool
	{
		// return $user->can("delete files");
		return false;
	}

	/**
	 * Determine whether the user can restore the model.
	 */
	public function restore(User $user, File $file): bool
	{
		// return $user->can("restore files");
		return false;
	}

	/**
	 * Determine whether the user can permanently delete the model.
	 */
	public function forceDelete(User $user, File $file): bool
	{
		// return $user->can("force delete files");
		return false;
	}

	/**
	 * Determine whether the user can download the model.
	 */
	public function download(User $user, File $file): bool
	{
		// return $user->can("download files");
		return true;
	}
}
