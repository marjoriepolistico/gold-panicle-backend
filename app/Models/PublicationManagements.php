<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicationManagements extends Model
{
    use HasFactory;

    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'publication_managements';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'management_id';

    /**
		     * The attributes that are mass assignable.
		     *
		     * @var array
	*/
	protected $fillable = [
		'action',
        'comment',
        'editor_id',
        'publication_id',
        'cover_request_id'
	];

}
