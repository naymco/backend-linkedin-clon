@if (session('message'))
    <div class="alert alert-success">
        {{session('message')}}
@endif