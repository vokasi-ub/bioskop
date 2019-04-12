@extends('template.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
<h1>Data pemesanan</h1>
<br>
      
    

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Data pemesanan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @foreach($memesan as $p)
            <form class="form-horizontal" action="/datamemesan/update" method="post">
               {{ csrf_field() }}
              <div class="box-body">
                  <input type="hidden" name="id_pemesanan" value="{{ $p->id_pemesanan }}"> <br/>
              
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">tanggal pemesanan</label>

                  <div class="col-sm-10">
                    <input type="date" class=" form-control " ass="form-control" name="tanggal_pemesanan" value="{{ $p->tanggal_pemesanan }}" placeholder="tanggal_pemesanan">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">jumlah</label>

                  <div class="col-sm-10">
                    <input type="text" class=" form-control " ass="form-control" name="jumlah" value="{{ $p->jumlah }}" placeholder="jumlah">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">total harga</label>

                  <div class="col-sm-10">
                    <input type="text" class=" form-control " ass="form-control" name="total_harga" value="{{ $p->total_harga }}" placeholder="total_harga">
                  </div>
                </div>
                  
      
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-info pull-right">Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </section>
        @endforeach

    <!-- /.content -->
  
    <!-- /.content -->
@endsection