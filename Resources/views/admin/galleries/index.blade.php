@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('gallery::galleries.title.galleries') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('gallery::galleries.title.galleries') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.gallery.gallery.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('gallery::galleries.button.create gallery') }}
                    </a>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="data-table table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th ><input type="checkbox" name="select_all" value="1" id="example-select-all"></th>
                            <th>{{ trans('gallery::galleries.table.image') }}</th>
                            <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($galleries)): ?>
                        <?php foreach ($galleries as $gallery): ?>
                        <tr id="table_{{ $gallery->id }}">
                            <td><input type="checkbox" value="{{ $gallery->id }}"></td>
                            <td>
                                <a href="{{ route('admin.gallery.gallery.edit', [$gallery->id]) }}">
                                    <img src="{{ $gallery->files->first() ? 
                                    Imagy::getThumbnail($gallery->files->first()->path_string, 'smallThumb') :
                                    '' }}" class="img img-responsive">
                                </a>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.gallery.gallery.edit', [$gallery->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                    <button class="btn btn-danger btn-flat btn-delete" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.gallery.gallery.destroy', [$gallery->id]) }}"><i class="fa fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th></th>
                            <th>{{ trans('core::core.table.created at') }}</th>
                            <th>{{ trans('core::core.table.actions') }}</th>
                        </tr>
                        </tfoot>
                    </table>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
    @include('core::partials.delete-modal')
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>c</code></dt>
        <dd>{{ trans('gallery::galleries.title.create gallery') }}</dd>
    </dl>
@stop

@section('scripts')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.gallery.gallery.create') ?>" }
                ]
            });
        });
    </script>
    <?php $locale = locale(); ?>
    <script type="text/javascript">
        $(function () {
            var table = $('.data-table').DataTable({
                "paginate": true,
                "lengthChange": true,
                "filter": true,
                "sort": true,
                "info": true,
                "autoWidth": true,
                "order": [[ 0, "desc" ]],
                "language": {
                    "url": '<?php echo Module::asset("core:js/vendor/datatables/{$locale}.json") ?>'
                },
                "columnDefs": [ {
                    "targets": 0,
                    "orderable": false
                } ],
                dom: 'l<"toolbar">frtip',
                initComplete: function(){
                    $("div.toolbar")
                            .html('<button type="button" id="delete-all" style="margin-left:10px;float:left" class="btn btn-sm btn-danger">Delete All!</button>');
                }
            });

            // Handle click on "Select all" control
            $('#example-select-all').on('click', function(){
                // Get all rows with search applied
                // Check/uncheck checkboxes for all rows in the table
                $('input[type="checkbox"]').prop('checked', this.checked);
            });

            // Handle form submission event
            $(document).on('click','#delete-all', function(e) {
                // Iterate over all checkboxes in the table
                if (!window.confirm('Delete all checked file?')) {
                    return false;
                }
                var btn = this;
                $(btn).button('loading');

                var rs = [];
                $('input[type="checkbox"]').each(function () {
                    // If checkbox doesn't exist in DOM
                    if (this.checked) {
                        // Create a hidden element
                        var url = ($('#table_' + this.value).find('.btn-delete').attr('data-action-target'))
                        var id = this.value;
                        $.ajax({
                            type: 'DELETE',
                            url: url,
                            data: {
                                '_method': 'DELETE',
                                '_token': '{{ csrf_token() }}'
                            },
                            success: function (data) {
                                table.row($('#table_' + id)).remove().draw();
                                $(btn).button('reset');
                            },
                            error: function (status) {
                                $(btn).button('reset');
                            }
                        });

                    }
                });
            });
        });
    </script>
@stop
