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
            <div class="col-md-12">
                <table class="table table-bordered table-striped table-hover table-responsive">
                    <thead>
                        <tr>
                            <th class="ctr">No.</th>
                            <th>Catatan</th>
                            <th class="ctr">Mei</th>
                            <th class="ctr">Juni</th>
                            <th class="ctr">Juli</th>
                            <th class="ctr">Agustus</th>
                            <th class="ctr">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mapel as $val => $data)
                            <tr>
                                <?php $data = $data[0]; ?>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->mapel->nama_mapel }}</td>
                                <td class="ctr">{{ ($data->ulangan($val)) ? $data->ulangan($val)['ulha_1'] : " - " }}</td>
                                <td class="ctr">{{ ($data->ulangan($val)) ? $data->ulangan($val)['ulha_2'] : " - " }}</td>
                                <td class="ctr">{{ ($data->ulangan($val)) ? $data->ulangan($val)['uts'] : " - " }}</td>
                                <td class="ctr">{{ ($data->ulangan($val)) ? $data->ulangan($val)['ulha_3'] : " - " }}</td>
                                <td class="ctr">{{ ($data->ulangan($val)) ? $data->ulangan($val)['uas'] : " - " }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pemasukan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="Pemsukansiswa">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Input Data</th>
                            <th>Tanggal</th>
                            <th>Perincian</th>
                            <th>Jumlah (Rp)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Pemasukan as $data)
                            <tr>
                                <?php $data = $data[0]; ?>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->jumlah }}</td>
                                <td>{{ $data->jumlah }}</td>
                                <td>{{ $data->jumlah }}</td>
                                <td>{{ $data->jumlah }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4" class="text-center"><b>Total</b></th>

                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!-- /.card -->
</div>
@endsection
@section('script')
    <script>
        $("#UlanganSiswa").addClass("active");
    </script>
@endsection