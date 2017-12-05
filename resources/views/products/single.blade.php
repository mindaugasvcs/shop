@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Visi produktai</div>

                <div class="panel-body">
                    <table class="table">
                        <th>ID</th>
                        <th>Pavadinimas</th>
                        <th>Nuotrauka</th>
                        <th>Kaina</th>
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td><img src="{{ Storage::url($product->photo_url) }}" style="height: 100px;"></td>
                            <td>{{ $product->price }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
