@extends('template_backend.home')
@section('heading', 'Data Kas')
@section('page')
  <li class="breadcrumb-item active">Data Kas</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg">
                    <i class="nav-icon fas fa-folder-plus"></i> &nbsp; Tambah
                </button>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">
          <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Bulan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hari as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama_hari}}</td>
                        <td>
                            <a href="{{ route('kas.show', Crypt::encrypt($data->nama_hari)) }}" class="btn btn-info btn-sm"><i class="nav-icon fas fa-search-plus"></i> &nbsp; Detail</a>
                        </td>
                    </tr>
                    @php
                       $total += $data->jumlah;
                    @endphp
                @endforeach
            </tbody>
            <tfoot>
                        <tr>
                            <th colspan="4" class="text-center"><b>Total</b></th>
                            <th colspan="2"><b>{{ "Rp " . number_format($total,2,',','.') }}</b></th>
                        </tr>
                    </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.col -->

<!-- Extra large modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Tambah Data Kas</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
          <form action="{{ route('kas.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                        <label for="siswa_id">Anggota</label>
                        <select id="siswa_id" name="siswa_id" class="select2bs4 form-control @error('siswa_id') is-invalid @enderror">
                            <option value="">-- Pilih Anggota --</option>
                            @foreach ($siswa as $data)
                                <option value="{{ $data->id }}">{{ $data->nama_siswa }}</option>
                            @endforeach
                        </select>
                    </div>
            <div class="form-group">
                <label for="jumlah">jumlah</label>
                <input type="text" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" value="{{old('jumlah')}}">
                @error('jumlah')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <input type="hidden" name="kategori" value="pemasukan">
            <div class="form-group">
                <label for="">Tanggal</label>
                <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{old('tanggal')}}">
                @error('tanggal')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="keterangan">keterangan</label>
                <textarea name="keterangan" rows="3" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror">{{old('keterangan')}}</textarea>
                @error('keterangan')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</button>
              <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Tambahkan</button>
          </form>
      </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
    <script>
        $("#kas").addClass("active");
        $("#likas").addClass("menu-open");
        $("#DataKas").addClass("active");
    </script>
@endsection