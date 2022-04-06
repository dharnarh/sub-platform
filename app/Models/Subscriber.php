<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Subscriber extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'website_id',
        'email',
    ];

    // notification for mail

    public function notificationForMail($notification)
    {
        return [
            'name' => $this->name,
            'email' => $this->email
        ];
    }

    // get website subscriber

    public function website()
    {
        return $this->belongsTo(Website::class);
    }
}