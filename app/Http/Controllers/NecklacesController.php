<?php

namespace App\Http\Controllers;

use App\Models\Necklace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class NecklacesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Necklace::query();

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('name->ar', 'like', '%' . $request->search . '%')
                    ->orWhere('name->en', 'like', '%' . $request->search . '%');
            });
        }
        $necklaces = $query->latest()->paginate(10);
        // dd($request->all());
        return view('dashboard.necklaces.index', compact('necklaces'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $necklaces = Necklace::all();

        $categoryId = 3;
        return view('dashboard.necklaces.create', compact('necklaces', 'categoryId'));
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
        Necklace::create([
            'name' => $request->name,
            'image' => $path,
            'description' => $request->description,
            'price' =>  $request->price,
            'sale_price' =>  $request->sale_price,
            'category_id' => $request->category_id,
        ]);

        // dd($request->all());

        return redirect()
            ->route('dashboard.necklaces.index')
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
        $necklace = Necklace::findOrFail($id);
        $categoryId = 3;
        return view('dashboard.necklaces.edit', compact('necklace', 'categoryId'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Necklace $necklace)
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

            Storage::disk('custom')->delete($necklace->image);

            $path = $request->file('image')->store('uploads', 'custom');
        }

        $necklace->update([
            'name' => $request->name,
            'image' => $path ?? $necklace->image,
            'description' => $request->description,
            'price' =>  $request->price,
            'sale_price' =>  $request->sale_price,
            'category_id' => $request->category_id,
        ]);

        $necklace->save();

        return redirect()
            ->route('dashboard.necklaces.index')
            ->with('msg',  __('Updated Successfully'))
            ->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Necklace $necklace)
    {
        File::delete(public_path($necklace->image));
        $necklace->delete();
        return redirect()
            ->route('dashboard.necklaces.index')
            ->with('msg', __('Deleted Successfully'))
            ->with('type', 'danger');
    }
}
