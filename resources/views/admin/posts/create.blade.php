@extends('layouts.admin')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>aggiungi nuovo progetto</h1>
        </div>
        <div class="col-12">
            <form action="{{ route('admin.posts.store')}} " method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group my-3">
                    <label class="control-label">
                        Titolo
                    </label>
                    <input type="text" class="form-control" placeholder="inserisci titolo progetto" id="title" name="title">
                </div>

                <div class="form-group my-3">
                    <label class="control-label">immagine</label>
                    <input type="file" name="cover_image" id="cover_image" class="form-control @error('cover_image')is-invalid @enderror">
                </div>

                <div class="form-group my-3">
                    <label class="control-label">
                        Linguaggio
                    </label>
                    <input type="text" class="form-control" placeholder="inserisci linguaggio di  programmazione" id="language" name="language">
                </div>

                <div class="form-group my-3">
                    <label class="control-label">
                        Categoria
                    </label>
                    <select name="type_id" id="type_id">
                        @foreach($types as $type)
                        <option value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                    </select>
                
                </div>

                <div class="form-group my-3">
                    <label class="control-label">
                        Tecnologie
                    </label>
                  @foreach($technologies as $technology)
                    <input class="mx-2" type="checkbox" value="{{$technology->id}}" name="technologies[]">
                    <label class="form-check-label">{{$technology->name}}</label>
                  @endforeach
                
                </div>
                

                <div class="form-group my-3">
                    <label class="control-label">
                        Descrizione
                    </label>
                    <textarea type="text" class="form-control" placeholder="inserisci descrizione del progetto" id="description" name="description"></textarea>
                </div>

                <div class="form-group my-3">
                  <button type="submit" class="btn btn-success">SALVA</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
