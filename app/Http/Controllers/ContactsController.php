<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index(Request $request)
    {
    return view("contacts.index");
    }
}
