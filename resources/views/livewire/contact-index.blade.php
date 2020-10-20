<div>

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <livewire:contact-create></livewire:contact-create>
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
                    <button class="btn btn-sn btn-info text-white">Edit</button>
                    <button class="btn btn-sm btn-danger text-white">Delete</button>
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>
    </ul>
</div>