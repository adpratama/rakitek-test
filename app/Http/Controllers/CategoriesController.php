<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function fibonacci(Request $request) 
    {
        $angka = $request->angka;

        if($angka < 1) {
            $angka = 1;
        } else {
            $angka = $angka - 1;
        }

        $angka1 = 1;
        $angka2 = 1;

        $hasil = [$angka1, $angka2];

        for ($i = 1; $i < $angka; $i++) {
            $hasil[] = $hasil[$i] + $hasil[$i-1];
        }
        
        return view('/dashboard')->with([
            'hasil' => implode(", ", $hasil),
            'msg' => 'success'
        ]);
        
    }

    public function index()
    {
        $items = Categories::paginate();
        
        return view('categories.index')->with([
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);

        Categories::create($data);
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Categories::findOrFail($id);
        
        return view('categories.edit')->with([
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);

        $item = Categories::findOrFail($id);
        $item->update($data);

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Categories::findOrFail($id);

        $item->delete();

        Products::where('category_id', $id)->delete();

        return redirect()->route('categories.index');
    }
}
