<div class="form-group {{ $errors->has('leave_type_name') ? 'has-error' : ''}}">
    <label for="leave_type_name" class="control-label">{{ 'Leave Type Name' }}</label>
    <select name="leave_type_name" class="form-control" id="leave_type_name" >
    @foreach (json_decode('{"sick":"sick","personal":"personal","vacation":"vacation"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($leavetype->leave_type_name) && $leavetype->leave_type_name == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('leave_type_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('max_leave_per_year') ? 'has-error' : ''}}">
    <label for="max_leave_per_year" class="control-label">{{ 'Max Leave Per Year' }}</label>
    <input class="form-control" name="max_leave_per_year" type="number" id="max_leave_per_year" value="{{ isset($leavetype->max_leave_per_year) ? $leavetype->max_leave_per_year : ''}}" >
    {!! $errors->first('max_leave_per_year', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
