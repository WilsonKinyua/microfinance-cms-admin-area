<?php

namespace App\Http\Controllers;

use App\AboutOurCompany;
use App\Contact;
use App\HomePageSlide;
use App\Service;
use App\Team;
use App\WhyChooseOurCompany;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {

        $homePageSlides = HomePageSlide::with(['media'])->get();
        $aboutOurCompanies = AboutOurCompany::orderBy('id','desc')->take(1)->with(['media'])->get();
        // $services = Service::orderBy('id','desc')->take(4)->get();
        $services = Service::all();
        $whyChooseOurCompanies = WhyChooseOurCompany::with(['media'])->orderBy('id','desc')->take(1)->get();
        $teams = Team::all();

        return view('welcome',compact('homePageSlides'),
                 compact('aboutOurCompanies','services','whyChooseOurCompanies','teams'));
    }

    public function about()
    {
        return view('homepage-frontend.about');
    }

    public function services()
    {
        return view('homepage-frontend.services');
    }

    public function blog()
    {
        return view('homepage-frontend.blog');
    }

    public function contact()
    {
        $contact = Contact::all();

        return view('homepage-frontend.contact', compact('contact'));
    }

    public function apply()
    {
        return view('homepage-frontend.apply');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
