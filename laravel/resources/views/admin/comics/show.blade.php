
@extends('layouts.admin')

@section('content')
<div class="container container-show show p-5 d-flex">
    <div class="row">
        <div class="col">
            <h1>{{ $comic->name }}</h1>
            <span>Comprati: {{ $comic->comprati}}</span> <br>
            <span>Usciti: {{ $comic->usciti}}</span> <br>
            <span>Letti: {{ $comic->letti}}</span> <br>
            <span>Costo singolo: {{ $comic->costo_singolo}}€</span> <br>
            <span>Costo totale: {{ $comic->costo_totale}}€</span> <br>
            @if($comic->finito === 1) 
                <span>Finito</span>
            @else 
                <span>Ancora in corso</span>
            @endif
        </div>
    </div>
    <div class="col ms-5">
        <img src="{{ asset('storage/' . $comic->image) }}" alt="{{ $comic->name }}">
    </div>
</div>
<a class="btn btn-primary mt-5" href="{{url()->previous()}}">CANCEL</a>
<a class="btn btn-primary mt-5" href="{{ route('admin.comics.index') }}">HOME</a>
@endsection