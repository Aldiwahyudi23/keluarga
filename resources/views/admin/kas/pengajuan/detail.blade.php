@extends('template_backend.home')
@section('heading', 'Pengajuan Bayar')
@section('page')
  <li class="breadcrumb-item active">Pengajuan Bayar</li>
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Pengajuan Bayar</h3>
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
            <form action="{{ route('kas.store') }}" method="post">
            @csrf
            <input type="hidden" id="id" name="id">
            <input type="hidden" id="id_pengajuan" name="id_pengajuan" value = "{{ $pengajuan->id }}">
            <input type="hidden" id="anggota_id" name="anggota_id" value = "{{ $pengajuan->siswa_id }}">
            <input type="hidden" id="jumlah" name="jumlah" value =" {{ $pengajuan->jumlah }}">
            <input type="hidden" id="keterangan" name="keterangan" value = "{{ $pengajuan->keterangan }}">
            <input type="hidden" id="tanggal" name="tanggal" value = "{{ $pengajuan->tanggal }}">
        
            <button type="submit" class="btn btn-success">Tarima Untuk Masuk Kas</button>
        </div>
    </div>
        <!-- /.card-body -->
    <!-- /.card -->
</div>
@endsection
@section('script')
    <script>
        $("#pengajuan").addClass("active");
    </script>
@endsection