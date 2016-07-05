@extends('layouts.app')

@section('content')
<div class="container leads">
    <div class="row">
        @include('layouts.nav-company')
        <div class="col-sm-9">
            <div class="panel panel-info">
                <div class="panel-heading">Заявки</div>

                <div class="panel-body panel-lead">
                    @foreach($leads as $lead)
                        <div class="row row-lead">
                            <div class="wrap-lead clearfix">
                                <div class="col-sm-3 hidden-xs">
                                    <div class="row img-lead-wrap">
                                        <img src="/img/default_lead.jpg" class="img-lead" alt="" />
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-9">
                                    <div class="row lead-info">
                                        <h4 class="lead-info-head col-xs-12">{{ $lead->lead_name }}</h4>
                                        <div class="col-xs-5 col-md-4">
                                            <p class="lead-info-label"><i class="fa fa-archive" aria-hidden="true"></i>категория:</p>
                                            <p class="lead-info-label"><i class="fa fa-calendar-check-o" aria-hidden="true"></i>срок до:</p>
                                            <p class="lead-info-label"><i class="fa fa-rub" aria-hidden="true"></i>бюджет:</p>
                                            <p class="lead-info-label"><i class="fa fa-user" aria-hidden="true"></i>ФИО заказчика:</p>
                                        </div>
                                        <div class="col-xs-7 col-md-8">
                                            <p class="lead-info-value">{{ $lead->category }}</p>
                                            <p class="lead-info-value">{{ $lead->date_actual }}</p>
                                            <p class="lead-info-value">{{ $lead->price }}</p>
                                            <p class="lead-info-value">{{ $lead->name }}</p>
                                        </div>
                                        <div class="col-xs-12">
                                        @if (Auth::user()->company->payLead()->where('lead_id',$lead->id)->where('buy', 1)->first())
                                            <a href="/lead/{{ $lead->id }}" class="btn btn-success btn-lead-page">Перейти на страницу заявки</a>
                                        @else
                                            <form action="/lead/{{ $lead->id }}/buy" method="post">
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="id_lead" value="{{ $lead->id }}">
                                                <button class="btn btn-success btn-lead-page" type="submit" name="button">Купить заявку</button>
                                            </form>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
