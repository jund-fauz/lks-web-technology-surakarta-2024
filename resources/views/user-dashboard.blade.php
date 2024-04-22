@extends('partials.main')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex flex-wrap flex-column ms-2 ">
                    <div class="me-md-3 me-xl-5 mt-3">
                        <h2>Selamat datang kembali, {{ $user->username }}.</h2>
                    </div>
                    <div class="d-flex">
                        <i class="mdi mdi-home text-muted hover-cursor"></i>
                        <p class="text-primary mb-0 hover-cursor">Admin Dashboard</p>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <button type="button" class="btn btn-light bg-white btn-icon me-3 d-none d-md-block ">
                        <i class="mdi mdi-download text-muted"></i>
                    </button>
                    <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
                        <i class="mdi mdi-clock-outline text-muted"></i>
                    </button>
                    <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
                        <i class="mdi mdi-plus text-muted"></i>
                    </button>
                    <button class="btn btn-primary mt-2 mt-xl-0">Generate report</button>
                </div>
            </div>
        </div>
    </div>
    <h1 class="text-center">Jumlah Ormas yang Terdaftar</h1>
    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
        <div class="d-flex flex-wrap justify-content-xl-between">
            <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                <i class="mdi mdi-key me-3 icon-lg text-primary"></i>
                <div class="d-flex flex-column justify-content-around">
                    <small class="mb-1 text-muted">Daftar</small>
                    <h5 class="me-2 mb-0">{{ count($ormas->where('status', 'Daftar')) }}</h5>
                </div>
            </div>
            <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                <i class="mdi mdi-autorenew me-3 icon-lg text-warning"></i>
                <div class="d-flex flex-column justify-content-around">
                    <small class="mb-1 text-muted">Proses</small>
                    <h5 class="me-2 mb-0">{{ count($ormas->where('status', 'Proses')) }}</h5>
                </div>
            </div>
            <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                <i class="mdi mdi-account-check me-3 icon-lg text-success"></i>
                <div class="d-flex flex-column justify-content-around">
                    <small class="mb-1 text-muted">Aktif</small>
                    <h5 class="me-2 mb-0">{{ count($ormas->where('status', 'Aktif')) }}</h5>
                </div>
            </div>
        </div>
    </div>
    @php
        $ormasku = $ormas->where('id_user', $user->id_user)->first();
    @endphp
    @if ($ormasku)
        <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card" style="border: .7px solid black; border-radius: 8px">
                    <div class="card-body">
                        <h3 class="text-primary">Ormasku</h3>
                        <div>
                            <p class="fs-5">Nama Ormas: {{ $ormasku['nama_ormas'] }}</p>
                            <p class="fs-5">Status Legalitas: {{ $ormasku['status_legalitas'] }}</p>
                            <p class="fs-5">Alamat Kesekretariatan: {{ $ormasku['alamat_kesekretariatan'] }}</p>
                            <p class="fs-5">Kecamatan: {{ $ormasku['kecamatan']['nama_kecamatan'] }}</p>
                            <p class="fs-5">Kelurahan: {{ $ormasku['kelurahan']['nama_kelurahan'] }}</p>
                            <p class="fs-5">Nama Ketua: {{ $ormasku['nama_ketua'] }}</p>
                            <p class="fs-5">No HP Ketua: {{ $ormasku['no_hp_ketua'] }}</p>
                            <p class="fs-5">Status: {{ $ormasku['status'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
