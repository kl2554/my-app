<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


    
class StudentController extends Controller
{
    public function index() { return response()->json(['message' => 'GET all']); }
    public function store(Request $request) { return response()->json(['message' => 'POST created']); }
    public function update(Request $request, $id) { return response()->json(['message' => "PUT updated $id"]); }
    public function destroy($id) { return response()->json(['message' => "DELETE removed $id"]); }
}

