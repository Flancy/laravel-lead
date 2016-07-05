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
                                <i class="fa a-calendar-check-o" aria-hidden="true"></i> Срок:
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
                                <tr>
                                    <td>
                                        <p>
                                            Компания №1
                                        </p>
                                        <a href="#more">подробно <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                    </td>
                                    <td>
                                        <p>
                                            229 дней
                                        </p>
                                    </td>
                                    <td>
                                        <p>
                                            999 999 руб.
                                        </p>
                                    </td>
                                    <td>
                                        <p>
                                            <i class="fa fa-fire" aria-hidden="true"></i>
                                        </p>
                                    </td>
                                    <td class="text-center">
                                        <a href="#check-bid" class="btn btn-success btn-check-bid">Выбрать</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>
                                            Компания №2
                                        </p>
                                        <a href="#more">подробно <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                    </td>
                                    <td>
                                        <p>
                                            229 дней
                                        </p>
                                    </td>
                                    <td>
                                        <p>
                                            999 999 руб.
                                        </p>
                                    </td>
                                    <td>
                                        <p>
                                            <i class="fa fa-fire" aria-hidden="true"></i>
                                        </p>
                                    </td>
                                    <td class="text-center">
                                        <a href="#check-bid" class="btn btn-success btn-check-bid">Выбрать</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
