<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PricingPlan;
use Illuminate\Http\Request;

class PricingPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pricingPlans = PricingPlan::orderBy('order')->orderBy('id')->get();
        return view('admin.pricing.index', compact('pricingPlans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pricing.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'original_price' => 'nullable|string|max:255',
            'promo_price' => 'required|string|max:255',
            'features_raw' => 'required|string',
            'is_popular' => 'nullable|boolean',
            'popular_badge' => 'nullable|string|max:255',
            'cta_text' => 'required|string|max:255',
            'cta_link' => 'required|string|max:255',
            'bg_color' => 'required|string|max:255',
            'text_color' => 'required|string|max:255',
            'order' => 'required|integer',
        ]);

        $data = $request->except(['features_raw']);
        $data['is_popular'] = $request->has('is_popular');
        
        // Split features by newline
        $features = array_filter(array_map('trim', explode("\n", $request->input('features_raw'))));
        $data['features'] = array_values($features);

        PricingPlan::create($data);

        return redirect()->route('admin.pricing-plans.index')->with('success', 'Pricing plan created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(PricingPlan $pricingPlan)
    {
        return redirect()->route('admin.pricing-plans.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PricingPlan $pricingPlan)
    {
        return view('admin.pricing.edit', compact('pricingPlan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PricingPlan $pricingPlan)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'original_price' => 'nullable|string|max:255',
            'promo_price' => 'required|string|max:255',
            'features_raw' => 'required|string',
            'is_popular' => 'nullable|boolean',
            'popular_badge' => 'nullable|string|max:255',
            'cta_text' => 'required|string|max:255',
            'cta_link' => 'required|string|max:255',
            'bg_color' => 'required|string|max:255',
            'text_color' => 'required|string|max:255',
            'order' => 'required|integer',
        ]);

        $data = $request->except(['features_raw']);
        $data['is_popular'] = $request->has('is_popular');
        
        // Split features by newline
        $features = array_filter(array_map('trim', explode("\n", $request->input('features_raw'))));
        $data['features'] = array_values($features);

        $pricingPlan->update($data);

        return redirect()->route('admin.pricing-plans.index')->with('success', 'Pricing plan updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PricingPlan $pricingPlan)
    {
        $pricingPlan->delete();

        return redirect()->route('admin.pricing-plans.index')->with('success', 'Pricing plan deleted successfully!');
    }
}
