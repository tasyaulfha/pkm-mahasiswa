@extends('layouts.mahasiswa')

@section('content')

<div id="content-wrapper">
    <div class="container-fluid p-4">
        <a href=""><i class="fas fa-chevron-circle-left"></i> Kembali</a>
        <h5 class="mb-3 font-weight-bold" style="color: #093697">
            Formulir Pendaftaran Lomba
        </h5>
        <div class="card">
            <div class="card-body">
                <small class="text-main font-weight-bold">Data Diri</small>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" value="" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">NIM</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" value="" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No HP</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">+62</span>
                            </div>
                            <input type="number" class="form-control" value="" readonly>
                        </div>
                    </div>
                </div>

                <hr>
                <form action="" method="POST">
                    <input type="hidden" name="nim_mhs" value="">
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">Skema <span class="text-danger">*</span>
                            </legend>
                            <div class="col-sm-10">
                                <label>
                                    <input type="radio" class="no_radio" name="skema_lomba" value="Poster" required
                                        checked>
                                    <span class="p-2"><i class="fas fa-pencil-ruler"></i> Desain Poster</span>
                                </label>
                                <label>
                                    <input type="radio" class="no_radio" name="skema_lomba" value="Video" required>
                                    <span class="p-2"><i class="fas fa-video"></i> Video </span>
                                </label>
                                <label id="foto">
                                    <input type="radio" class="no_radio" name="skema_lomba" value="Foto" required>
                                    <span class="p-2"><i class="fas fa-camera"></i> Foto</span>
                                </label>
                            </div>
                        </div>
                    </fieldset>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">URL Karya <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-link"></i></span>
                                </div>
                                <input type="text" class="form-control" name="url_lomba"
                                    placeholder="https://www.instagram.com/...." pattern="https?://.+" required>
                            </div>
                            <small class="text-muted">
                                *Silahkan unggah karya ke <b>Instagram</b> sesuai <a
                                    href="https://kemahasiswaan.uii.ac.id/stufest/competition/" target="blank">panduan
                                    lomba</a>, copy dan paste URL <i>Postingan</i> tersebut (Bukan URL
                                Intagram).</small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-main">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
