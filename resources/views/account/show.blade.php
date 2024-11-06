@extends('layouts.app')

@section('template_title')
{{ $account->name ?? __('Show') . " " . __('Account') }}
@endsection

@section('content')
<section class="content container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                    <div class="float-left">
                        <span class="card-title">{{ __('Show') }} Account</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary btn-sm" href="{{ route('accounts.index') }}"> {{ __('Back') }}</a>
                    </div>
                </div>

                <div class="card-body bg-white">
                    @if (Auth::user()->isAdmin())
                        <div class="form-group mb-2 mb20">
                            <strong>User Id:</strong>
                            {{ $account->user_id }}
                        </div>
                    @endif
                    <div class="form-group mb-2 mb20">
                        <strong>Acconunt:</strong>
                        {{ $account->acconunt }}
                    </div>
                    <div class="form-group mb-2 mb20">
                        <strong>Agency Id:</strong>
                        {{ $account->agency_id }}
                    </div>
                    <div class="form-group mb-2 mb20">
                        <strong>Balance:</strong>
                        R${{ $account->balance }}
                    </div>
                    <div class="form-group mb-2 mb20">
                        <strong>Operations:</strong>
                        <a class="btn btn-success" href="{{ route('accounts.deposit',['id' => $account->id]) }}">Depositar</a>
                        <a class="btn btn-primary" href="{{ route('accounts.trasnfer',['id' => $account->id]) }}">Transferir</a>
                        <a class="btn btn-secondary" href="{{ route('accounts.summary',['id' => $account->id]) }}">Extrato</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection