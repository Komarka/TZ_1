@extends('layouts.admin')
@section('content')
<div class="panel-heading">Изменить рекламу</div>

    <div class="panel-body">
        @if ($errors->count() > 0)
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form action="{{ route('adv.update', $adv->id) }}" method="post">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}
            Название:
                    <br />
                    <input type="text" name="name"  />
                     <br /><br />
                     Цена:
                     <br />
                     <input type="text" name="price"  />
                    <br /><br />
                  Описание:
                     <br />
                     <input type="text" name="desciption"  />
                    <br /><br />
                     Путь к картинке:
                    <br />
                    <input type="text" name="img"  />
                    <br /><br />
            <input type="submit" value="Submit" class="btn btn-default" />
        </form>
    </div>
    @endsection