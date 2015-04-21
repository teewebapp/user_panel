<?php

namespace Tee\UserPanel\Forms;

use ModelForm\Fields\CharField;
use ModelForm\Fields\IntegerField;
use Validator;

class SignupForm extends \ModelForm\Form
{
    public function makeFields()
    {
        $this->fullName = new CharField(['label' => 'Nome completo']);
        $this->email = new CharField(['label' => 'Email']);
        $this->password = new CharField(['label' => 'Senha']);
        $this->passwordConfirm = new CharField(['label' => 'Confirme sua Senha']);
    }

    public function makeValidator($data)
    {
        $validator = Validator::make($data, [
            'fullName' => 'required|min:4',
            'password' => 'required|min:8|same:passwordConfirm',
            'email' => 'required|email|unique:users',
        ]);
        $validator->setAttributeNames($this->getAttributeNames());
        return $validator;
    }
}
