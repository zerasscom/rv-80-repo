<?php

namespace App\Rules;

use Mailgun\Mailgun;

use Illuminate\Contracts\Validation\Rule;

class MailgunEmailValidation implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $mailgun;

    public function __construct()
    {
        $this->mailgun = new Mailgun(env('MAILGUN_PUBLIC', false));
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
        return $this->mailgun->get('address/validate', ['address' => $value])->http_response_body->is_valid;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.mustBeValid');
    }
}
