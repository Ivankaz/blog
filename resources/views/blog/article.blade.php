@extends('layouts.app')

@section('title', $article->meta_title)
@section('keywords', $article->meta_keywords)
@section('description', $article->meta_description)

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>{{ $article->title }}</h1>
                <p>{!! $article->description !!}</p>
            </div>
        </div>
    </div>

@endsection
