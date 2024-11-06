@extends('layouts.app')

@section('template_title')
    {{ $statement->name ?? __('Show') . " " . __('Statement') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Statement</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('statements.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>User Id:</strong>
                                    {{ $statement->user_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Account Id:</strong>
                                    {{ $statement->account_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Agency Id:</strong>
                                    {{ $statement->agency_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Value:</strong>
                                    {{ $statement->value }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Deposit Account Id:</strong>
                                    {{ $statement->deposit_account_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Deposit Agency Id:</strong>
                                    {{ $statement->deposit_agency_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Date:</strong>
                                    {{ $statement->date }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Type Operation Id:</strong>
                                    {{ $statement->type_operation_id }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
