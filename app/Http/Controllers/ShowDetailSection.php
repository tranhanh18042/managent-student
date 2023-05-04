<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateSubjectSection;
use App\Models\Document;
use App\Models\Reference;
use App\Models\SubjectSections;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class ShowDetailSection extends Controller
{
    public function index($id)
    {
        $subjectSection = SubjectSections::find($id);
        $references = $subjectSection->reference()->get();
        return view('detailSection', compact('subjectSection', 'references'));
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
        dd(1);
        $subjectSection = SubjectSections::find($id);
        Reference::where('id', $subjectSection->reference_id)->delete();
        $subjectSection->delete();
        return redirect()->back();
    }
    public function deleteDocument($id)
    {
        $reference = Reference::find($id)->delete();
        return redirect()->route('show.detail.section',['id',$id]);
    }
    public function indexAddDocument()
    {
        
    }
    public function addDocument()
    {
        dd(1);
    }
}
