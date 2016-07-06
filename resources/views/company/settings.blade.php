@extends('layouts.app')

@section('content')
<div class="container settings">
    <div class="row">
        @include('layouts.nav-company')
        <div class="col-sm-8 col-md-9">
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

                        <div class="form-wrap">
                            <div class="company-img">
                                @if($user->company->avatar == 'default.jpg')
                                    <img src="/uploads/default.jpg" alt="{{ $user->company->name }}" class="img-responsive" />
                                @else
                                    <img src="/uploads/{{ $user->id.'/'.$user->company->avatar }}"
                                    alt="{{ $user->company->name }}" class="img-responsive" />
                                @endif
                            </div>

                            <form class="form-horizontal settings-form" role="form" action="/settings/general" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-sm-3 control-label">ФИО</label>

                                    <div class="col-sm-7">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">&nbsp;</div>
                                    <label class="btn btn-primary btn-file">
                                        Выберите файл... <input name="avatar" type="file" onchange="selectFile(this.value);">
                                    </label>
                                    <span id="changeAvatar">Файл не выбран</span>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
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
</div>
@endsection
