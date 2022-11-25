@extends('layout')

@section('title', 'Editar Autor')

@section('stylesheets')
@parent
@endsection

@section('content')
<h1>Edició de {{$autor->nomCognoms()}}</h1>
<a href="{{ route('autor_list') }}">&laquo; Torna</a>
<div style="margin-top: 20px">
    <form method="POST" action="{{ route('autor_edit', ['id' => $autor->id]) }}"  enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li style="color: red">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div>
            <label for="nom">Nom</label>
            <input type="text" name="nom" value="{{$autor->nom}}" />
        </div>
        <div>
            <label for="cognoms">Cognoms</label>
            <input type="text" name="cognoms" value="{{$autor->cognoms}}" />
        </div>
        @if ($autor->imatge != null)
        <div>
            <label>Imatge actual: </label>
            <a style="font-weight: bold;">{{$autor->imatge}}</a>
        </div>
        <div>
        <label for="deleteImage">Eliminar imatge? </label>
        <input type="checkbox" name="deleteImage"/>
        </div>
        @endif
        <div>
            <label for="imatge">Imatge</label>
            <input type="file" name="imatge" value=""/>
        </div>
        <button type="submit">Editar Autor</button>
    </form>
</div>
@endsection