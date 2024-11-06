<?php

namespace App\Http\Controllers;

use App\Models\Statement;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\StatementRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class StatementController extends Controller
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
        $statements = Statement::paginate();

        return view('statement.index', compact('statements'))
            ->with('i', ($request->input('page', 1) - 1) * $statements->perPage());
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $statement = Statement::find($id);

        return view('statement.show', compact('statement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    
    public function destroy($id): RedirectResponse
    {
        
        $stm = Statement::find($id);
        if(!$stm->refund()){
             return Redirect::route('accounts.index')
        ->with('success', 'Sem saldo para reembolso');
        }else{ return Redirect::route('accounts.index')
            ->with('success', 'trasnaction refunded');
        }
        
    }
}
