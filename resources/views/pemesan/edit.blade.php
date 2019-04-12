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
              <h3 class="box-title">Edit Data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @foreach($pemesan as $p)
            <form class="form-horizontal" action="/datapemesan/update" method="post">
               {{ csrf_field() }}
              <div class="box-body">
                  <input type="hidden" name="id_pesanan" value="{{ $p->id_pesanan }}"> <br/>
                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">nama pemesan</label>

                  <div class="col-sm-10">
                    <input type="text" class=" form-control " ass="form-control" name="nama_pemesan" value="{{ $p->nama_pemesan }}" placeholder="nama_pemesan">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">jenis kelamin</label>

                  <div class="col-sm-10">
                    <input type="text" class=" form-control " ass="form-control" name="jenis_kelamin" value="{{ $p->jenis_kelamin }}" placeholder="jenis_kelamin">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">no hp</label>

                  <div class="col-sm-10">
                    <input type="text" class=" form-control " ass="form-control" name="no_hp" value="{{ $p->no_hp }}" placeholder="no_hp">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">alamat</label>

                  <div class="col-sm-10">
                    <input type="text" class=" form-control " ass="form-control" name="alamat" value="{{ $p->alamat }}" placeholder="alamat">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">email</label>

                  <div class="col-sm-10">
                    <input type="text" class=" form-control " ass="form-control" name="email" value="{{ $p->email }}" placeholder="email">
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