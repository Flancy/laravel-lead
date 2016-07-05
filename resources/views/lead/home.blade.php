@extends('layouts.app')

@section('content')
<div class="container lead-page">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-info">
                <div class="panel-heading">Ваша заявка</div>

                <div class="panel-body panel-lead">
                    <h3 class="lead-head">
                        {{ $lead->lead_name }}
                    </h3>
                    <div class="row text-center">
                        <div class="col-sm-3 col-xs-6">
                            <p class="lead-info-label">
                                <i class="fa fa-power-off" aria-hidden="true"></i> Статус:
                            </p>
                            <p class="lead-info-value">
                                Не выполняется
                            </p>
                        </div>

                        <div class="col-sm-3 col-xs-6">
                            <p class="lead-info-label">
                                <i class="fa fa-archive" aria-hidden="true"></i> Категория:
                            </p>
                            <p class="lead-info-value">
                                {{ $lead->category }}
                            </p>
                        </div>

                        <div class="col-sm-3 col-xs-6">
                            <p class="lead-info-label">
                                <i class="fa fa-rub" aria-hidden="true"></i> Бюджет:
                            </p>
                            <p class="lead-info-value">
                                {{ $lead->price }}
                            </p>
                        </div>

                        <div class="col-sm-3 col-xs-6">
                            <p class="lead-info-label">
                                <i class="fa a-calendar-check-o" aria-hidden="true"></i> Срок до:
                            </p>
                            <p class="lead-info-value">
                                {{ $lead->date_actual }}
                            </p>
                        </div>

                        <div class="col-xs-7 text-left lead-info-general">
                            <p class="lead-info-label">
                                Описание:
                            </p>
                            <p class="lead-info-description">
                                {{ $lead->description }}
                            </p>
                        </div>
                        <div class="col-xs-5 lead-info-img">
                            <img src="/img/default_lead.jpg" class="img-responsive lead-img" alt="" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-info">
                <div class="panel-heading">Предложения поставщиков</div>

                <div class="panel-body panel-lead-bid">
                    <div class="table-responsive">
                        <table class="table table-condensed table-hover">
                            <thead>
                                <tr>
                                    <th>
                                        Название компании <i class="fa fa-chevron-circle-down" aria-hidden="true"></i>
                                    </th>
                                    <th>
                                        Сроки <i class="fa fa-chevron-circle-down" aria-hidden="true"></i>
                                    </th>
                                    <th>
                                        Цена <i class="fa fa-chevron-circle-down" aria-hidden="true"></i>
                                    </th>
                                    <th>
                                        <i class="fa fa-fire" aria-hidden="true"></i> <i class="fa fa-check-circle" aria-hidden="true"></i>
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bids as $bid)
                                    <tr>
                                        <td>
                                            <p>
                                                Компания №1
                                            </p>
                                            @role(!'admin|company')
                                                <a href="#more">подробно <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                            @endrole
                                        </td>
                                        <td>
                                            <p>
                                                {{ $bid->date_actual }}
                                            </p>
                                        </td>
                                        <td>
                                            <p>
                                                {{ $bid->price }} руб.
                                            </p>
                                        </td>
                                        <td>
                                            <p>
                                                @if (!empty($bid->unique_offer))
                                                    <i class="fa fa-fire" aria-hidden="true"></i>
                                                @endif
                                            </p>
                                        </td>
                                        <td class="text-center">
                                            @role(!'admin|company')
                                                <a href="#check-bid" class="btn btn-success btn-check-bid">Выбрать</a>
                                            @endrole
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            @role('admin|company')
                @forelse ($bids as $bid)
                    @if ($bid->company_id == Auth::user()->company->id)
                        {{ $flag = '&nbsp;' }}
                        @break
                    @endif
                    @empty
                        {{ $flag = '' }}
                @endforelse

                @if ($flag !== '&nbsp;')
                    <div class="panel panel-info">
                        <div class="panel-heading">Оставить свое предложение</div>

                        <div class="panel-body panel-lead-bid">
                            @if(session()->has('success'))
                                <div class="alert alert-dismissible alert-success">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>
                                        {!! session()->get('success') !!}
                                    </strong>
                                </div>
                            @endif
                            <form class="form-horizontal form-bid" role="form" method="POST" action="/lead/{{ $lead->id }}/add-bid">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('date_actual') ? ' has-error' : '' }}">
                                    <label for="date" class="col-md-4 control-label">Дата исполнения заявки: </label>

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
                                    <label for="date" class="col-md-4 control-label">Описание выполнения: </label>

                                    <div class="col-md-6">
                                        <textarea name="description" rows="8" class="form-control" value="{{ old('description') }}">{{ old('description') }}</textarea>

                                        @if ($errors->has('description'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('unique_offer') ? ' has-error' : '' }}">
                                    <label for="date" class="col-md-4 control-label">Уникальное предложение: <i class="fa fa-fire" aria-hidden="true"></i></label>

                                    <div class="col-md-6">
                                        <textarea name="unique_offer" rows="8" class="form-control" value="{{ old('unique_offer') }}">{{ old('unique_offer') }}</textarea>

                                        @if ($errors->has('unique_offer'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('unique_offer') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                    <label for="category" class="col-md-4 control-label">Цена: </label>

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
                                            <i class="fa fa-bullhorn" aria-hidden="true"></i> Добавить предложение
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
            @endrole
        </div>
    </div>
</div>
@endsection
