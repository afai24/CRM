<?php

namespace crm\Http\Controllers;

use Illuminate\Http\Request;
use crm\Repositories\TransactionRepository;

class TransactionController extends Controller
{
    protected $transactions;
    public function __construct(TransactionRepository $transactions)
    {
        $this->transactions = $transactions;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('transactions.index',[
            'transactions' => $this->transactions->forClient($request->client()),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transactions.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionRequest $request)
    {
        $request->client()->transactions()->create($request->all());
        return redirect('/transaction')->with('success','transaction created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        return view('transactions.edit',[
            'transaction' => $transaction
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        $this->authorize('owner', $transaction);
        $transaction->update($request->all());
        return redirect('/transaction')->with('success','transaction updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $this->authorize('owner', $transaction);
        $task->delete();
        return redirect('/transaction')->with('success','transaction deleted');
    }
}
