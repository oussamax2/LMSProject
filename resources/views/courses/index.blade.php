@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">@lang('front.Courses')</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card-details card">
                         <div class="card-header">
                             <i class="icon icon-docs"></i>
                             @lang('front.Courses')
                             <a class="pull-right" href="{{ route('courses.create') }}"><span class="icon icon-plus"></span>@lang('front.Create courses')</a>
                             <a class="pull-right" href="{{ route('courses.import') }}"><span class="icon icon-social-dropbox"></span>@lang('front.Import courses')</a>
                         </div>
                         <div class="card-body">
                            <input type="text" id="reset" hidden><input type="text" id="archive" hidden>
                            <button type="text" id="refresh" class="btn btn-info" style=" float: right;"><i class="fa fa-refresh" aria-hidden="true"> </i> Reset</button>

                            <button type="text" id="archivebtn" class="btn btn-secondary" style=" float: right;"><i class="fa  fa-history" aria-hidden="true"></i> Archive</button>

                             @include('courses.table')
                              <div class="pull-right mr-3">

                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection
@push('scripts')
<script>
$('#archivebtn').click(function(){
             $('#reset').val(0);
            $('#archive').val(1);
    $('#dataTableBuilder').DataTable().draw(true);
});

$('#refresh').on('click', function(){

            $('#reset').val(1);
            $('#archive').val(0);
            $("#dataTableBuilder").DataTable().search("");
            $("#dataTableBuilder").DataTable().ajax.reload();
            $('#dataTableBuilder').DataTable().draw(true);
        });
</script>
@endpush

