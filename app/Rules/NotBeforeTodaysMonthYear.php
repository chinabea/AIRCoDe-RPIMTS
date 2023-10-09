<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Carbon\Carbon;

class NotBeforeTodaysMonthYear implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

    }
    public function passes($attribute, $value)
    {
        // Create a Carbon instance from the input value (e.g., "09/2023")
        $inputDate = Carbon::createFromFormat('m/Y', $value);
    
        // Get the current date
        $currentDate = Carbon::now();
    
        // Check if the input date is not before today's date
        return $inputDate->startOfMonth()->greaterThanOrEqualTo($currentDate->startOfMonth());
    }
    

    public function message()
    {
        return 'The :attribute must not be in the past.';
    }
}

