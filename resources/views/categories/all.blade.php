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
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Pilnas pavadinimas</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
@foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
    @if (count($category->parents))
                                <td>{{ $category->parents->implode('name', '\\') }}\{{ $category->name }}</td>
    @else
                                <td>{{ $category->name }}</td>
    @endif
                                <td><a href="{{ route('categories.edit', $category->id) }}">Redaguoti</a></td>
                                <td>
                                    <form method="POST" action="{{ route('categories.destroy', $category->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit">Trinti</button>
                                    </form>
                                </td>
                            </tr>
@endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
