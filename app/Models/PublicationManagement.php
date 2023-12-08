<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicationManagement extends Model
{
    use HasFactory;

    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'publication_management';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'management_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cover_request_id',
        'publication_id',
        'editor_id',
        'action',
        'comment',
    ];
}
