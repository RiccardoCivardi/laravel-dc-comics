@extends('layouts.main')

@section('content')

    <h1>DETTAGLIO FUMETTO</h1>

    <h4>{{$comic_detail->id}}</h4>
    <h3>{{$comic_detail->title}}</h3>
    <h4>{{$comic_detail->price}}</h4>
    <img src="{{$comic_detail->thumb}}" alt="{{$comic_detail->title}}">
    <p>{{$comic_detail->description}}</p>
    <h5>{{$comic_detail->series}}</h5>
    <h5>{{$comic_detail->sale_date}}</h5>

@endsection

@section('title')

    | comics-show

@endsection
