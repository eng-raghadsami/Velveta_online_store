<?php

namespace App\Http\Controllers;

use App\Models\AccessoriesSet;
use App\Models\Bracelet;
use App\Models\Earring;
use App\Models\Necklace;
use App\Models\Ring;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $sets = AccessoriesSet::paginate(6);
        $rings = Ring::paginate(6);
        $bracelets = Bracelet::paginate(6);
        $necklaces = Necklace::paginate(6);
        $earrings = Earring::paginate(6);

        return view('front.index', compact('sets', 'rings', 'bracelets', 'necklaces', 'earrings'));
    }
    function sets()
    {
        $sets = AccessoriesSet::all();
        return view('front.sets', compact('sets'));
    }
    function rings()
    {
        $rings = Ring::all();
        return view('front.rings', compact('rings'));
    }
    function bracelets()
    {
        $bracelets = Bracelet::all();
        return view('front.bracelets', compact('bracelets'));
    }
    function necklaces()
    {
        $necklaces = Necklace::all();
        return view('front.necklaces', compact('necklaces'));
    }
    function earrings()
    {
        $earrings = Earring::all();
        return view('front.earrings', compact('earrings'));
    }
    function about()
    {
        return view('front.about');
    }

    function details($id)
    {
        $product = null;
        $type = null;

        // نحاول نلقاه بأي جدول من جداول المنتجات
        $models = [
            'set' => \App\Models\AccessoriesSet::class,
            'ring' => \App\Models\Ring::class,
            'bracelet' => \App\Models\Bracelet::class,
            'necklace' => \App\Models\Necklace::class,
            'earring' => \App\Models\Earring::class,
        ];

        foreach ($models as $key => $model) {
            $item = $model::find($id);
            if ($item) {
                $product = $item;
                $type = $key;
                break;
            }
        }

        if (!$product) {
            abort(404);
        }

        // جلب منتجات مشابهة من نفس النوع باستثناء المنتج الحالي
        $relatedProducts = $models[$type]::where('id', '!=', $product->id)->limit(3)->get();

        return view('front.details', compact('product', 'relatedProducts', 'type'));
    }

    public function contact(Request $request)
    {
        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'message' => 'required|string|min:10',
            ]);

            return back()->with('success', 'Your message has been sent successfully!');
        }

        return view('front.contact');
    }



    function search()
    {
        return view('front.search');
    }
}
