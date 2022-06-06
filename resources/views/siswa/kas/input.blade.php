@extends('template_backend.home')
@section('heading', 'Bayar Kas')
@section('page')
  <li class="breadcrumb-item active">Bayar Kas</li>
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Bayar Kas</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
        @csrf
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
            <form action="{{ route('bayar.store') }}" method="post">
            @csrf
            @foreach ($anggota as $data)
                <input type="hidden" name="anggota_id" value="{{ $data->id }}">
            @endforeach
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
            <button type="submit" class="btn btn-success">Kirim</button>
        </form>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
@endsection
@section('script')
    <script>
        $("#Input").addClass("active");
    </script>
@endsection