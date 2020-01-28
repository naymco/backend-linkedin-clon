@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

<div class="card">
    <div class="card-header">Subir nueva noticia</div>
        
        <div class="card-body">

        <form method="POST" action="" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                <label for="image"class="col-md-4 col-form-label text-md-right">Imagen </label>
                <div class="col-md-7">
                <input id="image" type="file" name="image" class="form-control" />

                @if($errors->has('image'));
                <span class="invalid-feedback" rol="alert">
                <strong>{{$errors->first('image')}}</strong>
                @endif
            </div>
          </div>
          <div class="form-group row">
                <label for="description"class="col-md-4 col-form-label text-md-right">Descripción </label>
                <div class="col-md-7">
                <textarea id="description"  name="description" class="form-control" > </textarea>

                @if($errors->has('description'));
                <span class="invalid-feedback" rol="alert">
                <strong>{{$errors->first('description')}}</strong>
                @endif
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-6 offset-md-4">

                <input type="submit" class="btn btn-primary" value="Subir noticia" />

            </div>
          </div>

        </form>

      </div>
    </div>
</div>
@endsection