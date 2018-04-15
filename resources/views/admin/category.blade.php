@extends('layouts.admin')
@section('content')
 @if (session('message'))
        <div class="alert alert-info">{{ session('message') }}</div>
    @endif 
@isset($category)
<div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Категории</div>

                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Имя</th>
                                    <th>Путь</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($category as $c)
                                <tr>
                                    <td>{{ $c->id }}</td>
                                    <td>{{ $c->name }}</td>
                                    <td>{{ $c->path_name }}</td>
                                    <td>
                                        <a href={{ route('category.edit', $c->id) }} class="btn btn-default">Edit</a>
                                        <form action={{ route('category.destroy', $c->id) }} method="POST"
                                              style="display: inline"
                                              onsubmit="return confirm('Вы уверенны?');">
                                            <input type="hidden" name="_method" value="DELETE">
                                            {{ csrf_field() }}
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                                                    @endforeach
                            </tbody>
                        </table>
                        {{ $category->links() }}
                    </div>
                </div>
            </div>
        </div>
         <a href="{{ route('category.create') }}" class="btn btn-success">Добавить категорию</a>

        @endisset
@endsection