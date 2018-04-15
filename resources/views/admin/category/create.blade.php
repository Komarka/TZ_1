@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Добавить новую категорию</div>

                    <div class="panel-body">
                        <form action="{{ route('category.store') }}" method="post">
                            {{ csrf_field() }}
                            Имя:
                            <br />
                            <input type="text" name="name" value="{{ old('name') }}" />
                            <br /><br />
                            Путь:
                            <br />
                            <input type="text" name="path_name" value="{{ old('path_name') }}" />
                            <br /><br />
                            <input type="submit" value="Submit" class="btn btn-default" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection