@extends('template_backend.home')
@section('heading', 'Data Kas')
@section('page')
  <li class="breadcrumb-item active">Data Kas</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <!-- /.card-header -->
        <div class="card-header">
          <h3 class="card-title">
              <button type="button" class="btn btn-primary btn-sm" onclick="getCreateData()" data-toggle="modal" data-target="#form-data">
                  <i class="nav-icon fas fa-folder-plus"></i> &nbsp; Tambah Data
              </button>
          </h3>
        </div>
        <div class="card-body table-responsive">
          <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                </tr>
            </thead>
            <tbody>
            @php
                            $total = 0;
                        @endphp
                @foreach ($datapengluaran as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td> {{$data->nama}}</td>
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

<!-- Extra large modal -->
<div class="modal fade bd-example-modal-md" id="form-data" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title" id="judul"></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('datapengluaran.store') }}" method="post">
          @csrf
          <div class="row">
            <div class="col-md-12">
              <!-- <div class="form-group" id="form_paket"></div> -->
              <div class="form-group">
              <input type="hidden" id="id" name="id">
                <label for="kelas_id">Ketua</label>
                <select id="kelas_id" name="kelas_id" class="select2bs4 form-control @error('kelas_id') is-invalid @enderror">
                  <option value="">-- Pilih Program  --</option>
                  @foreach ($program as $data)
                    <option value="{{ $data->id }}">{{ $data->nama_kelas }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                    <label for="nama">Nama Data Pengluaran</label>
                    <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror">
                </div>
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
    $("#MasterData").addClass("active");
    $("#liMasterData").addClass("menu-open");
    $("#DataKelas").addClass("active");
    </script>
@endsection