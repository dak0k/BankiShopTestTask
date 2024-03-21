
@extends('layouts.app')
@section('styles')
    
<style>
    html, body {
        height: 100%;
    }
    .form{
        max-width: 330px;
        padding: 1rem;
    }
    body{
        display: flex;
    flex-direction: column;
    }
</style>
@endsection
@section('content')

    <main class="form w-100 m-auto">
        <h3>Image Upload</h3>
        <form action="{{ route('upload.images') }}" method="post" enctype="multipart/form-data" >
            @csrf
            <div>
                <label for="images" class="mb-2">Choose images</label>
                <input type="file" name="images[]" class="form-control" id="images" multiple> 
            </div>
            <button type="submit" class="btn w-100 btn-primary mt-4">Upload</button>
        </form>
    </main>


@endsection