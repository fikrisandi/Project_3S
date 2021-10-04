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
            <div class="pl-pg-12">
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
                            <select class="form-control" id="validationDefault04" name="status_id">
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
                            <select class="form-control" id="validationDefault04" name="kategori_id">
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
            <!-- Address -->
            <h6 class="heading-small text-muted mb-4">Contact information</h6>
            <div class="pl-lg-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-control-label" for="input-address">Address</label>
                            <input id="input-address" class="form-control" placeholder="Home Address"
                                value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09" type="text">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label" for="input-city">City</label>
                            <input type="text" id="input-city" class="form-control" placeholder="City" value="New York">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label" for="input-country">Country</label>
                            <input type="text" id="input-country" class="form-control" placeholder="Country"
                                value="United States">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label" for="input-country">Postal code</label>
                            <input type="number" id="input-postal-code" class="form-control" placeholder="Postal code">
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-4" />
            <!-- Description -->
            <h6 class="heading-small text-muted mb-4">About me</h6>
            <div class="pl-lg-4">
                <div class="form-group">
                    <label class="form-control-label">About Me</label>
                    <textarea rows="4" class="form-control"
                        placeholder="A few words about you ...">A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</textarea>
                </div>
            </div>
            
            <div class="pl-pg-12">
                <div class="form-group">
                    <div class="row " style="justify-content: center;">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
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
