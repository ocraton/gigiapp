<?php namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\HttpResponse;
use App\Events\SerializeFile;
use App\Events\SynchronizeInfoToDb;

class SettingsController extends Controller {

	public function __construct()
	{

	}

	public function edit()
	{
		$settings =  Setting::findOrFail(1);
		return view('admin.settings.edit', compact('settings'));
	}

	public function update(Request $request)
	{
		try {
			Setting::where('id', 1)->update([
				'spaziatura_eventi' => $request->spaziatura_eventi,
				'dataora_dimensione_caratteri' => $request->dataora_dimensione_caratteri,
				'dataora_indentazione' => $request->dataora_indentazione,
				'dataora_colore' => $request->dataora_colore,
				'titolo_dimensione_caratteri' => $request->titolo_dimensione_caratteri,
				'titolo_indentazione' => $request->titolo_indentazione,
				'titolo_colore' => $request->titolo_colore,
				'commentouno_dimensione_caratteri' => $request->commentouno_dimensione_caratteri,
				'commentouno_indentazione' => $request->commentouno_indentazione,
				'commentouno_colore' => $request->commentouno_colore,
				'commentodue_dimensione_caratteri' => $request->commentodue_dimensione_caratteri,
				'commentodue_indentazione' => $request->commentodue_indentazione,
				'commentodue_colore' => $request->commentodue_colore,
				'commentotre_dimensione_caratteri' => $request->commentotre_dimensione_caratteri,
				'commentotre_indentazione' => $request->commentotre_indentazione,
				'commentotre_colore' => $request->commentotre_colore
			]);
			event(new SerializeFile());
			flash()->success('Impostazioni Salvate');
		} catch (Exception $e) {
			flash()->danger('Impossibile salvare le Impostazioni');
		}

		return redirect('/settings/edit');
	}

}
