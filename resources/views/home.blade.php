@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @include('includes.message')
        @foreach($images as $image)
            <div class="card pub_image">
                <div class="card-header">
                @if($image->user->image)
                <div class="container-avatar">
                     <img src="{{ route ('user.avatar',['filename'=>$image->user->image]) }}" class="avatar"/>
                 </div>
                 @endif
                 <div class="data-user">
                   <a href="{{ route('noticia.detail',['id'=> $image->id]) }}">
                {{$image->user->name.' '.$image->user->surname.' | @'.$image->user->nickname}}
                   </a>
                </div>
                   <div class="card-body">
                    <div class="image-container">
                       <img src="{{route('noticia.file',['filename'=>$image->image_path])}}"/>
                   </div>

                <div class="description">

               <span class="nickname"> {{'@'.$image->user->name}} </span>
                    <span class="nickname date"> {{'| '.$image->created_at}} </span>
                    <p>{{$image->description}}</p>
                  </div>

                  <div class="likes">
                       <img src="{{asset('img/heart-black.png')}}" />
                </div>
                  <div class="comments">
                   <a href="" class="btn btn-sm btn-warning btn-comments">
                    Comentarios ({{count($image->comments)}})
                  </a>
                     </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
