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
            @foreach($jadwal as $j)
            <form class="form-horizontal" action="/datajadwal/update" method="post">
               {{ csrf_field() }}
              <div class="box-body">
                  <input type="hidden" name="id_jadwal" value="{{ $j->id_jadwal }}"> <br/>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">id jadwal</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="id_jadwal" value="{{ $j->id_jadwal }}" placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">tanggal film</label>

                  <div class="col-sm-10">
                    <input type="date" class=" form-control " ass="form-control" name="tanggal_film" value="{{ $j->tanggal_film }}" placeholder="Password">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">jam mulai</label>

                  <div class="col-sm-10">
                    <input type="text" class=" form-control " ass="form-control" name="jam_mulai" value="{{ $j->jam_mulai }}" placeholder="Password">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">jam berakhir</label>

                  <div class="col-sm-10">
                    <input type="text" class=" form-control " ass="form-control" name="jam_berakhir" value="{{ $j->jam_berakhir }}" placeholder="Password">
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