@extends('layouts.admin')

@section('content')
<div class="row">
  @if (session('status'))
      <div class="alert alert-danger">
          {{ session('status') }}
      </div>
  @endif
</div>
    <div class="container p-5">
        <div class="row">
            <div class="col">
                <h2 class="text-uppercase">Modifica Comic: {{ $comic->nome }}</h2>
                <a class="btn btn-primary" href="{{route('admin.comics.index')}}">HOME</a>
                <a class="btn btn-primary" href="{{route('admin.comics.show', $comic)}}">VIEW</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="{{ route('admin.comics.update', $comic->slug) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3 mt-3">
                        <label for="nome" class="form-label text-uppercase fw-bold">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="{{ $comic->nome }}">
                        @error('nome')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="comprati" class="form-label text-uppercase fw-bold">Comprati</label>
                        <input type="text" class="form-control" id="comprati" name="comprati" value="{{ $comic->comprati }}">
                    </div>
                    @error('comprati')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="mb-3">
                        <label for="usciti" class="form-label text-uppercase fw-bold">Usciti</label>
                        <input type="text" class="form-control" id="usciti" name="usciti" value="{{ $comic->usciti }}">
                    </div>
                    @error('usciti')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="mb-3">
                        <label for="letti" class="form-label text-uppercase fw-bold">Letti</label>
                        <input type="text" class="form-control" id="letti" name="letti" value="{{ $comic->letti }}">
                    </div>
                    @error('letti')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="mb-3">
                        <label for="finito" class="form-label text-uppercase fw-bold">Finito</label>
                        <input type="text" class="form-control" id="finito" name="finito" value="{{ $comic->finito }}">
                    </div>
                    @error('finito')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="mb-3">
                        <label for="costo_singolo" class="form-label text-uppercase fw-bold">costo_singolo</label>
                        <input type="text" class="form-control" id="costo_singolo" name="costo_singolo" value="{{ $comic->costo_singolo }}">
                    </div>
                    @error('costo_singolo')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="mb-3">
                        <label for="costo_totale" class="form-label text-uppercase fw-bold">Costo_totale</label>
                        <input type="text" class="form-control" id="costo_totale" name="costo_totale" value="{{ $comic->costo_totale }}">
                    </div>
                    @error('costo_totale')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
              

                      @if (!empty($comic->image))
                      <div class="mb-3">
                          <img class="img-fluid" src="{{ asset('storage/' . $comic->image) }}"
                              alt="{{ $comic->nome }}">
                      </div>
                      @endif
                      <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input class="form-control" type="file" id="image" name="image">
                        @error('image')
                            <div class="alert alert-danger mt-3">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
              
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection