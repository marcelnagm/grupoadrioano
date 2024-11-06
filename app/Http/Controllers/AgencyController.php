<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AgencyRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AgencyController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $agencies = Agency::paginate();

        return view('agency.index', compact('agencies'))
            ->with('i', ($request->input('page', 1) - 1) * $agencies->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $agency = new Agency();

        return view('agency.create', compact('agency'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AgencyRequest $request): RedirectResponse
    {
        Agency::create($request->validated());

        return Redirect::route('agencies.index')
            ->with('success', 'Agency created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $agency = Agency::find($id);

        return view('agency.show', compact('agency'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $agency = Agency::find($id);

        return view('agency.edit', compact('agency'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AgencyRequest $request, Agency $agency): RedirectResponse
    {
        $agency->update($request->validated());

        return Redirect::route('agencies.index')
            ->with('success', 'Agency updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Agency::find($id)->delete();

        return Redirect::route('agencies.index')
            ->with('success', 'Agency deleted successfully');
    }
}
