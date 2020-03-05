<?php

declare(strict_types=1);

namespace jwwisniewski\Jigsaw\Subpage\Controllers;

use Illuminate\Routing\Controller;
use jwwisniewski\Jigsaw\Subpage\Subpage;

class ClientController extends Controller
{
    public function full(string $locale, string $pathSegment)
    {
        $subpage = Subpage::where('url->'.$locale, '=', $pathSegment)->first();

        if ($subpage === null) {
            abort(404);
        }

        return view('jigsaw-subpage-client::full', compact('subpage'));
    }
}
