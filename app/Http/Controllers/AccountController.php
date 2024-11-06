<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepositRequest;
use App\Http\Requests\TransferRequest;
use App\Models\Account;
use App\Models\Agency;
use App\Models\Statement;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AccountRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AccountController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {

        if ($request->user()->isAdmin()) {

            $accounts = Account::paginate();
        } else {
            $accounts = $request->user()->accounts()->paginate();

        }

        return view('account.index', compact('accounts'))
            ->with('i', ($request->input('page', 1) - 1) * $accounts->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $account = new Account();
        $agencies = Agency::all();

        return view('account.create', compact('account', 'agencies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AccountRequest $request): RedirectResponse
    {

        $data = $request->validated();

        $data['user_id'] = auth()->user()->id;

        Account::create($data);

        return Redirect::route('accounts.index')
            ->with('success', 'Account created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $account = Account::find($id);

        return view('account.show', compact('account'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    
    public function processDeposit(DepositRequest $request, $id): RedirectResponse
    {
        $account = Account::find($id);
        if (!$account->isOwned()) {
            return Redirect::route('accounts.index')
                ->with('error', 'VocÊ pode depositar apenas na sua conta.');
        }
        // dd($account->toArray());

        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $data['account_id'] = $account->id;
        $data['agency_id'] = $account->agency_id;        
        $data['value'] = $data['ammount'];
        $statements = new Statement($data);
        // $statements->save();

        $statements->deposit();
        // dd('aqui');

        return Redirect::route('accounts.show', $account->id)
            ->with('success', 'Account deposit successfully');
    }


    public function processTransfer(TransferRequest $request,$id): RedirectResponse
    {

        $account = Account::find($id);

        if(!$account->isOwned()){            
        return Redirect::route('accounts.index')->with('error', 'Account not owned');
        }

        
        $data = $request->validated();       
        $deposit_account = Account::where('acconunt',$data['deposit_account_id'])->get()->first();
        $data['user_id'] = auth()->user()->id;
        $data['account_id'] = $account->id;        
        $data['agency_id'] = $account->agency_id;        
        $data['value'] = $data['ammount'];

        if($deposit_account->id == $data['account_id']){            
            return Redirect::route('accounts.index')->with('error', 'A conta destino não pode ser a sua');
        }
        
        if($deposit_account->agency_id != $data['deposit_agency_id']){            
            return Redirect::route('accounts.index')->with('error', 'A agencia destino para esta conta esta errada corrija ');
        }

        $data['deposit_account_id'] = $deposit_account->id;
        $statements = new Statement($data);
        if($statements->transfer()) return Redirect::route('accounts.index')->with('success', 'Transfer successfully');
        return Redirect::route('accounts.index')->with('error', 'Saldo Insuficiente');
    }

    public function deposit($id): View
    {
        $account = Account::find($id);
        $agencies = Agency::all();

        return view('account.deposit', compact('account', 'agencies'));
    }

    public function transfer($id): View
    {
        $account = Account::find($id);
        $agencies = Agency::all();

        return view('account.transfer', compact('account', 'agencies'));
    }

    public function summary(Request $request,$id): View
    {
        $account = Account::find($id);
        $statements = $account->statements()->paginate();

        return view('account.summary', compact('account','statements'))
        ->with('i', ($request->input('page', 1) - 1) * $statements->perPage());
    }


    public function edit($id): View
    {
        $account = Account::find($id);
        $agencies = Agency::all();

        return view('account.edit', compact('account', 'agencies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AccountRequest $request, Account $account): RedirectResponse
    {
        $account->update($request->validated());

        return Redirect::route('accounts.index')
            ->with('success', 'Account updated successfully');
    }



    public function destroy($id): RedirectResponse
    {
        Account::find($id)->delete();

        return Redirect::route('accounts.index')
            ->with('success', 'Account deleted successfully');
    }
}
