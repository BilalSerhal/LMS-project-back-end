<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AttendanceReportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'status' => $this->attendance ? $this->attendance->status : null,
            'section' => $this->attendance && $this->attendance->LevelSection && $this->attendance->LevelSection->parentSection ? $this->attendance->LevelSection->parentSection->sectionName : null,
            'grade' => $this->attendance && $this->attendance->LevelSection && $this->attendance->LevelSection->grade ? $this->attendance->LevelSection->grade->levelName : null,
            'capacity'=>20
        ];
    }
}