<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SurveyResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function dashboard(): View
    {
        return view('admin.dashboard');
    }

    public function editProfile(): View
    {
        return view('admin.profile', ['user' => auth()->user()]);
    }

    public function surveys(): View
    {
        $responses = SurveyResponse::latest()->paginate(20);

        return view('admin.surveys.index', compact('responses'));
    }

    public function surveyShow(int $id): View
    {
        $response = SurveyResponse::findOrFail($id);

        return view('admin.surveys.show', compact('response'));
    }

    public function updateProfile(Request $request): RedirectResponse
    {
        $user = auth()->user();

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        $user->name = $data['name'];

        if (! empty($data['password'])) {
            $user->password = $data['password'];
        }

        $user->save();

        return redirect()->route('admin.profile.edit')->with('success', 'Profile updated successfully.');
    }
}
