@extends('template_backend.home')
@section('heading', 'Data Pinjaman')
@section('page')
  <li class="breadcrumb-item active">Data Pinjaman</li>
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
                    <th>Nama</th>
                    <th>Keterangan</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
            @php
                            $total = 0;
                        @endphp
                @foreach ($pinjam as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td> {{$data->tanggal}}</td>
                        <td> {{$data->id}}</td>
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
@endsection
@section('script')
    <script>
        $("#kas").addClass("active");
        $("#likas").addClass("menu-open");
        $("#pinjam").addClass("active");
    </script>
@endsection