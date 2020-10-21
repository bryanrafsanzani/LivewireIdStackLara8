<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactUpdate extends Component
{
    public $name;
    public $phone;
    public $contactId;

    protected $listeners = [
        'getContact'    =>  'showContact'
    ];

    public function render()
    {
        return view('livewire.contact-update');
    }


    public function update()
    {
        $this->validate([
            'name'  =>  'required|min:1|max:255',
            'phone'  =>  'required|min:1|max:15  '
        ]);

        if($this->contactId){
            $contact = Contact::find($this->contactId);
            if($contact){
                $contact->update([
                    'name'  =>  $this->name,
                    'phone' =>  $this->phone
                ]);
                $this->resetInput();


                $this->emit('contactUpdated', $contact); //agar indexnya merender ulang data table dan menampilkan session
            }
        }
    }

    public function showContact($contact)
    {
        $this->name = $contact['name'];
        $this->phone = $contact['phone'];
        $this->contactId = $contact['id'];
    }

    private function resetInput()
    {
        $this->name = null;
        $this->phone = null;
    }


}
