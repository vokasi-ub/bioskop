@extends('template.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
<h1>Data jadwal</h1>
<br>
      <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Form Search</h3>
            </div>
            <form action="/jadwal" method="GET">

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
              <h3 class="box-title">List Data jadwal</h3>
       
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
                <h4 class="modal-title">Tambah Data jadwal</h4>
              </div>
                <form class="form-horizontal" action="/inputdatajadwal/store" method="post">
                {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Id jadwal</label>

                  <div class="col-sm-10">`
                    <input type="text" class="form-control" name="id_jadwal" placeholder="id_jadwal">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tanggal film</label>

                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="tanggal_film" placeholder="tanggal">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Jam Mulai</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="jam_mulai" placeholder="jam mulai">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Jam Berakhir</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="jam_berakhir" placeholder="jam berakhir">
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
                <th>Tanggal Film</th>
                <th>Jam Mulai</th>
                 <th>Jam Berakhir</th>
                <th>Opsi</th></tr>

             @foreach($jadwal as $j)
                 <tr>
                  <td>{{$j->id_jadwal}}</td>
                  <td>{{$j->tanggal_film}}</td>
                  <td>{{$j->jam_mulai}}</td>
                  <td>{{$j->jam_berakhir}}</td>
                   <td>{{$j->created_at}}</td>
                   <td>{{$j->updated_at}}</td>
                     <td>  <a href="/jadwaledit/edit/{{ $j->id_jadwal }}">Edit</a> | <a href="/hapus/jadwalhapus/{{ $j->id_jadwal }}">Hapus</a></td>
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