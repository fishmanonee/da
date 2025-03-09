<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Lấy danh sách người dùng (chỉ admin)
    public function index()
    {
        if (!Auth::user() || !Auth::user()->isAdmin()) {
            return response()->json(['message' => 'Bạn không có quyền truy cập!'], 403);
        }

        $users = User::all();
        return response()->json($users);
    }

    // Lấy thông tin người dùng theo ID
    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Người dùng không tồn tại!'], 404);
        }

        return response()->json($user);
    }

    // Tạo mới người dùng
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'role_id' => 'required|integer',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
        ]);

        return response()->json(['message' => 'Tạo người dùng thành công!', 'user' => $user], 201);
    }

    // Cập nhật thông tin người dùng
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Người dùng không tồn tại!'], 404);
        }

        $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email|max:255|unique:users,email,' . $id,
            'password' => 'sometimes|string|min:6',
            'role_id' => 'sometimes|integer',
        ]);

        $user->update([
            'name' => $request->name ?? $user->name,
            'email' => $request->email ?? $user->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'role_id' => $request->role_id ?? $user->role_id,
        ]);

        return response()->json(['message' => 'Cập nhật thành công!', 'user' => $user]);
    }

    // Xóa người dùng (chỉ admin)
    public function destroy($id)
    {
        if (!Auth::user() || !Auth::user()->isAdmin()) {
            return response()->json(['message' => 'Bạn không có quyền truy cập!'], 403);
        }

        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Người dùng không tồn tại!'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'Xóa người dùng thành công!']);
    }
}
