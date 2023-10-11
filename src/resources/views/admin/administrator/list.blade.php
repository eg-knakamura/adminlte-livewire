@extends('admin.layouts.app')

@section('content_header')
    <h1>管理者一覧</h1>
@stop

@section('content')
    <livewire:administrator.search />
    <hr />
    <livewire:administrator.members />
    <livewire:administrator.delete />
@stop

