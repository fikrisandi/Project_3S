<form enctype="multipart/form-data" action="{{ route('user.updatePut') }}" method="POST">
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
                        <input type="text" id="input-username" class="form-control" name="nama_ktp" value="{{ Auth::user()->user_identitas ? Auth::user()->user_identitas->nama_ktp : '' }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-control-label" for="input-username">Nama Pekerjaan</label>
                        <input type="text" id="input-username" class="form-control" name="nik" value="{{ Auth::user()->user_identitas ? Auth::user()->user_identitas->nik : '' }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-control-label" for="input-username">File RAB</label>
                        <input type="text" id="input-username" class="form-control" name="foto_ktp" value="{{ Auth::user()->user_identitas ? Auth::user()->user_identitas->foto_ktp : '' }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-control-label" for="input-username">File TOR/SOW</label>
                        <input type="text" id="input-username" class="form-control" name="foto_ktp" value="{{ Auth::user()->user_identitas ? Auth::user()->user_identitas->foto_ktp : '' }}">
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