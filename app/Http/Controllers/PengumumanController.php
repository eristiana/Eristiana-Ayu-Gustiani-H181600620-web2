<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengumuman;
use App\KategoriPengumuman;

class PengumumanController extends Controller
{
    public function index(){
        //Eloquent => ORM (Object Relational Mapping)
        $listPengumuman=Pengumuman::all(); //select * from artikel

        //blade
        return view('pengumuman.index',compact('listPengumuman'));

    }

    public function show($id){
        //Eloquent
        //$Pengumuman=Pengumuman::where('id',$id)->first();//select * from artikel where id=$id limit 1
        $Pengumuman=Pengumuman::find($id);

        if(empty($Pengumuman)){
            return redirect(route('pengumuman.index'));
        }

        return view('pengumuman.show',compact('Pengumuman'));
    }

    public function create(){

        $kategoriPengumuman=KategoriPengumuman::pluck('nama','id');
        return view( 'pengumuman.create',compact('kategoriPengumuman'));
    }
    
    public function store(Request $request){
        $input= $request->all();

        Pengumuman::create($input);

        return redirect(route('pengumuman.index'));
    }
    public function edit($id){
        $Pengumuman=Pengumuman::find($id);

        if(empty($Pengumuman)){
            return redirect(route('pengumuman.index'));
        }
        return view('pengumuman.edit',compact ('Pengumuman'));
    }
    public function update($id,Request $request){
        $Pengumuman=Pengumuman::find($id);
        $input= $request->all();

        if(empty($Pengumuman)){
            return redirect(route('pengumuman.index'));
        }
        $Pengumuman->update($input);

        return redirect(route('pengumuman.index'));
    }
    public function destroy($id){
        $Pengumuman=Pengumuman::find($id);

        if(empty($Pengumuman)){
            return redirect(route('pengumuman.index'));
        } 
        $Pengumuman->delete();
        return redirect(route('pengumuman.index'));
}
}
