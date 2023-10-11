<div>
    <form wire:submit.prevent="delete" method="POST">
        @csrf
        <x-adminlte-modal wire:ignore.self id="deleteConfirmModal" title="管理者削除" size="sm">
            @if($isDeleted)
                <p>削除しました</p>
                <x-slot name="footerSlot">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="reloadList">閉じる</button>
                </x-slot>
            @else
                <p>削除しますか？</p>
                <x-slot name="footerSlot">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" >キャンセル</button>
                    <button type="submit" class="btn btn-danger">削除</button>
                </x-slot>
            @endif
        </x-adminlte-modal>
    </form>
</div>
