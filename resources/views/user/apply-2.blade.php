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
<form enctype="multipart/form-data" action="{{ route('user.apply.2.put', ['pekerjaan_id' => $pekerjaan_id]) }}" method="POST">
    @method('PUT')
    @csrf
    <input type="hidden" name="id" value="{{ Auth::guard('users')->user()->id }}">
    <input type="hidden" name="pekerjaan_id" value="{{ $pekerjaan_id }}">
    <hr class="my-4" />
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
    <div class="pl-pg-12">
        <div class="form-group">
            <div class="row" style="justify-content: center;">
                <button class="btn btn-success" type="submit">Save</button>
            </div>
        </div>
    <div>
</form>
@endsection