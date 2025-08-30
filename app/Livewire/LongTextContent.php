<?php

namespace App\Livewire;

use App\Http\Helper\GeneralHelper;
use Exception;
use Livewire\Component;

class LongTextContent extends Component
{
    public $contentName; // property to pass in
    public $content;

    public $option = [
        "height" => 600,
    ];
    public function render()
    {
        // Get the string content
        try {
            $content = __("longtext.{$this->contentName}.content");
            $paragraphs = explode("\n", $content);

            if ($this->content != null) {
                $content = __("longtext.{$this->contentName}.{$this->content}");
                $paragraphs = $content;
            }

            return view('livewire.long-text-content', [
                'paragraphs' => $paragraphs,
                "ContentName" => $this->contentName,
                "Content" => $this->content,
                "Height" => $this->option['height'],
            ]);
        } catch (Exception $e) {
            GeneralHelper::saveTryCatch('LongTextContent', 'render', null, $e, 'livewire');
        }
    }
}