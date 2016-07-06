@extends('layouts.app')

@section('content')
<div class="container lead-register">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">Подать заявку</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/lead-register">
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

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Адрес</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label for="category" class="col-md-4 control-label">Тип заявки</label>

                            <div class="col-md-6">
                                <select id="category" class="selectpicker form-control" name="category" data-live-search="true" title="Выберите одну из категорий...">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->slug }}" data-tokens="{{ $category->name }}" data-icon="{{ $category->icon }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('lead_name') ? ' has-error' : '' }}">
                            <label for="lead_name" class="col-md-4 control-label">Название заявки</label>

                            <div class="col-md-6">
                                <input id="lead_name" type="text" class="form-control" name="lead_name" value="{{ old('lead_name') }}">

                                @if ($errors->has('lead_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lead_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('date_actual') ? ' has-error' : '' }}">
                            <label for="date" class="col-md-4 control-label">Исполнение заявки</label>

                            <div class="col-md-6">
                                <div class='input-group date' id='datetimepicker'>
                                    <input type='text' id="date_actual" type="date" class="form-control" name="date_actual" value="{{ old('date_actual') }}" />
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                    </span>
                                </div>

                                @if ($errors->has('date_actual'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date_actual') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Подробное описание</label>

                            <div class="col-md-6">
                                <textarea name="description" rows="8" class="form-control" value="{{ old('description') }}">{{ old('description') }}</textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-4 control-label">Цена заявки</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control amount" name="price" value="{{ old('price') }}"/>

                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-btn fa-user"></i> Подать заявку
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
