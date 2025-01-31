<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NavBar;
use App\Models\NavSubItem;
use Illuminate\Http\Request;

class NavBarController extends Controller
{
    public function index()
    {
        $navBars = NavBar::orderBy('id', 'DESC')->get();
        return view('admin.navBar.index',compact('navBars'));
    }

    public function create()
    {
        return view('admin.navBar.create');
    }

    public function store(Request $request)
    {


        $request->validate([
            'text' => 'required',
            // 'url' => 'required|url',
        ]);

        $status = '0';
        $navItem = NavBar::Create([
            'text' => $request->text,
            'url' => $request->url,
            'route_name' => $request->route_name,
            'is_dropdown' => $request->is_dropdown,
            'status' => $status,
        ]);
        if($request->is_dropdown == 'yes'){
            $dynamicInputs = $request->input('dynamic_input', []);
            // return $dynamicInputs;
            foreach ($dynamicInputs as $inputValue) {
                $navSubItems = NavSubItem::Create([
                    'navbar_id' => $navItem->id,
                    'name' => $inputValue,
                ]);
            }
        }
          
        return redirect()->route('navBar')->with(['message' => 'Nav Bar Created Successfully']);
    }

    public function dropDownItems($id){
        $navBarItems = NavSubItem::where('navbar_id',$id)->get();
        return view('admin.navBar.dropdowns.index', compact('navBarItems'));
    }
    public function editdropDownItem($id)
    {
        // return $id;
        $navBarItem = NavSubItem::find($id);

        return view('admin.navBar.dropdowns.edit', compact('navBarItem'));
    }
    public function updateDropDownItem(Request $request, $id){
        // Find the existing header content by ID
        $navBarItem = NavSubItem::find($id);
        // return $navBarItem;
        // Update the category
        $navBarItem->update([
            'name' => $request->name,
            'url' => $request->url,
            'status' => $request->status,
        ]);
        return redirect()->route('navBarDropDownItem', ['id' => $navBarItem->navbar_id])->with(['message' => 'Dropdown Item Updated Successfully']);
    }
    
    public function destroyDropdownItem($id)
    {
        NavSubItem::destroy($id);
        return redirect()->back()->with(['message' => 'Dropdown Item Deleted Successfully']);
    }

    public function edit($id)
    {
        // return $id;
        $navBar = NavBar::find($id);

        return view('admin.navBar.edit', compact('navBar'));
    }

    public function update(Request $request, $id)
    {
        // return $request;
        // Validate the incoming request data
        $request->validate([
            'text' => 'required',
            // 'url' => 'required|url',
            'status' => 'required|boolean',
        ]);


        // Find the existing header content by ID
        $navBar = NavBar::find($id);

        // Update the category
        $navBar->update([
            'text' => $request->text,
            'url' => $request->url,
            'status' => $request->status,
        ]);

        return redirect()->route('navBar')->with(['message' => 'Nav Bar Updated Successfully']);
    }

    public function destroy($id)
    {
        NavBar::destroy($id);
        return redirect()->route('navBar')->with(['message' => 'Nav Bar Deleted Successfully']);
    }

    
}
