<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', function () {
    return view('dashboard/index');
});

//film
Route::get('film', 'filmController@cari');

Route::resource('film','FilmController')->except(['delete','destroy']) ;

Route::post('/datafilm/update','filmController@update');

Route::post('inputdatafilm/store','filmController@store');

Route::get('/hapus/destroy/{id_film}', 'filmController@destroy');

Route::resource('film', 'filmController');

Route::get('filmedit/edit/{id_film}','filmController@edit');


//pemesan
Route::get('/pemesan', 'pemesanController@index');

Route::get('pemesan', 'pemesanController@cari');

Route::resource('pemesan','PemesanController')->except(['delete','destroy']) ;

Route::post('/datapemesan/update','pemesanController@update');

Route::post('inputdatapemesan/store','pemesanController@store');

Route::get('/hapus/pemesanhapus/{id_pesanan}', 'pemesanController@destroy');

Route::resource('pemesan', 'pemesanController');

Route::get('pemesanedit/edit/{id_pemesan}','pemesanController@edit');


//kategori
Route::get('/kategori', 'kategoriController@index');

Route::get('kategori', 'kategoriController@cari');

Route::resource('kategori','KategoriController')->except(['delete','destroy']) ;

Route::post('/datakategori/update','kategoriController@update');

Route::post('inputdatakategori/store','kategoriController@store');

Route::get('/hapus/kategorihapus/{id_kategori}', 'kategoriController@destroy');

Route::resource('kategori', 'kategoriController');

Route::get('kategoriedit/edit/{id_kategori}','kategoriController@edit');


//studio
Route::get('/studio', 'studioController@index');

Route::get('studio', 'studioController@cari');

Route::resource('studio','StudioController')->except(['delete','destroy']) ;

Route::post('/datastudio/update','studioController@update');

Route::post('inputdatastudio/store','studioController@store');

Route::get('/hapus/studiohapus/{id_studio}', 'studioController@destroy');

Route::resource('studio', 'studioController');

Route::get('studioedit/edit/{id_studio}','studioController@edit');


//tiket
Route::get('/tiket', 'tiketController@index');

Route::get('tiket', 'tiketController@cari');

Route::resource('tiket','TiketController')->except(['delete','destroy']) ;

Route::post('/datatiket/update','tiketController@update');

Route::post('inputdatatiket/store','tiketController@store');

Route::get('/hapus/tikethapus/{id_tiket}', 'tiketController@destroy');

Route::resource('tiket', 'tiketController');

Route::get('tiketedit/edit/{id_tiket}','tiketController@edit');


//kursi
Route::get('/kursi', 'kursiController@index');

Route::get('kursi', 'kursiController@cari');

Route::resource('kursi','KursiController')->except(['delete','destroy']) ;

Route::post('/datakursi/update','kursiController@update');

Route::post('inputdatakursi/store','kursiController@store');

Route::get('/hapus/kursihapus/{id_kursi}', 'kursiController@destroy');

Route::resource('kursi', 'kursiController');

Route::get('kursiedit/edit/{id_kursi}','kursiController@edit');


//jadwal
Route::get('/jadwal', 'jadwalController@index');

Route::get('jadwal', 'jadwalController@cari');

Route::resource('jadwal','jadwalController')->except(['delete','destroy']) ;

Route::post('/datajadwal/update','jadwalController@update');

Route::post('inputdatajadwal/store','jadwalController@store');

Route::get('/hapus/jadwalhapus/{id_jadwal}', 'jadwalController@destroy');

Route::resource('jadwal', 'jadwalController');

Route::get('jadwaledit/edit/{id_jadwal}','jadwalController@edit');


//memesan
Route::get('/memesan', 'memesanController@index');

Route::get('memesan', 'memesanController@cari');

Route::resource('memesan','memesanController')->except(['delete','destroy']) ;

Route::post('/datamemesan/update','memesanController@update');

Route::post('inputdatapemesanan/store','memesanController@store');

Route::get('/hapus/memesanhapus/{id_pemesanan}', 'memesanController@destroy');

Route::resource('memesan', 'memesanController');

Route::get('pemesananedit/edit/{id_pemesanan}','memesanController@edit');
/*Route::group(['middleware'=>['web']], function(){
	Route::resource('/kategori', 'KategoriController');
	Route::get('search', 'KategoriController@search');
})*/

//Route::get('/search','KategoriController@cari')->name('post.cari');
//Route::get('/search', 'KategoriController@cari')->name('post.search');
//Route::resource('kategori', 'KategoriController')->except(['destroy']);
