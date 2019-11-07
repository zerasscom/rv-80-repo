@extends('layouts.cms_panel.app')

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
    <!-- Panel -->
    <div class="panel">
    <form method="POST" name="table-form" action="{{ route('cms_panel.leads.mass', [] ) }}" enctype="multipart/form-data" class="panel panel-default">
        <input type="hidden" name="_type" value="">
        {{ csrf_field() }}
    <div class="panel-body container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <h4>
                    @if(isset(request()->deleted))
                        <a href="{{ route('cms_panel.leads.index', []) }}"  class="btn btn-default btn-sm"><i class="icon fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                        {{ ucfirst(__('cms_panel.t3335')) }} / Deleted
                    @else
                        {{ ucfirst(__('cms_panel.t3335')) }}
                    @endif
                </h4>
            </div>
            <div class="col-lg-6 text-right">
                <?php if(!(empty($leads_list))) { ?>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-outline btn-default dropdown-toggle" id="exampleIconDropdown1" data-toggle="dropdown" aria-expanded="false"><i class="icon wb-wrench" aria-hidden="true"></i>Action</button>
                        <div class="dropdown-menu" aria-labelledby="exampleIconDropdown1" role="menu" x-placement="bottom-start" style="position: absolute; will-change: transform; transform: translate3d(0px, 36px, 0px); top: 0px; left: 0px;">
                            @if(isset(request()->deleted))
                                <a href="#" data-classname="modal-3d-flip-horizontal" data-type="confirm" data-message="Are you sure that you want to restore this records?" data-plugin="bootbox" data-callback="restoreDelete" class="dropdown-item"><i class="icon fa fa-reply" aria-hidden="true"></i>Restore selected</a>
                                <a href="#" data-classname="modal-3d-flip-horizontal" data-type="confirm" data-message="Are you sure that you want to full delete this records?" data-plugin="bootbox" data-callback="forceDelete" class="dropdown-item"><i class="icon fa fa-trash" aria-hidden="true"></i>Full delete selected</a>
                            @else
                                <a href="#" data-classname="modal-3d-flip-horizontal" data-type="confirm" data-message="Are you sure that you want to delete this records?" data-plugin="bootbox" data-callback="softDelete" class="dropdown-item"><i class="icon fa fa-trash" aria-hidden="true"></i>Delete selected</a>
                            @endif
                        </div>
                    </div>
                    @if(!isset(request()->deleted))
                        <div class="btn-group" role="group">
                            <a href="{{ route('cms_panel.leads.index', [ 'deleted' => 'yes']) }}" class="btn btn-outline btn-default"><i class="icon fa fa-archive" aria-hidden="true"></i>Show deleted</a>
                        </div>
                    @endif
                <?php } ?>
                <div class="btn-group" role="group">
                    <a href="{{ route('cms_panel.leads.create', []) }}" class="btn btn-block btn-success"><i class="icon wb-plus" aria-hidden="true"></i></a>
                </div>




        </div>
    </div>
    <div class="example table-responsive noSwipe" id="exampleTable1">

            <?php if(!(empty($leads_list))) { ?>
<table border='0' class='sortable-theme-minimal table table-striped table-hover sotable-table  @isset(request()->deleted){{'alert-danger'}}@endisset' data-plugin="selectable"   data-row-selectable="false" data-sortable role="grid" id='leads' >
<thead>
    <tr>
        <th>
            <span class="checkbox-custom checkbox-danger text-left">
              <input class="selectable-all" type="checkbox">
              <label></label>
            </span>
        </th>
      <TH>{{ __('cms_panel.t3335_f28548') }}</TH>
      <TH>{{ __('cms_panel.t3335_f28549') }}</TH>
      <TH>{{ __('cms_panel.t3335_f28553') }}</TH>
      <TH>{{ __('cms_panel.t3335_f28554') }}</TH>
      <TH>{{ __('cms_panel.t3335_f28555') }}</TH>
      <TH>{{ __('cms_panel.t3335_f28556') }}</TH>
      <TH>{{ __('cms_panel.t3335_f28557') }}</TH>
      <TH>{{ __('cms_panel.t3335_f28558') }}</TH>
    </tr>
</thead>
<tbody>
@forelse ( $leads_list as $leads_row)
<tr data-id="{{ $leads_row['id'] }}" role="row">
    <td>
      <span class="checkbox-custom checkbox-danger text-left">
        <input class="selectable-item" type="checkbox" name="mass[]" value="{{ $leads_row['id'] }}">
        <label></label>
                </span>

    </td>
    <td>
        <a  href="{{ route('cms_panel.leads.edit', ['id' => $leads_row['id']]) }}">{{ $leads_row['id'] }}</a>
    </td>
   <td><?=$leads_row['first_name']?></td>
   <td><?=$leads_row['last_name']?></td>
   <td><?=$leads_row['birthday']?></td>
   <td><?=$leads_row['email']?></td>
   <td><?=$leads_row['mobile']?></td>
  <td><?php if ($leads_row['optin1']==1) echo __('cms_panel.yes'); elseif ($leads_row['optin1']==0) echo __('cms_panel.no'); else echo $leads_row['optin1']; ?></td>
  <td><?php if ($leads_row['optin2']==1) echo __('cms_panel.yes'); elseif ($leads_row['optin2']==0) echo __('cms_panel.no'); else echo $leads_row['optin2']; ?></td>

</tr>
@empty
    <tr>
        <td colspan="3">...</td>
    </tr>
@endforelse
    </tbody>
</table>
<?php } ?>
    </div>
    </div>
</form>

    <form method="POST" name="table-form-action" action="{{ route('cms_panel.leads.mass', []) }}">
        <input type="hidden" id="type_action" name="_type" value="">
        {{ csrf_field() }}
        <input type="hidden" id="mass" name="mass[]" value="">
    </form>

    <div class="pagination text-center">
        <nav class="mx-auto">
            {{ $leads_list->render() }}
        </nav>
    </div>
</div>
    <!-- End Panel -->
</div>
@endsection
@section('content-bottom')
<script type="text/javascript">
    $(document).ready(function(){
    });
</script>
@endsection
