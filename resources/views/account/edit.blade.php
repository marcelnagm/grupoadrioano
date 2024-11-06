@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Account
@endsection

@section('content')
    <section class="content container">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Account</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('accounts.update', $account->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('account.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
