@extends ('backend.layouts.master')

@section('after-styles-end')
    {!! Html::style(elixir('vendor/simditor/css/simditor.css')) !!}
    {!! Html::style(elixir('vendor/bootstrap-fileinput/css/fileinput.css')) !!}
    {!! Html::style(elixir('vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css')) !!}
@stop

@section('after-scripts-end')
    {!! HTML::script(elixir('vendor/simditor/js/simditor.js')) !!}
    {!! HTML::script(elixir('vendor/bootstrap-fileinput/js/fileinput.js')) !!}
    {!! HTML::script(elixir('vendor/bootstrap-fileinput/js/bootstrap-datepicker.js')) !!}
    <script type="text/javascript">
        $(function() {
            var editor = new Simditor({
                textarea: $('#editor')
                //optional options
            }), $input = $(".update-file"), defaultPreview = "{{ $article->cover or '/uploads/default_avatar_male.jpg' }}";

            $input.fileinput({
                language: 'zh',
                uploadUrl: "{!!url('admin/cms/uploadCover')!!}",
                overwriteInitial: true,
                uploadAsync: false,
                showUpload: false, // hide upload button
                showRemove: false, // hide remove button
                minFileCount: 1,
                showClose: false,
                showCaption: false,
                browseLabel: '',
                removeLabel: '',
                elErrorContainer: '#kv-avatar-errors',
                msgErrorClass: 'alert alert-block alert-danger',
                defaultPreviewContent: '<img src="'+defaultPreview+'" alt="封面图" style="width:160px">',
                allowedFileExtensions: ["jpg", "png", "gif"]
                //uploadExtraData: {kvId: '10'}
            }).on("filebatchselected", function(event, files) {
                // trigger upload method immediately after files are selected
                $input.fileinput("upload");
            }).on('filebatchuploadsuccess', function(event, data, previewId, index) {
                var form = data.form, files = data.files, extra = data.extra,
                        response = data.response, reader = data.reader;
                console.log(response);
                if( response.status ){
                    $("input[name='cover']").val(response.data);
                } else {

                }
            });

            $('input[name="year"]').datepicker({
                format: "yyyy",
                startView: 2,
                minViewMode: 2,
                language: "zh-CN",
                calendarWeeks: true,
                autoclose: true,
                todayHighlight: true
            });

            $('input[name="release_date"]').datepicker({
                format: "yyyy-m-d",
                startView: 0,
                minViewMode: 0,
                language: "zh-CN",
                calendarWeeks: true,
                autoclose: true,
                todayHighlight: true
            });
        });
    </script>
@stop
