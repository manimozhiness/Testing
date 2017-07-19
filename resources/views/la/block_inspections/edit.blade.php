@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/block_inspections') }}">Block Inspection</a> :
@endsection
@section("contentheader_description", $block_inspection->$view_col)
@section("section", "Block Inspections")
@section("section_url", url(config('laraadmin.adminRoute') . '/block_inspections'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Block Inspections Edit : ".$block_inspection->$view_col)

@section("main-content")

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="box">
	<div class="box-header">
		
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				{!! Form::model($block_inspection, ['route' => [config('laraadmin.adminRoute') . '.block_inspections.update', $block_inspection->id ], 'method'=>'PUT', 'id' => 'block_inspection-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'Quarry_Code')
					@la_input($module, 'Block_No')
					@la_input($module, 'Block_Size')
					@la_input($module, 'Size_Code')
					@la_input($module, 'date_Marking')
					@la_input($module, 'marker_Name')
					@la_input($module, 'location')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/block_inspections') }}">Cancel</a></button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script>
$(function () {
	$("#block_inspection-edit-form").validate({
		
	});
});
</script>
@endpush
