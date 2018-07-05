<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="col-md-4 control-label">{{ 'Title' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ $calm->name or ''}}" >
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="content" class="col-md-4 control-label">{{ 'Description' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="description" type="textarea" id="description" >{{ $calm->description or ''}}</textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('steps') ? 'has-error' : ''}}">
    <label for="content" class="col-md-4 control-label">{{ 'Step' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="steps" type="textarea" id="steps" >{{ $calm->steps or ''}}</textarea>
        {!! $errors->first('steps', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('process_image') ? 'has-error' : ''}}">
    <label for="content" class="col-md-4 control-label">{{ 'Process Image' }}</label>
    <div class="col-md-6">
      <input class="form-control" name="process_image" type="file" id="process_image" value="{{ $calm->process_image or ''}}" >
      {!! $errors->first('process_image', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="col-md-4 control-label">{{ 'Category' }}</label>
    <div class="col-md-6">
        <select name="status" class="form-control" id="status" >
    @foreach (json_decode('{"published": "Published", "not_published": "Not Published"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($post->category) && $post->category == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
