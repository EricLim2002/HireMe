<?php

namespace App\Livewire;

use Livewire\Component;

class LongTextContent extends Component
{
    public $contentName; // make it a property if you want to pass it in

    public function render()
    {
        // Use double quotes or concatenation
        $content = __("longtext.content.{$this->contentName}");

        return view('livewire.long-text-content', [
            'content' => $content
        ]);
    }
}
