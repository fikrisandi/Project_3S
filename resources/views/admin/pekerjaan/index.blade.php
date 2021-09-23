@extends('admin.dashboard.layout')

@section('header')
  <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
  </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table>
                        <tr>
                            <th>nama_pekerjaan</th>
                            <th>file_rab</th>
                            <th>file_tor_sw</th>
                            <th>file_laporan</th>
                            <th>user_id</th>
                            <th>kategori_id</th>
                            <th>status_id</th>
                            <th>action</th>
                        </tr> 
                        @foreach ($pekerjaan as $work)
                        <tr>
                            <td>{{ $work->nama_pekerjaan }}</td>
                            <td>{{ $work->file_rab }}</td>
                            <td>{{ $work->file_tor_sw }}</td>
                            <td>{{ $work->file_laporan }}</td>
                            <td>{{ $work->user->name }}</td>
                            <td>{{ $work->pekerjaan_kategori->kategori }}</td>
                            <td>{{ $work->pekerjaan_status->status }}</td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('pekerjaan.update', ['id' => $work->id]) }}">Update</a>
                                <a class="btn btn-danger" href="{{ route('pekerjaan.destroy', ['id' => $work->id]) }}">delete </a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
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


 