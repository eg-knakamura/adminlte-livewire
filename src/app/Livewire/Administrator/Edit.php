<?php

namespace App\Livewire\Administrator;

use App\Models\Admin\AdminUser;
use App\Repositories\AdminUserRepository;
use Livewire\Component;

class Edit extends Component
{
    public int $id;
    public string $name = '';
    public string $email = '';
    public string $password = '';

    protected array $rules = [
        'email' => 'email',
        'password' => 'min:8',
    ];

    protected array $validationAttributes = [
        'name' => '名前',
        'email' => 'メールアドレス',
        'password' => 'パスワード',
    ];

    public function mount(int $id): void
    {
        $adminUserRepository = new AdminUserRepository();
        /** @var AdminUser|null $adminUser */
        $adminUser = $adminUserRepository->getById($id);

        if ($adminUser === null) {
            session()->flash(
                'errorMessage',
                "管理者id: {$id} が確認できません"
            );
            return;
        }
        $this->id = $id;
        $this->name = $adminUser->name;
        $this->email = $adminUser->email;
    }

    public function render()
    {
        return view('livewire.administrator.edit');
    }

    public function update(): void
    {
        $this->validate();

        $user = new AdminUserRepository();
        $user->updateById(
            $this->id,
            $this->name,
            $this->email,
            $this->password
        );

        //フラッシュメッセージ
        session()->flash(
            'updateMessage',
            "管理者: {$this->name} の情報を更新しました"
        );

        $this->password = '';
    }
}
