@extends('admin.layouts.app')

@section('content_header')
    <h1>管理者一覧 編集</h1>
@stop

@section('content')
    <livewire:administrator.edit id="{{ $id }}" />
@stop

