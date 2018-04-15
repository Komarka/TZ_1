@extends('layouts.admin')
@section('content')
<div class="panel-heading">Изменить категорию</div>

    <div class="panel-body">
        @if ($errors->count() > 0)
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form action="{{ route('category.update', $category->id) }}" method="post">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}
            Имя:
            <br />
            <input type="text" name="name"  />
            <br /><br />
            Путь:
            <br />
            <input type="text" name="path_name"  />
            <br /><br />
            <input type="submit" value="Submit" class="btn btn-default" />
        </form>
    </div>
    @endsection