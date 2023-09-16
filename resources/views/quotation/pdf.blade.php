<x-bootstrap-pdf title="">
    <div class="container">
        <div class="row">
            <div class="col-xs-5">
                <div>มหาวิทยาลัยราชภัฏวไลยอลงกรณ์ในพระบรมราชูปถัมภ์</div>
                <div>เลขที่ 1 หมู่ 20 ถนนพหลโยธิน ต.คลองหนึ่ง อ.คลองหลวง จ.ปทุมธานี 13180</div>
                <div>Tel : 0-2529-0674-7 | Email : saraban@vru.ac.th</div>
            </div>
        </div>

        <hr />

        <div class="text-center">
            <div>ใบเสนอราคา</div>
            <div>Quotation</div>
        </div>

        <hr />

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

        <div class="row">
            <div class="col-xs-6">
                <div>
                    <span> รหัสลูกค้า : </span>
                    <span> {{ $quotation->customer->id }} </span>
                </div>
                <div>
                    <span> ชื่อลูกค้า : </span>
                    <span> {{ $quotation->customer->name }} </span>
                </div>
                <div>
                    <span> ที่อยู่ : </span>
                    <span> {{ $quotation->customer->address }} </span>
                </div>
            </div>
            <div class="col-xs-6">
                <div>
                    <span>วันที่ : </span>
                    <span> {{ $quotation->created_at }} </span>
                </div>
                <div>
                    <span>ใบเสนอราคา : </span>
                    <span> {{ sprintf('Q%03d', $quotation->id) }} </span>
                </div>
                <div>
                    <span>พนักงานขาย : </span>
                    <span> {{ $quotation->user->name }} </span>
                </div>
            </div>
        </div>

        <hr />

        @php
        $quotationdetail = $quotation->quotationDetails()->get();
        @endphp

        <div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        {{-- <th>Quotation Id</th> --}}
                        <th>Product Id</th>
                        <th>Amount</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($quotationdetail as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        {{-- <td>{{ $item->quotation_id }}</td> --}}
                        {{-- <td>{{ $item->product_id }}</td> --}}
                        <td>{{ $item->product->title }}</td>
                        <td>{{ $item->amount }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->total }}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <hr />
        <br />
        <div class="row">
            <div class="col-xs-5">
                <div>Remark : </div>
                <div>{{ $quotation->remark }} </div>

                <br />
                <br />
                <br />
                <br />
                {{-- ตำแหน่งตัวอักษรภาษาไทย --}}
                <x-convert-baht />
                <div>({{ baht_text($quotation->quotationDetails()->sum('total')) }}) </div>


            </div>
            <div class="col-xs-6">
                <table class="table">
                    <tbody>
                        <tr>
                            <th> Vat Percent </th>
                            <td> {{ $quotation->vat_percent }}% </td>
                        </tr>
                        <tr>
                            <th> Vat </th>
                            {{-- <td> {{ $quotation->vat }} </td> --}}
                            <td> {{ $vat }} </td>
                        </tr>
                        <tr>
                            <th> Sub Total </th>
                            {{-- <td> {{ $quotation->sub_total }} </td> --}}
                            <td> {{ $sub_total }} </td>
                        </tr>
                        <tr>
                            <th> Net Total </th>
                            {{-- <td> {{ $quotation->net_total }} </td> --}}
                            <td> {{ $net_total }} </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>


</x-bootstrap-pdf>