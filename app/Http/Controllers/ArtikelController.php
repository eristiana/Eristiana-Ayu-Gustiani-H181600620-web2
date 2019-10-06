<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artikel;
use App\KategoriArtikel;

class ArtikelController extends Controller
{
    public function index(){
        //Eloquent => ORM (Object Relational Mapping)
        $listArtikel=Artikel::all(); //select * from artikel

        //blade
        return view('artikel.index',compact('listArtikel'));

    }

    public function show($id){
        //Eloquent
        //$Artikel=Artikel::where('id',$id)->first();//select * from artikel where id=$id limit 1
        $Artikel=Artikel::find($id);

        return view('artikel.show',compact('Artikel'));
    }

    public function create(){

        $kategoriArtikel=KategoriArtikel::pluck('nama','id');
        return view( 'artikel.create',compact('kategoriArtikel'));
    }
    
    public function store(Request $request){
        $input= $request->all();

        Artikel::create($input);

        return redirect(route('artikel.index'));
    }
}