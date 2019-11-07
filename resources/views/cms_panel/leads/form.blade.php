@extends('layouts.cms_panel.app')
@section('head_plus')
@parent
    <link rel="stylesheet" media="screen" type="text/css" href="{{ env('APP_URL') }}/design/lib/jquery_datetime_picker/v1/jquery.datetimepicker.min.css" />
@endsection

@section('content')
    <div class="page-content">
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>Error!</strong> {{$errors->first()}}
            </div>
        @endif
        @if (\Session::has('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                <div class="icon"><span class="s7-check"></span></div>
                <strong>Success!</strong> {!! \Session::get('success') !!}
            </div>
        @endif
        <div class="panel">

            <div class="panel-body container-fluid">
                <div class="row row-lg">

                    <div class="col-md-12">
                        <h4>
<a href="{{ route('cms_panel.leads.index', []) }}" class="btn btn-default btn-sm"><i class=" fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
{{ ucfirst(__('cms_panel.t3335')) }} / @if(empty($leads_row)){{ __('cms_panel.add_new') }}@else {{ __('cms_panel.edit') }}@endif
</h4>
    </div>


    <div class="col-md-12 col-lg-12">
<form method="POST" action="@if (empty($leads_row)){{ route('cms_panel.leads.store', []) }}@else{{ route('cms_panel.leads.update', ['id' => $leads_row['id']]) }}@endif"  enctype="multipart/form-data" class="form-horizontal example" >
    {{ method_field('PUT') }}
    {{ csrf_field() }}


<div class="form-group row{{ $errors->has('first_name') ? ' alert alert-danger ' : '' }}">
    <label for="first_name" class="col-md-3 form-control-label text-capitalize"><?=__('cms_panel.t3335_f28549')?></label>
    <div class="col-md-9">
        <input type="text" class="form-control  @if($errors->has('first_name')){{'is-invalid'}}@endif" id="first_name" name="first_name"
               value="@if(old('first_name')){{ old('first_name') }}@elseif(isset($leads_row['first_name'])){{ $leads_row['first_name'] }}@endif">

        @if ($errors->has('first_name'))
            <div class="invalid-feedback">{{ $errors->first('first_name') }}</div>
        @endif
    </div>
</div>


<div class="form-group row{{ $errors->has('last_name') ? ' alert alert-danger ' : '' }}">
    <label for="last_name" class="col-md-3 form-control-label text-capitalize"><?=__('cms_panel.t3335_f28553')?></label>
    <div class="col-md-9">
        <input type="text" class="form-control  @if($errors->has('last_name')){{'is-invalid'}}@endif" id="last_name" name="last_name"
               value="@if(old('last_name')){{ old('last_name') }}@elseif(isset($leads_row['last_name'])){{ $leads_row['last_name'] }}@endif">

        @if ($errors->has('last_name'))
            <div class="invalid-feedback">{{ $errors->first('last_name') }}</div>
        @endif
    </div>
</div>


<div class="form-group row{{ $errors->has('birthday') ? ' alert alert-danger ' : '' }}">
    <label for="birthday" class="col-md-3 form-control-label text-capitalize"><?=__('cms_panel.t3335_f28554')?></label>
    <div class="col-md-9">
        <input type="text" class="form-control birthday  @if($errors->has('birthday')){{'is-invalid'}}@endif" id="birthday" name="birthday"
            value="@if(old('birthday')){{ old('birthday') }}@elseif(isset($leads_row['birthday'])){{ $leads_row['birthday'] }}@endif">

        @if ($errors->has('birthday'))
            <div class="invalid-feedback">{{ $errors->first('birthday') }}</div>
        @endif
    </div>
</div>


<div class="form-group row{{ $errors->has('email') ? ' alert alert-danger ' : '' }}">
    <label for="email" class="col-md-3 form-control-label text-capitalize"><?=__('cms_panel.t3335_f28555')?></label>
    <div class="col-md-9">
        <input type="text" class="form-control  @if($errors->has('email')){{'is-invalid'}}@endif" id="email" name="email"
               value="@if(old('email')){{ old('email') }}@elseif(isset($leads_row['email'])){{ $leads_row['email'] }}@endif">

        @if ($errors->has('email'))
            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
        @endif
    </div>
</div>


<div class="form-group row{{ $errors->has('mobile') ? ' alert alert-danger ' : '' }}">
    <label for="mobile" class="col-md-3 form-control-label text-capitalize"><?=__('cms_panel.t3335_f28556')?></label>
    <div class="col-md-9">
        <input type="text" class="form-control  @if($errors->has('mobile')){{'is-invalid'}}@endif" id="mobile" name="mobile"
               value="@if(old('mobile')){{ old('mobile') }}@elseif(isset($leads_row['mobile'])){{ $leads_row['mobile'] }}@endif">

        @if ($errors->has('mobile'))
            <div class="invalid-feedback">{{ $errors->first('mobile') }}</div>
        @endif
    </div>
</div>


<div class="form-group row{{ $errors->has('optin1') ? ' alert alert-danger ' : '' }}">
    <label for="optin1" class="col-md-3 form-control-label text-capitalize"><?=__('cms_panel.t3335_f28557')?></label>
    <div class="col-md-9">
        <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" id="optin1" name="optin1"
                    value="1" @isset($leads_row) @if ($leads_row['optin1']==1) {{'checked'}} @endif @endisset>
                &nbsp; <?=__('cms_panel.yes')?>
            </label>
        </div>

        @if ($errors->has('optin1'))
            <div class="invalid-feedback">{{ $errors->first('optin1') }}</div>
        @endif
    </div>
</div>


<div class="form-group row{{ $errors->has('optin2') ? ' alert alert-danger ' : '' }}">
    <label for="optin2" class="col-md-3 form-control-label text-capitalize"><?=__('cms_panel.t3335_f28558')?></label>
    <div class="col-md-9">
        <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" id="optin2" name="optin2"
                    value="1" @isset($leads_row) @if ($leads_row['optin2']==1) {{'checked'}} @endif @endisset>
                &nbsp; <?=__('cms_panel.yes')?>
            </label>
        </div>

        @if ($errors->has('optin2'))
            <div class="invalid-feedback">{{ $errors->first('optin2') }}</div>
        @endif
    </div>
</div>


    <div class="form-group row">
        <div class="col-md-6">
            <p class="text-right">
                <button type="submit"
                        class="btn btn-primary">@if (empty($leads_row)){{ __('cms_panel.add_new') }}@else{{ __('cms_panel.edit') }}@endif</button>
            </p>
        </div>
        <div class="col-md-6">
            <p class="text-right">
                @if (!empty($leads_row))
                    @if($leads_row->trashed())
                        <a href="#"
                           onclick="$('#mass').val({{ $leads_row['id'] }}); $('#type_action').val('3');"
                           class="btn btn-success" data-classname="modal-3d-flip-horizontal"
                           data-type="confirm"
                           data-message="Are you sure that you want to restore this record?"
                           data-plugin="bootbox" data-callback="massFormSubmit">
                            <i class="icon fa fa-reply" aria-hidden="true"></i>
                        </a>

                        <a href="#" class="btn btn-danger"
                           onclick="$('#mass').val({{ $leads_row['id'] }}); $('#type_action').val('4');"
                           data-classname="modal-3d-flip-horizontal" data-type="confirm"
                           data-message="Are you sure that you want to full delete this record?"
                           data-plugin="bootbox" data-callback="massFormSubmit">
                            <i class="icon fa fa-trash" aria-hidden="true"></i>
                        </a>

                    @else
                        <a href="#" class="btn btn-warning"
                           onclick="$('#mass').val({{ $leads_row['id'] }}); $('#type_action').val('1');"
                           data-classname="modal-3d-flip-horizontal" data-type="confirm"
                           data-message="Are you sure that you want to delete this record?"
                           data-plugin="bootbox" data-callback="massFormSubmit">
                            <i class="icon fa fa-trash" aria-hidden="true"></i>
                        </a>
                    @endif
                @endif
            </p>
        </div>
    </div>


</form>

        <form method="POST" name="mass-form" action="{{ route('cms_panel.leads.mass', []) }}">
            <input type="hidden" id="type_action" name="_type" value="">
            {{ csrf_field() }}
            <input type="hidden" id="mass" name="mass[]" value="">
        </form>
    </div>

                </div>
            </div>

        </div>
    </div>

@endsection
@section('content-bottom')
@parent

    <script src="{{ env('APP_URL') }}/design/lib/jquery_datetime_picker/v1/jquery.datetimepicker.full.min.js"></script>
<script>
    $( document ).ready(function() {
        function realoadDateTimePicker() {
            $.datetimepicker.setLocale('{{ app()->getLocale() }}');

            $('.birthday').datetimepicker('destroy');
            $('.birthday').datetimepicker({
                datepicker:true,
                timepicker:false,
                format:'Y-m-d'
            });
        }
        if (realoadDateTimePicker()) {
            realoadDateTimePicker();
        }

</script>
@endsection
