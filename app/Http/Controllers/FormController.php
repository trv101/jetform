<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;

class FormController extends Controller
{
    

    public function store()
    {
        $form = Form::create([
            'user_id' => auth()->id(),
            'title' => 'Untitled Form',
            'schema' => null,
        ]);

        return redirect()->route('form.builder', $form->id);
    }

}
