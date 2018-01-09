<div class="box-body">
    <div class='{{ $errors->has("{$lang}.title") ? ' has-error' : '' }} form-group'>
        {!! Form::label("{$lang}[title]", trans('gallery::galleries.form.title')) !!}
        <input class="form-control" type="text" name="{{$lang}}[title]" value="{{ old("{$lang}.title") }}" />
        {!! $errors->first("{$lang}.title", '<span class="help-block">:message</span>') !!}
    </div>

    <div class='{{ $errors->has("{$lang}.description") ? ' has-error' : '' }} form-group'>
        {!! Form::label("{$lang}[description]", trans('gallery::galleries.form.description')) !!}
        <textarea class="ckeditor" name="{{$lang}}[description]" >{{ old("{$lang}.description") }}</textarea>
        {!! $errors->first("{$lang}.description", '<span class="help-block">:message</span>') !!}
    </div>
    <div class='{{ $errors->has("{$lang}.tags") ? ' has-error' : '' }} form-group'>
        {!! Form::label("{$lang}[tags]", trans('gallery::galleries.form.tags')) !!}
        <input class="form-control" type="text" name="{{$lang}}[tags]" value="{{ old("{$lang}.tags") }}" />
        {!! $errors->first("{$lang}.tags", '<span class="help-block">:message</span>') !!}
    </div>
</div>
