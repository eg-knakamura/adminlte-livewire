<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    public function createIndex(): Factory|View
    {
        return view('admin/administrator/create');
    }

    public function listIndex(): Factory|View
    {
        return view('admin/administrator/list');
    }

    public function editIndex(int $id): Factory|View
    {
        $with = [
            'id' => $id,
        ];
        return view('admin/administrator/edit', $with);
    }
}
