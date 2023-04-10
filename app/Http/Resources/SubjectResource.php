<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=> $this -> id,
            'subject_name'=> $this -> subject_name,
            'teacher_id'=> $this -> teacher_id,
            'start_date'=> $this -> start_date,
            'end_date'=> $this -> end_date,
        ];
    }
}
