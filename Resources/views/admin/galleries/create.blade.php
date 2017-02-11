@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('gallery::galleries.title.create gallery') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.gallery.gallery.index') }}">{{ trans('gallery::galleries.title.galleries') }}</a></li>
        <li class="active">{{ trans('gallery::galleries.title.create gallery') }}</li>
    </ol>
@stop

@section('styles')
    {!! Theme::script('js/vendor/ckeditor/ckeditor.js') !!}
@stop

@section('content')
    {!! Form::open(['route' => ['admin.gallery.gallery.store'], 'method' => 'post']) !!}
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body {{ $errors->has("medias_single.gallery") ? ' has-error' : '' }}">
                    @include('media::admin.fields.new-file-link-single', [
                        'zone' => 'gallery'
                    ])
                    {!! $errors->first("medias_single.gallery", '<span class="help-block text-warning">:message</span>') !!}
                </div>
                <div class='{{ $errors->has("url") ? ' has-error' : '' }} form-group'>
                    {!! Form::label("[url]", trans('galleries::galleries.form.url')) !!}
                    <input class="form-control"  type="text" name="url" value="{{ old("url") }}"/>
                    {!! $errors->first("{url", '<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group">
                    <label for="target">{{ trans('menu::menu-items.form.target') }}</label>
                    <select class="form-control" name="target" id="target">
                        <option value="_self" {{ old('target') == '_self' ? 'selected' : '' }}>{{ trans('menu::menu-items.form.same tab') }}</option>
                        <option value="_blank" {{ old('target') == '_blank' ? 'selected' : '' }}>{{ trans('menu::menu-items.form.new tab') }}</option>
                    </select>
                </div>
            </div>
            <div class="nav-tabs-custom">
                @include('partials.form-tab-headers')
                <div class="tab-content">


                    <?php $i = 0; ?>
                    @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
                        <?php $i++; ?>
                        <div class="tab-pane {{ locale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                            @include('gallery::admin.galleries.partials.create-fields', ['lang' => $locale])
                        </div>
                    @endforeach

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.create') }}</button>
                        <button class="btn btn-default btn-flat" name="button" type="reset">{{ trans('core::core.button.reset') }}</button>
                        <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.gallery.gallery.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
                    </div>
                </div>
            </div> {{-- end nav-tabs-custom --}}
        </div>
    </div>
    {!! Form::close() !!}
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd>{{ trans('core::core.back to index') }}</dd>
    </dl>
@stop

@section('scripts')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'b', route: "<?= route('admin.gallery.gallery.index') ?>" }
                ]
            });
        });
    </script>
    <script>
        $( document ).ready(function() {
            $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });
        });
    </script>
@stop
