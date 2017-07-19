@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/arrivals') }}">Arrival</a> :
@endsection
@section("contentheader_description", $arrival->$view_col)
@section("section", "Arrivals")
@section("section_url", url(config('laraadmin.adminRoute') . '/arrivals'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Arrivals Edit : ".$arrival->$view_col)

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
				{!! Form::model($arrival, ['route' => [config('laraadmin.adminRoute') . '.arrivals.update', $arrival->id ], 'method'=>'PUT', 'id' => 'arrival-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'Block_No')
					@la_input($module, 'date_Arrival')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/arrivals') }}">Cancel</a></button>
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
	$("#arrival-edit-form").validate({
		
	});
});
</script>
@endpush
