<html>
<head>
    <script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
</head>
<body>
<h1>
    edit
</h1>

@include('common.errors')
@include('common.editLang')

{!! Form::model($subpage, ['route' => ['subpage.update', $subpage->id]]) !!}

    title - {!! Form::text('title') !!} <br>
    url - {!! Form::text('url') !!} <br>
    kw - {!! Form::text('keywords') !!} <br>
    descr - {!! Form::textarea('description') !!} <br>
    {!! Form::textarea('contents', null, ['id' => 'editor']) !!} <br>

    {!! Form::submit(__('ui.saveAndContinue'), ['name' => \jwwisniewski\Jigsaw\Core\Enum\SaveMode::SAVE_AND_CONTINUE]) !!}
    {!! Form::submit(__('ui.saveAndReturn'), ['name' => \jwwisniewski\Jigsaw\Core\Enum\SaveMode::SAVE_AND_RETURN]) !!}
    {!! Form::button(__('ui.cancel'), ['onclick' => new Illuminate\Support\HtmlString("window.location.href='" . base64_decode(request()->get('returnPath')) . "'")]) !!}

    {!! Form::hidden('editLang', request()->get('editLang', config('jigsaw.defaultClientLocale'))) !!}
    {!! Form::hidden('returnPath', request()->get('returnPath')) !!}

{!! Form::close() !!}


<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
</body>
</html>