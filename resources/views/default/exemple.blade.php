@extends('layout')

@section('title', 'Pagina exemple')

@section('stylesheets')
    @parent
@endsection

@section('content')
            <h1>UF’s de M7</h1>
  
    <table>
        <thead>
            <tr>
                <th>Codi</th><th>Denominació</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ufs as $uf)
                <tr>
                   <td>{{ $uf->codi }}</td><td>{{ $uf->denominacio }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection