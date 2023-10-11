<div>
    @if (session()->has('updateMessage'))
        <x-adminlte-alert theme="success" title="Success">
            {{ session('updateMessage') }}
        </x-adminlte-alert>
    @elseif(session()->has('errorMessage'))
        <x-adminlte-alert theme="danger" title="Error">
            {{ session('errorMessage') }}
        </x-adminlte-alert>
    @endif
    <form wire:submit.prevent="update">
        @csrf
        {{-- Name field --}}
        <div class="form-group mb-3">
            <x-adminlte-input name="name" label="管理者名" wire:model.lazy="name" />

            @error('name')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Email field --}}
        <div class="form-group mb-3">
            <x-adminlte-input type='email' name="email" label="メール" wire:model.lazy="email" />

            @error('email')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Password field --}}
        <div class="form-group mb-3">
            <x-adminlte-input type='password' name="password" label='パスワード' wire:model.lazy="password" />

            @error('password')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Register button --}}
        <button type="submit" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
            <span class="fas fa-user-plus"></span>
            update
        </button>
    </form>
</div>
