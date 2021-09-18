@extends('layouts.admin')


@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Skema PKM</h1>
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
            <form action="{{route ('skema.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="skema">Skema</label>
                    <input type="text" class="form-control" name="skema" placeholder="Skema" value="{{old('skema')}}">
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    Simpan  
                </button>
            </form>
        </div>
    </div>
</div>

@endsection