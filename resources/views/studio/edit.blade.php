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
            @foreach($studio as $s)
            <form class="form-horizontal" action="/datastudio/update" method="post">
               {{ csrf_field() }}
              <div class="box-body">
                  <input type="hidden" name="id_studio" value="{{ $s->id_studio }}"> <br/>
                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">nama studio</label>

                  <div class="col-sm-10">
                    <input type="text" class=" form-control " ass="form-control" name="nama_studio" value="{{ $s->nama_studio }}" placeholder="Password">
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