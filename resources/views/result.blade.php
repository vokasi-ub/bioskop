@extends('master.app')
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	@section('content')


	<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Bordered Table</h3>
            </div>
            
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th>ID</th>
                  <th>judul</th>
                </tr>

                @foreach($film as $f)
                <tr>
                <td>{{$f->id_film}}</td>
                <td>{{$f->judul}}</td>
                </tr>
                @endforeach

            </table>	
            </div>

            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </div>
          </div>
      </div>
  </div>
    @endsection

</body>
</html>