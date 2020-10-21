<div>
    <form wire:submit.prevent="update">
        <input type="hidden" wire:model="contactId">
    <br>
        <div class="form-group container">
            <div class="form-row">
                <div class="col">
                    <input wire:model="name" type="text" name="name" id="" class="form-control @error('name') is-invalid @enderror" placeholder="name">
                    @error('name')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col">
                    <input wire:model="phone" type="text" name="phone" id=""  class="form-control @error('phone') is-invalid @enderror" placeholder="phone">
                    @error('phone')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-sm btn-primary">Submit</button>

        </div>
    </form>
</div>
