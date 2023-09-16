<div class="form-group {{ $errors->has('quotation_id') ? 'has-error' : ''}}">
    <label for="quotation_id" class="control-label">{{ 'Quotation Id' }}</label>
    <input class="form-control" name="quotation_id" type="number" id="quotation_id" value="{{ isset($quotationdetail->quotation_id) ? $quotationdetail->quotation_id : request('quotation_id') }}" readonly>
    {!! $errors->first('quotation_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('product_id') ? 'has-error' : ''}}">
    <label for="product_id" class="control-label">{{ 'Product Id' }}</label>
    {{-- <input class="form-control" name="product_id" type="number" id="product_id" value="{{ isset($quotationdetail->product_id) ? $quotationdetail->product_id : ''}}" > --}}
    <select class="form-select" name="product_id" id="product_id" required>
        <option value="">เลือกสินค้า</option>
        @foreach($products as $item)
        <option value="{{ $item->id }}">{{ $item->title }} {{ $item->price }} บาท</option>
        @endforeach
    </select>
    <script>
        document.querySelector("#product_id").value = "{{ isset($quotation->product_id) ? $quotation->product_id : ''}}";
    </script>
    {!! $errors->first('product_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('amount') ? 'has-error' : ''}}">
    <label for="amount" class="control-label">{{ 'Amount' }}</label>
    <input class="form-control" name="amount" type="number" id="amount" value="{{ isset($quotationdetail->amount) ? $quotationdetail->amount : ''}}">
    {!! $errors->first('amount', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="control-label">{{ 'Price' }}</label>
    <input class="form-control" name="price" type="number" id="price" value="{{ isset($quotationdetail->price) ? $quotationdetail->price : ''}}">
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('remark') ? 'has-error' : ''}}">
    <label for="remark" class="control-label">{{ 'Remark' }}</label>
    <textarea class="form-control" rows="5" name="remark" type="textarea" id="remark">{{ isset($quotationdetail->remark) ? $quotationdetail->remark : ''}}</textarea>
    {!! $errors->first('remark', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>