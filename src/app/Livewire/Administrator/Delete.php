<?php

namespace App\Livewire\Administrator;

use App\Repositories\AdminUserRepository;
use Livewire\Component;

class Delete extends Component
{
    /** @phpstan-ignore-next-line */
    protected $listeners = [
        'SetDeleteId' => 'setDeleteId',
    ];

    public string $deleteId = '';
    public bool $isDeleted = false;

    public function render()
    {
        return view('livewire.administrator.delete');
    }

    public function setDeleteId(string $id): void
    {
        $this->deleteId = $id;
    }

    public function delete(): void
    {
        $adminUserRepository = new AdminUserRepository();
        $adminUserRepository->deleteById((int) $this->deleteId);
        $this->isDeleted = true;
    }

    public function reloadList()
    {
        return redirect()->route('administrator.list');
    }
}
