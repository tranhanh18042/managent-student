<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class AddDocument extends Controller
{
    public function index()
    {
        return view('addDocument');
    }
    public function addDocument(Request $request, int $id)
    {
            Document::create([
            'type' => $request->type,
            'name_document' => $request->name_document,
            'link_document' => $request->link_document,
            'subject_sections_id' => $id,
        ]);
        return redirect()->route('show.detail.section', ['id' => $id]);
    }
    public function deleteDocument($id)
    {
        Document::find($id)->delete();
        return redirect()->back();
    }
}
