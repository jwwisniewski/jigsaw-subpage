<?php

namespace jwwisniewski\Jigsaw\Subpage\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use jwwisniewski\Jigsaw\Core\Enum\SaveMode;
use jwwisniewski\Jigsaw\Subpage\Requests\StoreSubpage;
use jwwisniewski\Jigsaw\Subpage\Requests\UpdateSubpage;
use jwwisniewski\Jigsaw\Subpage\Subpage;

class SubpageController extends Controller
{
    public function index()
    {
        $subpages = Subpage::all();

        return view('subpage.index', ['subpageList' => $subpages]);
    }

    public function create()
    {
        return view('subpage.create');
    }

    public function store(StoreSubpage $request)
    {
        $validated = $request->validated();
        if($validated['url'] === null) {
            $validated['url'] = $validated['title'];
        }
        $validated['url'] = Str::slug($validated['url']);

        $subpage = new Subpage();
        $subpage->fill($validated);
        $subpage->save();

        if ($request->has(SaveMode::SAVE_AND_RETURN)) {
            return redirect()->to(base64_decode($request->get('returnPath')));
        }

        return redirect()->route('subpage.edit', [
            $subpage->id,
            'editLang' => $request->get('editLang'),
            'returnPath' => $request->get('returnPath'),
        ]);

    }

    public function edit(Subpage $subpage)
    {
        return view('subpage.edit', compact('subpage'));
    }

    public function update(UpdateSubpage $request, Subpage $subpage)
    {
        $validated = $request->validated();
        if($validated['url'] === null) {
            $validated['url'] = $validated['title'];
        }
        $validated['url'] = Str::slug($validated['url']);

        $subpage->update($validated);

        if ($request->has(SaveMode::SAVE_AND_RETURN)) {
            return redirect()->to(base64_decode($request->get('returnPath')));
        }

        return redirect()->route('subpage.edit', [
            $subpage->id,
            'editLang' => $request->get('editLang'),
            'returnPath' => $request->get('returnPath'),
        ]);
    }

    public function destroy(Subpage $subpage, Request $request)
    {
        $subpage->delete();

        return redirect()->to(base64_decode($request->get('returnPath')));
    }
}
