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
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Data Kelurahan</p>
                    <div class="table-responsive">
                        <table id="recent-purchases-listing" class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Kelurahan</th>
                                    <th>Nama Kecamatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kelurahan as $item)
                                    <tr>
                                        <td>{{ $item['id_kelurahan'] }}</td>
                                        <td>{{ $item['nama_kelurahan'] }}</td>
                                        <td>{{ $item['kecamatan']['nama_kecamatan'] }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card" style="border-top: .7px">
                <div class="card-body">
                    <p class="card-title">Data Kecamatan</p>
                    <div class="table-responsive">
                        <table id="recent-purchases-listing" class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Kecamatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kecamatan as $item)
                                    <tr>
                                        <td>{{ $item['id_kecamatan'] }}</td>
                                        <td>{{ $item['nama_kecamatan'] }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Data Ormas yang Sedang Mendaftar</p>
                    <div class="table-responsive">
                        <table id="recent-purchases-listing" class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Pendiri</th>
                                    <th>Nama Ormas</th>
                                    <th>Status Legalitas</th>
                                    <th>Alamat Kesekretariatan</th>
                                    <th>Nama Kecamatan</th>
                                    <th>Nama Kelurahan</th>
                                    <th>Nama Ketua</th>
                                    <th>No HP Ketua</th>
                                    <th>Surat Permohonan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ormas->where('status', 'Daftar') as $item)
                                    <tr>
                                        <td>{{ $item['id'] }}</td>
                                        <td>{{ $item['pendiri']['nama_lengkap'] }}</td>
                                        <td>{{ $item['nama_ormas'] }}</td>
                                        <td>{{ $item['status_legalitas'] }}</td>
                                        <td>{{ $item['alamat_kesekretariatan'] }}</td>
                                        <td>{{ $item['kecamatan']['nama_kecamatan'] }}</td>
                                        <td>{{ $item['kelurahan']['nama_kelurahan'] }}</td>
                                        <td>{{ $item['nama_ketua'] }}</td>
                                        <td>{{ $item['no_hp_ketua'] }}</td>
                                        <td>{{ $item['surat_permohonan'] }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Data Ormas yang Sedang Ada dalam Proses Registrasi</p>
                    <div class="table-responsive">
                        <table id="recent-purchases-listing" class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Pendiri</th>
                                    <th>Nama Ormas</th>
                                    <th>Status Legalitas</th>
                                    <th>Alamat Kesekretariatan</th>
                                    <th>Nama Kecamatan</th>
                                    <th>Nama Kelurahan</th>
                                    <th>Nama Ketua</th>
                                    <th>No HP Ketua</th>
                                    <th>Surat Permohonan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ormas->where('status', 'Registrasi') as $item)
                                    <tr>
                                        <td>{{ $item['id'] }}</td>
                                        <td>{{ $item['pendiri']['nama_lengkap'] }}</td>
                                        <td>{{ $item['nama_ormas'] }}</td>
                                        <td>{{ $item['status_legalitas'] }}</td>
                                        <td>{{ $item['alamat_kesekretariatan'] }}</td>
                                        <td>{{ $item['kecamatan']['nama_kecamatan'] }}</td>
                                        <td>{{ $item['kelurahan']['nama_kelurahan'] }}</td>
                                        <td>{{ $item['nama_ketua'] }}</td>
                                        <td>{{ $item['no_hp_ketua'] }}</td>
                                        <td>{{ $item['surat_permohonan'] }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Data Ormas yang Sudah Aktif</p>
                    <div class="table-responsive">
                        <table id="recent-purchases-listing" class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Pendiri</th>
                                    <th>Nama Ormas</th>
                                    <th>Status Legalitas</th>
                                    <th>Alamat Kesekretariatan</th>
                                    <th>Nama Kecamatan</th>
                                    <th>Nama Kelurahan</th>
                                    <th>Nama Ketua</th>
                                    <th>No HP Ketua</th>
                                    <th>Surat Permohonan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ormas->where('status', 'Aktif') as $item)
                                    <tr>
                                        <td>{{ $item['id'] }}</td>
                                        <td>{{ $item['pendiri']['nama_lengkap'] }}</td>
                                        <td>{{ $item['nama_ormas'] }}</td>
                                        <td>{{ $item['status_legalitas'] }}</td>
                                        <td>{{ $item['alamat_kesekretariatan'] }}</td>
                                        <td>{{ $item['kecamatan']['nama_kecamatan'] }}</td>
                                        <td>{{ $item['kelurahan']['nama_kelurahan'] }}</td>
                                        <td>{{ $item['nama_ketua'] }}</td>
                                        <td>{{ $item['no_hp_ketua'] }}</td>
                                        <td>{{ $item['surat_permohonan'] }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Data User</p>
                    <div class="table-responsive">
                        <table id="recent-purchases-listing" class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>No HP</th>
                                    <th>Level</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ormas->where('status', 'Proses') as $item)
                                    <tr>
                                        <td>{{ $item['id'] }}</td>
                                        <td>{{ $item['username'] }}</td>
                                        <td>{{ $item['nama_lengkap'] }}</td>
                                        <td>{{ $item['email'] }}</td>
                                        <td>{{ $item['no_hp'] }}</td>
                                        <td>{{ $item['level'] }}</td>
                                        <td>{{ $item['status'] }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
@endsection
