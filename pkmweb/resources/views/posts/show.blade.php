@extends('layouts.mahasiswa')

@section('content')
<div id="content-wrapper">
    <div class="container-fluid p-4">
        <?php
      if(!empty($_GET['pesan'])){
          error_reporting(0);
          echo "<div ";
          if($_GET['pesan'] == "gagal"){
              echo "class='alert alert-danger'>Maaf, <i>update</i> profil <b>gagal</b>. Silahkan coba beberapa saat lagi !!";
          }
          elseif($_GET['pesan'] == "sukses"){
              echo "class='alert alert-success'>Selamat, <i>update</i> profil <b>sukses</b>";
          }
          elseif($_GET['pesan'] == "lengkapi"){
              echo "class='alert alert-primary'>Silahkan lengkapi data diri dan data no rekening sebelum melanjutkan";
          }?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
      }
      ?>

    <div class="card">
        <div class="card-body">

            <?php if (!empty($simbelmawa['akun_simbelmawa'])) {?>
            <small class="text-main font-weight-bold">Akun SIMBELMAWA</small><br>
            <p>Silahkan akses <a href="https://simbelmawa.kemdikbud.go.id/postal">simbelmawa.kemdikbud.go.id <i
                        class="fas fa-external-link-alt"></i></a> gunakan username
                <?php echo $simbelmawa['akun_simbelmawa'] ?> dan password <?php echo $simbelmawa['pass_simbelmawa'] ?>
            </p>
            <hr>
            <?php } ?>

            <small class="text-main font-weight-bold">Data Diri</small>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-sm" value="{{ Auth::user()->name }}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control form-control-sm" value="{{ Auth::user()->email }}"
                        name="email" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-sm" value="{{ Auth::user()->nim }}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Program Studi</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control form-control-sm" value="{{ Auth::user()->prodi }}"
                        name="email" readonly>
                </div>
                <div class="col-sm-5">
                    <input type="text" class="form-control form-control-sm" value="{{ Auth::user()->fakultas }}"
                        name="email" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">No HP </label>
                <div class="col-sm-10">
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">+62</span>
                        </div>

                        <input type="number" class="form-control" name="no_hp" placeholder="812xx" required>
                    </div>
                </div>
            </div>

            <small class="text-main font-weight-bold">Data Rekening Bank</small>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Nama Bank</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-sm" value="{{ $users->bank }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">No Rekening</label>
                <div class="col-sm-10">

                    <input type="text" class="form-control form-control-sm" value="{{ $users->no_rek }}">

                </div>
            </div>

            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">a.n Rekening</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-sm" value="{{ $users->an_rek }}">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
