
@extends('template.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
<h1>Data pemesanan</h1>
<br>
     
    
@if (count($hasil))
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Data Result</h3>

       
            </div>

            <div class="box-body">
              <a href="penduduk"> Lihat Semua Data</a>
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                <th>Id pemesanan</th>
                <th>Tanggal pemesanan</th>
                <th>Jumlah</th>
                <th>Total harga</th>
                <th>Tanggal_Input_Date</th>
                <th>Opsi</th></tr>
             @foreach($pemesanan as $p)
                 <tr>
                  <td>{{$p->id_pemesanan}}</td>
                  <td>{{$p->tanggal_pemesanan}}</td>
                  <td>{{$p->jumlah}}</td>
                  <td>{{$p->total_harga}}</td>
                   <td>{{$p->tanggal_input_date}}</td>
                     <td><a href="">Lihat</a> | <a href="">Edit</a> | <a href="">Hapus</a></td>
    </tr>
                   @endforeach
            </tbody>
            </table> 
            </div>
            <!-- /.box-body -->
          </div>
        </section>

    <!-- /.content -->
  @else
   <div class="card-panel red darken-3 white-text">Oops.. Data Tidak Ditemukan</div>
@endif
    <!-- /.content -->
@endsection