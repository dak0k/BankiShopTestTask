@extends('layouts.app')
@section('styles')
    <style>
        a{
            text-decoration: none;
            color: rgb(56, 158, 56);
        }
        a:hover{
            cursor: pointer;
            color: green;
            text-decoration: underline;
        }
        .row div{
            margin-bottom: 24px !important;
        }
    </style>
@endsection
@section('content')
    
   
<div class="container">
    <h1>Image Gallery</h1>
    <div class="row">
        @foreach ($images as $image)
        <div class="col-md-4 col-12">
          
            <div class="card h-100" style="">
                <img src="{{ Storage::url('images/'.$image->filename) }}" alt="{{ $image->filename }}"class="card-img-top" style=" height: auto;">
          
                <div class="card-body">
                  <h5 class="card-title"><a href="{{ Storage::url('images/'.$image->filename) }}">{{ $image->filename }}</a></h5>
                  <p class="card-text">Uploaded at: {{ $image->created_at }}</p>
                  <a href="{{ route('images.download.zip', $image->id) }}" class="btn btn-primary">Download ZIP</a>
                </div>
              </div>
        </div>
    @endforeach
    </div>
  
</div>
@endsection