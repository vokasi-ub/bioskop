<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kursiModel;
use Illuminate\Support\Facades\DB;


class kursiController extends Controller
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
            $kursi = \App\kursiModel::where('no_kursi','LIKE','%'.$request->cari.'%')->get();
        } else {
            $kursi = kursiModel::all();
        }
        return view('kursi.kursi', compact('kursi'));
        
    }
     
     public function cari(Request $request){

        //menangkap data pencarian
        $cari = $request->cari;

        //mengambil data dari table pegawai sesuai pencarian data
        $kursi = DB::table('kursi')
      ->where('no_kursi','LIKE',"%".$cari."%")
      ->paginate();

      //mengirim data pegawai ke view index
      return view('index',['kursi'=>$kursi]);  
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
     // insert data ke table kursi
        DB::table('kursi')->insert([
        'id_kursi' => $request->id_kursi,
        'no_kursi' => $request->no_kursi,
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now()
    ]);
    // alihkan halaman ke halaman pegawai
    return redirect('/kursi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id_kursi
     * @return \Illuminate\Http\Response
     */
    public function show($id_kursi)
    {
        //
        $output = 'Daftar kursi';
        $kursi = kursi::get();
        return view('show', array(
          'kursi' => $output,
          'kursi' => $kursi
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_kursi
     * @return \Illuminate\Http\Response
     */
    public function edit($id_kursi)
    {
    $kur = DB::table('kursi')->where('id_kursi',$id_kursi)->get();
    // passing data pegawai yang did_kursiapat ke view edit.blade.php
    return view('kursi.edit',['kursi' => $kur]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_kursi
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request)
{
    // update data pegawai
    DB::table('kursi')->where('id_kursi',$request->id_kursi)->update([
        'id_kursi' => $request->id_kursi,
        'no_kursi' => $request->no_kursi,
         
        'updated_at' => \Carbon\Carbon::now()
   
    ]);
    // alihkan halaman ke halaman pegawai
    return redirect('/kursi');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id_kursi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kursi)
    {
        DB::table('kursi')->where('id_kursi', $id_kursi)->delete();
            return redirect('/kursi');
    }
}
