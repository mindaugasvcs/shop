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
                        <th>Pavadinimas</th>
                        <th>Priklauso</th>
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->name }}</td> <!-- to do -->
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
