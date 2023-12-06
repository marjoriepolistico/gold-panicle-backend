<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_profiles';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'profile_id';

    /**
		     * The attributes that are mass assignable.
		     *
		     * @var array
	*/
	protected $fillable = [
		'firstname',
		'lastname',
		'middle_initial',
		'ext',
        'year_level',
        'course',
	];

}
