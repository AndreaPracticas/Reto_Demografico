<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function filter(Request $request)
    {
        $query = File::query();

        // SCOPE (ambito) – siempre primero
        if ($request->filled('scope')) {
            $query->whereHas('scope', fn ($q) =>
                $q->where('name', $request->scope)
            );
        }

        // TOPIC (tematica)
        if ($request->filled('topic')) {
            $query->whereHas('topic', fn ($q) =>
                $q->where('name', $request->topic)
            );
        }

        // SUBTOPIC (subtematica)
        if ($request->filled('subtopic')) {
            $query->whereHas('subtopic', fn ($q) =>
                $q->where('name', $request->subtopic)
            );
        }

        $documents = $query->get();

        return view('partials.documents', [
            'documents' => $documents,
            'scope'     => $request->scope,
            'topic'     => $request->topic,
            'subtopic'  => $request->subtopic,
        ]);
    }
}
