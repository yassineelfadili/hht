<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index()
    {
        $all_languages = Language::get();
        return view('admin.language.index', compact('all_languages'));
    }

    public function store(Request $request)
    {
        $create = Language::create([
            'name' => $request->name,
            'prefix' => $request->prefix,
            'direction' => $request->direction,
        ]);
        if(!is_null($create)) {
            return redirect()->back()->with('success', __('Language Added'));
        }
        return redirect()->back()->with('error', __('Something went wrong!'));
    }

    public function edit($id)
    {
        $lang = Language::findOrFail($id);
        return view('admin.language.edit', compact('lang'));
    }


    public function update(Request $request, $id)
    {
        $language = Language::findOrFail($id);
        $language->update($request->all());
        return redirect()->back();
    }
}
