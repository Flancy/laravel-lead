@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('layouts.nav-company')
        <div class="col-sm-9">
            <div class="panel panel-info">
                <div class="panel-heading">Заявки</div>

                <div class="panel-body">
                    @foreach($leads as $lead)
                        <div class="row row-lead">
                            <div class="wrap-lead">
                                <div class="col-xs-3">
                                    <img src="/uploads/default.jpg" class="img-responsive" alt="" />
                                </div>
                                <div class="col-xs-9">
                                    <p>
                                        Имя: {{ $lead->name }}
                                    </p>
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
