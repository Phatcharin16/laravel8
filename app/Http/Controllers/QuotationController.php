<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Customer;
use App\Models\Quotation;
use App\Models\User;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $quotation = Quotation::where('customer_id', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orWhere('vat_percent', 'LIKE', "%$keyword%")
                ->orWhere('vat', 'LIKE', "%$keyword%")
                ->orWhere('sub_total', 'LIKE', "%$keyword%")
                ->orWhere('net_total', 'LIKE', "%$keyword%")
                ->orWhere('remark', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $quotation = Quotation::latest()->paginate($perPage);
        }

        return view('quotation.index', compact('quotation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $users = User::get();
        $customers = Customer::get();
        return view('quotation.create', compact('users', 'customers'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $requestData = $request->all();

        Quotation::create($requestData);

        return redirect('quotation')->with('flash_message', 'Quotation added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $quotation = Quotation::findOrFail($id);

        return view('quotation.show', compact('quotation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $quotation = Quotation::findOrFail($id);
        $users = User::get();
        $customers = Customer::get();

        return view('quotation.edit', compact('quotation', 'users', 'customers'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $quotation = Quotation::findOrFail($id);
        $quotation->update($requestData);

        return redirect('quotation')->with('flash_message', 'Quotation updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Quotation::destroy($id);

        return redirect('quotation')->with('flash_message', 'Quotation deleted!');
    }
}
