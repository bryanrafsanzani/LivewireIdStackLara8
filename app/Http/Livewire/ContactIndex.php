<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class ContactIndex extends Component
{

    use WithPagination;
    public $data;
    public $statusUpdate = false;
    public $paginate = 5;
    public $search;

    protected $updatesQueryString = ['search'];

    public function mount() //like constructor class
    {
        $this->search = request()->query('search', $this->search); //memasukan query di url kedalam livewire

    }

    protected $listeners = [
        'contactStored'     => 'handleStored',
        'contactUpdated'    => 'handleUpdated'
    ];

    public function render()
    {
        return view('livewire.contact-index', [
            'contacts'  => $this->search === null ?
                            Contact::latest()->paginate($this->paginate) :
                            Contact::latest()->where('name', 'LIKE', '%'. $this->search.'%')->paginate($this->paginate)
        ]);
    }

    public function getContact($id)
    {
        $this->statusUpdate = true;
        $contact = Contact::find($id);
        $this->emit('getContact', $contact);
    }

    public function destroy($id)
    {
        if($id){
            $contact = Contact::find($id);
            if($contact){
                $contact->delete();
                session()->flash('message', 'Contact  was Deleted!');
            }
        }
    }

    public function handleStored($contact)
    {
        // dd($contact);
        session()->flash('message', 'Contact ' .$contact['name']. ' was Stored');
    }

    public function handleUpdated($contact)
    {
        // dd($contact);
        session()->flash('message', 'Contact ' .$contact['name']. ' was Updated');
    }
}
