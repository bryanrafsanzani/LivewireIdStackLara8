<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactIndex extends Component
{

    public $data;

    protected $listeners = [
        'contactStored' => 'handleStored'
    ];

    public function render()
    {
        return view('livewire.contact-index', [
            'contacts'  => Contact::latest()->get()
        ]);
    }

    public function handleStored($contact)
    {
        // dd($contact);
        session()->flash('message', 'Contact ' .$contact['name']. ' was Stored');
    }
}
