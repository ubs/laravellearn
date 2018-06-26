<?php

namespace App\Http\Controllers;

use App\Models\Appsetting;
use Illuminate\Http\Request;

class AppsettingsController extends Controller
{
    /**
     * Display a listing of Application settings.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'appsettings.index',
            ['settings' => Appsetting::all()]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('appsettings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            //Field => Pipe separated list of validation requirements
            'setting' => 'required|min:5|max:25',
            'value' => 'required'
        ]);
        
        //Note: the create method with array argument == mass assigning
        $newAppSetting = Appsetting::create([
            'setting' => request('setting'),
            'value' => request('value')
        ]);
        
        //Shorter alternative to the above
        //$newAppSetting = Appsetting::create(request(['setting', 'value']));
        
        $success = $newAppSetting instanceof Appsetting;
        
        $infoBarMsg = ($success) ? 
            sprintf('New App Setting [id: #%s] successfully created: %s', $newAppSetting->id, $newAppSetting->setting) : 
            'Error: sorry, new application setting could not be created at this time';
        
        request()->getSession()->flash('infoBarMessage', $infoBarMsg);
        
        return ($success) ? 
            redirect(route('settings.show', ['id' => $newAppSetting->id])) : 
            redirect('settings');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appsetting  $appsetting
     * @return \Illuminate\Http\Response
     */
    public function show(Appsetting $setting)
    {
        return view(
            'appsettings.show',
            [
                'setting' => $setting,
                'infoBarMessage' => request()->getSession()->get('infoBarMessage')
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appsetting  $appsetting
     * @return \Illuminate\Http\Response
     */
    public function edit(Appsetting $appsetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appsetting  $appsetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appsetting $appsetting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appsetting  $appsetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appsetting $appsetting)
    {
        //
    }
}
