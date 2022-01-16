@extends('admin.admin_master')
@section('content')
<input type="hidden" id="headerdata" value="{{ __('ROLE') }}">
<div class="content-area">
  
  <div class="row mb-5">
    <div class="col-lg-12 text-left">
      
      <a href="{{ route('admin-role-create') }}"><button class="btn btn-dark text-left">{{ __('Create New Role') }}</button></a>
    </div>
  </div>
  
  <div class="product-area">
    <div class="row">
      <div class="col-lg-12">
        <div class="mr-table allproduct">
          @include('admin.include.admin.form-success')
          <div class="table-responsiv">
            <table id="geniustable" class="table table-hover dt-responsive" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>{{ __('Name') }}</th>
                  <th width="50%">{{ __('Permissions') }}</th>
                  <th>{{ __('Options') }}</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- DELETE MODAL --}}
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header d-block text-center">
        <h4 class="modal-title d-inline-block">{{ __("Confirm Delete") }}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <p class="text-center">{{ __('You are about to delete this Role.') }}</p>
        <p class="text-center">{{ __('Do you want to proceed?') }}</p>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('Cancel') }}</button>
        <a class="btn btn-danger btn-ok">{{ __('Delete') }}</a>
      </div>
    </div>
  </div>
</div>
{{-- DELETE MODAL ENDS --}}
@endsection
@section('js')
{{-- DATA TABLE --}}
<script type="text/javascript">
var table = $('#geniustable').DataTable({
ordering: false,
processing: true,
serverSide: true,
ajax: '{{ route('admin-role-datatables') }}',
columns: [
{ data: 'name', name: 'name' },
{ data: 'section', name: 'section' },
{ data: 'action', searchable: false, orderable: false }
],
});
$(function() {
$(".btn-area").append('<div class="col-sm-4 table-contents">'+
  '<a class="add-btn" href="{{route('admin-role-create')}}">'+
    '<i class="fas fa-plus"></i> {{ __("Add New Role") }}'+
  '</a>'+
'</div>');
});
{{-- DATA TABLE ENDS--}}
</script>
@endsection