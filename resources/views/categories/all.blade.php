@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Visos produktu kategorijos</div>

                <div class="panel-body">
                    <a href="{{ route('categories.create') }}">Naujas irasas</a>
                    <table class="table">
                        <th>ID</th>
                        <th>Pavadinimas</th>
                        <th>Priklauso</th>
@foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->name }}</td> <!-- to do -->
                            <td><a href="{{ route('categories.edit', $category->id) }}">Redaguoti</a></td>
                            <td><a href="{{ route('categories.destroy', $category->id) }}">Trinti</a></td>
                        </tr>
@endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
