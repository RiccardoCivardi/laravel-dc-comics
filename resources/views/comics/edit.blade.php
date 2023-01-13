@extends('layouts.main')

@section('content')

    <h1>MODIFICA FUMETTO</h1>

    {{-- <form action="{{route('comics.destroy', $comic)}}" method="POST" class="d-inline"
        onsubmit="return confirm('Confermi l\'eliminazione di {{$comic->title}}')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" title="trash"><i class="fa-regular fa-trash-can"></i></button>
    </form> --}}

    @include('partials.form-delete', ['title'=>$comic->title, 'id'=>$comic->id])

    {{-- Il form punta ad update e usa il metodo POST ma devo aggiungere il comando blade @methods('PUT') --}}
    <form action="{{route('comics.update', $comic)}}" method="POST">
        <!-- Token per il form, lo vedo nell'inspector nell html -->
        @csrf
        @method('PUT');
        <!-- ogni input deve avere un name che deve corrispondere al campo da salvare nel db-->
        <div class="mb-3">
            <label for="title" class="form-label">Titolo *</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{old('title', $comic->title)}}" placeholder="Inserisci il titolo">
            @error('title')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Inserisci la descrizione" row="3">{{old('description', $comic->description)}}</textarea>
            @error('description')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="thumb" class="form-label">Immagine *</label>
            <input type="text" name="thumb" class="form-control @error('thumb') is-invalid @enderror" id="thumb" value="{{old('thumb', $comic->thumb)}}"  placeholder="Inserisci la URL dell'immagine">
            @error('thumb')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Prezzo *</label>
            <input type="float" name="price" class="form-control @error('price') is-invalid @enderror" id="price" value="{{old('price', $comic->price)}}"  placeholder="Inserisci il prezzo">
            @error('price')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="series" class="form-label">Serie *</label>
            <input type="text" name="series" class="form-control @error('series') is-invalid @enderror" id="series" value="{{old('series', $comic->series)}}"  placeholder="Inserisci la serie">
            @error('series')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="sale_date" class="form-label">Data d'uscita *</label>
            <input type="text" name="sale_date" class="form-control @error('sale_date') is-invalid @enderror" id="sale_date" value="{{old('sale_date', $comic->sale_date)}}"  placeholder="Inserisci la data d'uscita (yyyy-mm-dd)">
            @error('sale_date')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Tipo</label>
            <input type="text" name="type" class="form-control @error('type') is-invalid @enderror" id="type" value="{{old('type', $comic->type)}}"  placeholder="Inserisci il tipo">
            @error('type')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Invia</button>
    </form>

@endsection

@section('title')

    | comics-create

@endsection
