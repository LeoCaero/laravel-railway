@extends('layout')

@section('title', 'Nou Llibre')

@section('stylesheets')
@parent
@endsection

@section('content')
<h1>Edició de '{{$llibre->titol}}'</h1>
<a href="{{ route('llibre_list') }}">&laquo; Torna</a>
<div style="margin-top: 20px">
    <form method="POST" action="{{ route('llibre_edit', ['id' => $llibre->id]) }}">
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
            <label for="titol">Títol</label>
            <input type="text" name="titol" value="{{ $llibre->titol }}" />
        </div>
        <div>
            <label for="dataP">Data de publicació</label>
            <input type="date" name="dataP" value="{{ $llibre->dataP }}" />
        </div>
        <div>
            <label for="vendes">Vendes</label>
            <input type="number" name="vendes" value="{{ $llibre->vendes }}" />
        </div>
        <div>
            <label for="autor_id">Autor</label>
            <select name="autor_id">
                <option value="">«-- Selecciona un autor --»</option>
                @foreach ($autors as $autor)
                <option value="{{ $autor->id }}" @selected($autor->id == $llibre->autor_id)>{{ $autor->nomCognoms()}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Edita Llibre</button>
    </form>
</div>
@endsection