@extends('layouts.admin')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>aggiungi nuova categoria</h1>
        </div>
        <div class="col-12">
            <form action="{{ route('admin.types.store')}} " method="POST">
                @csrf
                <div class="form-group my-3">
                    <label class="control-label">
                        nome categoria
                    </label>
                    <input type="text" class="form-control" placeholder="inserisci nuova categoria" id="name" name="name">
                </div>

                <div class="form-group my-3">
                  <button type="submit" class="btn btn-success">SALVA</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
