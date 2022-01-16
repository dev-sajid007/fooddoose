@extends('admin.admin_master')
@section('content')
<div class="frame-wrap">
  @if ($message = Session::get('message'))
  <div class="alert alert-success alert-block">
    {{-- <button type="button" class="close" data-dismiss="alert">×</button> --}}
    <strong>{{ Session::get('message') }}</strong>
  </div>
  @endif
  <table class="table table-white m-0">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Links</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($select_all_social_link as $select_all_social_links)
      <tr>
        <td scope="row">{{$select_all_social_links->id}}</td>
        <td>{{$select_all_social_links->name}}</td>
        <td>{{$select_all_social_links->link}}</td>
        <td>@if($select_all_social_links->status ==0)

          <span class="text-danger font-weight-bold">Not Active</span>
          @else
          <span class="text-primary font-weight-bold">Active</span>
          
          @endif

        </td>
        <td> 
          
          <a href="{{url('admin/single-social-link/'.$select_all_social_links->id)}}" class=" text-white">
            <button class=" btn btn-info"><i class="bi bi-pencil-square"></i></button>
          </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection