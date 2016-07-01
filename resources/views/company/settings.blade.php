@extends('layouts.app')

@section('content')
<div class="container settings">
    <div class="row">
        @include('layouts.nav-company')
        <div class="col-sm-9">
            <div class="panel panel-info">
                <div class="panel-heading">Настройки</div>

                <div class="panel-body">
                    <div class="form-raw">
                        <p class="form-head">
                            Личная информация
                        </p>
                        @if(session()->has('success'))
                            <div class="alert alert-dismissible alert-success">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>
                                    {!! session()->get('success') !!}
                                </strong>
                            </div>
                        @endif
                        <form class="form-horizontal settings-form" role="form" action="/settings/general" method="post">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">ФИО</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-btn fa-edit"></i> Изменить информацию
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
