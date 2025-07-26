<?php

namespace App\Http\Controllers;

use App\Models\Earring;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class EarringsController extends Controller
{
    public function index(Request $request)
    {
        $query = Earring::query();

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('name->ar', 'like', '%' . $request->search . '%')
                    ->orWhere('name->en', 'like', '%' . $request->search . '%');
            });
        }
        $earrings = $query->latest()->paginate(10);
        // dd($request->all());
        return view('dashboard.earrings.index', compact('earrings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $earrings = Earring::all();

        $categoryId = 1;
        return view('dashboard.earrings.create', compact('earrings', 'categoryId'));
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
        Earring::create([
            'name' => $request->name,
            'image' => $path,
            'description' => $request->description,
            'price' =>  $request->price,
            'sale_price' =>  $request->sale_price,
            'category_id' => $request->category_id,
        ]);

        // dd($request->all());

        return redirect()
            ->route('dashboard.earrings.index')
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
        $earring = Earring::findOrFail($id);
        $categoryId = 1;
        return view('dashboard.earrings.edit', compact('earring', 'categoryId'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Earring $earring)
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

            Storage::disk('custom')->delete($earring->image);

            $path = $request->file('image')->store('uploads', 'custom');
        }

        $earring->update([
            'name' => $request->name,
            'image' => $path ?? $earring->image,
            'description' => $request->description,
            'price' =>  $request->price,
            'sale_price' =>  $request->sale_price,
            'category_id' => $request->category_id,
        ]);

        $earring->save();

        return redirect()
            ->route('dashboard.earrings.index')
            ->with('msg',  __('Updated Successfully'))
            ->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Earring $earring)
    {
        File::delete(public_path($earring->image));
        $earring->delete();
        return redirect()
            ->route('dashboard.earrings.index')
            ->with('msg', __('Deleted Successfully'))
            ->with('type', 'danger');
    }
}
