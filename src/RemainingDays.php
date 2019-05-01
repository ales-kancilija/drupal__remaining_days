<?php

namespace Drupal\remaining_days;

class RemainingDays {
    public function getMessage($event_date){
        $text = 'The event has no date.';
        if (!empty($event_date)) {
            $event_time = strtotime($event_date);
            $now = time();
            $days = floor(($event_time - $now)/60/60/24);

            if ($days < 0) {
                $text = "This event already passed.";
            } else if ($days == 0) {
                $text = "This event is happening today.";
            } else if ($days == 1) {
                $text = "This event is happening tomorrow.";
            } else if ($days > 1) {
                $text = $days."  days left until event starts.";
            }
        }
        return $text;
    }
}