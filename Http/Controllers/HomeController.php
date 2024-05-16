<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RentalHouse;
use App\Models\Land;
use App\Models\Estate;
use App\Models\CommunicationWritingSkills;
use App\Models\Courses;
use App\Models\CProgramming;
use App\Models\PoliticalEconomy;







class HomeController extends Controller
{
     public function index (){

    return view('welcome');
   }
    public function getcourse (){
       $courses = Courses::all();
     return view('course',compact('courses'));
   }

    public function getcommunicationwritingskills (){
       $communicationwritingskills = CommunicationWritingSkills::all();
     return view('communicationskills',compact('communicationwritingskills'));
   }

    public function getcprogramming (){
$cprograming = CProgramming::all();
     return view('cprogramming',compact('cprograming'));
   }

     public function getpolitical (){
$politicaleconomy = PoliticalEconomy::all();
     return view('pe',compact('politicaleconomy'));
   }

   

  public function about()
    {
        return view('aboutus');
    }



}
