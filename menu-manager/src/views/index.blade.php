@extends('menu-view::templates.layout')
@section('title')
@endsection

@section('styles')
<link rel="stylesheet" type="text/css" href="http://camohub.github.io/jquery-sortable-lists/stylesheets/github-dark.css">
<link rel="stylesheet" type="text/css" href="http://camohub.github.io/jquery-sortable-lists/stylesheets/stylesheet.css">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
@endsection

@section('content')

	<div class="page-title">
		<div class="title_left">
			<h3>Menu</h3>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="row">
		<div class="clearfix"></div>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<!-- X-title -->
				<div class="x_title">
					<h2>List</h2>
					<a href="{{ route('menu_manager.create') }}" class="btn btn-primary pull-right">Create</a>
					<div class="clearfix"></div>
				</div>
				<!-- X-title -->

				<!-- X-content -->
				<div class="x_content">
					<div id="create-menu">
						<table class="table">
							<thead>
								<th>ID</th>
								<th>Name</th>
								<th></th>
							</thead>
							<tbody>
								@foreach($menus as $key => $menu)
								<tr>
									<td>{{ $key+1 }}</td>
									<td>{{ $menu->name }}</td>
									<td>
										<a href="{{ route('menu_manager.editMenu', ['menu_item_id'=>$menu->id]) }}" class="btn btn-warning btn-xs">Edit Item</a>
										<a href="#" class="btn btn-danger btn-xs">Remove</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<!-- X-content -->
			</div>
		</div>
	</div>
@endsection

@section('scripts')

@endsection
