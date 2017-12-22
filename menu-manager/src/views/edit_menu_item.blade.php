@extends('menu-view::templates.layout')
@section('title')
@endsection

@section('header')
<!-- <link rel="stylesheet" type="text/css" href="http://camohub.github.io/jquery-sortable-lists/stylesheets/github-dark.css"> -->
<!-- <link rel="stylesheet" type="text/css" href="http://camohub.github.io/jquery-sortable-lists/stylesheets/stylesheet.css"> -->

<style type="text/css">

p { margin-top:0; font-size:0.97em; }

ul, li {
	list-style-type:none;
	color:#b5e853;
	/*border:1px solid #3f3f3f;*/
}



/*ul, #sTree2, #sTreePlus { padding:0; background-color:#151515; }*/
.x_content ul, #sTree2, #sTreePlus { padding:0; background-color:#151515; }

#sTree2 li{
	padding-left:50px;
	margin:5px; border:1px solid #3f3f3f;
	background-color:#3f3f3f;
}
.x_content ul, .x_content li {
	border:1px solid #3f3f3f;
	color : #fff;
}
li div {
	padding:7px;
	background-color:#555;
}

li, ul, div { border-radius: 3px; }

#sTree2, #sTreePlus { margin:10px auto; }
</style>
@endsection

@section('content')
@section('content')
<div class="">
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
					<h2>{{ $menu->name }}</h2>
					<a href="{{ route('menu_manager') }}" class="btn btn-default pull-right">Back</a>
					<button class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-create">Create</button>
					<div class="clearfix"></div>
				</div>
				<!-- X-title -->

				<!-- X-content -->
				<div class="x_content">
					<ul class="sTree2 listsClass" id="sTree2">
						<?php echo $html ?>
					</ul>
				</div>
				<!-- X-content -->
			</div>
		</div>
	</div>
</div>
<!-- Modal create-->
<div id="modal-create" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Create</h4>
			</div>
			<form id="form-create-menu-item">
				<input type="hidden" name="menu_id" value="{{ $menu->id }}">
				<div class="modal-body">
					<div class="row">
						<div class="form-group">
							<label for="status" class="control-label col-md-3 col-sm-3 col-xs-12"> Status <span class="required">*</span></label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<select id="status" class="form-control col-md-7 col-xs-12" name="status" required>
									<option value="0">Hide</option>
									<option value="1">Show</option>
								</select>
							</div>
						</div>
						<br><br>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Name <span class="required">*</span>
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" name="name" id="name" required="required" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<br><br>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="queue"> Link </label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" name="link" id="link" required="required" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
					</div>
				</div>
			</form>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<a href="" id="create-menu-item"  class="btn btn-primary" >Accept</a>
			</div>
		</div>
	</div>
</div>

<!-- Modal edit-->
<div id="modal-edit" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit</h4>
			</div>
			<form id="form-edit-menu-item">
				<input type="hidden" name="item_id" id="edit-menu-item-id">
				<div class="modal-body">
					<div class="row">
						<div class="form-group">
							<label for="status" class="control-label col-md-3 col-sm-3 col-xs-12"> Status <span class="required">*</span></label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<select id="edit-menu-item-status" class="form-control col-md-7 col-xs-12" name="status" required>
									<option value="0">Hide</option>
									<option value="1">Show</option>
								</select>
							</div>
						</div>
						<br><br>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Name <span class="required">*</span>
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" name="name" id="edit-menu-item-name" required="required" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<br><br>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="queue"> Link </label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" name="link" id="edit-menu-item-link" required="required" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
					</div>
				</div>
			</form>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<a href="" id="update-menu-item"  class="btn btn-primary" >Update</a>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script src="/packages/menu-manager/js/jquery-sortable-lists.js"></script>
<script type="text/javascript">
	var options = {

		onChange: function( cEl )
		{
			$.ajax({
				url : '{{ route("menu_manager.updateOrder") }}',
				data : { items : $('#sTree2').sortableListsToArray() }
			}).done(function (data) {
				if (!data) {
					toastr.error('Oops! Error, please refresh page and try again');
				} 
			});
		},
		complete: function( cEl )
		{
	            // console.log( $('#sTree2').sortableListsToArray());
	        },
	        isAllowed: function( cEl, hint, target )
	        {
				// Be carefull if you test some ul/ol elements here.
				// Sometimes ul/ols are dynamically generated and so they have not some attributes as natural ul/ols.
				// Be careful also if the hint is not visible. It has only display none so it is at the previouse place where it was before(excluding first moves before showing).
				if( target.data('module') === 'c' && cEl.data('module') !== 'c' )
				{
					hint.css('background-color', '#ff9999');
					return false;
				}
				else
				{
					hint.css('background-color', '#99ff99');
					return true;
				}
			},
			opener: {
				active: true,
	            as: 'html',  // if as is not set plugin uses background image
	            close: '<i class="fa fa-minus c3"></i>',  // or 'fa-minus c3',  // or './imgs/Remove2.png',
	            open: '<i class="fa fa-plus"></i>',  // or 'fa-plus',  // or'./imgs/Add2.png',
	            openerCss: {
	            	'display': 'inline-block',
	                //'width': '18px', 'height': '18px',
	                'float': 'left',
	                'margin-left': '-35px',
	                'margin-right': '5px',
	                //'background-position': 'center center', 'background-repeat': 'no-repeat',
	                'font-size': '1.1em'
	            }
	        },
	        ignoreClass: 'clickable'
	    };

	// $('.sortableLists').sortableLists( options );
	$('#sTree2').sortableLists( options );


	$(document).on('click','#create-menu-item', function(e) {
		e.preventDefault();

		$.ajax({
			url : '{{ route("menu_manager.createMenuItem") }}',
			data : $('#form-create-menu-item').serialize(),
			type : 'GET'
		}).done(function (item) {
			if (item == 0) {
				toastr.error('Name cannot be null');

				return false;
			}

			var li = $('<li>', {
				id : item.id,
			}).appendTo($('#sTree2'));

			var div = $('<div>').appendTo(li);

			var span = $('<span>', {
				text : item.name,
				class : 'item_name',
				id : 'item_name_'+item.id
			}).appendTo(div);

			if (item.status == 0) {
				$('<i>', {text:' (Hidden)'}).appendTo(span);
			}

			var a = $('<a>', {
				text : 'Remove',
				class : 'btn btn-danger btn-xs clickable pull-right remove-menu-item',
				href : item.detailMenuItemUrl
			}).appendTo(div);

			var a = $('<a>', {
				text : 'Edit',
				class : 'btn btn-warning btn-xs clickable pull-right edit-menu-item',
				href : item.detailMenuItemUrl
			}).appendTo(div);
		});

		$('#modal-create').modal('hide');
	});

	$(document).on('click','.edit-menu-item', function(e) {
		e.preventDefault();
		var url = $(this).attr('href');
		$.ajax({
			url : url,
			type : 'GET'
		}).done(function (item) {
			if (item) {
				$('#edit-menu-item-status').val(item.status);
				$('#edit-menu-item-name').val(item.name);
				$('#edit-menu-item-link').val(item.link);
				$('#edit-menu-item-id').val(item.id);
				$('#modal-edit').modal('show');
			} else {
				alert('Error');
			}
		});
	});

	$(document).on('click', '#update-menu-item' ,function(e) {
		e.preventDefault();
		$.ajax({
			url : "{{ route('menu_manager.updateMenuItem') }}",
			data : $('#form-edit-menu-item').serialize() ,
			type : 'POST'
		}).done(function(item) {
			if (item == 0) {
				toastr.error('Name cannot be null');

				return false;
			}

			$('#item_name_'+item.id).find('i').remove();
			$('#item_name_'+item.id).text(item.name);

			if (item.status == 0) {
				$('<i>', {text:' (Hidden)'}).appendTo($('#item_name_'+item.id));
			}
		});
		$('#modal-edit').modal('hide');
	});

	$(document).on('click', '.remove-menu-item' ,function(e) {
		e.preventDefault();
		var url = $(this).attr('href');
		$.ajax({
			url : url,
			type : 'GET'
		}).done(function (item) {
			if (item != 0) {
				$('#link-delete').attr('menu-item-id', item.id);
				$('#modal-delete').modal('show');
			} else {
				alert('Error');
			}
		});
	});

	$('#link-delete').on('click', function(e) {
		e.preventDefault();
		var menu_item_id = $(this).attr('menu-item-id');

		$.ajax({
			url : "{{ route('menu_manager.removeMenuItem') }}",
			data : {menu_item_id : menu_item_id},
			type : 'POST'
		}).done(function(status) {
			if (status == 0) {
				alert('Remove item error');
			} else {
				$('#'+menu_item_id).remove();
			}
		});
		$('#modal-delete').modal('hide');
	});
</script>
@endsection
