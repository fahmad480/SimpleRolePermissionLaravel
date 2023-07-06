<?php

namespace App\Http\Requests\Dashboard;

use App\Models\Component;
use App\Models\ComponentRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class GetDashboardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $roleId = Auth::user()->roles->first()->id;
        $routeName = $this->route()->getName();
        $componentId = Component::where('route_name', $routeName)->where('method', $this->method())->first()->id;

        return ComponentRole::where('role_id', $roleId)
            ->where('component_id', $componentId)
            ->exists();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
