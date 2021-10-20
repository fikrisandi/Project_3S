@extends('user.layout')

@section('nav')
@include('user.nav', ['active' => 'user.pekerjaan.index', 'name' => 'Dashboard'])
<!-- active berisi routing yang sedang digunakan -->
<!-- name berisi nama page yang sedang dibuka -->
@endsection

@section('header')
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{ __('Dashboard') }}
</h2>
@endsection

@section('content')
<form class="form container" enctype="multipart/form-data" action="{{ route('update-pekerjaan.put') }}" method="POST">
    @method('PUT')
    @csrf
    <input type="hidden" name="id" value="{{ Auth::guard('users')->user()->id }}">
    <input type="hidden" name="id_pekerjaan" value="{{ $pekerjaan->id }}">
    <hr class="my-4" />
    <h6 class="heading-small text-muted mb-4">Tahap 1 Dokumen</h6>
    <div class="pl-lg-4">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label" for="input-username">Pilihan Pekerjaan</label>
                    <input type="text" id="input-username" class="form-control" name="pilihan_pekerjaan"
                        value="{{ $pekerjaan->pilihan_pekerjaan }}">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label" for="input-username">Nama Pekerjaan</label>
                    <input type="text" id="input-username" class="form-control" name="nama_pekerjaan"
                        value="{{ $pekerjaan->nama_pekerjaan }}">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label" for="input-username">File RAB</label>
                    <div class="d-flex justify-content-around">
                        <a href="{{ $pekerjaan->file_rab }}">FILE RAB lama</a>
                        <button type="button" id="btn-del-file-rab" class="btn btn-danger">hapus</button>
                    </div>
                    <input id="input_del_file_rab" type="hidden" name="input_del_file_rab">
                    <input type="file" id="input-username" class="form-control" name="file_rab">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label" for="input-username">File TOR/SOW</label>
                    <div class="d-flex justify-content-around">
                        <a href="{{ $pekerjaan->file_tor_sw }}">FILE TOR lama</a>
                        <button type="button" id="btn-del-file-tor" class="btn btn-danger">hapus</button>
                    </div>
                    <input id="input_del_file_tor" type="hidden" name="input_del_file_tor">
                    <input type="file" id="input-username" class="form-control" name="file_tor_sw">
                </div>
            </div>
        </div>
    </div>

    <h6 class="heading-small text-muted mb-4">Tahap 2 Meet</h6>
    <div class="pl-lg-4">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label" for="input-username">Meet Pengajuan Jadwal</label>
                    <input type="text" id="input-username" class="form-control" name="meet_pengajuan_jadwal">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label" for="input-username">Meet Pengajuan Link</label>
                    <input type="text" id="input-username" class="form-control" name="meet_pengajuan_link">
                </div>
            </div>
        </div>
    </div>

    <h6 class="heading-small text-muted mb-4">Tahap 3 Pembayaran</h6>
    <div class="pl-lg-4">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label" for="input-username">Pembayaran Total</label>
                    <input type="text" id="input-username" class="form-control" name="pembayaran_total"
                        value="{{ $pekerjaan->pembayaran_total }}">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label" for="input-username">Pembayaran DP</label>
                    <input type="text" id="input-username" class="form-control" name="pembayaran_dp"
                    value="{{ $pekerjaan->pembayaran_dp}}">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label" for="input-username">Pembayaran DP Bukti</label>
                    <div class="d-flex justify-content-around">
                        <a href="{{ $pekerjaan->pembayaran_dp_bukti}}">Pembayaran DP Bukti</a>
                        <button type="button" id="btn-del-file-dp-bukti" class="btn btn-danger">hapus</button>
                    </div>
                    <input id="input_del_file_tor" type="hidden" name="input_del_file_dp_bukti">
                    <input type="file" id="input-username" class="form-control" name="pembayaran_dp_bukti">
                </div>
            </div>
        </div>
    </div>
    <h6 class="heading-small text-muted mb-4">Tahap 4 Akhir</h6>
    <div class="pl-lg-4">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label" for="input-username">Download Report Pekerjaan</label>
                    <div class="d-flex justify-content-around">
                        <a href="{{ $pekerjaan->file_laporan}}">Download Report Pekerjaan</a>
                        <button type="button" id="btn-del-file-laporan" class="btn btn-danger">hapus</button>
                    </div>
                    <input id="input_del_file_laporan" type="hidden" name="input_del_file_laporan">
                    <input type="file" id="input-username" class="form-control" name="file_laporan">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label" for="input-username">Pembayaran Sisa Bukti</label>
                    <div class="d-flex justify-content-around">
                        <a href="{{ $pekerjaan->pembayaran_sisa_bukti}}">Pembayaran Sisa Bukti</a>
                        <button type="button" id="btn-del-sisa-bukti" class="btn btn-danger">hapus</button>
                    </div>
                    <input id="input_del_sisa_bukti" type="hidden" name="input_del_sisa_bukti">
                    <input type="file" id="input-username" class="form-control" name="pembayaran_sisa_bukti">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label" for="input-username">Meet Pelaporan Jadwal</label>
                    <input type="text" id="input-username" class="form-control" name="meet_pelaporan_jadwal">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label" for="input-username">Meet Pelaporan Link</label>
                    <input type="text" id="input-username" class="form-control" name="meet_pelaporan_link">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label" for="input-username">Tarif Sisa</label>
                    <input type="text" id="input-username" class="form-control" name="pembayaran_sisa"
                        value="{{ $pekerjaan->pilihan_pembayaran_sisa }}">
                </div>
            </div>
        </div>
    </div>
    <div class="pl-pg-12">
        <div class="form-group">
            <div class="row" style="justify-content: center;">
                <button class="btn btn-success" type="submit">Save</button>
            </div>
        </div>
    </div>
</form>
@endsection

@section('script')
<script>
    // const edit_del = document.querySelectorAll('#btn-del-file-rab');
    // edit_del.forEach(btn => { //handler tombol komen
    //     btn.addEventListener('click', (e) => {
    //         const input = document.getElementById('input_del_file_rab');
    //         console.log('test');
    //         // input.value = true;
    //     })
    // });

    document.getElementById("btn-del-file-rab").addEventListener("click", function () {
        const input = document.getElementById('input_del_file_rab');
        // console.log('test');
        input.value = "1";
    });

    document.getElementById("btn-del-file-tor").addEventListener("click", function () {
        const input = document.getElementById('input_del_file_tor');
        // console.log('test');
        input.value = "1";
    });

    document.getElementById("btn-del-file-dp-bukti").addEventListener("click", function () {
        const input = document.getElementById('input_del_file_dp_bukti');
        // console.log('test');
        input.value = "1";
    });

    document.getElementById("btn-del-file-laporan").addEventListener("click", function () {
        const input = document.getElementById('input_del_file_laporan');
        // console.log('test');
        input.value = "1";
    });

    document.getElementById("btn-del-sisa-bukti").addEventListener("click", function () {
        const input = document.getElementById('input_del_sisa_bukti');
        // console.log('test');
        input.value = "1";
    });

</script>
@endsection
