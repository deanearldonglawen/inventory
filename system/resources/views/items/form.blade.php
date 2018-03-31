<div class="form-group {{ $errors->has('item_name') ? 'has-error' : ''}}">
    <label for="item_name" class="col-md-4 control-label">{{ 'Item Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="item_name" type="text" id="item_name" value="{{ $item->item_name or ''}}" >
        {!! $errors->first('item_name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('unit_of_measure') ? 'has-error' : ''}}">
    <label for="unit_of_measure" class="col-md-4 control-label">{{ 'Unit Of Measure' }}</label>
    <div class="col-md-6">
        <select name="unit_of_measure" class="form-control" id="unit_of_measure" >
    @foreach (json_decode('{"pcs":"pieces","kg":"Kilograms"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($item->unit_of_measure) && $item->unit_of_measure == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
        {!! $errors->first('unit_of_measure', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('opening') ? 'has-error' : ''}}">
    <label for="opening" class="col-md-4 control-label">{{ 'Opening' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="opening" type="number" id="opening" value="{{ $item->opening or ''}}" >
        {!! $errors->first('opening', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('closing') ? 'has-error' : ''}}">
    <label for="closing" class="col-md-4 control-label">{{ 'Closing' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="closing" type="number" id="closing" value="{{ $item->closing or ''}}" >
        {!! $errors->first('closing', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('sale') ? 'has-error' : ''}}">
    <label for="sale" class="col-md-4 control-label">{{ 'Sale' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="sale" type="number" id="sale" value="{{ $item->sale or ''}}" >
        {!! $errors->first('sale', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('order_period') ? 'has-error' : ''}}">
    <label for="order_period" class="col-md-4 control-label">{{ 'Order Period' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="order_period" type="date" id="order_period" value="{{ $item->order_period or ''}}" >
        {!! $errors->first('order_period', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('safety_stock') ? 'has-error' : ''}}">
    <label for="safety_stock" class="col-md-4 control-label">{{ 'Safety Stock' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="safety_stock" type="number" id="safety_stock" value="{{ $item->safety_stock or ''}}" >
        {!! $errors->first('safety_stock', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('remarks') ? 'has-error' : ''}}">
    <label for="remarks" class="col-md-4 control-label">{{ 'Remarks' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="remarks" type="text" id="remarks" value="{{ $item->remarks or ''}}" >
        {!! $errors->first('remarks', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
