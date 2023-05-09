<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateSubjectSection;
use App\Models\Document;
use App\Models\SubjectSections;

class ShowDetailSection extends Controller
{
    public function index($id)
    {
        $subjectSection = SubjectSections::find($id);
        $documents = $subjectSection->document()->get();
        return view('detailSection', compact('subjectSection', 'documents'));
    }
    public function formEditSubjectSection($id)
    {
        $subjectSection = SubjectSections::find($id);
        return view('updateSubjectSection', compact('subjectSection'));
    }
    public function editSubjectSection(UpdateSubjectSection $request, int $id)
    {
        SubjectSections::where('id', $id)
            ->update([
                'title' => $request->title,
                'video_url' => $request->video_url,
                'description' => $request->description,
                'stt' => $request->stt
            ]);

        return redirect()->route('show.detail.section', ['id' => $id]);
    }
    public function deleteSubjectSection(int $id)
    {
        $subjectSection = SubjectSections::find($id);

        $subjectSection->subject()->dissociate();
        $subjectSection->save();
        return redirect()->back();
    }
}
