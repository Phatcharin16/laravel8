<x-bootstrap title="">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">QuotationDetail {{ $quotationdetail->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/quotation-detail') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/quotation-detail/' . $quotationdetail->id . '/edit') }}" title="Edit QuotationDetail"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('quotationdetail' . '/' . $quotationdetail->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete QuotationDetail" onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $quotationdetail->id }}</td>
                                    </tr>
                                    <tr><th> Quotation Id </th><td> {{ $quotationdetail->quotation_id }} </td></tr><tr><th> Product Id </th><td> {{ $quotationdetail->product_id }} </td></tr><tr><th> Amount </th><td> {{ $quotationdetail->amount }} </td></tr><tr><th> Price </th><td> {{ $quotationdetail->price }} </td></tr><tr><th> Total </th><td> {{ $quotationdetail->total }} </td></tr><tr><th> Remark </th><td> {{ $quotationdetail->remark }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-bootstrap>