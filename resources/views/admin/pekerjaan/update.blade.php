@extends('admin.dashboard.layout')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{ __('Dashboard') }}
</h2>
@endsection

@section('content')

    <div class="container pb-2" >
        <form enctype="multipart/form-data" action="{{route('pekerjaan.updatePut')}}" method="POST">
            @method('PUT')
            @csrf
            <input type="hidden" value="{{ $pekerjaan->id }}" name="id">
            <hr class="my-4" />
            <h6 class="heading-small text-muted mb-4">Data Pekerjaan</h6>
            <div class="pl-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label" for="input-username">Nama Pekerjaan</label>
                            <input type="text" id="input-username" class="form-control"
                                value="{{ $pekerjaan->nama_pekerjaan }}" name="nama_pekerjaan">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group"></div>
                        <label class="form-control-label" for="input-first-name">Deskripsi</label>
                        <textarea type="text-area" id="input-username"
                            class="form-control" name="deskripsi">{{ $pekerjaan->pekerjaan_kategori->deskripsi }}</textarea>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label" for="input-first-name">User ID</label>
                            <select class="form-control" id="validationDefault04" disabled name="user_id">
                                @foreach($users as $user)
                                <option <?php if($pekerjaan->user->id == $user->id) echo 'selected'?>
                                    value="{{ $user->id }}">{{$user->id}} - {{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label" for="input-email">Status ID</label>
                            <select class="form-control" id="validationDefault04" disabled name="status_id">
                                @foreach($pekerjaan_status as $status)
                                <option <?php if($pekerjaan->pekerjaan_status->id == $status->id) echo 'selected'?>
                                    value="{{ $status->id }}">{{ $status->status }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label" for="input-last-name">Kategori ID</label>
                            <select class="form-control" id="validationDefault04" disabled name="kategori_id">
                                @foreach($pekerjaan_kategori as $kategori)
                                <option <?php if($pekerjaan->pekerjaan_kategori->id == $kategori->id) echo 'selected'?>
                                    value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-4" />
            <!-- Pembayaran -->
            <h6 class="heading-small text-muted mb-4">Pembayaran</h6>
            <div class="pl-lg-4">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label" for="input-address">Pembayaran DP</label>
                            <input type="text" id="input-username" class="form-control" name="pembayaran_dp"
                                value="{{ $pekerjaan->pekerjaan_pembayaran->pembayaran_dp }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label" for="input-city">Sisa Pembayaran DP</label>
                            <input type="text" id="input-username" class="form-control" name="pembayaran_sisa"
                                value="{{ $pekerjaan->pekerjaan_pembayaran->pembayaran_sisa}}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label" for="input-country">Pembayaran Total</label>
                            <input type="text" id="input-username" class="form-control" name="pembayaran_total"
                                value="{{ $pekerjaan->pekerjaan_pembayaran->pembayaran_total }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-country">Bukti DP</label>
                            <input type="text" id="input-username" class="form-control" name="bukti_dp"
                                value="{{ $pekerjaan->pekerjaan_pembayaran->pembayaran_dp_bukti }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-country">Bukti Sisa</label>
                            <input type="text" id="input-username" class="form-control" name="bukti_sisa"
                                value="{{ $pekerjaan->pekerjaan_pembayaran->pembayaran_sisa_bukti }}">
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-4" />
            <!-- MEET -->
            <h6 class="heading-small text-muted mb-4">Meet</h6>
            <div class="pl-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-address">Meet Pengajuan Jadwal</label>
                            <input type="text" id="input-username" class="form-control" name="meet_pengajuan_jadwal"
                                value="{{ $pekerjaan->pekerjaan_meet->meet_pengajuan_jadwal }}" >
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-city">Meet Pengajuan Link</label>
                            <input type="text" id="input-username" class="form-control" name="meet_pengajuan_link"
                                value="{{ $pekerjaan->pekerjaan_meet->meet_pengajuan_link }}" >
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-address">Meet Pelaporan Jadwal</label>
                            <input type="text" id="input-username" class="form-control" name="meet_pelaporan_jadwal"
                                value="{{ $pekerjaan->pekerjaan_meet->meet_pelaporan_jadwal }}" >
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-city">Meet Pelaporan Link</label>
                            <input type="text" id="input-username" class="form-control" name="meet_pelaporan_link"
                                value="{{ $pekerjaan->pekerjaan_meet->meet_pelaporan_link }}">
                        </div>
                    </div>
                </div>   
            </div>
            <div class="pl-pg-12">
            <div class="form-group">
                <div class="row" style="justify-content: space-evenly;">
                    <a href="{{ route('pekerjaan.index')}}" class="btn btn-danger" type="back">Kembali</a>
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
            </div>
        </form>
    </div>

@endsection

<!-- 
$table->string('nama_pekerjaan');
$table->string('file_rab');
$table->string('file_tor_sw');
$table->string('file_laporan');
$table->bigInteger('user_id');
$table->foreign('user_id')->references('id')->on('users');
$table->bigInteger('kategori_id');
$table->foreign('kategori_id')->references('id')->on('pekerjaan_kategori');
$table->bigInteger('status_id');
$table->foreign('status_id')->references('id')->on('pekerjaan_status');
-->
