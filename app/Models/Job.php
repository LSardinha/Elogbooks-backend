<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = ['summary', 'description', 'status_id', 'property_id'];

    /**
     * Create relationship with the Status model.
     */
    public function status()
    {
      return $this->belongsTo(Status::class);
    }

    /**
     * Create relationship with the Property model.
     */
    public function property()
    {
      return $this->belongsTo(Property::class);
    }

    /**
     * Gets the jobs status name using the relationship with the statuses table.
     */
    public function getStatusName() {
      return $this->status->name;
    }

    /**
     * Gets the jobs property name using the relationship with the properties table.
     */
    public function getPropertyName() {
      return $this->property->name;
    }

}
