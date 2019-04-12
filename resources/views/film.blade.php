@extends('master.app')
<<!DOCTYPE html>
<html>
<head>
</head>
<body>

    @section('content')

    <table>
        <tr>
            <td>ID</td>
            <td>Judul</td>
        </tr>
        @foreach($f as $film)
        <tr>
            <td>{{$film->id_film}}</td>
            <td>{{$film->judul}}</td>
        </tr>
        @endforeach
    </table>

    @endsection
    
</body>
</html>
