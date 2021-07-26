<?php

namespace App\Models;

use App\Models\TicketPriority;
use App\Models\TicketStatus;
use App\Models\TicketType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'status',
        'priority',
        'title',
        'description',
        'page_url',
        'browser',
        'operating_system',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id')->withDefault();
    }

    public function activities()
    {
        return $this->hasMany(TicketActivity::class);
    }

    public function getLastActivityAttribute(): ?\DateTime
    {
        return optional($this->activities()->latest()->first())->created_at;
    }

    public function getTypeAttribute()
    {
        return TicketType::fromValue($this->attributes['type']);
    }

    public function setTypeAttribute(TicketType $value)
    {
        $this->attributes['type'] = (string) $value;
    }

    public function getStatusAttribute()
    {
        return TicketStatus::fromValue($this->attributes['status']);
    }

    public function setStatusAttribute(TicketStatus $value)
    {
        $this->attributes['status'] = (string) $value;
    }

    public function getPriorityAttribute()
    {
        return TicketPriority::fromValue($this->attributes['priority']);
    }

    public function setPriorityAttribute(TicketPriority $value)
    {
        $this->attributes['priority'] = (string) $value;
    }
}
