<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class AreaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::all();
        return view('area.index')->with('areas',$areas);
    }

    public function create()
    {
        return view('area.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);

        $name = $request['name'];
        $description = $request['description'];

        $area = new Area();
        $area->name = $name;
        $area->description = $description;

        $area->save();

        return redirect('/area');
    }
}
