<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;


class FormBuilderController extends Controller
{
    public function edit(Form $form)
{
    return view('form.builder', compact('form'));
}

public function update(Request $request, Form $form)
{
    $form->update([
        'schema' => $request->input('schema'),
    ]);

    return response()->json(['status' => 'updated']);
}

}
