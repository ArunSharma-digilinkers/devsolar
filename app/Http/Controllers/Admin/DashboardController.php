<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Basic stats
        $totalUsers = User::count();
        $activeUsers = User::where('status', 1)->count();
        $adminUsers = User::where('role', 'admin')->count();

        return view('admin.dashboard', compact(
            'totalUsers',
            'activeUsers',
            'adminUsers'
        ));
    }
}