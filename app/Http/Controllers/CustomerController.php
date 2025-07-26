<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 public function index(Request $request)
{
    $query = User::where('role', 'user')->withCount('payments');

    if ($request->search) {
        $query->where(function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->search . '%')
              ->orWhere('email', 'like', '%' . $request->search . '%');
        });
    }

    $customers = $query->latest()->paginate(10);

    return view('dashboard.users.customers.index', compact('customers'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
 public function show($id)
{
    $user = User::with(['payments', 'reviews'])->findOrFail($id);
    return view('dashboard.users.customers.show', compact('user'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
  public function destroy(User $customer)
{
    File::delete(public_path($customer->image));
    $customer->delete();

    return redirect()
        ->route('dashboard.customers.index')
        ->with('msg', __('websit.delete.car'))
        ->with('type', 'danger');
}

}
