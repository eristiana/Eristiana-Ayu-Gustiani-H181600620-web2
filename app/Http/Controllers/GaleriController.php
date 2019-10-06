<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galeri;
use App\KategoriGaleri;

class GaleriController extends Controller
{
    public function index(){
        //Eloquent => ORM (Object Relational Mapping)
        $listGaleri=Galeri::all(); //select * from galeri

        //blade
        return view('galeri.index',compact('listGaleri'));

    }

    public function show($id){
        //Eloquent
        //$Galeri=Galeri::where('id',$id)->first();//select * from galeri where id=$id limit 1
        $Galeri=Galeri::find($id);

        return view('galeri.show',compact('Galeri'));
    }

    public function create(){

        $kategoriGaleri=KategoriGaleri::pluck('nama','id');
        return view( 'galeri.create',compact('kategoriGaleri'));
    }
    
    public function store(Request $request){
        $input= $request->all();

        Galeri::create($input);

        return redirect(route('galeri.index'));
    }
}