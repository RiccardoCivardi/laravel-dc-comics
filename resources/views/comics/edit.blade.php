@extends('layouts.main')

@section('content')

    <h1>MODIFICA FUMETTO</h1>

    {{-- Il form punta ad update e usa il metodo POST ma devo aggiungere il comando blade @methods('PUT') --}}
    <form action="{{route('comics.update', $comic)}}" method="POST">
        <!-- Token per il form, lo vedo nell'inspector nell html -->
        @csrf
        @method('PUT');
        <!-- ogni input deve avere un name che deve corrispondere al campo da salvare nel db-->
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" name="title" class="form-control" id="title" value="{{$comic->title}}" placeholder="Inserisci il titolo">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea name="description" class="form-control" id="description" placeholder="Inserisci la descrizione" row="3">{{$comic->description}}</textarea>
        </div>

        <div class="mb-3">
            <label for="thumb" class="form-label">Immagine</label>
            <input type="text" name="thumb" class="form-control" id="thumb" value="{{$comic->thumb}}" placeholder="Inserisci la URL dell'immagine">
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="float" name="price" class="form-control" id="price" value="{{$comic->price}}" placeholder="Inserisci il prezzo">
        </div>

        <div class="mb-3">
            <label for="series" class="form-label">Serie</label>
            <input type="text" name="series" class="form-control" id="series" value="{{$comic->series}}" placeholder="Inserisci la serie">
        </div>

        <div class="mb-3">
            <label for="sale_date" class="form-label">Data d'uscita</label>
            <input type="text" name="sale_date" class="form-control" id="sale_date" value="{{$comic->sale_date}}" placeholder="Inserisci la data d'uscita (yyyy-mm-dd)">
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Tipo</label>
            <input type="text" name="type" class="form-control" id="type" value="{{$comic->type}}" placeholder="Inserisci il tipo">
        </div>

        <button type="submit" class="btn btn-primary">Invia</button>

    </form>

@endsection

@section('title')

    | comics-create

@endsection