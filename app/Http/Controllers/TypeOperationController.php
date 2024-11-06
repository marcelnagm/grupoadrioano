<?php

namespace App\Http\Controllers;

use App\Models\TypeOperation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\TypeOperationRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TypeOperationController extends Controller
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
        $typeOperations = TypeOperation::paginate();

        return view('type-operation.index', compact('typeOperations'))
            ->with('i', ($request->input('page', 1) - 1) * $typeOperations->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $typeOperation = new TypeOperation();

        return view('type-operation.create', compact('typeOperation'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TypeOperationRequest $request): RedirectResponse
    {
        TypeOperation::create($request->validated());

        return Redirect::route('type-operations.index')
            ->with('success', 'TypeOperation created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $typeOperation = TypeOperation::find($id);

        return view('type-operation.show', compact('typeOperation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $typeOperation = TypeOperation::find($id);

        return view('type-operation.edit', compact('typeOperation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TypeOperationRequest $request, TypeOperation $typeOperation): RedirectResponse
    {
        $typeOperation->update($request->validated());

        return Redirect::route('type-operations.index')
            ->with('success', 'TypeOperation updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        TypeOperation::find($id)->delete();

        return Redirect::route('type-operations.index')
            ->with('success', 'TypeOperation deleted successfully');
    }
}
