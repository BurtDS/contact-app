<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('business.index')->with('businesses',Business::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('business.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'business_name' => 'required',
            'contact_email' => 'nullable|email'
        ]);

        $business = new Business;
        $business->business_name = $request->input('business_name');
        $business->contact_email = $request->input('contact_email');
        $business->save();

        return redirect(route('business.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Business $business)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Business $business)
    {
        //
        return view('business.edit')->with('business',$business);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Business $business)
    {
        //
        $validated = $request->validate([
            'business_name' => 'required',
            'contact_email' => 'nullable|email'
        ]);

        $business->business_name = $request->input('business_name');
        $business->contact_email = $request->input('contact_email');
        $business->save();

        return redirect(route('business.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Business $business)
    {
        //
        $business->delete();

        return redirect(route('business.index'));
    }
}
