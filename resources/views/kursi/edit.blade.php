@extends('template.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
<h1>Data kursi</h1>
<br>
      
    

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Data kursi</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @foreach($kursi as $kur)
            <form class="form-horizontal" action="/datakursi/update" method="post">
               {{ csrf_field() }}
              <div class="box-body">
                  <input type="hidden" name="id_kursi" value="{{ $kur->id_kursi }}"> <br/>
                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">nama kursi</label>

                  <div class="col-sm-10">
                    <input type="text" class=" form-control " ass="form-control" name="no_kursi" value="{{ $kur->no_kursi }}" placeholder="no_kursi">
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