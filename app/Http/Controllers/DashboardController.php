<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\GetDashboardRequest;
use App\Models\Component;
use App\Models\Role;

class DashboardController extends Controller
{
    public function index()
    {
        return "Hello world, all user can see this<br/><br/>Your email: " . auth()->user()->email . "<br/>Your role: " . auth()->user()->roles->first()->name . "<br/>Your permission: " . auth()->user()->roles->first()->components->first()->name . "<br/><br/><a href='" . route('logout') . "'>Logout</a>";
    }

    public function admin(GetDashboardRequest $request)
    {
        return 'Hello Admin, only admin can see this';
    }

    public function permission(GetDashboardRequest $request)
    {
        $component = Component::all();
        $myComponent = auth()->user()->roles->first()->components;
        $role = Role::all();
        $data = [
            'components' => $component,
            'myComponents' => $myComponent,
            'roles' => $role,
        ];

        return view('permission', $data);
    }

    public function role1(GetDashboardRequest $request)
    {
        return 'Hello User, only role1 can see this';
    }

    public function role2(GetDashboardRequest $request)
    {
        return 'Hello User, only role2 can see this';
    }
}
