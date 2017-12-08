@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="list-group">
@foreach ($categories as $c)
    @if (!$c->parents->contains('id', $category->id))
                <form method="POST" action="{{ route('categories.update', $category->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <input type="hidden" name="parent_id" value="{{ $c->id }}">
        @if (count($c->parents))
            @if ($c->id == $category->id)
                    <button type="submit" class="list-group-item list-group-item-action active" disabled>{{ $c->parents->implode('name', '\\') }}\{{ $c->name }}</button>
            @else
                    <button type="submit" class="list-group-item list-group-item-action">{{ $c->parents->implode('name', '\\') }}\{{ $c->name }}</button>
            @endif
        @else
            @if ($c->id == $category->id)
                    <button type="submit" class="list-group-item list-group-item-action active" disabled>{{ $c->name }}</button>
            @else
                    <button type="submit" class="list-group-item list-group-item-action">{{ $c->name }}</button>
            @endif
        @endif
    @endif
                </form>
@endforeach
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">Si kategorija</div>
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
                        <input type="text" name="name" value="{{ old('name', $category->name) }}" class="form-control" placeholder="Pavadinimas"><br>
                        <input type="text" name="parent_id" value="{{ old('parent_id', $category->parent_id) }}" class="form-control" placeholder="Priklauso kategorijai"><br>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Isaugoti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
