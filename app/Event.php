<?php

namespace App;

use Carbon;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

	protected $table = 'events';

	protected $fillable = [

			'dataEvento',
			'indentazioneDataEvento',
			'sizefontDataEvento',
			'colorData',
			'oraEvento',
			'dataOraVisibile',
			'tempoStopMenouno',
			'tempoStopMenodue',
			'tempoStopMenotre',
			'titoloEvento',
			'titoloEventoRigadue',
			'colorEvento',
			'indentazioneTitolo',
			'sizefontTitolo',
			'commentoUno',
			'colorCommenti',
			'indentazioneCommentoUno',
			'sizefontCommentoUno',
			'commentoDue',
			'colorCommentiDue',
			'indentazioneCommentoDue',
			'sizefontCommentoDue',
			'commentoTre',
			'colorCommentiTre',
			'indentazioneCommentoTre',
			'sizefontCommentoTre',
			'fullScreen',
			'tempoStopDef',
			'visualizzaOgni',
			'locandina',

    ];
	



}
