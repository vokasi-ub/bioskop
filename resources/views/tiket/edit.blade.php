@extends('template.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
<h1>Data Kategori</h1>
<br>
      
    

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Data Kategori</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @foreach($tiket as $t)
            <form class="form-horizontal" action="/datatiket/update" method="post">
               {{ csrf_field() }}
              <div class="box-body">
                  <input type="hidden" name="id_tiket" value="{{ $t->id_tiket }}"> <br/>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">id tiket</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="id_tiket" value="{{ $t->id_tiket }}" placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">harga</label>

                  <div class="col-sm-10">
                    <input type="text" class=" form-control " ass="form-control" name="harga" value="{{ $t->harga }}" placeholder="Password">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">stok</label>

                  <div class="col-sm-10">
                    <input type="text" class=" form-control " ass="form-control" name="stok" value="{{ $t->stok }}" placeholder="Password">
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