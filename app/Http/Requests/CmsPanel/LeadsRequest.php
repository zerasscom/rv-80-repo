<?php
namespace App\Http\Requests\CmsPanel;

use App\Helpers\BaseFormRequest;

class LeadsRequest extends BaseFormRequest
{
    protected $booleanAttributes = ['optin1','optin2'];
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'string|nullable',
            'last_name' => 'string|nullable',
            'birthday' => 'date|nullable',
            'email' => 'email|nullable',
            'mobile' => 'string|nullable',
            'optin1' => 'boolean|nullable',
            'optin2' => 'boolean|nullable',
        ];
    }

}