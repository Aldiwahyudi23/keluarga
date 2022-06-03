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
            <form action="" method="post">
            @csrf
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
                <label for="perincian">Perincian</label>
                <textarea name="perincian" rows="3" id="perincian" class="form-control @error('perincian') is-invalid @enderror">{{old('perincian')}}</textarea>
                @error('perincian')
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
        $("#SikapSiswa").addClass("active");
    </script>
@endsection