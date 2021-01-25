<?php

namespace App\Http\Controllers;

use App\AboutOurCompany;
use App\Blog;
use App\Contact;
use App\HomePageSlide;
use App\Service;
use App\Team;
use App\Testimony;
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
        $services = Service::all();
        $whyChooseOurCompanies = WhyChooseOurCompany::with(['media'])->orderBy('id','desc')->take(1)->get();
        $teams = Team::all();
        $testimonies = Testimony::with(['media'])->get();
        $blogs = Blog::with(['media'])->orderBy('id','desc')->take(2)->get();

        return view('welcome',compact('homePageSlides'),
                 compact('aboutOurCompanies','services','whyChooseOurCompanies','teams','testimonies','blogs'));
    }

    public function about()
    {
        $aboutOurCompanies = AboutOurCompany::orderBy('id','desc')->take(1)->with(['media'])->get();
        $whyChooseOurCompanies = WhyChooseOurCompany::with(['media'])->orderBy('id','desc')->take(1)->get();
        $teams = Team::all();
        $testimonies = Testimony::with(['media'])->get();
        $services = Service::all();
        $blogs = Blog::with(['media'])->orderBy('id','desc')->take(2)->get();

        return view('homepage-frontend.about',compact('aboutOurCompanies','whyChooseOurCompanies','teams','testimonies','blogs'));
    }

    public function services()
    {
        $services = Service::all();

        return view('homepage-frontend.services',compact('services'));
    }

    public function blog()
    {
        $blogs = Blog::with(['media'])->orderBy('id','desc')->get();

        return view('homepage-frontend.blog',compact('blogs'));
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
