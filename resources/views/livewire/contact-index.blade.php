<div style="padding:10px;">

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
    <div class="row">
        <div class="col">
            <select wire:model="paginate" name="" id="" class="form-control form-control-sm w-auto">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
            </select>
        </div>
        <div class="col">
            <input wire:model="search" type="text" class="form-control form-control-sm" placeholder="Search">
        </div>
    </div>

    <hr>

    <table class="table" width="60">
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
                <th>{{ (request()->page * 2) + $key+1 }}</th>
                <th>{{ $contact->name }}</th>
                <th>{{ $contact->phone }}</th>
                <th>
                    <button wire:click="getContact({{$contact->id}})" class="btn btn-sn btn-info text-white">Edit</button>
                    <button wire:click="destroy({{$contact->id}})" class="btn btn-sm btn-danger text-white">Delete</button>
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="col-12">{{ $contacts->links() }}</div>
    </ul>
</div>
