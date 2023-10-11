<?php

namespace App\Repositories;

use App\Models\Admin\AdminUser;
use Illuminate\Support\Collection;

class AdminUserRepository
{
    public function getAll(): Collection
    {
        return AdminUser::all();
    }

    public function getById(int $id): AdminUser|null
    {
        return AdminUser::find($id);
    }

    public function updateById(
        int $id,
        string $name,
        string $email,
        string $password
    ): void {
        $updates = [
            'name' => $name,
            'email' => $email,
        ];

        if ($password !== '') {
            $updates['password'] = \Hash::make($password);
        }

        AdminUser::query()
            ->findOrFail($id)
            ->update($updates);
    }

    public function deleteById(int $id): void
    {
        AdminUser::query()
            ->findOrFail($id)
            ->delete();
    }
}
