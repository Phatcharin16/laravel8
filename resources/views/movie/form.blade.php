<div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
    <label for="category_id" class="control-label">{{ 'Category Id' }}</label>
    <input class="form-control" name="category_id" type="number" id="category_id" value="{{ isset($movie->category_id) ? $movie->category_id : ''}}" >
    {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($movie->title) ? $movie->title : ''}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('actor') ? 'has-error' : ''}}">
    <label for="actor" class="control-label">{{ 'Actor' }}</label>
    <input class="form-control" name="actor" type="text" id="actor" value="{{ isset($movie->actor) ? $movie->actor : ''}}" >
    {!! $errors->first('actor', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="control-label">{{ 'Price' }}</label>
    <input class="form-control" name="price" type="number" id="price" value="{{ isset($movie->price) ? $movie->price : ''}}" >
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('special') ? 'has-error' : ''}}">
    <label for="special" class="control-label">{{ 'Special' }}</label>
    <input class="form-control" name="special" type="number" id="special" value="{{ isset($movie->special) ? $movie->special : ''}}" >
    {!! $errors->first('special', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('common_id') ? 'has-error' : ''}}">
    <label for="common_id" class="control-label">{{ 'Common Id' }}</label>
    <input class="form-control" name="common_id" type="number" id="common_id" value="{{ isset($movie->common_id) ? $movie->common_id : ''}}" >
    {!! $errors->first('common_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('sold') ? 'has-error' : ''}}">
    <label for="sold" class="control-label">{{ 'Sold' }}</label>
    <input class="form-control" name="sold" type="number" id="sold" value="{{ isset($movie->sold) ? $movie->sold : ''}}" >
    {!! $errors->first('sold', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
