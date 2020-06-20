<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class StartEndDate implements Rule
{
    private $_request = null;
    private $_errmessage = null;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($req)
    {
        $this->_request = $req;
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
        $tmp = $this->_request;
        if ($this->_request->end_date < $this->_request->start_date) 
        {
            $this->_errmessage="End date must be larger than start date!";
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
        return $this->_errmessage;
    }
}
