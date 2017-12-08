@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Visi produktai</div>

                <div class="panel-body">
                    <a href="{{ route('products.create') }}">Naujas irasas</a>
                    <table class="table">
                        <th>ID</th>
                        <th>Pavadinimas</th>
                        <th>Nuotrauka</th>
                        <th>Kaina</th>
@foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td><a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a></td>
                            <td><img src="{{ Storage::url($product->photo_url) }}" style="height: 100px;"></td>
                            <td>{{ $product->price }}</td>
                            <td><a href="{{ route('products.edit', $product->id) }}">Redaguoti</a></td>
                            <td>
                                <form method="POST" action="{{ route('products.destroy', $product->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="button" data-toggle="modal" data-target="#confirm-delete-product-dialog" data-name="{{ $product->name }}">Trinti</button>
                                </form>
                            </td>
                        </tr>
@endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Trigger the modal with a button -->
<!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#confirm-delete-dialog">Open Modal</button> -->
<!-- Modal -->
<div id="confirm-delete-product-dialog" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Istrynimo patvirtinimas</h4>
      </div>
      <div class="modal-body">
        <p></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Taip</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Ne</button>
      </div>
    </div>
  </div>
</div>
@endsection
