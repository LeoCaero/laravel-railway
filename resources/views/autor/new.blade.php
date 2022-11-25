@extends('layout')

@section('title', 'Nou Autor')

@section('stylesheets')
@parent
@endsection

@section('content')
<h1>Nou Autor</h1>
<a href="{{ route('autor_list') }}">&laquo; Torna</a>
<div style="margin-top: 20px">
    <form method="POST" action="{{ route('autor_new') }}" enctype="multipart/form-data">
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
            <input type="text" name="nom" value="{{ old('nom') }}" />
        </div>
        <div>
            <label for="cognoms">Cognoms</label>
            <input type="text" name="cognoms" value="{{ old('cognoms') }}" />
        </div>
        <div>
            <label for="imatge">Imatge</label>
            <input type="file" name="imatge" value="" />
        </div>
        <button type="submit">Crear Autor</button>
    </form>
</div>
@endsection