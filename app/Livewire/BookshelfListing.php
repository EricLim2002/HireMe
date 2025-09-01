<?php

namespace App\Livewire;

use Livewire\Component;
use Exception;
use App\Http\Helper\GeneralHelper;

class BookshelfListing extends Component
{
    public $title; //shelf title 
    public $documents = [
        [
            'title' => '', //the lang title
            'preview' => '.png', // the doc name
            'download' => '.pdf'// the doc name
        ],
        // add more to from a group
    ];

    public $processDoc = [];

    public function mount()
    {
        $this->processDocument();
    }
    public function render()
    {
        return view('livewire.bookshelf-listing');
    }

    public function processDocument()
    {
        try {
             $this->processDoc = []; // reset
            foreach ($this->documents as $d) {
                if (!isset($d['preview']) || !isset($d['title']) || !isset($d['download'])) {
                    continue;
                }
                $doc = [
                    'title' => $d['title'],
                    'preview' => route('preview', ['encoded' => base64_encode($d['preview'])]),
                    'download' => route('download', ['encoded' => base64_encode($d['download'])]),
                    'publicFlag' => $d['publicFlag'] ?? '0', // default to 0 = private
                ];
                $this->processDoc[] = $doc;
            }
            return $this->processDoc;
        } catch (Exception $e) {
            GeneralHelper::saveTryCatch('BookshelfListing', 'processDocuement', null, $e, 'livewire');
            $this->processDoc = [];
        }
    }
}
