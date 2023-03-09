@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-between my-2">
                <div>
                    <h2>dettaglio: {{ $type->name }}</h2>
                </div>
                <div>
                    <a href="{{route('admin.types.index')}}" class="btn btn-primary">torna alle categorie</a>
                </div>
               
            </div>

            <div class="col-12">
               <p><strong>slug</strong>: {{$type->slug}}</p>
            </div>
            <div class="col-12 ">
                <h2>progetti appartenenti a questa categoria </h2>
                {{count($type->posts)}}
                <hr>
                <div class="row mt-5 d-flex ">
                    @forelse($type->posts as $post)
                    <div class="col-4 py-2">
                        <div class="card p-3">
                            <h5>{{ $post->title}}</h5>
                            <p>{{$post->description}}</p>
                            <a class="btn btn-primary" href="{{ route('admin.posts.show', $post->slug)}}"> continua a leggere</a>
                        </div>
                    </div>
                    @empty
                    <h2>non ci sono progetti in questa categoria</h2>
                    @endforelse
                </div>
            </div>

            
        </div>
    </div>

@endsection