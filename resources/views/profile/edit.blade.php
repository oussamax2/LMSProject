
@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="edittitlep">
        @lang('admin.Editing Profile')
        </h1>

   </section>
   @include('flash::message')
   <div class="container-fluid">
    <nav class="nav nav-tabs">
        <a class="nav-item nav-link active" href="#p1" data-toggle="tab">General info</a>
        @if(auth()->user()->hasRole('company'))
            <a class="nav-item nav-link" href="#p2" data-toggle="tab">Setting</a>
        @endif
    </nav>

      <div class="tab-content">
        <div class="tab-pane active" id="p1">  @include('coreui-templates::common.errors')
            <div class="row">
                <div class="col-lg-12">
                    <div class="">
                        {!! Form::model($user, ['route' => ['login-profile.update', $user->id], 'method' => 'patch', 'files' => true, 'enctype' => 'multipart/form-data']) !!}

                             @include('profile.fields')

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        @if(auth()->user()->hasRole('company'))
            <div class="tab-pane" id="p2">

                {!! Form::model($user, ['route' => ['updatesettingsprofile', $user->companies->user_id], 'method' => 'patch', 'files' => true, 'enctype' => 'multipart/form-data']) !!}

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 formseditprolms">
                            <div class="form-group has-feedback">
                                <label>Cancel period</label>
                                <input type="number" class="form-control" name="cancelpd" value="{{ $user->companies->cancelpd }}" placeholder="0">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 formseditprolms">
                            <div class="form-group has-feedback">
                                <label>Canceltrm</label>
                                <textarea class="form-control" id="canceltrm" name="canceltrm">{{ $user->companies->canceltrm }}</textarea>
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 formseditprolms">
                            <div class="form-group has-feedback">

                                <label>Paymenttrm</label>
                                <textarea class="form-control" id="paymenttrm" name="paymenttrm">{{ $user->companies->paymenttrm }}</textarea>
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 formseditprolms">
                            <div class="form-group has-feedback">
                                <label>Generaltrm</label>
                                <textarea class="form-control" id="generaltrm" name="generaltrm">{{ $user->companies->generaltrm }}</textarea>
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>

                            </div>
                        </div>
<div class="form-group buttons-action-lms col-sm-12">

    <input class="btn btn-primary" type="submit" value="@lang('admin.Update')">

</div>
              

                    </div>

                {!! Form::close() !!}

            </div>
        @endif


      </div>


   </div>
@endsection
@push('scripts')
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js" referrerpolicy="origin"></script>

    <script>
            CKEDITOR.replace( 'paymenttrm',   {
            toolbar: [
                { name: 'document', items: [  'NewPage', 'Preview', '-', 'Templates' ] },	// Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
                [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo','Maximize', 'ShowBlocks' ],			// Defines toolbar group without name.
                '/',																					// Line break - next group will be placed in new line.
                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat' ] },
            { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
            ]
        });
        CKEDITOR.replace( 'canceltrm',   {
            toolbar: [
                { name: 'document', items: [  'NewPage', 'Preview', '-', 'Templates' ] },	// Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
                [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo','Maximize', 'ShowBlocks' ],			// Defines toolbar group without name.
                '/',																					// Line break - next group will be placed in new line.
                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat' ] },
            { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
            ]
        });
        CKEDITOR.replace( 'generaltrm',   {
            toolbar: [
                { name: 'document', items: [  'NewPage', 'Preview', '-', 'Templates' ] },	// Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
                [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo','Maximize', 'ShowBlocks' ],			// Defines toolbar group without name.
                '/',																					// Line break - next group will be placed in new line.
                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat' ] },
            { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
            ]
        });
    </script>
@endpush
