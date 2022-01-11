<?php

namespace App\Http\Controllers;

class HomeController extends Controller{

    function showhome(){
        return view('FrontView.home');
    }

    function showabout(){
        return view('FrontView.about');
    }

    function showcontact(){
        return view('FrontView.contact');
    }

    function showproduct(){
        return view('FrontView.product');
    }

    function showtestimonial(){
        return view('FrontView.testimonial');
    }

    function showdashboard(){
        return view('BackView.dashboard');
    }

    function showkategori(){
        return view('BackView.kategori');
    }

    function showsupplier(){
        return view('BackView.supplier');
    }

    function showcolegan(){
        return view('BackView.colegan');
    }

    function showproduct2(){
        return view('BackView.product2');
    }

    function Product($Produk, $hargaMin = 0 , $hargaMax = 0){
        if($Produk == 'Jam Tangan'){
            echo "Produk Jam Tangan";
        }elseif($Produk == 'Jam Tangan Pria'){
            echo "Produk Jam Tangan Pria";
        }
        echo "<br>";
        echo "Harga Min adalah $hargaMin <br>";
        echo "Harga Max adalah $hargaMax <br>";

    }

}