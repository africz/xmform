<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class StartDate implements Rule
{
    private $_errmessage = null;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //convert values to UnixTimeStamp
        $start_date = \DateTime::createFromFormat('Y-n-j', $value)->getTimestamp();
        $date = new \DateTime();
        $now = $date->getTimestamp();
        //required, valid date format verified in other Laravel provided rule set in
        //XmFormController.php
        if ($start_date > $now) 
        {
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "Start date must be less or equal than current date!";
    }
}
