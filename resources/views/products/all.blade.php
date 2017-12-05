@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Visi produktai</div>

                <div class="panel-body">
                    <a href="/products/create">Naujas irasas</a>
                    <table class="table">
                        <th>ID</th>
                        <th>Pavadinimas</th>
                        <th>Nuotrauka</th>
                        <th>Kaina</th>
@foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td><a href="/products/{{ $product->id }}">{{ $product->name }}</a></td>
                            <td><img src="{{ Storage::url($product->photo_url) }}" style="height: 100px;"></td>
                            <td>{{ $product->price }}</td>
                            <td><a href="/products/{{ $product->id }}/edit">Redaguoti</a></td>
                            <td><a href="/products/{{ $product->id }}">Trinti</a></td>
                        </tr>
@endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
