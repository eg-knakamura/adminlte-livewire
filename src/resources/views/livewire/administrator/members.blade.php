<div>
    <p class="font-weight-bold">管理者一覧</p>

    <table class="table">
        <thead class="thead-inverse">
        <tr>
            <th>id</th>
            <th>管理者名</th>
            <th>メール</th>
            <th>作成日</th>
            <th>編集/削除</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($adminUsers as $adminUser)
            <tr>
                <th scope="row">{{ $adminUser->id }}</th>
                <td>{{ $adminUser->name }}</td>
                <td>{{ $adminUser->email }}</td>
                <td>{{ $adminUser->created_at }}</td>
                <td>
                    <a href="{{ route('administrator.edit', ['id' => $adminUser->id]) }}"
                       class="btn btn-primary">編集</a>
                    <button type="button" class="btn btn-danger" data-toggle="modal"
                            data-target="#deleteConfirmModal"
                            wire:click="openModal({{ $adminUser->id }})">
                        削除
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

