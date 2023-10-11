<?php

namespace App\Livewire\Administrator;

use App\Models\Admin\AdminUser;
use Livewire\Component;

class Create extends Component
{
    public string $name;
    public string $email;
    public string $password;

    protected array $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:admin_users,email',
        'password' => 'required|min:8',
    ];

    protected array $validationAttributes = [
        'name' => '名前',
        'email' => 'メールアドレス',
        'password' => 'パスワード',
    ];

    protected array $message = [
        'required' => ':attributeは必須です',
    ];

    public function render()
    {
        return view('livewire.administrator.create');
    }

    public function create(): void
    {
        $this->validate();

        $user = new AdminUser();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = \Hash::make($this->password);
        $user->save();

        //フラッシュメッセージ
        session()->flash(
            'createMessage',
            "管理者: {$this->name} を作成しました"
        );

        $this->name = '';
        $this->email = '';
        $this->password = '';
    }
}
