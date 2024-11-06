@extends('layouts.app')

@section('template_title')
    Statements
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Summary of Account') }} - {{ $account->account_number }}
                            </span>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
									<th >User Id</th>
									<th >Account Id</th>
									<th >Agency Id</th>
									<th >Value</th>
									<th >Deposit Account Id</th>
									<th >Deposit Agency Id</th>
									<th >Date</th>
									<th >Type Operation Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($statements as $statement)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $statement->user()->first() }}</td>
										<td >{{ $statement->account()->first() }}</td>
										<td >{{ $statement->agency()->first() }}</td>
										<td >{{ $statement->value }}</td>
										<td >{{ $statement->depositAccount()->first() }}</td>
										<td >{{ $statement->depositAgency()->first() }}</td>
										<td >{{ $statement->date }}</td>
										<td >{{ $statement->operation() }}</td>

                                            <td>
                                                <form action="{{ route('statements.destroy', $statement->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('statements.show', $statement->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Detalhes') }}</a>
                                                    @if ($statement->whoRefund())
                                                    
                                                    
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Você deseja estornar esta transação?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Estornar') }}</button>
                                                    @endif
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $statements->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
