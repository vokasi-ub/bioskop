<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\studioModel;
use Illuminate\Support\Facades\DB;

class studioController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //mencari data
        if ($request->has('cari')) {
            $studio = \App\studioModel::where('nama_studio','LIKE','%'.$request->cari.'%')->get();
        } else {
            $studio = studioModel::all();
        }
        return view('studio.studio', compact('studio'));
        
    }
     
     public function cari(Request $request){

        //menangkap data pencarian
        $cari = $request->cari;

        //mengambil data dari table pegawai sesuai pencarian data
        $studio = DB::table('studio')
      ->where('nama_studio','LIKE',"%".$cari."%")
      ->paginate();

      //mengirim data pegawai ke view index
      return view('index',['studio'=>$studio]);  
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
     // insert data ke table studio
        DB::table('studio')->insert([
        'id_studio' => $request->id_studio,
        'nama_studio' => $request->nama_studio,
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now()
    ]);
    // alihkan halaman ke halaman pegawai
    return redirect('/studio');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id_studio
     * @return \Illuminate\Http\Response
     */
    public function show($id_studio)
    {
        //
        $output = 'Daftar studio';
        $studio = studio::get();
        return view('show', array(
          'studio' => $output,
          'studio' => $studio
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_studio
     * @return \Illuminate\Http\Response
     */
    public function edit($id_studio)
    {
    $f = DB::table('studio')->where('id_studio',$id_studio)->get();
    // passing data pegawai yang did_studioapat ke view edit.blade.php
    return view('studio.edit',['studio' => $f]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_studio
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request)
{
    // update data pegawai
    DB::table('studio')->where('id_studio',$request->id_studio)->update([
        'id_studio' => $request->id_studio,
        'nama_studio' => $request->nama_studio,
         
        'updated_at' => \Carbon\Carbon::now()
   
    ]);
    // alihkan halaman ke halaman pegawai
    return redirect('/studio');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id_studio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_studio)
    {
        DB::table('studio')->where('id_studio', $id_studio)->delete();
            return redirect('/studio');
    }

}
