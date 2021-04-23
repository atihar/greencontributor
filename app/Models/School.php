<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

    public function getShortNameAttribute()
    {
        $exploded_name = explode(' ', $this->name);
        $short_name = '';
        foreach($exploded_name as $words)
        {
            $short_name = $short_name . $words[0];
        }
        return $short_name;
    }
}
