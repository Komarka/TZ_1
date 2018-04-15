@extends('layouts.admin')
@section('content')
 @if (session('message'))
        <div class="alert alert-info">{{ session('message') }}</div>
    @endif 
@isset($adv)
<div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Реклама</div>

                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Цена</th>
                                    <th>Название</th>
                                    <th>Описание</th>
                                    <th>Картинка</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($adv as $a)
                                <tr>
                                    <td>{{ $a->id }}</td>
                                    <td>{{ $a->price }}</td>
                                    <td>{{ $a->name }}</td>
                                    <td>{{ $a->desciption }}</td>
                                    <td><img src={{asset($a->img)}} width='50px'></td>
                                    <td>
                                        <a href={{ route('adv.edit', $a->id) }} class="btn btn-default">Edit</a>
                                        <form action={{ route('adv.destroy', $a->id) }} method="POST"
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
                        {{ $adv->links() }}
                    </div>
                </div>
            </div>
        </div>
         <a href="{{ route('adv.create') }}" class="btn btn-success">Добавить рекламу</a>

        @endisset
@endsection