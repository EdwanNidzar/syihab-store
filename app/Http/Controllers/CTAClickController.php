<?php

namespace App\Http\Controllers;

use App\Models\ClickTracking;
use Illuminate\Http\Request;

class CTAClickController extends Controller
{
    public function trackClick(Request $request) 
    {
        $request->validate([
            'page' => 'required|string',
            'cta_name' => 'required|string',
        ]);

        $ctaClick = ClickTracking::firstOrCreate(
            ['page' => $request->page, 'cta_name' => $request->cta_name],
            ['clicks' => 0]
        );

        $ctaClick->increment('clicks');
        return response()->json(['message' => 'Click tracked successfully']);
    }
}
