@extends('layouts.main')

@section('content')

    <h1>ELENCO FUMETTI</h1>

    <a class="btn btn-success" href="{{route('comics.create')}}">Crea un nuovo fumetto</a>

    @if (session('deleted'))
        <div class="alert alert-success" role="alert">
            {{session('deleted')}}
        </div>
    @endif


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

                    <a class="btn btn-warning" href="{{route('comics.edit', $comic)}}" title="edit"><i class="fa-solid fa-pen"></i></a>

                    {{-- <form action="{{route('comics.destroy', $comic)}}" method="POST" class="d-inline"
                        onsubmit="return confirm('Confermi l\'eliminazione di {{$comic->title}}')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" title="trash"><i class="fa-regular fa-trash-can"></i></button>
                    </form> --}}

                    @include('partials.form-delete', ['title'=>$comic->title, 'id'=>$comic->id])

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
