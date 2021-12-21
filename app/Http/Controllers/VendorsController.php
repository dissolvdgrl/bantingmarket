<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;
use Image;

class VendorsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = Vendor::select('name', 'logo', 'website', 'description', 'email')->where('status', 1)->get();

        return view('vendors.index', compact('vendors'));
    }

    /**
     * Show the page for browsing all the vendors
     *
     * @return \Illuminate\Http\Response
     */

    public function browse()
    {
        $vendors = Vendor::all();

        return view('vendors.browse', compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vendor = new Vendor;

        $vendor->name = request('vendor_name');

        $file = $request->file('logo');
        if($file != null)
        {
            $file_extension = $file->getClientOriginalName();
            $file_path = pathinfo($file_extension, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $file_name = $file_path . '.' . $extension;
            Image::make($file->getRealPath())->resize(250, 250)->save('images/vendors/' . $file_name);
            $vendor->logo = $file_name;
        } else
        {
            $vendor->logo = 'vendor_default.jpg';
        }

        $vendor->email = request('email');
        $vendor->phone = request('phone');
        $vendor->website = request('website');
        $vendor->description = request('description');
        $vendor->status = request('status') === 'on' ? 1 : 0;

        $vendor->save();

        return back()->with('status', 'Vendor created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vendor = Vendor::findOrFail($id);
        return view('vendors.edit', compact('vendor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $vendor = Vendor::findOrFail($id);

        $this->validate($request, [
            'vendor_name' => 'required',
            'logo' => 'image|mimes:jpeg,jpg,png',
            'email' => 'required|email',
            'phone' => 'required|numeric'
        ]);

        if($request->file('logo') != null)
        {
            $file = $request->file('logo');
            $file_extension = $file->getClientOriginalName();
            $file_path = pathinfo($file_extension, PATHINFO_FILENAME);

            $extension = $file->getClientOriginalExtension();
            $file_name = $file_path . '.' . $extension;

            Image::make($file->getRealPath())->resize(250, 250)->save('images/vendors/' . $file_name);
            $vendor->logo = $file_name;
        }

        $vendor->name = request('vendor_name');
        $vendor->email = request('email');
        $vendor->phone = request('phone');
        $vendor->website = request('website');
        $vendor->description = request('description');
        $vendor->status = request('status') === 'on' ? 1 : 0;
        $vendor->save();

        return back()->with('status', 'Vendor updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vendor = Vendor::findOrFail($id);
        $vendor->delete();

        return back()->with('status', 'Vendor deleted!');
    }
}
