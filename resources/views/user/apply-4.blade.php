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
<form enctype="multipart/form-data" action="{{ route('user.apply.4.put', ['pekerjaan_id' => $pekerjaan_id]) }}" method="POST">
    @method('PUT')
    @csrf
    <input type="hidden" name="id" value="{{ Auth::guard('users')->user()->id }}">
    <input type="hidden" name="pekerjaan_id" value="{{ $pekerjaan_id }}">
    <hr class="my-4" />
    <h6 class="heading-small text-muted mb-4">Tahap 4 Akhir</h6>
    <div class="pl-lg-4">
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group"></div>
                    <label class="form-control-label" for="input-username">Tarif Sisa</label>
                    <input type="text" id="input-username" class="form-control" name="pembayaran_sisa">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label" for="input-username">Pembayaran Sisa Bukti</label>
                    <input type="file" id="input-username" class="form-control" name="pembayaran_sisa_bukti" >
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label" for="input-username">Download Report Pekerjaan</label>
                    <input type="file" id="input-username" class="form-control" name="file_laporan" >
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label" for="input-username">Meet Pelaporan Jadwal</label>
                    <input type="text" id="input-username" class="form-control" name="meet_pelaporan_jadwal" >
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label" for="input-username">Meet Pelaporan Link</label>
                    <input type="text" id="input-username" class="form-control" name="meet_pelaporan_link" >
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
    <div>
</form>
@endsection