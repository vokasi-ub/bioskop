<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FilmModel;
use Illuminate\Support\Facades\DB;
class filmController extends Controller
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
            $film = \App\Film::where('judul','LIKE','%'.$request->cari.'%')->get();
        } else {
            $film = FilmModel::all();
        }
        return view('film.film', compact('film'));
        
    }
     
     public function cari(Request $request){

        //menangkap data pencarian
        $cari = $request->cari;

        //mengambil data dari table pegawai sesuai pencarian data
        $film = DB::table('film')
      ->where('judul','LIKE',"%".$cari."%")
      ->paginate();

      //mengirim data pegawai ke view index
      return view('index',['film'=>$film]);  
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
     // insert data ke table film
        DB::table('film')->insert([
        'id_film' => $request->id_film,
        'judul' => $request->judul,
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now()
    ]);
    // alihkan halaman ke halaman pegawai
    return redirect('/film');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id_film
     * @return \Illuminate\Http\Response
     */
    public function show($id_film)
    {
        //
        $output = 'Daftar film';
        $film = film::get();
        return view('show', array(
          'film' => $output,
          'film' => $film
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_film
     * @return \Illuminate\Http\Response
     */
    public function edit($id_film)
    {
    $f = DB::table('film')->where('id_film',$id_film)->get();
    // passing data pegawai yang did_filmapat ke view edit.blade.php
    return view('film.edit',['film' => $f]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_film
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request)
{
    // update data pegawai
    DB::table('film')->where('id_film',$request->id_film)->update([
        'id_film' => $request->id_film,
        'judul' => $request->judul,
         
        'updated_at' => \Carbon\Carbon::now()
   
    ]);
    // alihkan halaman ke halaman pegawai
    return redirect('/film');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id_film
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_film)
    {
        DB::table('film')->where('id_film', $id_film)->delete();
            return redirect('/film');
    }

}
