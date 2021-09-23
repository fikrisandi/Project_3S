@extends('admin.dashboard.layout')

@section('nav')
    @include('admin.dashboard.nav')
@endsection

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
                    @foreach ($pekerjaan as $work)
                        {{ $work->nama_pekerjaan }}
                    @endforeach

                    @foreach ($meet as $meeting)
                        {{ $meeting->meet_pengajuan_link }}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection