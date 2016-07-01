@extends('layouts.app')

@section('content')
<div class="container welcome">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-info">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    Your Application's Landing Page.

                    <div class="btn-register text-center">
                        <a href="{{ url('register') }}" class="btn btn-success">Зарегистрироваться</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
