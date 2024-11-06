@extends('layouts.app')

@section('template_title')
    Accounts
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Accounts') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('accounts.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
									<th >User Id</th>
									<th >Acconunt</th>
									<th >Agency Id</th>
									<th >Balance</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($accounts as $account)
                                        <tr>                                                                                        
										<td >{{ $account->user_id }}</td>
										<td >{{ $account->acconunt }}</td>
										<td >{{ $account->agency_id }}</td>
										<td >{{ $account->balance }}</td>

                                            <td>
                                                <form action="{{ route('accounts.destroy', $account->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('accounts.show', $account->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('accounts.edit', $account->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $accounts->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
