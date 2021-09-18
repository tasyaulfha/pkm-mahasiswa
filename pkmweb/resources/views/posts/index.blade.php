@extends('layouts.mahasiswa')

@section('content')
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Tutorial CRUD Laravel 8 untuk Pemula - Ilmucoding.com</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-success" href="{{ route('posts.create') }}"> Create Post</a>
        </div>
    </div>
</div>
@endsection
