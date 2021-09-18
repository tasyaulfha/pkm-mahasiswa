@extends('layouts.admin')


@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Skema PKM {{$item->skema}}</h1>
    </div>


    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error )
            <li> {{$error}}</li>
             @endforeach
        </ul>
    </div>
    @endif
    <div class="card shadow">
        <div class="card-body">
            <form action="{{route ('skema.update', $item->id) }}" method="post">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="skema">Skema</label>
                    <input type="text" class="form-control" name="skema" placeholder="Skema" value="{{ $item->skema }}">
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    Ubah  
                </button>
            </form>
        </div>
    </div>
</div>

@endsection