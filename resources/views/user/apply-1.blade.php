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
<form enctype="multipart/form-data" action="{{ route('user.apply.1.put') }}" method="POST">
    @method('PUT')
    @csrf
    <input type="hidden" name="id" value="{{ Auth::guard('users')->user()->id }}">
    <hr class="my-4" />
    <h6 class="heading-small text-muted mb-4">Tahap 1 Dokumen</h6>
    <div class="pl-lg-4">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label" for="input-username">Pilihan Pekerjaan</label> 
                    <input type="text" id="input-username" class="form-control" name="pilihan_pekerjaan">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label" for="input-username">Nama Pekerjaan</label>
                    <input type="text" id="input-username" class="form-control" name="nama_pekerjaan">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label" for="input-username">File RAB</label>
                    <input type="file" id="input-username" class="form-control" name="file_rab">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label" for="input-username">File TOR/SOW</label>
                    <input type="file" id="input-username" class="form-control" name="file_tor_sw">
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