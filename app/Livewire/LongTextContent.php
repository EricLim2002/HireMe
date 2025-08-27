<?php

namespace App\Livewire;

use Livewire\Component;

class LongTextContent extends Component
{
    public $contentName; // property to pass in
    public $content;

    public $option = [
        
    ];
    public function render()
    {
        // Get the string content
        $content = __("longtext.{$this->contentName}.content");
        $paragraphs = explode("\n", $content);
        if($this->content !=null)
        {
             $content = __("longtext.{$this->contentName}.{$this->content}");
             $paragraphs = $content;
        }

        // Optionally return as array if you want to handle paragraphs in PHP
        

        return view('livewire.long-text-content', [
            'paragraphs' => $paragraphs,
            "ContentName"=>$this->contentName,
            "Content"=>$this->content,
        ]);
    }
}