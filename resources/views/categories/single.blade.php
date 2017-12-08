@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Visos produktu kategorijos</div>

                <div class="panel-body">
                    <table class="table">
                        <th>ID</th>
                        <th>Pilnas pavadinimas</th>
                        <tr>
                            <td>{{ $category->id }}</td>
    @if (count($category->parents))
                            <td>{{ $category->parents->implode('name', '\\') }}\{{ $category->name }}</td>
    @else
                            <td>{{ $category->name }}</td>
    @endif
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
