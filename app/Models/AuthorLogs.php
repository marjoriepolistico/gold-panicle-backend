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
     * @var array<int, string>
     */
    protected $fillable = [
        'cover_request_id',
        'publication_id',
        'editor_id',
        'action',
        'comment'
    ];

    public function userAccount()
    {
        return $this->belongsTo(UserAccount::class, 'account_id');
    }
}
