<?php

namespace App\Http\Controllers\Api;

use App\Models\Role;
use App\Models\Component;
use Illuminate\Http\Request;
use App\Models\ComponentRole;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\GetDashboardRequest;

class PermissionController extends Controller
{

    public function permission(Role $role) {
        $query = <<<EOD
        SELECT 
            c.*,
            CASE WHEN cr.role_id IS NULL THEN 0 ELSE 1 END AS `permission`
        FROM
            components c
        LEFT JOIN
            component_roles cr ON c.id = cr.component_id
            AND cr.role_id = '$role->id';
        EOD;

        return DB::select($query);
    }

    public function postPermission(GetDashboardRequest $request) {
        try {
            DB::transaction(function () use ($request) {
                ComponentRole::where('role_id', $request->role)->delete();

                foreach ($request->permission as $component => $permission) {
                    ComponentRole::create([
                        'component_id' => $component,
                        'role_id' => $request->role,
                        'created_by' => auth()->user()->name,
                        'updated_by' => auth()->user()->name,
                    ]);
                }
            });
        
            return redirect()->route('permission_page')->with('success', 'Permission updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('permission_page')->with('error', $e->getMessage());
        }
    }
}
