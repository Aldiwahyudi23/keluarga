@extends('template_backend.home')
@section('heading', 'Pemasukan')
@section('page')
  <li class="breadcrumb-item active">Pemasukan</li>
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Pemasukan</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
        @csrf
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
                <table class="table" style="margin-top: -10px;">
                    <tr>
                        <td>No Induk Keluarga</td>
                        <td>:</td>
                        <td>{{ Auth::user()->no_induk }}</td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td class="text-capitalize">{{ Auth::user()->name }}</td>
                    </tr>
                    <tr>
                        <td>Program</td>
                        <td>:</td>
                        <td>{{ $kelas->nama_kelas }}</td>
                    </tr>
                    <tr>
                        <td>Ketua</td>
                        <td>:</td>
                        <td>{{ $kelas->guru->nama_guru }}</td>
                    </tr>
                    @php
                        $bulan = date('m');
                        $tahun = date('Y');
                    @endphp
                    <tr>
                        <!-- <td>Semester</td>
                        <td>:</td>
                        <td>
                            @if ($bulan > 6)
                                {{ 'Semester Ganjil' }}
                            @else
                                {{ 'Semester Genap' }}
                            @endif
                        </td>
                    </tr> -->
                    <tr>
                        <td>Tahun</td>
                        <td>:</td>
                        <td>
                            @if ($bulan > 6)
                                {{ $tahun }}/{{ $tahun+1 }}
                            @else
                                {{ $tahun-1 }}/{{ $tahun }}
                            @endif
                        </td>
                    </tr>
                </table>
                <hr>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-body table-responsive">
          <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Tanggal</th>
                    <th>Nama Anggota</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
            @php
                            $total = 0;
                        @endphp
                @foreach ($pemasukan as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td> {{$data->tanggal}}</td>
                        <td>{{ $data->keterangan }}</td>
                        <td>{{ "Rp " . number_format($data->jumlah,2,',','.') }}</td>
                    </tr>

                @php
                       $total += $data->jumlah;
                    @endphp
                @endforeach
            </tbody>
            <tfoot>
                        <tr>
                            <th colspan="3" class="text-center"><b>Total</b></th>
                            <th colspan="2"><b>{{ "Rp " . number_format($total,2,',','.') }}</b></th>
                        </tr>
            </tfoot>
          </table>
        </div>
    <!-- /.card -->
</div>
@endsection
@section('script')
    <script>
        $("#UlanganSiswa").addClass("active");
    </script>
@endsection