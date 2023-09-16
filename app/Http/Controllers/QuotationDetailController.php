<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\QuotationDetail;
use Illuminate\Http\Request;

class QuotationDetailController extends Controller
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
            $quotationdetail = QuotationDetail::where('amount', 'LIKE', "%$keyword%")
                ->orWhere('price', 'LIKE', "%$keyword%")
                ->orWhere('remark', 'LIKE', "%$keyword%")
                ->orWhere('quotation_id', 'LIKE', "%$keyword%")
                ->orWhere('product_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $quotationdetail = QuotationDetail::latest()->paginate($perPage);
        }

        return view('quotation-detail.index', compact('quotationdetail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $products = Product::get();
        return view('quotation-detail.create', compact('products'));
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
        $requestData['total'] = $requestData['amount'] * $requestData['price'];

        QuotationDetail::create($requestData);

        // return redirect('quotation-detail')->with('flash_message', 'QuotationDetail added!');
        return redirect()->route('quotation.show', $requestData['quotation_id']);
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
        $quotationdetail = QuotationDetail::findOrFail($id);

        return view('quotation-detail.show', compact('quotationdetail'));
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
        $quotationdetail = QuotationDetail::findOrFail($id);

        $products = Product::get();

        return view('quotation-detail.edit', compact('quotationdetail', 'products'));
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
        $requestData['total'] = $requestData['amount'] * $requestData['price'];
        $quotationdetail = QuotationDetail::findOrFail($id);
        $quotationdetail->update($requestData);

        // return redirect('quotation-detail')->with('flash_message', 'QuotationDetail updated!');
        return redirect()->route('quotation.show', $requestData['quotation_id']);
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
        $quotationdetail = QuotationDetail::findOrFail($id);
        $quotation_id = $quotationdetail->quotation_id;
        QuotationDetail::destroy($id);

        // return redirect('quotation-detail')->with('flash_message', 'QuotationDetail deleted!');
        return redirect()->route('quotation.show', $quotation_id);
    }
}
