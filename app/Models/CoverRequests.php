<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoverRequests extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cover_requests';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'cover_request_id';

    /**
		     * The attributes that are mass assignable.
		     *
		     * @var array
	*/
	protected $fillable = [
		'status',
	];



    public function articles()
    {
        return $this->hasMany(Articles::class, 'cover_request_id');
    }
}
