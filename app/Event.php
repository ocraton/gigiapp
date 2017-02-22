<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

	protected $table = 'events';

	protected $fillable = [

			'dataEvento',
			'colorData',
			'oraEvento',
			'dataOraVisibile',
			'tempoStopMenouno',
			'tempoStopMenodue',
			'tempoStopMenotre',
			'titoloEvento',
			'colorEvento',
			'commentoUno',
			'commentoDue',
			'commentoTre',
			'colorCommenti',
			'fullScreen',
			'tempoStopDef',
			'visualizzaOgni',
			'locandina',

    ];


}
