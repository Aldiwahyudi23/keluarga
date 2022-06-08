@extends('template_backend.home')
@section('heading', 'Pengajuan Pinjam')
@section('page')
  <li class="breadcrumb-item active">Pengajuan Pinjam</li>
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Pengajuan Pinjam</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      
        @csrf
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
                <table class="table" style="margin-top: -10px;">
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>{{ $pengajuan->siswa_id }}</td>
                    </tr>
                    <tr>
                        <td>Pengajuan</td>
                        <td>:</td>
                        <td class="text-capitalize">{{ $pengajuan->kategori }}</td>
                    </tr>
                    <tr>
                        <td>Jumlah</td>
                        <td>:</td>
                        <td>{{ $pengajuan->jumlah }}</td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td>:</td>
                        <td>{{ $pengajuan->keterangan }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td>:</td>
                        <td>{{ $pengajuan->tanggal }}</td>
                    </tr>
                    
                </table>
                <hr>
            </div>
            <form action="{{ route('simpan.pinjaman') }}" method="post">
            @csrf
            <input type="hidden" id="id" name="id">
            <input type="hidden" id="id_pengajuan" name="id_pengajuan" value = "{{ $pengajuan->id }}">
            <input type="hidden" id="anggota_id" name="anggota_id" value = "{{ $pengajuan->siswa_id }}">
            <input type="hidden" id="jumlah" name="jumlah" value =" {{ $pengajuan->jumlah }}">
            <input type="hidden" id="keterangan" name="keterangan" value = "{{ $pengajuan->keterangan }}">
            <input type="hidden" id="tanggal" name="tanggal" value = "{{ $pengajuan->tanggal }}">
            <input type="hidden" id="program" name="program" value = "{{ $pengajuan->program }}">
    
            <button type="submit" class="btn btn-primary">Tarima Kanggo Minjemkeun</button>
        </from>
        <button type="button" class="btn btn-warning btn-sm" onclick="getCreatePesan()" data-toggle="modal" data-target="#form-pesan">
                  <i class="nav-icon fas fa-folder-trash"></i> &nbsp; Tolak Pinjamanna
              </button>
        </div>
    </div>
        <!-- /.card-body -->
    <!-- /.card -->
</div>

<!-- Extra large modal -->
<div class="modal fade bd-example-modal-md" id="form-pesan" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title" id="judul">Pesan Penolakan Pinjaman</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('pesan.store') }}" method="post">
          @csrf
          <div class="row">
            <div class="col-md-12">
              <input type="hidden" id="id" name="id">
              <input type="hidden" id="anggota_id" name="anggota_id" value="{{ $pengajuan->siswa_id }}">
              <div class="form-group">
                        <label for="pesan">Judul Pesan</label>
                        <input type="text" id="pesan" name="pesan" class="form-control @error('pesan') is-invalid @enderror">
                </div>
              <div class="form-group">
                        <label for="isi">Nomor Induk</label>
                        <input type="text" id="isi" name="isi" class="form-control @error('isi') is-invalid @enderror">
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
        $("#pengajuan").addClass("active");
    </script>
@endsection