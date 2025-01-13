<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Gate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        abort_unless(Gate::allows('dashboard'), 403);
        $title = 'Dashboard';
        $sub_title = 'Dashboard';
        return view('admin.dashboard.index',compact('title','sub_title'));
    }
}
