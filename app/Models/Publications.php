<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publications extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'publications';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'publication_id';

    /**
		     * The attributes that are mass assignable.
		     *
		     * @var array
	*/
	protected $fillable = [
		'title',
		'category',
	];

}
