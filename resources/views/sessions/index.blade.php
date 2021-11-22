@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">@lang('front.Sessions')</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card-details card">
                         <div class="card-header">
                             <i class="icon icon-briefcase"></i>
                             @lang('front.Sessions')
                             <a class="pull-right" href="{{ route('sessions.create') }}"><span class="icon icon-plus"></span> @lang('front.Create session')</a>
                         </div>
                         <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <h5>Start Date <span class="text-danger"></span></h5>
                                    <div class="controls">
                                        <input type="date" name="start_date" id="start_date" class="form-control datepicker-autoclose" placeholder="Please select start date"> <div class="help-block"></div></div>
                                    </div>
                                    <div class="form-group col-md-4">
                                    <h5>End Date <span class="text-danger"></span></h5>
                                    <div class="controls">
                                        <input type="date" name="end_date" id="end_date" class="form-control datepicker-autoclose" placeholder="Please select end date"> <div class="help-block"></div></div>
                                    </div>
                                    <div class="text-left col-md-4 ">
                                        <h5> <br><span class="text-danger"></span></h5>
                                    <button type="text" id="btnFiterSubmitSearch" class="btn btn-success">Filtre</button>  <button type="text" id="refresh" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                                    </div>

                                </div>
                                <input type="text" id="archive" hidden>
                                <button type="text" id="archivebtn" class="btn btn-secondary" style=" float: right;"><i class="fa  fa-history" aria-hidden="true"></i> Archive</button>
                             @include('sessions.table')
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
            $('#archive').val(1);
    $('#dataTableBuilder').DataTable().draw(true);
});
$('#btnFiterSubmitSearch').click(function(){

    $('#dataTableBuilder').DataTable().draw(true);
});

$('#refresh').on('click', function(){

            $('#start_date').val("");
            $('#end_date').val("");
            $('#archive').val(0);
            $("#dataTableBuilder").DataTable().search("");
            $("#dataTableBuilder").DataTable().ajax.reload();
            $('#dataTableBuilder').DataTable().draw(true);
        });
</script>
@endpush
