<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user?->name) }}" id="name" placeholder="Name">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user?->email) }}" id="email" placeholder="Email">
            {!! $errors->first('email', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="c_p_f" class="form-label">{{ __('Cpf') }}</label>
            <input type="text" name="CPF" class="form-control @error('CPF') is-invalid @enderror" value="{{ old('CPF', $user?->CPF) }}" id="c_p_f" placeholder="Cpf">
            {!! $errors->first('CPF', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="r_g" class="form-label">{{ __('Rg') }}</label>
            <input type="text" name="RG" class="form-control @error('RG') is-invalid @enderror" value="{{ old('RG', $user?->RG) }}" id="r_g" placeholder="Rg">
            {!! $errors->first('RG', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="r_g_emissor" class="form-label">{{ __('Rg Emissor') }}</label>
            <input type="text" name="RG_emissor" class="form-control @error('RG_emissor') is-invalid @enderror" value="{{ old('RG_emissor', $user?->RG_emissor) }}" id="r_g_emissor" placeholder="Rg Emissor">
            {!! $errors->first('RG_emissor', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="r_g_emissao" class="form-label">{{ __('Rg Emissao') }}</label>
            <input type="text" name="RG_emissao" class="form-control @error('RG_emissao') is-invalid @enderror" value="{{ old('RG_emissao', $user?->RG_emissao) }}" id="r_g_emissao" placeholder="Rg Emissao">
            {!! $errors->first('RG_emissao', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>