<?php

namespace App\Http\Controllers;
use App\Models\Product;

class ProdukController extends Controller{
    function index(){
        $User = request()->User();
        $data['list_produk'] = $User->Produk;
        return view('Produk.index', $data);
    }
    function create(){
        return view('Produk.create');
    }
    function store(){
        $Product = new Product;
        $Product->id_user = request()->User()->id;
        $Product->nama = request('nama');
        $Product->harga = request('harga');
        $Product->berat = request('berat');
        $Product->deskripsi = request('deskripsi');
        $Product->stock = request('stock');
        $Product->save();

        return redirect('admin/Produk')->with('success', 'Data Berhasil Ditambahkan');
    }
    function show(Product $Produk){
        $data['Produk'] = $Produk;
        return view('Produk.show', $data);
    }
    function edit(Product $Produk){
        $data['Produk'] = $Produk;
        return view('Produk.edit', $data);
    }
    function update(Product $Produk){
        $Produk->nama = request('nama');
        $Produk->harga = request('harga');
        $Produk->berat = request('berat');
        $Produk->deskripsi = request('deskripsi');
        $Produk->stock = request('stock');
        $Produk->save();

        return redirect('admin/Produk')->with('success', 'Data Berhasil Diedit');
    }
    function destroy(Product $Produk){
        $Produk->delete();

        return redirect('admin/Produk')->with('danger', 'Data Berhasil Dihapus');

    }

    function filter(){
        $nama = request('nama');
        $stock = explode(",", request('stock'));
        $data['$hargaMin'] = $hargaMin = request('hargaMin');
        $data['$hargaMax'] = $hargaMax = request('hargaMax');
        $data['list_produk'] = Product::where('nama', 'like', "%$nama%")->get();
        $data['list_produk'] = Product::whereIn('stock', $stock)->get();
        $data['list_produk'] = Product::whereBetween('harga', [$hargaMin, $hargaMax])->get();
        // $data['list_produk'] = Product::where('stock', '<>', $stock)->get();
        // $data['list_produk'] = Product::whereNotIn('stock', $stock)->get();
        // $data['list_produk'] = Product::whereNotBetween('harga', [$hargaMin, $hargaMax])->get();
        // $data['list_produk'] = Product::whereNull('stock', $stock)->get();
        // $data['list_produk'] = Product::whereNotNull('stock', $stock)->get();
        $data['nama'] = $nama;
        $data['stock'] = request('stock');

        return view('Produk.index', $data);
    }
}