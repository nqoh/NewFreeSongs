<?php

namespace App\Http\Resources;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class newsResource extends JsonResource
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
            'title'   => $this->title,
            'description' => $this->description,
            'image' => $this->image,
            'type' => 'News',
            'comments' =>  Comment::where('commentable_id',$this->id)->latest()->paginate(2)
        ];
    }
}
