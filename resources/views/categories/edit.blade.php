@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Visos produktu kategorijos</div>

                <div class="panel-body">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                        @endforeach
                    @endif
                    <form method="POST" action="{{ route('categories.update', $category->id) }}" class="form-signin">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <input type="text" name="name" value="{{ old('name', $category->name) }}" class="form-control" placeholder="Pavadinimas">
                        <br>
                        <input type="text" name="parent_id" value="{{ old('parent_id', $category->parent_id) }}" class="form-control" placeholder="Priklauso kategorijai">
                        <br>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Isaugoti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
