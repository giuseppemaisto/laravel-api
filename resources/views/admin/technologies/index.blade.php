@extends('layouts.admin')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between">
                <div>
                    <h1>elenco tecnologie</h1>
                </div>
                <div class="my-2">
                    <a href="" class="btn btn-primary">aggiungi progetto</a>
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
                    <th><strong>azioni</strong></th>
                </thead>
                <tbody>
                    @foreach($technologies as $technology)
                    <tr>
                        <td>{{$technology->id}}</td>
                        <td>{{$technology->name}}</td>
                        <td>{{$technology->slug}}</td>
                        <td class="d-flex justify-content-between">
                           
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection