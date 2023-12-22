<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EditorialStaffs extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'editorial_staffs';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'editor_id';

    /**
		     * The attributes that are mass assignable.
		     *
		     * @var array
	*/
	protected $fillable = [
		'profile_id',
	];

    /**
     * Get the user profile associated with the author.
     */
    public function userProfile()
    {
        return $this->belongsTo(UserProfile::class, 'profile_id', 'id');
    }
}
