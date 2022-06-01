@extends('template_backend.home')
@section('heading')
    Jadwal {{ $kelas->nama_kelas }}
@endsection
@section('page')
  <li class="breadcrumb-item active">Jadwal</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
          <table id="example2" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Bulan</th>
                    <th>Program</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jadwal as $data)
                <tr>
                    <td>{{ $data->hari->nama_hari }}</td>
                    <td>
                        <h5 class="card-title">{{ $data->mapel->nama_mapel }}</h5>
                        <p class="card-text"><small class="text-muted">{{ $data->guru->nama_guru }}</small></p>
                    </td>
                    <td>{{ $data->jam_mulai }} - {{ $data->jam_selesai }}</td>
                    <td>
                    <a href="{{ route('sikap.siswa') }}" class="btn btn-info btn-sm mt-2"><i class="nav-icon fas fa-id-card"></i> &nbsp; Bayar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.col -->
@endsection
@section('script')
    <script>
        $("#JadwalSiswa").addClass("active");
    </script>
@endsection