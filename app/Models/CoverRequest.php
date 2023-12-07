<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoverRequest extends Model
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
     * @var array<int, string>
     */
    protected $fillable = [
        'article_id',
        'status',
    ];
}

