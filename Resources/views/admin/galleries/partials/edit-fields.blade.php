<div class="box-body">
    <div class='{{ $errors->has("{$lang}.title") ? ' has-error' : '' }} form-group'>
        {!! Form::label("{$lang}[title]", trans('gallery::galleries.form.title')) !!}
        <?php $old = $g->hasTranslation($lang) ? $g->translate($lang)->title : '' ?>
        <input class="form-control" type="text" name="{{$lang}}[title]" value="{{ old("{$lang}.title",$old) }}" />
        {!! $errors->first("{$lang}.title", '<span class="help-block">:message</span>') !!}
    </div>

    <div class='{{ $errors->has("{$lang}.description") ? ' has-error' : '' }} form-group'>
        {!! Form::label("{$lang}[description]", trans('gallery::galleries.form.description')) !!}
        <?php $old = $g->hasTranslation($lang) ? $g->translate($lang)->description : '' ?>
        <textarea class="ckeditor" name="{{$lang}}[description]" >{{ old("{$lang}.description",$old) }}</textarea>
        {!! $errors->first("{$lang}.description", '<span class="help-block">:message</span>') !!}
    </div>
</div>
