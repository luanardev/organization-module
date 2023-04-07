<div>
    <div class="form-inline">
        <div class="input-group">
            <select wire:model="campus" class="form-control form-control-sidebar">
                <option value="">All Campuses</option>
                @foreach ($campusList as $campus)
                    <option value="{{$campus->id}}">{{$campus->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
