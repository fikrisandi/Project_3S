@extends('admin.dashboard.layout')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{ __('Detail') }}
</h2>
@endsection

@section('content')
<div class="container-fluid">
    <div class="container">
        <form enctype="multipart/form-data" action="{{ route('pekerjaan.updatePut') }}">
            @csrf
            <hr class="my-4" />
            <h6 class="heading-small text-muted mb-4">Data Pekerjaan</h6>
            <div class="pl-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label" for="input-username">Nama Pekerjaan</label>
                            <input type="text" id="input-username" class="form-control"
                                value="{{ $pekerjaan->nama_pekerjaan }}" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group"></div>
                        <label class="form-control-label" for="input-first-name">Deskripsi</label>
                        <textarea disabled type="text-area" id="input-username"
                            class="form-control">{{ $pekerjaan->pekerjaan_kategori->deskripsi }}</textarea>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label" for="input-first-name">User ID</label>
                            <input type="text" id="input-username" class="form-control" disabled
                                value="{{$pekerjaan->user->id}} - {{ $pekerjaan->user->name }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label" for="input-email">Status ID</label>
                            <select class="form-control" id="validationDefault04" disabled>
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
                            <select class="form-control" id="validationDefault04" disabled>
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
                            @foreach($pekerjaan->pekerjaan_pembayaran as $pembayaran)
                            <input type="text" id="input-username" class="form-control"
                                value="{{ $pembayaran->pembayaran_dp }}" disabled>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label" for="input-city">Sisa Pembayaran DP</label>
                            @foreach($pekerjaan->pekerjaan_pembayaran as $pembayaran)
                            <input type="text" id="input-username" class="form-control"
                                value="{{ $pembayaran->pembayaran_sisa}}" disabled>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label" for="input-country">Pembayaran Total</label>
                            @foreach($pekerjaan->pekerjaan_pembayaran as $pembayaran)
                            <input type="text" id="input-username" class="form-control"
                                value="{{ $pembayaran->pembayaran_total }}" disabled>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-country">Bukti DP</label>
                            @foreach($pekerjaan->pekerjaan_pembayaran as $pembayaran)
                            <input type="text" id="input-username" class="form-control"
                                value="{{ $pembayaran->pembayaran_dp_bukti }}" disabled>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-country">Bukti Sisa</label>
                            @foreach($pekerjaan->pekerjaan_pembayaran as $pembayaran)
                            <input type="text" id="input-username" class="form-control"
                                value="{{ $pembayaran->pembayaran_sisa_bukti }}" disabled>
                            @endforeach
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
                            @foreach($pekerjaan->pekerjaan_meet as $meet)
                            <input type="text" id="input-username" class="form-control"
                                value="{{ $meet->meet_pengajuan_jadwal }}" disabled>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-city">Meet Pengajuan Link</label>
                            @foreach($pekerjaan->pekerjaan_meet as $meet)
                            <input type="text" id="input-username" class="form-control"
                                value="{{ $meet->meet_pengajuan_link }}" disabled>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-address">Meet Pelaporan Jadwal</label>
                            @foreach($pekerjaan->pekerjaan_meet as $meet)
                            <input type="text" id="input-username" class="form-control"
                                value="{{ $meet->meet_pelaporan_jadwal }}" disabled>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-city">Meet Pelaporan Link</label>
                            @foreach($pekerjaan->pekerjaan_meet as $meet)
                            <input type="text" id="input-username" class="form-control"
                                value="{{ $meet->meet_pelaporan_link }}" disabled>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <button></button>
        </form>
    </div>
</div>
@endsection

<!-- Schema::create('pekerjaan_kategori', function (Blueprint $table) {
    $table->id();
    $table->string('kategori');
    $table->string('deskripsi');
    $table->timestamps();
});

Schema::create('pekerjaan_status', function (Blueprint $table) {
    $table->id();
    $table->string('status');
    $table->timestamps();
});
Schema::create('pekerjaan', function (Blueprint $table) {
    $table->id();
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
    $table->timestamps();
});
Schema::create('pekerjaan_meet', function (Blueprint $table) {
    $table->id();
    $table->date('meet_pengajuan_jadwal');
    $table->string('meet_pengajuan_link');
    $table->date('meet_pelaporan_jadwal');
    $table->string('meet_pelaporan_link');
    $table->bigInteger('pekerjaan_id');
    $table->foreign('pekerjaan_id')->references('id')->on('pekerjaan');
    $table->timestamps();
});
Schema::create('pekerjaan_pembayaran', function (Blueprint $table) {
    $table->id();
    $table->decimal('pembayaran_total',10,2);
    $table->decimal('pembayaran_dp',10,2);
    $table->string('pembayaran_dp_bukti');
    $table->decimal('pembayaran_sisa',10,2);
    $table->string('pembayaran_sisa_bukti');
    $table->bigInteger('pekerjaan_id');
    $table->foreign('pekerjaan_id')->references('id')->on('pekerjaan');
    $table->timestamps();
}); -->
