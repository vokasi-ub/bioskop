@extends('template.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
<h1>Data pemesanan</h1>
<br>
      <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Form Search</h3>
            </div>
            <form action="/memesan" method="GET">

            <div class="box-body">
              <div class="row">
                <div class="col-xs-5">
                  <div class="input-group">
                <div class="input-group-btn">
                  <button type="submit" class="btn btn-danger">Search</button>
                </div>
                <!-- /btn-group -->
                
                <input type="text" class="form-control" name="cari" placeholder="Cari Data">
              </div>
                </div>
              </div>
            </div>
          </form>
            <!-- /.box-body -->
          </div>
    

          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">List Data pemesanan</h3>
       
            </div>

            <div class="box-body">
                      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info">
                Tambah Data
              </button><br><br>

          
          <div class="modal modal-info fade" id="modal-info">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modaal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data pemesanan</h4>
              </div>
                <form class="form-horizontal" action="/inputdatapemesanan/store" method="post">
                {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Id pemesanan</label>

                  <div class="col-sm-10">`
                    <input type="text" class="form-control" name="id_pemesanan" placeholder="id_pemesanan">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tanggal pemesanan</label>

                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="tanggal_pemesanan" placeholder="tanggal_pemesanan">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Jumlah</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="jumlah" placeholder="jumlah">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Total harga</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="total_harga" placeholder="total_harga">
                  </div>
                </div>


             
              </div>
              <!-- /.box-body -->
             
              <!-- /.box-footer -->
            
              <div class="modal-footer">
                <button type="submit" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">save</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
            <table class="table table-bordered table-striped">
              <thead>
               <tr>
                <th>ID</th>
                <th>Tanggal pemesanan</th>
                <th>Jumlah</th>
                <th>Total harga</th>
                <th>Tanggal Input Date</th>
                 <th>Tanggal_updata</th>
                <th>Opsi</th></tr>

             @foreach($pemesanan as $p)
                 <tr>
                 <td>{{$p->id_pemesanan}}</td>
                  <td>{{$p->tanggal_pemesanan}}</td>
                  <td>{{$p->jumlah}}</td>
                  <td>{{$p->total_harga}}</td>
                   <td>{{$p->created_at}}</td>
                   <td>{{$p->updated_at}}</td>
                     <td>  <a href="/pemesananedit/edit/{{ $p->id_pemesanan }}">Edit</a> | <a href="/hapus/memesanhapus/{{ $p->id_pemesanan }}">Hapus</a></td>
    </tr>
  @endforeach
            </table> 
            </div>
            <!-- /.box-body -->
          </div>
        </section>

    <!-- /.content -->
  
    <!-- /.content -->
@endsection