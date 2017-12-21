@extends('menu-view::templates.layout')
@section('title')
@endsection
@section('content')
<form class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
	{{ csrf_field() }}
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Menu Item</h3>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="clearfix"></div>
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<!-- X-title -->
					<div class="x_title">
						<h2>Create</h2>
						<div class="clearfix"></div>
					</div>
					<!-- X-title -->
					
					<!-- X-content -->
					<div class="x_content">
						<div id="add_category">
							<div class="form-group">
								<label for="parent_id" class="control-label col-md-3 col-sm-3 col-xs-12">Parent<span class="required">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select id="parent_id" class="form-control col-md-7 col-xs-12" name="parent_id" required>
									<option value="0"><b>Root Menu</b></option>
									<?php foreach ($menu_list as $key => $menu): ?>
										<option value="{{ $menu->id }}"><b>{{ $menu->name}}</b></option>
									<?php endforeach ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="category_list" class="control-label col-md-3 col-sm-3 col-xs-12">Status <span class="required">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select id="status" class="form-control col-md-7 col-xs-12" name="status" required>
									<option value="0">Hide</option>
									<option value="1">Show</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="name" id="name" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="queue"> Link </label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="link" id="link" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="queue"> Order </label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="order" id="order" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-3 col-sm-3 col-xs-12"></div>
							<div class="col-md-6 col-sm-6 col-xs-12 text-center">
								<button type="reset" class="btn btn-default">Reset</button>
								<button class="btn btn-primary" type="submit">Create</button>
							</div>
						</div>
					</div>
					<!-- X-content -->
				</div>
			</div>
		</div>
	</div>
</form>
@endsection
