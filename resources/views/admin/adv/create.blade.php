@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Добавить новую рекламу</div>

                    <div class="panel-body">
                        <form action="{{ route('adv.store') }}" method="post">
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
                </div>
            </div>
        </div>
    </div>
@endsection