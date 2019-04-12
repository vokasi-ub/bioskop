<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jadwalModel;
use Illuminate\Support\Facades\DB;
class jadwalController extends Controller
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
            $jadwal = \App\jadwalModel::where('tanggal_film','LIKE','%'.$request->cari.'%')->get();
        } else {
            $jadwal = jadwalModel::all();
        }
        return view('jadwal.jadwal', compact('jadwal'));
        
    }
     
     public function cari(Request $request){

        //menangkap data pencarian
        $cari = $request->cari;

        //mengambil data dari table pegawai sesuai pencarian data
        $jadwal = DB::table('jadwal')
      ->where('tanggal_film','LIKE',"%".$cari."%")
      ->paginate();

      //mengirim data pegawai ke view index
      return view('index',['jadwal'=>$jadwal]);  
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
     // insert data ke table jadwal
        DB::table('jadwal')->insert([
        'id_jadwal' => $request->id_jadwal,
        'tanggal_film' => $request->tanggal_film,
        'jam_mulai' => $request->jam_mulai,
        'jam_berakhir' => $request->jam_berakhir,
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now()
    ]);
    // alihkan halaman ke halaman pegawai
    return redirect('/jadwal');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id_jadwal
     * @return \Illuminate\Http\Response
     */
    public function show($id_jadwal)
    {
        //
        $output = 'Daftar jadwal';
        $jadwal = jadwal::get();
        return view('show', array(
          'jadwal' => $output,
          'jadwal' => $jadwal
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit($id_jadwal)
    {
    $j = DB::table('jadwal')->where('id_jadwal',$id_jadwal)->get();
    // passing data pegawai yang did_jadwalapat ke view edit.blade.php
    return view('jadwal.edit',['jadwal' => $j]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_jadwal
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request)
{
    // update data pegawai
    DB::table('jadwal')->where('id_jadwal',$request->id_jadwal)->update([
        'id_jadwal' => $request->id_jadwal,
        'tanggal_film' => $request->tanggal_film,
        'jam_mulai' => $request->jam_mulai,
        'jam_berakhir' => $request->jam_berakhir,
         
        'updated_at' => \Carbon\Carbon::now()
   
    ]);
    // alihkan halaman ke halaman pegawai
    return redirect('/jadwal');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id_jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_jadwal)
    {
        DB::table('jadwal')->where('id_jadwal', $id_jadwal)->delete();
            return redirect('/jadwal');
    }
}
