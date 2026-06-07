<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LandingSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LandingSettingsController extends Controller
{
    public function edit()
    {
        $settings = LandingSetting::first() ?? new LandingSetting();
        return view('admin.settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $settings = LandingSetting::first();
        if (!$settings) {
            $settings = new LandingSetting();
        }

        $request->validate([
            'hero_badge' => 'required|string|max:255',
            'hero_title' => 'required|string|max:255',
            'hero_subtitle' => 'required|string',
            'hero_image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'hero_image_url' => 'nullable|url|max:2048',
            'whatsapp_number' => 'required|string|max:50',
            'whatsapp_text' => 'nullable|string|max:500',
            'rating_text' => 'required|string|max:255',
            'rating_subtext' => 'required|string|max:255',
            'marquee_items_raw' => 'required|string',
        ]);

        $data = $request->only([
            'hero_badge',
            'hero_title',
            'hero_subtitle',
            'whatsapp_number',
            'whatsapp_text',
            'rating_text',
            'rating_subtext',
        ]);

        // Process marquee items: split by comma, trim spaces, filter empty
        $marquee = array_filter(array_map('trim', explode(',', $request->input('marquee_items_raw'))));
        $data['marquee_items'] = array_values($marquee);

        // Process image upload or manual URL
        if ($request->hasFile('hero_image_file')) {
            // Delete old file if existed
            if ($settings->hero_image && !filter_var($settings->hero_image, FILTER_VALIDATE_URL)) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $settings->hero_image));
            }
            $path = $request->file('hero_image_file')->store('images', 'public');
            $data['hero_image'] = '/storage/' . $path;
        } elseif ($request->filled('hero_image_url')) {
            $data['hero_image'] = $request->input('hero_image_url');
        }

        $settings->fill($data);
        $settings->save();

        return redirect()->route('admin.settings.edit')->with('success', 'General settings updated successfully!');
    }
}
