<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Carbon\Carbon;

class DateNotBeforeToday implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
    }

    public function passes($attribute, $value)
    {
        // Parse the input date
        $selectedDate = Carbon::parse($value);
        
        // Compare with today's date
        return $selectedDate->isSameDay(Carbon::today()) || $selectedDate->isAfter(Carbon::today());
    }

    public function message()
    {
        return 'The :attribute cannot be a past date.';
    }
}
