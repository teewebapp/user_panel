<?php

namespace Tee\UserPanel\Forms;

use ModelForm\Fields\CharField;
use ModelForm\Fields\IntegerField;

class SigninForm extends \ModelForm\Form
{
    public function makeFields()
    {
        $this->email = new CharField(['label' => 'Email']);
        $this->password = new CharField(['label' => 'Senha']);
        $this->remember = new IntegerField(['label' => 'Manter conectado']);
    }
}
