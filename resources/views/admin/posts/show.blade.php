@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-between my-2">
                <div>
                    <h2>dettaglio: {{ $post->title }}</h2>
                </div>
                <div>
                    <a href="{{route('admin.posts.index')}}" class="btn btn-primary">torna all'elenco</a>
                </div>
               
            </div>

            <div class="col-12">
                <div>
                    <img src="{{ asset('storage/' .$post->cover_image)}}" alt="{{$post->title}}" class="w-50">
                </div>
                
                <strong>Slug:</strong><p>{{$post->slug}}</p>
                <strong>titolo</strong>
                <p>{{$post->title}}</p>
                <strong>linguaggio</strong>
                <p>{{$post->language}}</p>
                <strong>categoria</strong>
                <p>{{$post->type ? $post->type->name : 'nessuna categoria selezionata'}}</p>
                <p><strong>tecnologie</strong>
                @forelse($post->technologies as $technology)
                <p>{{$technology->name}}</p>
                @empty
                <p>nessuna tecnelogia selezionata</p> 
                @endforelse
                </p>
                <strong>descrizione</strong>
                <p>{{$post->description}}</p>
            </div>
        </div>
    </div>
@endsection