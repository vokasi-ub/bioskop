<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pemesananModel;
use Illuminate\Support\Facades\DB;

class memesanController extends Controller
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
            $pemesanan = \App\pemesananModel::where('jumlah','LIKE','%'.$request->cari.'%')->get();
        } else {
            $pemesanan = pemesananModel::all();
        }
        return view('memesan.memesan', compact('pemesanan'));
        
    }
     
     public function cari(Request $request){

        //menangkap data pencarian
        $cari = $request->cari;

        //mengambil data dari table pegawai sesuai pencarian data
        $pemesanan = DB::table('memesan')
      ->where('jumlah','LIKE',"%".$cari."%")
      ->paginate();

      //mengirim data pegawai ke view index
      return view('index',['memesan'=>$pemesanan]);  
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
     // insert data ke table pemesanan
        DB::table('memesan')->insert([
        'id_pemesanan' => $request->id_pemesanan,
        'tanggal_pemesanan' => $request->tanggal_pemesanan,
        'jumlah' => $request->jumlah,
        'total_harga' => $request->total_harga,
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now()
    ]);
    // alihkan halaman ke halaman pegawai
    return redirect('/memesan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id_pemesanan
     * @return \Illuminate\Http\Response
     */
    public function show($id_pemesanan)
    {
        //
        $output = 'Daftar pemesanan';
        $pemesanan = pemesanan::get();
        return view('show', array(
          'pemesanan' => $output,
          'pemesanan' => $pemesanan
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_pemesanan
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pemesanan)
    {
    $p = DB::table('memesan')->where('id_pemesanan',$id_pemesanan)->get();
    // passing data pegawai yang did_pemesananapat ke view edit.blade.php
    return view('memesan.edit',['memesan' => $p]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_pemesanan
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request)
{
    // update data pegawai
    DB::table('memesan')->where('id_pemesanan',$request->id_pemesanan)->update([
        'id_pemesanan' => $request->id_pemesanan,
        'tanggal_pemesanan' => $request->tanggal_pemesanan,
         'jumlah' => $request->jumlah,
        'total_harga' => $request->total_harga,
        'updated_at' => \Carbon\Carbon::now()
   
    ]);
    // alihkan halaman ke halaman pegawai
    return redirect('/memesan');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id_pemesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pemesanan)
    {
        DB::table('memesan')->where('id_pemesanan', $id_pemesanan)->delete();
            return redirect('/memesan');
    }
}
