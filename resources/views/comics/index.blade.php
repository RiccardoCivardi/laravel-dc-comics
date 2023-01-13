@extends('layouts.main')

@section('content')

    <h1>ELENCO FUMETTI</h1>

    <a class="btn btn-success" href="{{route('comics.create')}}">Crea un nuovo fumetto</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Titolo</th>
                <th scope="col">Prezzo</th>
                <th scope="col">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($comics as $comic)
            <tr>
                <td>{{$comic->id}}</td>
                <td>{{$comic->title}}</td>
                <td>{{$comic->price}}</td>
                <td>
                    <a class="btn btn-primary" href="{{route('comics.show' , $comic)}}" title="show"><i class="fa-solid fa-eye"></i></a>
                </td>
            </tr>
            @empty
                <h3>Non ci sono risultati</h3>
            @endforelse
    </table>
    {{$comics->links()}}


@endsection

@section('title')

    | comics-index

@endsection
