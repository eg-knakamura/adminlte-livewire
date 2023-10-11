<?php

namespace App\Livewire\Administrator;

use App\Models\Admin\AdminUser;
use App\Repositories\AdminUserRepository;
use Illuminate\Support\Collection;
use Livewire\Component;

class Search extends Component
{
    public string $word = '';
    public Collection $searchUsers;

    public function render()
    {
        if ($this->word === '') {
            $this->searchUsers = collect();
        }

        return view('livewire.administrator.search', [
            'searchUsers' => $this->searchUsers,
        ]);
    }

    public function searching(): void
    {
        $adminUserRepository = new AdminUserRepository();

        $tmpUsers = collect();
        if ($this->word !== '') {
            $tmpUsers = $adminUserRepository
                ->getAll()
                ->filter(function (AdminUser $adminUser) {
                    return str_contains($adminUser->name, $this->word) ||
                        str_contains($adminUser->email, $this->word);
                })
                ->sortByDesc('updated_at');
        }

        $this->searchUsers = $tmpUsers;
    }

    public function openModal(string $id): void
    {
        $this->dispatch('SetDeleteId', id: $id);
    }
}
