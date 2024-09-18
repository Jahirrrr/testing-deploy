<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    function getDataFeedback()
    {
        $data = Feedback::orderBy('created_at', 'desc')->paginate(5);

        return response()->json($data);
    }

    function storeFeedback(Request $request)
    {

        $validateData = $request->validate([
            "nama" => "string",
            "email" => "email",
            "comment" => "required|string",
        ]);

        Feedback::create($validateData);

        return response()->json($validateData);
    }
}
