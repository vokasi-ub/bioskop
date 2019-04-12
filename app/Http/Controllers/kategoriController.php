<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kategoriModel;
use Illuminate\Support\Facades\DB;

class kategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //mencari data
        if ($request->has('cari')) {
            $kategori = \App\kategoriModel::where('nama_kategori','LIKE','%'.$request->cari.'%')->get();
        } else {
            $kategori = kategoriModel::all();
        }
        return view('kategori.kategori', compact('kategori'));
        
    }
     
     public function cari(Request $request){

        //menangkap data pencarian
        $cari = $request->cari;

        //mengambil data dari table pegawai sesuai pencarian data
        $kategori = DB::table('kategori')
      ->where('nama_kategori','LIKE',"%".$cari."%")
      ->paginate();

      //mengirim data pegawai ke view index
      return view('index',['kategori'=>$kategori]);  
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
     // insert data ke table kategori
        DB::table('kategori')->insert([
        'id_kategori' => $request->id_kategori,
        'nama_kategori' => $request->nama_kategori,
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now()
    ]);
    // alihkan halaman ke halaman pegawai
    return redirect('/kategori');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id_kategori
     * @return \Illuminate\Http\Response
     */
    public function show($id_kategori)
    {
        //
        $output = 'Daftar kategori';
        $kategori = kategori::get();
        return view('show', array(
          'kategori' => $output,
          'kategori' => $kategori
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id_kategori)
    {
    $k = DB::table('kategori')->where('id_kategori',$id_kategori)->get();
    // passing data pegawai yang did_kategoriapat ke view edit.blade.php
    return view('kategori.edit',['kategori' => $k]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_kategori
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request)
{
    // update data pegawai
    DB::table('kategori')->where('id_kategori',$request->id_kategori)->update([
        'id_kategori' => $request->id_kategori,
        'nama_kategori' => $request->nama_kategori,
         
        'updated_at' => \Carbon\Carbon::now()
   
    ]);
    // alihkan halaman ke halaman pegawai
    return redirect('/kategori');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id_kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kategori)
    {
        DB::table('kategori')->where('id_kategori', $id_kategori)->delete();
            return redirect('/kategori');
    }

}
