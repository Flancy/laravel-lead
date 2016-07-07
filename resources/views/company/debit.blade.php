@extends('layouts.app')

@section('content')
<div class="container debit">
    <div class="row">
        @include('layouts.nav-company')
        <div class="col-sm-8 col-md-9">
            <div class="panel panel-info">
                <div class="panel-heading">Счет</div>

                <div class="panel-body">
					<div class="row">
						<div class="col-sm-7">
							<div class="debit-head">
								<p>
									Ваш баланс - 
									@{{ debit.userDebit }} руб.
								</p>
							</div>
							<div class="debit-form">
								@if(session()->has('success'))
		                            <div class="alert alert-dismissible alert-success">
		                                <button type="button" class="close" data-dismiss="alert">&times;</button>
		                                <strong>
		                                    {!! session()->get('success') !!}
		                                </strong>
		                            </div>
		                        @endif

								<div class="alert alert-dismissible alert-success" transition="success" v-show="success.status">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
	                                <strong>
	                                    @{{ success.message }}
	                                </strong>
								</div>

								<p class="debit-form-head">
									Пополнить счет на:
								</p>
								<form action="/debit" method="post" class="form-horizontal" role="form" @submit.prevent="addMoney">
									{{ csrf_field() }}
									{{ method_field('PATCH') }}

									<div class="form-group row">
			                            <div class="col-md-6{{ $errors->has('money') ? ' has-error' : '' }}" v-bind:class="{ 'has-error': !validation.money }">
			                                <input id="money" type="text" class="form-control amount" name="money" value="{{ old('money') }}" v-model="debit.money" number/>

			                                <span class="help-block" v-show="!validation.money">
		                                        <strong>Введите сумму пополнения</strong>
		                                    </span>
	
			                                @if ($errors->has('money'))
			                                    <span class="help-block">
			                                        <strong>{{ $errors->first('money') }}</strong>
			                                    </span>
			                                @endif
			                            </div>

			                            <div class="col-md-6">
			                                <button type="submit" class="btn btn-success" v-bind:disabled="!validation.money">
			                                    <i class="fa fa-btn fa-plus"></i> Пополнить
			                                </button>
			                            </div>
			                        </div>
								</form>
							</div>
						</div>
						<div class="col-sm-5">
							<div class="debit-head">
								<p>Что это?</p>
							</div>
							<div class="debit-body">
								<p>
									С этого счета списывается комиссия за выполнение тендеров.
								</p>
								<p>
									Поддерживайте положительный баланс для возможности оставлять предложения и пользоваться возможностями сервиса.
								</p>
							</div>
						</div>
					</div>
                </div>
            </div>	
        </div>
    </div>
</div>
@endsection
