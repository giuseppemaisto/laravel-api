@extends('layouts.admin')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between">
                <div>
                    <h1>elenco progetti</h1>
                </div>
                <div class="my-2">
                    <a href="{{ route('admin.posts.create')}}" class="btn btn-primary">aggiungi progetto</a>
                </div>

            </div>
            


        </div>
        <div class="col-12">
            @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
            @endif
            <table class="table table-striped">
                <thead>
                    <th><strong>id</strong></th>
                    <th><strong>titolo</strong></th>
                    <th><strong>linguaggio</strong></th>
                    
                    <th><strong>slug</strong></th>
                    <th><strong>azioni</strong></th>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->language}}</td>
                       
                        <td>{{$post->slug}}</td>
                        <td class="d-flex justify-content-between">
                            <a href="{{ route('admin.posts.show', $post->slug)}}" title="visualizza dettaglio" class="btn btn-square btn-primary"><i class="fas fa-eye"></i></a>

                            <a href="{{ route('admin.posts.edit', $post->slug)}}" title="visualizza dettaglio" class="btn btn-square btn-warning mx-2"><i class="fas fa-edit"></i></a>

                            <form action="{{route('admin.posts.destroy', $post->slug)}}" method="POST">
                                @csrf 
                                @method('DELETE')
                                <button class="btn btn-square btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection