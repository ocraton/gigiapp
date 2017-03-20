<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

	protected $table = 'settings';

	protected $fillable = [

			'spaziatura_eventi',
			'dataora_dimensione_caratteri',
			'dataora_indentazione',
			'dataora_colore',
			'titolo_dimensione_caratteri',
			'titolo_indentazione',
			'titolo_colore',
			'commentouno_dimensione_caratteri',
			'commentouno_indentazione',
			'commentouno_colore',
			'commentodue_dimensione_caratteri',
			'commentodue_indentazione',
			'commentodue_colore',
			'commentotre_dimensione_caratteri',
			'commentotre_indentazione',
			'commentotre_colore'

    ];


}
