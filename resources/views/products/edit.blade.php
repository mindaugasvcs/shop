@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Visi produktai</div>

                <div class="panel-body">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                        @endforeach
                    @endif
                    <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data" class="form-signin">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <input type="text" name="name" value="{{ old('name', $product->name) }}" class="form-control" placeholder="Pavadinimas">
                        <br>
                        <input type="text" name="price" value="{{ old('price', $product->price) }}" class="form-control" placeholder="Kaina">
                        <br>
                        <input type="file" name="photo_url" value="{{ old('photo_url', $product->photo_url) }}" class="form-control" placeholder="Paveiksliukas">
                        <br>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Isaugoti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
