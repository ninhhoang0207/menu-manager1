@foreach($menuItems as $item)
	@if($item->hasChildren())
	<li class ="dropdown">
	    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
	      {!! $item->name !!} <b class="caret"></b>
		    <ul class="dropdown-menu">
		        @include('menu-view::menu_render',array('menuItems' => $item->children, 'flag'=>1))
		    </ul>
	    </a>
	</li>
	@else
	<li>
		<a href="/{{ $item->link }}">{!! $item->name !!}</a>
	</li>
	@endif
@endforeach