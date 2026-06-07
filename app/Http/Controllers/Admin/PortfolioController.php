<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolios = Portfolio::orderBy('order')->orderBy('id')->get();
        return view('admin.portfolios.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.portfolios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'image_url' => 'nullable|url|max:2048',
            'category' => 'required|string|max:255',
            'order' => 'required|integer',
        ]);

        $data = $request->only(['title', 'description', 'category', 'order']);

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('images', 'public');
            $data['image'] = '/storage/' . $path;
        } elseif ($request->filled('image_url')) {
            $data['image'] = $request->input('image_url');
        } else {
            $data['image'] = 'https://images.unsplash.com/photo-1600880292203-757bb62b4baf?auto=format&fit=crop&w=800&q=80'; // fallback
        }

        Portfolio::create($data);

        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio item created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Portfolio $portfolio)
    {
        return redirect()->route('admin.portfolios.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolios.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'image_url' => 'nullable|url|max:2048',
            'category' => 'required|string|max:255',
            'order' => 'required|integer',
        ]);

        $data = $request->only(['title', 'description', 'category', 'order']);

        if ($request->hasFile('image_file')) {
            // Delete old file if existed locally
            if ($portfolio->image && !filter_var($portfolio->image, FILTER_VALIDATE_URL)) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $portfolio->image));
            }
            $path = $request->file('image_file')->store('images', 'public');
            $data['image'] = '/storage/' . $path;
        } elseif ($request->filled('image_url')) {
            $data['image'] = $request->input('image_url');
        }

        $portfolio->update($data);

        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio item updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfolio $portfolio)
    {
        if ($portfolio->image && !filter_var($portfolio->image, FILTER_VALIDATE_URL)) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $portfolio->image));
        }

        $portfolio->delete();

        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio item deleted successfully!');
    }
}
