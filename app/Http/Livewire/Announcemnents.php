<?php

namespace App\Http\Livewire;

use App\Models\Announcement;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Announcemnents extends Component
{
    use WithFileUploads;
    use WithPagination;
    
    public $headerData, $sub_headerData,$imageData,$user_idData,$desData;
  
    
   

public function addAnnouncement()
{
  Announcement::create([   
    'header' => $this->headerData,
    'sub_header' => $this->sub_headerData,
    'image' => $this->imageData,
    'description' => $this->desData,
    'user_id' => $this->user_idData
  ]);
    $this->headerData = "";
    $this->sub_headerData = "";
    $this->imageData ="";
    $this->desData = "";
    $this->user_idData = "";
}  
    
    public function render()
    {
        return view('livewire.announcemnents',[
            'announcementData' => Announcement::latest()->paginate(2)
        ]);
    }
}
