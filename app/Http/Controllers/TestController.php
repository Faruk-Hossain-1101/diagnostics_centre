<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Group;

class TestController extends Controller
{
    public function index(){
        $tests = Test::orderBy('created_at', 'desc')->paginate(8);
        return view('admin.tests.lists', compact('tests'));
    }

    public function create(){
        $groups = Group::all();
        return view('admin.tests.add', compact('groups'));
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'test_name' => 'required|string|max:255',
            'test_price' => 'required|numeric|min:1',
            'test_group' => 'required|exists:groups,id',
        ]);
        $test = new Test();
        $test->name = $validatedData['test_name'];
        $test->price = $validatedData['test_price'];
        $test->group_id = $validatedData['test_group'];
        if($test->save()){
            return redirect()->back()->with('success', "Test [$test->name] added successfully!");
        }else{
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    
    }

    public function edit($id){
        $groups = Group::all();
        $test = Test::findOrFail($id);
        return view('admin.tests.edit', compact('groups', 'test'));
    }

    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'test_name' => 'required|string|max:255',
            'test_price' => 'required|numeric|min:1',
            'test_group' => 'required|exists:groups,id',
        ]);
        $test =  Test::findOrFail($id);
        $test->name = $validatedData['test_name'];
        $test->price = $validatedData['test_price'];
        $test->group_id = $validatedData['test_group'];
        if($test->save()){
            return redirect()->route('test')->with('success', "Test [$test->name] updated successfully!");
        }else{
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function destroy($id){
        $test = Test::findOrFail($id);
        if($test->delete()){
            return redirect()->route('test')->with('success', "Test [$test->name] deleted successfully.");
        }else{
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
}
