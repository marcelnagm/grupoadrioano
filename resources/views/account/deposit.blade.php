@extends('layouts.app')

@section('template_title')
__('Deposit') . " " . __('Account') }}
@endsection

@section('content')
<div class="container">
<div class="row padding-1 p-1"></div>
    <div class="col-md-12">
        <form action="{{ route('accounts.processDeposit', ['id' => $account->id]) }}" role="form" enctype="multipart/form-data" method="POST">
        @csrf            
            <input type="hidden" name="id" value="{{ $account->id }}">
            <div class="form-group mb-2 mb20">
                <label for="acconunt" class="form-label">{{ __('Ammount') }}</label>
                <input type="number" min="0.01" max="100000" step="0.01" name="ammount"
                    class="form-control @error('ammount') is-invalid @enderror" id="ammount"
                    placeholder="Quanto deseja depositar?">
                {!! $errors->first('acconunt', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
            <div class="col-md-12 mt20 mt-2">
                <input type="submit" class="btn btn-primary">{{ __('Submit') }}</input>
            </div>
        </form>
    </div>
</div>
</div>



@endsection