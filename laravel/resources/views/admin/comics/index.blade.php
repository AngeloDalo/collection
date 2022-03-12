@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            @if (session('status'))
                <div class="alert alert-danger">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col">
                <h1>
                    All Comics
                </h1>
            </div>
        </div>
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Usciti</th>
                        <th scope="col">Comprati</th>
                        <th scope="col">Letti</th>
                        <th scope="col">Finito</th>
                        <th scope="col">Updated At</th>
                        <th scope="col">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comics as $comic)
                            <tr>
                                <td>{{ $comic->nome }}</td>
                                <td>{{ $comic->usciti }}</td>
                                <td>{{ $comic->comprati }}</td>
                                <td>{{ $comic->letti }}</td>
                                <td>{{ $comic->finito }}</td>
                                <td>{{ $comic->updated_at }}</td>
                                <td><a class="btn btn-primary" href="{{ route('admin.comics.show', $comic->slug) }}">View</a></td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('admin.comics.edit', $comic->slug) }}">Update</a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.comics.destroy', $comic) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input class="btn btn-danger" type="submit" value="Delete">
                                    </form>
                                </td>
                            </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5">{{ $comics->links() }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection