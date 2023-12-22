<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorLogs extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'author_logs';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'auth_log_id';

    /**
		     * The attributes that are mass assignable.
		     *
		     * @var array
	*/
	protected $fillable = [
		'action',
        'article_id',
	];

    public function articles()
    {
        return $this->belongsTo(Articles::class, 'article_id');
    }
}
