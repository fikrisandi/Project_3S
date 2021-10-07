@extends('user.layout')

@section('nav')
    @include('user.nav', ['active' => 'user.profile', 'name' => 'Profile'])
    <!-- active berisi routing yang sedang digunakan -->
    <!-- name berisi nama page yang sedang dibuka -->
@endsection

@section('header')
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{ __('Profile') }}
</h2>
@endsection

@section('content')
<div class="container pb-2">
    <form enctype="multipart/form-data" action="{{ route('user.updatePut') }}" method="POST">
        @method('PUT')
        @csrf
        <input type="hidden" name="id" value="{{ Auth::guard('users')->user()->id }}">
        <hr class="my-4" />
        <h6 class="heading-small text-muted mb-4">Data Diri</h6>
        <div class="pl-lg-4">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="form-control-label" for="input-username">Nama KTP</label>
                        <input type="text" id="input-username" class="form-control" name="nama_ktp" value="{{ Auth::user()->user_identitas ? Auth::user()->user_identitas->nama_ktp : '' }}">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="form-control-label" for="input-username">NIK KTP</label>
                        <input type="text" id="input-username" class="form-control" name="nik" value="{{ Auth::user()->user_identitas ? Auth::user()->user_identitas->nik : '' }}">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="form-control-label" for="input-username">Foto KTP</label>
                        <input type="text" id="input-username" class="form-control" name="foto_ktp" value="{{ Auth::user()->user_identitas ? Auth::user()->user_identitas->foto_ktp : '' }}">
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label" for="input-first-name">User ID</label>
                        <input type="text" id="input-username" class="form-control" disabled
                            value="{{ Auth::guard('users')->user()->id }}" name="user_id" value="{{ Auth::user()->user_identitas ? Auth::user()->user_identitas->user_id : '' }}">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label" for="input-username">Tempat Lahir</label>
                        <input type="text" id="input-username" class="form-control" name="tempat_lahir" value="{{ Auth::user()->user_identitas ? Auth::user()->user_identitas->tempat_lahir : '' }}">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label" for="input-username">Tanggal Lahir</label>
                        <input type="text" id="input-username" class="form-control" name="tanggal_lahir" value="{{ Auth::user()->user_identitas ? Auth::user()->user_identitas->tanggal_lahir : '' }}">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label" for="input-username">Kota Domisili</label>
                        <input type="text" id="input-username" class="form-control" name="kota_domisili" value="{{ Auth::user()->user_identitas ? Auth::user()->user_identitas->kota_domisili : '' }}">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label" for="input-username">Jenis Kelamin</label>
                        <input type="text" id="input-username" class="form-control" name="jenis_kelamin" value="{{ Auth::user()->user_identitas ? Auth::user()->user_identitas->jenis_kelamin : '' }}">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label" for="input-username">Nomor Telefon</label>
                        <input type="text" id="input-username" class="form-control" name="no_telfon" value="{{ Auth::user()->user_identitas ? Auth::user()->user_identitas->no_telfon : '' }}">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label" for="input-username">Pendidikan Terakhir</label>
                        <input type="text" id="input-username" class="form-control" name="pendidikan_terakhir" value="{{ Auth::user()->user_identitas ? Auth::user()->user_identitas->pendidikan_terakhir : '' }}">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label" for="input-username">Nama Perusahaan</label>
                        <input type="text" id="input-username" class="form-control" name="nama_perusahaan" value="{{ Auth::user()->user_identitas ? Auth::user()->user_identitas->nama_perusahaan : '' }}">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label" for="input-username">Profesi</label>
                        <input type="text" id="input-username" class="form-control" name="profesi" value="{{ Auth::user()->user_identitas ? Auth::user()->user_identitas->profesi : '' }}">
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
</div>

@endsection
<!-- 
$table->string('no_telfon'); // masih rancu done
$table->string('kota_domisili'); //done
$table->string('nama_ktp'); done
$table->string('tempat_lahir'); done
$table->date('tanggal_lahir'); done
$table->boolean('jenis_kelamin'); // masih rancu done
$table->string('pendidikan_terakhir');
$table->string('profesi');
$table->string('nama_perusahan');
$table->string('foto_ktp'); done
$table->string('nik'); // masih rancu done
$table->bigInteger('user_id'); -->
