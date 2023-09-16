<x-bootstrap title="">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Quotation {{ $quotation->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/quotation') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/quotation/' . $quotation->id . '/edit') }}" title="Edit Quotation"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                Edit</button></a>

                        <a href="{{ url('/quotation/' . $quotation->id . '/pdf') }}" title="PDF">
                            <button class="btn btn-success btn-sm">
                                <i class="fa fa-file" aria-hidden="true"></i> PDF
                            </button>
                        </a>
                        <button class="btn btn-secondary btn-sm" onclick="window.print();">
                            <i class="fa fa-print" aria-hidden="true"></i>
                            พิมพ์หน้านี้
                        </button>

                        <form method="POST" action="{{ url('quotation' . '/' . $quotation->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Quotation" onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br />
                        <br />
                        @php
                        // CALCULATE
                        $net_total = $quotation->quotationDetails()->sum('total');
                        $vat = ($quotation->vat_percent / 100) * $net_total;
                        $sub_total = $net_total - $vat;
                        // FORMAT
                        $net_total = number_format($net_total, 2);
                        $vat = number_format($vat, 2);
                        $sub_total = number_format($sub_total, 2);
                        @endphp


                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th> {{-- <td>{{ $quotation->id }}</td> --}}
                                        <td>{{ sprintf('Q%03d', $quotation->id) }}</td>
                                    </tr>
                                    <tr>
                                        <th> Customer Id </th> {{-- <td> {{ $quotation->customer_id }} </td> --}}
                                        <td> {{ $quotation->customer->name }} </td>
                                    </tr>
                                    <tr>
                                        <th> User Id </th> {{-- <td> {{ $quotation->user_id }} </td> --}}
                                        <td> {{ $quotation->user->name }} </td>
                                    </tr>
                                    <tr>
                                        <th> Vat Percent </th>
                                        <td> {{ $quotation->vat_percent }}% </td>
                                    </tr>
                                    <tr>
                                        <th> Vat </th> {{-- <td> {{ $quotation->vat }} </td> --}}
                                        <td> {{ $vat }} </td>
                                    </tr>
                                    <tr>
                                        <th> Sub Total </th> {{-- <td> {{ $quotation->sub_total }} </td> --}}
                                        <td> {{ $sub_total }} </td>
                                    </tr>
                                    <tr>
                                        <th> Net Total </th> {{-- <td> {{ $quotation->net_total }} </td> --}}
                                        <td> {{ $net_total }} </td>
                                    </tr>
                                    <tr>
                                        <th> Remark </th>
                                        <td> {{ $quotation->remark }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                        <hr>
                        @php
                        $quotationdetail = $quotation->quotationDetails()->get();
                        @endphp

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <!-- <th>Quotation Id</th> -->
                                        <th>Product Id</th>
                                        <th>Amount</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                        <!-- <th>Remark</th> -->
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($quotationdetail as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <!-- <td>{{ $item->quotation_id }}</td> -->
                                        <!-- <td>{{ $item->product_id }}</td> -->
                                        <td>{{ $item->product->title }}</td>
                                        <td>{{ $item->amount }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->total }}</td>
                                        <!-- <td>{{ $item->remark }}</td> -->
                                        <td>
                                            <!-- <a href="{{ url('/quotation-detail/' . $item->id) }}" title="View QuotationDetail"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a> -->
                                            <a href="{{ url('/quotation-detail/' . $item->id . '/edit') }}" title="Edit QuotationDetail"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/quotation-detail' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete QuotationDetail" onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="text-center">
                            <a href="{{ url('/quotation-detail/create') }}?quotation_id={{ $quotation->id }}" class="btn btn-success btn-sm" title="Add New QuotationDetail">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add New
                            </a>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
    </div>
</x-bootstrap>