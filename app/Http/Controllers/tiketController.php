<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tiketModel;
use Illuminate\Support\Facades\DB;

class tiketController extends Controller
{
    //
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
            $tiket = \App\tiketModel::where('harga','LIKE','%'.$request->cari.'%')->get();
        } else {
            $tiket = tiketModel::all();
        }
        return view('tiket.tiket', compact('tiket'));
        
    }
     
     public function cari(Request $request){

        //menangkap data pencarian
        $cari = $request->cari;

        //mengambil data dari table pegawai sesuai pencarian data
        $tiket = DB::table('tiket')
      ->where('harga','LIKE',"%".$cari."%")
      ->paginate();

      //mengirim data pegawai ke view index
      return view('index',['tiket'=>$tiket]);  
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
     // insert data ke table tiket
        DB::table('tiket')->insert([
        'id_tiket' => $request->id_tiket,
        'harga' => $request->harga,
        'stok' => $request->stok,
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now()
    ]);
    // alihkan halaman ke halaman pegawai
    return redirect('/tiket');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id_tiket
     * @return \Illuminate\Http\Response
     */
    public function show($id_tiket)
    {
        //
        $output = 'Daftar tiket';
        $tiket = tiket::get();
        return view('show', array(
          'tiket' => $output,
          'tiket' => $tiket
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_tiket
     * @return \Illuminate\Http\Response
     */
    public function edit($id_tiket)
    {
    $t = DB::table('tiket')->where('id_tiket',$id_tiket)->get();
    // passing data pegawai yang did_tiketapat ke view edit.blade.php
    return view('tiket.edit',['tiket' => $t]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_tiket
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request)
{
    // update data pegawai
    DB::table('tiket')->where('id_tiket',$request->id_tiket)->update([
        'id_tiket' => $request->id_tiket,
        'harga' => $request->harga,
         
        'updated_at' => \Carbon\Carbon::now()
   
    ]);
    // alihkan halaman ke halaman pegawai
    return redirect('/tiket');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id_tiket
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_tiket)
    {
        DB::table('tiket')->where('id_tiket', $id_tiket)->delete();
            return redirect('/tiket');
    }
}
