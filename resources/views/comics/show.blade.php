@extends('layouts.main')

@section('content')

    <h1>DETTAGLIO FUMETTO</h1>

    <h4>{{$comic->id}}</h4>
    <h3>{{$comic->title}}</h3>
    <h4>{{$comic->price}}</h4>
    <img src="{{$comic->thumb}}" alt="{{$comic->title}}">
    <p>{{$comic->description}}</p>
    <h5>{{$comic->series}}</h5>
    <h5>{{$comic->sale_date}}</h5>

    <a class="btn btn-primary" href="{{route('comics.index')}}">TORNA ALLA HOME</a>

@endsection

@section('title')

    | comics-show

@endsection
