<?php

namespace App\Http\Controllers;

use App\Models\AccessoriesSet;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SetsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = AccessoriesSet::query();

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('name->ar', 'like', '%' . $request->search . '%')
                    ->orWhere('name->en', 'like', '%' . $request->search . '%');
            });
        }
        $sets = $query->latest()->paginate(10);
        // dd($request->all());
        return view('dashboard.sets.index', compact('sets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sets = AccessoriesSet::all();

        $categoryId = 1;
        return view('dashboard.sets.create', compact('sets', 'categoryId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'image' => 'required|image|',
            'description' => 'required',
            'price' => 'required',
            'sale_price' => 'nullable',
            'category_id' => 'required'
        ]);

        $path = $request->file('image')->store('uploads', 'custom');
        AccessoriesSet::create([
            'name' => $request->name,
            'image' => $path,
            'description' => $request->description,
            'price' =>  $request->price,
            'sale_price' =>  $request->sale_price,
            'category_id' => $request->category_id,
        ]);

        // dd($request->all());

        return redirect()
            ->route('dashboard.sets.index')
            ->with('msg',  __('Create Successfully'))
            ->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $set = AccessoriesSet::findOrFail($id);
        $categoryId = 1;
        return view('dashboard.sets.edit', compact('set', 'categoryId'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AccessoriesSet $set)
    {
        $request->validate([
            'name' => 'required|max:100',
            'image' => 'nullable|image',
            'description' => 'required',
            'price' => 'required',
            'sale_price' => 'nullable',
            'category_id' => 'required'
        ]);


        if ($request->hasFile('image')) {

            Storage::disk('custom')->delete($set->image);

            $path = $request->file('image')->store('uploads', 'custom');
        }

        $set->update([
            'name' => $request->name,
            'image' => $path ?? $set->image,
            'description' => $request->description,
            'price' =>  $request->price,
            'sale_price' =>  $request->sale_price,
            'category_id' => $request->category_id,
        ]);

        $set->save();

        return redirect()
            ->route('dashboard.sets.index')
            ->with('msg',  __('Updated Successfully'))
            ->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AccessoriesSet $set)
    {
        File::delete(public_path($set->image));
        $set->delete();
        return redirect()
            ->route('dashboard.sets.index')
            ->with('msg', __('Deleted Successfully'))
            ->with('type', 'danger');
    }
}
