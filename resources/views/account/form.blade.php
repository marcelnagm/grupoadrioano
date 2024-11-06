<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="acconunt" class="form-label">{{ __('Acconunt') }}</label>
            <input type="text" name="acconunt" class="form-control @error('acconunt') is-invalid @enderror" value="{{ old('acconunt', $account?->acconunt) }}" id="acconunt" placeholder="Acconunt">
            {!! $errors->first('acconunt', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="agency_id" class="form-label">{{ __('Agency Id') }}</label>            
            {!! $errors->first('agency_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        
        @include('layouts.partials.select', [
        'list' => $agencies,
        'name' => 'agency_id',
          'value' =>   old('agency_id', $account?->agency_id) 
        ])
        </div>
    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>