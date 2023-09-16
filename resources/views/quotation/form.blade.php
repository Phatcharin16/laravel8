<div class="form-group {{ $errors->has('customer_id') ? 'has-error' : ''}}">
    <label for="customer_id" class="control-label">{{ 'Customer Id' }}</label>
    <!-- {{-- <input class="form-control" name="customer_id" type="number" id="customer_id" value="{{ isset($quotation->customer_id) ? $quotation->customer_id : ''}}" > --}} -->
    <select class="form-select" name="customer_id" id="customer_id" required>
        <option value="">เลือกลูกค้า</option>
        @foreach($customers as $item)
        <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    </select>
    <script>
        document.querySelector("#customer_id").value = "{{ isset($quotation->customer_id) ? $quotation->customer_id : ''}}";
    </script>
    document.querySelector("#customer_id").value = "{{ isset($quotation->customer_id) ? $quotation->customer_id : ''}}";
    </script>
    {!! $errors->first('customer_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    {{-- <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($quotation->user_id) ? $quotation->user_id : ''}}" > --}}
    <select class="form-select" name="user_id" id="user_id" required>
        <option value="">เลือกพนักงานขาย</option>
        @foreach($users as $item)
        <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    </select>
    <script>
        document.querySelector("#user_id").value = "{{ isset($quotation->user_id) ? $quotation->user_id : Auth::id()}}";
    </script>
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('vat_percent') ? 'has-error' : ''}}">
    <label for="vat_percent" class="control-label">{{ 'Vat Percent (%)' }}</label>
    <input class="form-control" name="vat_percent" type="number" id="vat_percent" value="{{ isset($quotation->vat_percent) ? $quotation->vat_percent : '7'}}">
    {!! $errors->first('vat_percent', '<p class="help-block">:message</p>') !!}
</div>

{{-- <div class="form-group {{ $errors->has('vat') ? 'has-error' : ''}}">
<label for="vat" class="control-label">{{ 'Vat' }}</label>
<input class="form-control" name="vat" type="number" id="vat" value="{{ isset($quotation->vat) ? $quotation->vat : ''}}">
{!! $errors->first('vat', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('sub_total') ? 'has-error' : ''}}">
    <label for="sub_total" class="control-label">{{ 'Sub Total' }}</label>
    <input class="form-control" name="sub_total" type="number" id="sub_total" value="{{ isset($quotation->sub_total) ? $quotation->sub_total : ''}}">
    {!! $errors->first('sub_total', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('net_total') ? 'has-error' : ''}}">
    <label for="net_total" class="control-label">{{ 'Net Total' }}</label>
    <input class="form-control" name="net_total" type="number" id="net_total" value="{{ isset($quotation->net_total) ? $quotation->net_total : ''}}">
    {!! $errors->first('net_total', '<p class="help-block">:message</p>') !!}
</div> --}}

<div class="form-group {{ $errors->has('remark') ? 'has-error' : ''}}">
    <label for="remark" class="control-label">{{ 'Remark' }}</label>
    <textarea class="form-control" rows="5" name="remark" type="textarea" id="remark">{{ isset($quotation->remark) ? $quotation->remark : ''}}</textarea>
    {!! $errors->first('remark', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>