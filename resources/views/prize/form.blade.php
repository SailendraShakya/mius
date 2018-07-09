<div class="form-group {{ $errors->has('item') ? 'has-error' : ''}}">
    <label for="title" class="col-md-4 control-label">{{ 'Item' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="item" type="number" id="item" value="{{ $prize->item or ''}}" >
        {!! $errors->first('item', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('code') ? 'has-error' : ''}}">
    <label for="title" class="col-md-4 control-label">{{ 'Code' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="code" type="text" id="code" value="{{ $prize->code or ''}}" >
        {!! $errors->first('code', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('gift') ? 'has-error' : ''}}">
    <label for="title" class="col-md-4 control-label">{{ 'Gift' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="gift" type="text" id="gift" value="{{ $prize->gift or ''}}" >
        {!! $errors->first('gift', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('quantity') ? 'has-error' : ''}}">
    <label for="title" class="col-md-4 control-label">{{ 'Quantity' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="quantity" type="number" min="0" id="quantity" value="{{ $prize->quantity or ''}}" >
        {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('gift') ? 'has-error' : ''}}">
    <label for="title" class="col-md-4 control-label">{{ 'Total Week In 1 Month' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="total_week_in_month" type="number" min="0" id="total_week_in_month" value="{{ $prize->total_week_in_month or ''}}" >
        {!! $errors->first('total_week_in_month', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('gift') ? 'has-error' : ''}}">
    <label for="title" class="col-md-4 control-label">{{ 'Total Qty for 1 Month' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="total_quantity_in_month" type="number" min="0" id="total_quantity_in_month" value="{{ $prize->total_quantity_in_month or ''}}" >
        {!! $errors->first('total_quantity_in_month', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="probability" class="col-md-4 control-label">{{ 'Probability Score' }}</label>
    <div class="col-md-6">
        <select name="probability" class="form-control" id="status" >
        }
@foreach(json_decode('{"High": "High", "Low": "Low"}', true) as $optionKey => $optionValue)
<option value="{{ $optionKey }}" {{ (isset($prize->probability) && ($prize->probability == $optionKey))? 'selected':'' }}>{{ $optionValue }}</option>
@endforeach
</select>
        {!! $errors->first('probability', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
