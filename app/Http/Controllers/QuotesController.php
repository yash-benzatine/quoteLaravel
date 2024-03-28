<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quote;
use App\Models\Category;

class QuotesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $quotes = Quote::with('category')->whereHas('category')->orderBy('id', 'desc')->get();
        return view('quotes.index', compact('quotes'));
    }

    public function create()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('quotes.create', compact('categories'));
    }

    public function store(Request $request)
    {
        Quote::create($request->all());
        return redirect()->route('quotes.index');
    }

    public function show(Quote $quote)
    {
        return view('quotes.show', compact('quote'));
    }

    public function edit(Quote $quote)
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('quotes.edit', compact('quote', 'categories'));
    }

    public function update(Request $request, Quote $quote)
    {
        // Validation code here
        $quote->update($request->all());
        return redirect()->route('quotes.index');
    }

    public function destroy(Quote $quote)
    {
        $quote->delete();
        return redirect()->route('quotes.index');
    }
}
