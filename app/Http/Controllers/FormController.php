<?php

namespace App\Http\Controllers;
use App\Models\form;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {
        return view('form');
    }
    public function store(Request $request)
    {
        $form = new Form;
        $form->first_name = $request->first_name;
        $form->last_name = $request->last_name;
        $form->save();
        return redirect('form')->with('status', 'Form submitted');
    }
}
