<?php namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\HttpResponse;
use App\Events\SerializeFile;

class SettingsController extends Controller {

	public function __construct()
	{

	}

	public function edit()
	{
		$settings =  Setting::find(1);
		return view('admin.settings.edit', compact('settings'));
	}

	public function update(Request $request)
	{
		try {
			Setting::where('id', 1)->update(['dimensione_caratteri' => $request->dimensione_caratteri,
			'indentazione' => $request->indentazione,
			'spaziatura_eventi' => $request->spaziatura_eventi]);
			event(new SerializeFile());
			flash()->success('Impostazioni Salvate');
		} catch (Exception $e) {
			flash()->danger('Impossibile salvare le Impostazioni');
		}

		return redirect('/settings/edit');
	}

}
