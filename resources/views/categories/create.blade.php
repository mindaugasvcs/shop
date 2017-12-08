@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="list-group">
@foreach ($categories as $c)
        @if (count($c->parents))
                <a href="#" onclick="setCategory(event,{{ $c->id }});" class="list-group-item list-group-item-action">{{ $c->parents->implode('name', '\\') }}\{{ $c->name }}</a>
        @else
                <a href="#" onclick="setCategory(event,{{ $c->id }});" class="list-group-item list-group-item-action">{{ $c->name }}</a>
        @endif
@endforeach
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">Nauja kategorija</div>
                <div class="panel-body">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                        @endforeach
                    @endif
                    <form method="POST" action="{{ route('categories.store') }}" class="form-signin">
                        {{ csrf_field() }}
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Pavadinimas"><br>
                        <input type="text" name="parent_id" value="{{ old('parent_id') }}" class="form-control" placeholder="Priklauso kategorijai" id="parent_id_input"><br>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Isaugoti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
function setCategory(e,id) {
    e.preventDefault();
    var items = e.currentTarget.parentNode.querySelectorAll(".list-group-item");
    for (var i = 0; i < items.length; i++) { 
        items[i].className = items[i].className.replace(" active", "");
    }
    e.currentTarget.className += " active";
    document.getElementById("parent_id_input").value = id;
}
</script>
@endsection
