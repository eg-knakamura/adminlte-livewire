<div>
    <p class="font-weight-bold">管理者検索</p>

    <input type="text" wire:model="word" wire:keydown.enter="searching" class="form-control" id="searchMember"
           placeholder="管理者名かメールアドレスの一部を入力してください" />
    <button type="submit" wire:click="searching" class="btn btn-primary btn-sm mt-2">検索</button>

    @if ($searchUsers->count() > 0)
        <table class="table mt-4">
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
            @foreach ($searchUsers as $searchUser)
                <tr>
                    <th scope="row">{{ $searchUser->id }}</th>
                    <td>{{ $searchUser->name }}</td>
                    <td>{{ $searchUser->email }}</td>
                    <td>{{ $searchUser->created_at }}</td>
                    <td>
                        <a href="{{ route('administrator.edit', ['id' => $searchUser->id]) }}"
                           class="btn btn-primary">編集</a>
                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                data-target="#deleteConfirmModal"
                                wire:click="openModal({{ $searchUser->id }})">
                            削除
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</div>
