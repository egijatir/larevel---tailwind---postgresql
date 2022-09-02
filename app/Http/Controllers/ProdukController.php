<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword=$request->keyword;
        $produk=produk::where('nama','LIKE','%'.$keyword.'%')
        ->orwhere('jumlah','LIKE','%'.$keyword.'%')
        ->orwhere('harga','LIKE','%'.$keyword.'%')
        ->paginate(5);
        return view('/produk',compact('produk'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        produk::create($request->except('_token','submit'));
        return redirect('/produk')->with('tambah','Data Berhasil Di Tambah');
        $pagination = 5;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk=produk::find($id);
        return view('edit',compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $produk=produk::find($id);
        $produk->update($request->except('_token','submit'));
        return redirect('produk')->with('edit','Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $produk=produk::find($id);
        $produk->delete($request);
        return redirect('/produk')->with('dihapus','data telah di hapus');
    }
}
