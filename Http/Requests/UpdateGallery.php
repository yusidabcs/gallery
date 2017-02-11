<?php namespace Modules\Gallery\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class UpdateGallery extends BaseFormRequest {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
    public function rules()
    {
        return [
            'medias_single.gallery' => 'required',

        ];
    }
    public function translationRules()
    {
        return [

        ];
    }

}
