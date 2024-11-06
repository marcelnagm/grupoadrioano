<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="user_id" class="form-label">{{ __('User Id') }}</label>
            <input type="text" name="user_id" class="form-control @error('user_id') is-invalid @enderror" value="{{ old('user_id', $statement?->user_id) }}" id="user_id" placeholder="User Id">
            {!! $errors->first('user_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="account_id" class="form-label">{{ __('Account Id') }}</label>
            <input type="text" name="account_id" class="form-control @error('account_id') is-invalid @enderror" value="{{ old('account_id', $statement?->account_id) }}" id="account_id" placeholder="Account Id">
            {!! $errors->first('account_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="agency_id" class="form-label">{{ __('Agency Id') }}</label>
            <input type="text" name="agency_id" class="form-control @error('agency_id') is-invalid @enderror" value="{{ old('agency_id', $statement?->agency_id) }}" id="agency_id" placeholder="Agency Id">
            {!! $errors->first('agency_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="value" class="form-label">{{ __('Value') }}</label>
            <input type="text" name="value" class="form-control @error('value') is-invalid @enderror" value="{{ old('value', $statement?->value) }}" id="value" placeholder="Value">
            {!! $errors->first('value', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="deposit_account_id" class="form-label">{{ __('Deposit Account Id') }}</label>
            <input type="text" name="deposit_account_id" class="form-control @error('deposit_account_id') is-invalid @enderror" value="{{ old('deposit_account_id', $statement?->deposit_account_id) }}" id="deposit_account_id" placeholder="Deposit Account Id">
            {!! $errors->first('deposit_account_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="deposit_agency_id" class="form-label">{{ __('Deposit Agency Id') }}</label>
            <input type="text" name="deposit_agency_id" class="form-control @error('deposit_agency_id') is-invalid @enderror" value="{{ old('deposit_agency_id', $statement?->deposit_agency_id) }}" id="deposit_agency_id" placeholder="Deposit Agency Id">
            {!! $errors->first('deposit_agency_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="date" class="form-label">{{ __('Date') }}</label>
            <input type="text" name="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date', $statement?->date) }}" id="date" placeholder="Date">
            {!! $errors->first('date', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="type_operation_id" class="form-label">{{ __('Type Operation Id') }}</label>
            <input type="text" name="type_operation_id" class="form-control @error('type_operation_id') is-invalid @enderror" value="{{ old('type_operation_id', $statement?->type_operation_id) }}" id="type_operation_id" placeholder="Type Operation Id">
            {!! $errors->first('type_operation_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>