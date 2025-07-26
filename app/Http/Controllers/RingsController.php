<?php

namespace App\Http\Controllers;

use App\Models\Ring;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class RingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Ring::query();

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('name->ar', 'like', '%' . $request->search . '%')
                    ->orWhere('name->en', 'like', '%' . $request->search . '%');
            });
        }
        $rings = $query->latest()->paginate(10);
        // dd($request->all());
        return view('dashboard.rings.index', compact('rings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rings = Ring::all();

        $categoryId = 2;
        return view('dashboard.rings.create', compact('rings', 'categoryId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'image' => 'required|image',
            'description' => 'required',
            'price' => 'required',
            'sale_price' => 'nullable',
            'category_id' => 'required'
        ]);

        $path = $request->file('image')->store('uploads', 'custom');
        Ring::create([
            'name' => $request->name,
            'image' => $path,
            'description' => $request->description,
            'price' =>  $request->price,
            'sale_price' =>  $request->sale_price,
            'category_id' => $request->category_id,
        ]);

        // dd($request->all());

        return redirect()
            ->route('dashboard.rings.index')
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
        $ring = Ring::findOrFail($id);
        $categoryId = 2;
        return view('dashboard.rings.edit', compact('ring', 'categoryId'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ring $ring)
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

            Storage::disk('custom')->delete($ring->image);

            $path = $request->file('image')->store('uploads', 'custom');
        }

        $ring->update([
            'name' => $request->name,
            'image' => $path ?? $ring->image,
            'description' => $request->description,
            'price' =>  $request->price,
            'sale_price' =>  $request->sale_price,
            'category_id' => $request->category_id,
        ]);

        $ring->save();

        return redirect()
            ->route('dashboard.rings.index')
            ->with('msg',  __('Updated Successfully'))
            ->with('type', 'info');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ring $ring)
    {
        File::delete(public_path($ring->image));
        $ring->delete();
        return redirect()
            ->route('dashboard.rings.index')
            ->with('msg', __('Deleted Successfully'))
            ->with('type', 'danger');
    }
}
