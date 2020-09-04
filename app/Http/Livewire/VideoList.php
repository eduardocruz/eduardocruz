<?php

namespace App\Http\Livewire;

use App\Models\Video;
use Livewire\Component;

class VideoList extends Component
{
    public function render()
    {
        $video_count = Video::whereNotNull('video_url')->count();
        $video_minutes = Video::whereNotNull('video_url')->sum('duration');
        $videos = Video::whereNotNull('video_url')->orderBy('created_at', 'desc')->get()->take(5);
        return view('livewire.video-list', [
                'video_count' => $video_count,
                'video_minutes' => $video_minutes,
                'videos' => $videos
            ]);
    }
}
