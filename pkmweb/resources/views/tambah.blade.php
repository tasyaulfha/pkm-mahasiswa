@extends('layouts.mahasiswa')

@section('content')
<div id="content-wrapper">
    <div class="container-fluid p-4">
        <?php
      if(!empty($_GET['pesan'])){
          error_reporting(0);
          echo "<div ";
          if($_GET['pesan'] == "gagal-unggah"){
          echo "class='alert alert-danger'>Maaf, unggah poster <b>gagal</b>, pastikan file lebih kecil dari 1mb!!";
          }
          elseif($_GET['pesan'] == "sukses"){
              echo "class='alert alert-success'>Selamat, pendaftaran usulan <b>sukses</b>";
          }?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
      }
      ?>
    <a href="{{ url('mahasiswa.internal') }}"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
    <h5 class="mb-3 font-weight-bold" style="color: #093697">
        Tambah Usulan
    </h5>
    <div class="card">
        <div class="card-body">
            <small class="text-main font-weight-bold">Data Ketua</small>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-sm" value="{{ Auth::user()->name }}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-sm" value="{{ Auth::user()->nim }}" readonly>
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

            <small class="text-main font-weight-bold">Data Anggota & Dosen</small>
            <div class="form-group row">
                <label class="col-form-label col-sm-2" style="color: black">Anggota<span
                        style="color: red">*</span></label>
                <div class="col-sm-5">
                    <div class="input-group input-group-sm">
                        <input type="number" class="form-control" id="nim" name="anggota"
                            placeholder="No Induk Mahasiswa">
                        <div class="input-group-prepend">
                            <button class="btn btn-primary btn-sm" id="btn">
                                <i class="fas fa-search"></i> Cek!
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">
                </div>
                <div class="col-sm-10">
                    <small>Sebelum mendaftar, pastikan seluruh NIM anggota sudah terdaftar di sistem PKM Corner UII
                        <b><a href="{{ url('mahasiswa.daftar') }}" target="blank">(Daftar disini)</a></b></small>
                    <br><br>
                    <table class="table table-sm">
                        <thead>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Aksi</th>
                        </thead>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </table>
                </div>
            </div>

            {{-- <script type="text/javascript">
                $(document).ready(function(){
                  $("#btn").click(function(){
                      $.ajax({
                          type: "POST",
                          url: "<?php echo base_url('crud/tambah/tim') ?>",
                          data: {
                              nim: $("#nim").val()
                          }
                      })
                      .done(function(msg) {
                          $("input[type=text], input[type=password]").val("");
                          $("#output").after(msg).hide().appendTo('#output').fadeTo(2000, 1);
                      });
                  });

                  $(document).ready(function(){
                      $("#btn_cancel").click(function(){
                          $("input[type=text], input[type=password]").val("");
                          $("#cancel").html('');
                      });
                  });
              });
            </script> --}}


            <div class="form-group row">
                <label class="col-form-label col-sm-2" style="color: black">NIDN Dosen<span
                        style="color: red">*</span></label>
                <div class="col-sm-5">
                    <div class="input-group input-group-sm">
                        <input type="number" class="form-control" id="nim" name="nidn_dosen"
                            placeholder="No Induk Dosen Nasional (NIDN)">
                        <div class="input-group-prepend">
                            <button class="btn btn-primary btn-sm" id="btn">
                                <i class="fas fa-search"></i> Cek!
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <input type="text" class="form-control form-control-sm" placeholder="Judul usulan"
                        name="judul_usulan" readonly="">
                </div>
            </div>

            <form action="crud/tambah/usulan" method="POST">

                <small class="text-main font-weight-bold">Data Usulan</small>
                <input type="hidden" name="nim_mhs" value="">
                <input type="hidden" name="id_tim" value="">
                <input type="hidden" name="nidn_dosen" value="">

                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Judul Usulan <span
                            class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" placeholder="Judul usulan"
                            name="judul_usulan">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-sm-2" style="color: black">Skema PKM<span
                            style="color: red">*</span></label>
                    <div class="col-sm-10">
                        <div class="input-group-icon mt-10">
                            <div class="form-select">
                                <select class="custom-select custom-select-sm" name="skema_usulan" required>
                                    <option value="">Skema PKM</option>
                                    <option value="PKM T">PKM T</option>
                                    <option value="PKM K">PKM K</option>
                                    <option value="PKM M">PKM M</option>
                                    <option value="PKM PE">PKM PE</option>
                                    <option value="PKM KC">PKM KC</option>
                                    <option value="PKM AI">PKM AI</option>
                                    <option value="PKM GT">PKM GT</option>
                                    <option value="PKM PSH">PKM PSH</option>
                                    <option value="PKM GFK">PKM GFK</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Abstrak<span
                            class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <textarea class="form-control form-control-sm" rows="5"
                            placeholder="Ringkasan gagasan utama usulan" name="abstrak"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Link Proposal<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-link"></i></span>
                            </div>
                            <input type="text" class="form-control" name="url_usulan"
                                placeholder="Link Proposal (https://drive.google.com/.....)" pattern="https?://.+">
                        </div>
                        <small class="text-muted">*Proposal silahkan di unggah ke Google Drive, Pilih berbagi, copy URL
                            dan Paste ke kolom diatas. <b><i><a href="dokumen/link-google-drive.pdf"
                                        target="black">Panduan Selengkapnya..</a></i></b></small>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>
</div>
@endsection
