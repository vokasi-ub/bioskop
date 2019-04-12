<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pemesanModel;
use Illuminate\Support\Facades\DB;

class pemesanController extends Controller
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
            $pemesan = \App\pemesanModel::where('nama_pemesan','LIKE','%'.$request->cari.'%')->get();
        } else {
            $pemesan = pemesanModel::all();
        }
        return view('pemesan.pemesan', compact('pemesan'));
        
    }
     
     public function cari(Request $request){

        //menangkap data pencarian
        $cari = $request->cari;

        //mengambil data dari table pegawai sesuai pencarian data
        $pemesan = DB::table('pemesan')
      ->where('nama_pemesan','LIKE',"%".$cari."%")
      ->paginate();

      //mengirim data pegawai ke view index
      return view('index',['pemesan'=>$pemesan]);  
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
     // insert data ke table pemesan
     DB::table('pemesan')->insert([
        'id_pesanan' => $request->id_pesanan,
        'nama_pemesan' => $request->nama_pemesan,
        'jenis_kelamin' => $request->jenis_kelamin,
        'no_hp' => $request->no_hp,
        'alamat' => $request->alamat,
        'email' => $request->email,
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now()
    ]);    
    
    // alihkan halaman ke halaman pegawai
    return redirect('/pemesan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id_pemesan
     * @return \Illuminate\Http\Response
     */
    public function show($id_pesanan)
    {
        //
        $output = 'Daftar Pemesan';
        $pemesan = pemesan::get();
        return view('show', array(
          'pemesan' => $output,
          'pemesan' => $pemesan
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_pemesan
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pesanan)
    {
    $p = DB::table('pemesan')->where('id_pesanan',$id_pesanan)->get();
    // passing data pegawai yang did_pemesanapat ke view edit.blade.php
    return view('pemesan.edit',['pemesan' => $p]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_pemesan
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request)
{
    // update data pegawai
    DB::table('pemesan')->where('id_pesanan',$request->id_pesanan)->update([
        'id_pesanan' => $request->id_pesanan,
        'nama_pemesan' => $request->nama_pemesan,
        'jenis_kelamin' => $request->jenis_kelamin,
        'no_hp' => $request->no_hp,
        'alamat' => $request->alamat,
        'email' => $request->email,
        'updated_at' => \Carbon\Carbon::now()
   
    ]);
    // alihkan halaman ke halaman pegawai
    return redirect('/pemesan');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id_pemesan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pesanan)
    {
        DB::table('pemesan')->where('id_pesanan', $id_pesanan)->delete();
            return redirect('/pemesan');
    }

}
