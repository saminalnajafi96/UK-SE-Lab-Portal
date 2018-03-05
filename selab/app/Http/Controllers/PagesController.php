<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
	public function index(){
		$title = 'Welcome to Laravel';
		
		// ALTERNATIVE ->        return view('pages.index', compact('title'));
		return view('pages.index')->with('title',$title);
	}
	
	public function tutorials(){
		$title = 'Tutorials';
		return view('pages.tutorials')->with('title',$title);
	}
	
	public function support(){
		$title = 'Support page';
		return view('pages.support')->with('title',$title);
	}
}
