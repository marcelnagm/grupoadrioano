@extends('layouts.app')

@section('template_title')
__('Transfer') . " " . __('Account') }}
@endsection

@section('content')

<div class="container">    
<div class="row padding-1 p-1">
    <h3>Dados do Pagador</h3>

    <div class="col-md-12 justify-content-center">
        <div class="row">
            <div class="col-md-3 h6">
                Conta Origem:
            </div>
            <div class="col-md-9 h6">
                {{ $account->acconunt }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 h6">
                Agencia Origem:
            </div>
            <div class="col-md-9 h6">
                {{ $account->agency()->first()}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 h6">
                Saldo:
            </div>
            <div class="col-md-9 h6">
                R${{ $account->balance }}
            </div>
        </div>
    </div>
    <hr>
    <h3>Dados do Destino</h3>
    <div class="col-md-8">
        <form action="{{ route('accounts.processTransfer', ['id' => $account->id]) }}" role="form"
            enctype="multipart/form-data" method="POST">
            @csrf
            <div class="form-group mb-2 mb20">
                <label for="ammount" class="form-label">{{ __('Valor:') }}</label>
                <input type="number" min="0.01" max="{{ $account->balance }}" step="0.01" name="ammount"
                    class="form-control @error('ammount') is-invalid @enderror" id="ammount"
                    placeholder="Quanto deseja Transferir?">
                {!! $errors->first('acconunt', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
            <div class="form-group mb-2 mb20">
                <label for="deposit_account_id" class="form-label">{{ __('Conta Recebedora') }}</label>
                <input type="text" name="deposit_account_id"
                    class="form-control @error('deposit_account_id') is-invalid @enderror" id="deposit_account_id"
                    placeholder="Acconunt">
                {!! $errors->first('deposit_account_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
            <div class="form-group mb-2 mb20">
                <label for="deposit_agency_id" class="form-label">{{ __('Agencia Recebora') }}</label>
                {!! $errors->first('deposit_agency_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                @include('layouts.partials.select', [
    'list' => $agencies,
    'name' => 'deposit_agency_id',
    'value' => ''
])
                </div>
          <div   class="col-md-12 mt20 mt-2">
            <input type="submit" class="btn btn-primary">{{ __('Submit') }}</input>
          </div>
</form>
    </div>
</div>
</div>



@endsection