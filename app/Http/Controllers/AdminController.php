<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = User::where('role', 'admin')->withCount('payments');

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        $admins = $query->latest()->paginate(10);

        return view('dashboard.users.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
public function create()
{
    $customers = User::where('role', 'user')->get();
    return view('dashboard.users.admins.create', compact('customers'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store($id)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $admin = User::findOrFail($id);
        return view('dashboard.users.admin.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $admin)
    {
        File::delete(public_path($admin->image));
        $admin->delete();

        return redirect()
            ->route('dashboard.admin.index')
            ->with('msg', __('websit.delete.car'))
            ->with('type', 'danger');
    }
    public function makeAdmin($id)
{
    $user = User::findOrFail($id);
    $user->role = 'admin';
    $user->save();

    return redirect()
        ->route('dashboard.admins.create')
        ->with('msg', __('websit.success.admin'))
        ->with('type', 'success');
}

}
