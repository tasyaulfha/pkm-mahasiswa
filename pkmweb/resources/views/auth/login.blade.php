@extends('layouts.loginregis')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center text-center">
        <div class="col-md-6 align-self-center">
            <div class="card shadow-sm text-center" style="border-radius: 20px;">
                <div class="card-body">
                    <img src="{{ asset('storage/images/logo.png') }}" class="img-responsive"
                        style="width: 250px; height: auto; margin-top: 20px;">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row mb-0">
                            <div class="col justify-content-center">
                                <div>
                                    <h3 style="font-weight:bold; margin-top: 40px;">Silahkan Masuk</h3>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="form-group row mt-5">
                                        <div class="row justify-content-center">
                                            <div class="col-md-12">
                                                <a href="{{ url('/auth/google') }}"
                                                    class="btn btn-danger btn-block rounded-pill"><i
                                                        class="fa fa-google" style="color: #fff;"></i> Login Google</a>
                                            </div>
                                            <small style="text-align: center; margin-top: 20px">Silahkan masuk
                                                menggunakan akun Gmail UII<br>
                                                nim@student.uii.ac.id
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
