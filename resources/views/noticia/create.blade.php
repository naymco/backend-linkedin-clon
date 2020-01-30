@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

<div class="card">
    <div class="card-header">Subir nueva noticia</div>

        <div class="card-body">

        <form method="POST" action="{{ route('noticia.save') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                <label for="image_path"class="col-md-4 col-form-label text-md-right">Imagen </label>
                <div class="col-md-7">
                <input id="image_path" type="file" name="image_path" class="form-control" {{ $errors->has ('image_path') ? 'is-invalid' :'' }} />

                @if($errors->has('image_path'))
                <span class="invalid-feedback" rol="alert">
                <strong>{{$errors->first('image_path')}}</strong>
                @endif
            </div>
          </div>
          <div class="form-group row">
                <label for="description"class="col-md-4 col-form-label text-md-right">Descripción </label>
                <div class="col-md-7">
                <textarea id="description"  name="description" class="form-control" {{ $errors->has ('description') ? 'is-invalid' :'' }}> </textarea>

                @if($errors->has('description'));
                <span class="invalid-feedback" rol="alert">
                <strong>{{$errors->first('description')}}</strong>
                </span>
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
