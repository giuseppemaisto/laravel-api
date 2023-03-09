@extends('layouts.admin')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between">
                <div>
                    <h1>categorie</h1>
                </div>
                <div class="my-2">
                    <a href="{{ route('admin.types.create')}}" class="btn btn-primary">aggiungi categoria</a>
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
                    <th><strong>nome</strong></th>
                    <th><strong>slug</strong></th>
                    <th><strong>progetti</strong></th>
                    <th><strong>azioni</strong></th>
                </thead>
                <tbody>
                    @foreach($types as $type)
                    <tr>
                        <td>{{$type->id}}</td>
                        <td>{{$type->name}}</td>
                        <td>{{$type->slug}}</td>
                        <td>{{count($type->posts)}}</td>
                        <td class="d-flex ">
                            <a href="{{ route('admin.types.show', $type->slug)}}" class="btn btn-square btn-primary"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('admin.types.edit', $type->slug)}}" title="visualizza dettaglio" class="btn btn-square btn-warning mx-2"><i class="fas fa-edit"></i></a>

                            <form action="{{route('admin.types.destroy', $type->slug)}}" method="POST">
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