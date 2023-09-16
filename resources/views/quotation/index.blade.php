<x-bootstrap title="">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Quotation</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-9">
                                <a href="{{ url('/quotation/create') }}" class="btn btn-success btn-sm" title="Add New Quotation">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Add New
                                </a>
                            </div>
                            <div class="col-lg-3">
                                <form method="GET" action="{{ url('/quotation') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                        <span class="input-group-append">
                                            <button class="btn btn-secondary" type="submit">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <br />

                        <br />
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Customer Id</th>
                                        <th>User Id</th>
                                        <th>Vat Percent</th>
                                        <th>Vat</th>
                                        <th>Sub Total</th>
                                        <th>Net Total</th>
                                        <th>Remark</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($quotation as $item)
                                    @php
                                    // CALCULATE
                                    $net_total = $item->quotationDetails()->sum('total');
                                    $vat = ($item->vat_percent / 100) * $net_total;
                                    $sub_total = $net_total - $vat;
                                    // FORMAT
                                    $net_total = number_format($net_total, 2);
                                    $vat = number_format($vat, 2);
                                    $sub_total = number_format($sub_total, 2);
                                    @endphp

                                    <tr>
                                        <!-- <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->customer_id }}</td>
                                        <td>{{ $item->user_id }}</td>
                                        <td>{{ $item->vat_percent }}</td>
                                        <td>{{ $item->vat }}</td>
                                        <td>{{ $item->sub_total }}</td>
                                        <td>{{ $item->net_total }}</td> -->
                                        <td>{{ sprintf('Q%03d', $item->id) }}</td>
                                        <td>{{ $item->customer->name }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->vat_percent }}%</td>
                                        <td>{{ $vat }}</td>
                                        <td>{{ $sub_total }}</td>
                                        <td>{{ $net_total }}</td>

                                        <td>{{ $item->remark }}</td>

                                        <td>
                                            <a href="{{ url('/quotation/' . $item->id) }}" title="View Quotation"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/quotation/' . $item->id . '/edit') }}" title="Edit Quotation"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/quotation' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Quotation" onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $quotation->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-bootstrap>