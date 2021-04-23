<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function getStatusAttribute(){
        $today = Carbon::today();
        $event_date = Carbon::parse($this->start_date, $this->city->timezone);
        $today_formatted = Carbon::today($this->city->timezone)->format('Y-m-d');
        if($today_formatted == $this->start_date){
            return "Today";
        }else if($today < $event_date){
            return "Upcoming";
        }else{
            return "Past";
        }
    }
}
