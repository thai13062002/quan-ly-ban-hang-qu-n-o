<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsletterHistory extends Model
{
    use HasFactory;

    public const STATUS_SENT = 1;
    public const STATUS_NOTSENT = 0;

    protected $table = 'newsletter_histories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'content',
        'status',
    ];
}
