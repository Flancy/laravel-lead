@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('layouts.nav-company')
        <div class="col-sm-9">
            <div class="panel panel-info">
                <div class="panel-heading">Заявки</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
