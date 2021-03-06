<?php

/*
 * This file is part of Piplin.
 *
 * Copyright (C) 2016-2017 piplin.com
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Piplin\Http\Requests;

use Piplin\Http\Requests\Request;

/**
 * Request for validating project groups.
 */
class StoreProjectGroupRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required|max:255|unique:project_groups,name',
        ];

        // On edit add the group ID to the rules
        if ($this->get('id')) {
            $rules['name'] .= ',' . $this->get('id');
        }

        return $rules;
    }
}
