@extends('template_backend.home')
@section('heading')
  Pengajuan
@endsection
@section('page')
  <li class="breadcrumb-item active"><a href="{{ route('siswa.index') }}">Anggota</a></li>
  <li class="breadcrumb-item active"></li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <!-- /.card-header -->
        <div class="card-body table-responsive">
          <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Tanggal</th>
                    <th>kategori</th>
                    <th>Nama Pengajuan</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengajuan as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->tanggal }}</td>
                        <td>{{ $data->kategori }}</td>
                        <td>{{ $data->keterangan }}</td>
                        <td>{{ $data->jumlah }}</td>
                        <td>
                            <form action="{{ route('siswa.destroy', $data->tanggal) }}" method="post">
                                @csrf
                                @method('delete')
                                <a href="{{ route('pengajuan.detail', Crypt::encrypt($data->id)) }}" class="btn btn-info btn-sm mt-2"><i class="nav-icon fas fa-id-card"></i> </a>
                            </form>
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
        $("#pengajuan").addClass("active");
        $("#likas").addClass("menu-open");
        $("#pemasukan").addClass("active");
    </script>
@endsection