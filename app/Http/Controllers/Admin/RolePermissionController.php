<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Role $role)
    {
        $data = $request->validate([
            'permissions' => 'required|array',
            'permissions.*' => 'sometimes|string|exists:Spatie\Permission\Models\Permission,name'
        ]);

        $role->syncPermissions($data['permissions']);

        return redirect()
            ->back(fallback: route('admin.roles.edit', $role))
            ->with('success', 'مجوز های نقش با موفقیت ذخیره شدند.');
    }
}
