@extends('admin.admin_master')
@section('content')
<div class="frame-wrap">
	
	<form name="social_link" method="post" action="{{url('admin/update-special-link')}}" enctype="multipart/form-data">
		@csrf
		<input type="hidden" name="id" value="{{$select_single_social_link->id}}" >
		<div class="form-group">
			<label class="form-label" name="dish_link" for="simpleinput">Social Link</label>
			<input value="{{$select_single_social_link->link}}" type="text"  class="form-control" placeholder="Social Link" name="link">
		</div>
		<div class="form-group ">
			<div class="input-group">
				
				<select class="form-control" name="status" required="">
					<option  disabled="">--Select Status--</option>
					
					<option value="1">Active</option>
					<option value="0">Not Active</option>
					
				</select>
			</div>
			<br/>
		</div>
		
		
		<input type="submit" name="" value="Update Social Link">
		
		
		
	</form>
</div>

<script type="text/javascript">
	
	document.forms['social_link'].elements['status'].value={{$select_single_social_link->status}};


</script>
@endsection