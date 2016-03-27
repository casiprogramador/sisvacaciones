<?php
/**
 * Created by PhpStorm.
 * User: marcelo
 * Date: 25-03-16
 * Time: 07:42 PM
 */

namespace App\Helpers;
use App\Vacation;

class MyHelper {
    public static function vacationDays($date){
        $date_current = new \DateTime();
        $date_init =  new \DateTime($date);
        $difference = $date_current->diff($date_init);
        $year_difference = $difference->format('%y');
        $vacation_days = 0;
        if($year_difference <= 5){
            $vacation_days = $year_difference*15;
        }elseif($year_difference > 5 && $year_difference <= 10){
            $vacation_days = 75+($year_difference-5)*20;
        }elseif($year_difference > 10){
            $vacation_days = 75+100+($year_difference-10)*30;
        }
        return $vacation_days;
    }

    public static function vacationTaken($id){
        $days_taken = Vacation::where('worker_id',$id)->sum('days_taken');
        return $days_taken;
    }
} 