<?php 

namespace Manager\MenuManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Manager\MenuManager\Menu;
use Manager\MenuManager\MenuItem;
use Redirect, DB;

class MenuManagerController extends Controller {
	
	public function __construct() {
    // $this->middleware('auth');
	}

	public function index()
	{
		$menus = Menu::all();

		return view('menu-view::index', compact(['menus']));
	}

	public function create()
	{
		return view('menu-view::create');
	}

	public function store(Request $request) {
    	try {
    		$request->validate(['name'=>'unique:menus']);
			$menu = new Menu;
			$menu->name = $request->name;
			$menu->slug = str_slug($request->name);
			$menu->save();
    	} catch (Exception $e) {
    		
    	}

    	return Redirect::route('menu_manager');
    }

    public function createItem($id)
	{
		$menu_list = MenuItem::where('menu_id', $id)->get();

		return view('menu-view::create_item', compact(['menu_list']));
	}

	public function storeItem(Request $request, $id) {
    	try {
			$menu_item = new MenuItem;
			$menu_item->parent_id = $request->parent_id;
			$menu_item->name = $request->name;
			$menu_item->link = $request->link;
			$menu_item->status = $request->status;
			$menu_item->order = $request->order;
			$menu_item->menu_id = $id;
			$menu_item->save();
    	} catch (Exception $e) {
    		
    	}

    	return Redirect::route('menu_manager');
    }

    public function getMenu($keyword) {
    	$menu = Menu::where('name', $keyword)->firstOrFail();
    	$menuItems = MenuItem::where('menu_id', $menu->id)->where('parent_id', 0)->get();
    	$html = (string)$this->render($menuItems);

    	echo (string)view('menu-view::menu', compact(['html']));
    }

    public function render($menuItems) {
    	return view('menu-view::menu_render', compact(['menuItems']))->render();
    }

    public function edit($menu_item_id) {
    	$menu = Menu::where('id', $menu_item_id)->firstOrFail();
    	$menuItems = MenuItem::where('menu_id', $menu->id)->where('parent_id', 0)->orderBy('order', 'asc')->get();
    	$html = (string)$this->render2($menuItems, '');
    	// echo $html;
    	// die;
    	return view('menu-view::edit', compact(['html', 'menu']));
    }

    public function render2($menuItems, $html) {
    	
    	foreach ($menuItems as $key => $item) {
    		$html .= '<li id="'.$item->id.'"><div><span>'.$item->name.($item->status?'':' <i>(Hiden)</i> ').'</span><a href = "'.route('menu_manager.detailMenuItem', ['menu_item_id'=>$item->id]).'" class="clickable pull-right btn btn-danger btn-xs remove-menu-item">Remove</a><a href = "'.route('menu_manager.detailMenuItem', ['menu_item_id'=>$item->id]).'" class="clickable pull-right btn btn-warning btn-xs edit-menu-item">Edit</a></div>';

    		if ($item->hasChildren()) {
    			$html .= '<ul>'.$this->render2($item->children, '').'</ul>';
    		}

    		$html .= '</li>';
    	}

    	return $html;
    	
    }

    public function createMenuItem(Request $request) {
    	$menuItem = new MenuItem;
    	$menuItem->menu_id = 1;
    	$menuItem->name = $request->name;
    	$menuItem->status = $request->status;
    	$menuItem->order = 999;
    	$menuItem->link = $request->link;
    	$menuItem->save();
    	$menuItem->detailMenuItemUrl = route('menu_manager.detailMenuItem', ['menu_item_id'=>$menuItem->id]);

    	return $menuItem;
    }

    public function updateOrder(Request $request) {
    	DB::beginTransaction();

    	try {
    		foreach ($request->items as $key => $item) {
    			$menuItem = MenuItem::find($item['id']);
    			$menuItem->parent_id = isset($item['parentId'])?$item['parentId']:0;
    			$menuItem->order = $item['order'];
    			$menuItem->save();
    		}
    		DB::commit();
    	} catch (Exception $e) {

    		DB::rollback();
    		return 0;
    	}

    	return 1;
    }

    public function detailMenuItem($menu_item_id) {
    	$menuItem = MenuItem::find($menu_item_id);

    	if ($menuItem) {
    		return $menuItem;
    	}

    	return 0;
    }

    public function updateMenuItem(Request $request) {
    	$menuItem = MenuItem::find($request->item_id);
    	if ($menuItem) {
    		$menuItem->name = $request->name;
    		$menuItem->link = $request->link;
    		$menuItem->status = $request->status;
    		$menuItem->save();

    		return $menuItem;
    	} else {
    		return 0;
    	}
    }

    public function removeMenuItem(Request $request) {
    	try {
    		MenuItem::where('id', $request->menu_item_id)->delete();
    		MenuItem::where('parent_id', $request->menu_item_id)->update(['parent_id'=>0]);

    	} catch (Exception $e) {
			
			return 0;    		
    	}

    	return 1;
    }
}