@extends('layouts.admin')

@section('content')
<div class="container p-5">
  <div class="row">
    @if (session('status'))
        <div class="alert alert-danger">
            {{ session('status') }}
        </div>
    @endif
  </div>
    <div class="row">
      <form action="{{ route('admin.comics.store') }}" method="post" enctype="multipart/form-data">
        <a class="btn btn-primary" href="{{url()->previous()}}">CANCEL</a>
        @csrf
        @method('POST')
        <div class="mb-3 mt-3">
          <label for="nome" class="form-label text-uppercase fw-bold">Nome</label>
          <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}">
          @error('nome')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror

        </div>
        <div class="mb-3">
          <label for="comprati" class="form-label text-uppercase fw-bold">Comprati</label>
          <input type="text" class="form-control" id="comprati" name="comprati" value="{{ old('comprati') }}">
        </div>
        @error('comprati')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="usciti" class="form-label text-uppercase fw-bold">usciti</label>
            <input type="text" class="form-control" id="usciti" name="usciti" value="{{ old('usciti') }}">
        </div>
        @error('usciti')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="letti" class="form-label text-uppercase fw-bold">Letti</label>
            <input type="text" class="form-control" id="letti" name="letti" value="{{ old('letti') }}">
        </div>
        @error('letti')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="finito" class="form-label text-uppercase fw-bold">finito</label>
            <input type="text" class="form-control" id="finito" name="finito" value="{{ old('finito') }}">
        </div>
        @error('finito')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="costo_singolo" class="form-label text-uppercase fw-bold">costo_singolo</label>
            <input type="text" class="form-control" id="costo_singolo" name="costo_singolo" value="{{ old('costo_singolo') }}">
        </div>
        @error('costo_singolo')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="costo_totale" class="form-label text-uppercase fw-bold">costo_totale</label>
            <input type="text" class="form-control" id="costo_totale" name="costo_totale" value="{{ old('costo_totale') }}">
        </div>
        @error('costo_totale')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        {{--inserimento di un image file--}}
        <div class="mb-3">
          <label for="image" class="form-label text-uppercase fw-bold">Image</label>
          <input class="form-control" type="file" id="image" name="image">
        </div>
        @error('image')
          <div class="alert alert-danger mt-3"> {{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-primary">Save</button>
      </form>
    </div>
</div>
@endsection