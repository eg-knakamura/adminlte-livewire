<?php

namespace App\Livewire\Administrator;

use App\Repositories\AdminUserRepository;
use Livewire\Component;

class Members extends Component
{
    public function render()
    {
        $adminUserRepository = new AdminUserRepository();
        $adminUsers = $adminUserRepository->getAll()->sortByDesc('updated_at');
        $with = compact('adminUsers');

        return view('livewire.administrator.members')->with($with);
    }

    public function openModal(string $id): void
    {
        $this->dispatch('SetDeleteId', id: $id);
    }
}
