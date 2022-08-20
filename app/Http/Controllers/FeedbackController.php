<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::all()->sortDesc();

        return view('feedbacks.index', compact('feedbacks'));
    }

    public function create()
    {
        return view('feedbacks.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Feedback::create($attributes);

        return back();
    }
}
