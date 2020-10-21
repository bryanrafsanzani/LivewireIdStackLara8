<div>

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @if($statusUpdate)
        <livewire:contact-update></livewire:contact-update>
    @else
        <livewire:contact-create></livewire:contact-create>
    @endif
    <hr>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Phone</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $key => $contact)
            <tr>
                <th>{{ $key+1 }}</th>
                <th>{{ $contact->name }}</th>
                <th>{{ $contact->phone }}</th>
                <th>
                    <button wire:click="getContact({{$contact->id}})" class="btn btn-sn btn-info text-white">Edit</button>
                    <button class="btn btn-sm btn-danger text-white">Delete</button>
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>
    </ul>
</div>
