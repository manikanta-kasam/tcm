<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Module;
use App\TestCase;

class ModuleController extends Controller
{
    /**
     * Using this method to add module
     */
    public function addModule(Request $request){

       $request->validate(['module_id'=>'required','section_name'=>'required']);

       $objModule = new Module();
      
       $moduleData =  $objModule->find($request->input('module_id'));

       if(!empty($moduleData)){
        $objModule->level = $moduleData->level + 1;
        $objModule->name = $request->input('section_name');
        $objModule->parent_id = $request->input('module_id');
         $objModule->save();  
         return redirect('/getSections')->with('success','Data Saved');
       }
        
       return false;
    }

    /**
     * using this method to add test case to the module
     */
    public function addTestCase(Request $request){
        $request->validate(['module_id'=>'required','name'=>'required']);

        $objTestCase = new TestCase();

        $objTestCase->module_id = $request->input('module_id');
        $objTestCase->name  = $request->input('name');
        $objTestCase->description = $request->input('description');
        return  $objTestCase->save();

    }

    /**
     * using this method to delete test case
     */
    public function deleteTestCase(Request $request){
        $request->validate(['id'=>'required']);  
    TestCase::find($request->input('id'))->delete();   
    return redirect('/')->with('success','Data deleted.');
    }

    /**
     * using this method to show the test cases based on module
     */
    public function getTestCases(Request $request){
        // $request->validate(['module_id'=>'required']);  

        $objTestCase = new TestCase();
        $arrTestCases =  $objTestCase->select('id','name','description')
                        // ->where('module_id',$request->input('module_id'))
                        ->get()->toArray();
        return view('GetTestCases')->with('arrTestCases',$arrTestCases);
    }

    /**
     * using this method to show modules
     */
    public function getSections(){
        $objModule = new Module();
        $arrSections =  $objModule->select('name')->where('level','!=',0)->orderBy('level','asc')->get()->toArray();
        return view('GetSections')->with('arrSections',$arrSections);
    }

    /**
     * 
     */
    public function addSectionPopUp(){
        return view('SectionPopUp');
    }

}
