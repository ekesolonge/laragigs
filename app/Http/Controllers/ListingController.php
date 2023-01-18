<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // Show all listings
    public function index()
    {
        $search_params = request(['tag', 'search']);

        return view('listings.index', [
            'heading' => 'Latest Listings',
            'listings' => Listing::latest()->filter($search_params)->paginate(6)
        ]);
    }

    // Show single listing
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    // Show create form
    public function create()
    {
        return view('listings.create');
    }

    // Show create form
    public function store()
    {
        $formFields = request()->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
        ]);

        if (request()->hasFile('logo')) {
            $formFields['logo'] = request()->file('logo')->store('logos', 'public');
        }

        Listing::create($formFields);

        return redirect('/')->with('success', 'Listing created successfully.');
    }
}
