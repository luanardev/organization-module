<div>

    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
            @empty($campus->name)
                Switch Campus
            @else
                {{$campus->name}}
            @endif
        </a>

        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">

            <div class="dropdown-divider"></div>

            @foreach ($campusList as $campus)
                <a wire:click.prevent="switch('{{$campus->id}}')" href="#" class="dropdown-item">
                    {{$campus->name}}
                </a>
                <div class="dropdown-divider"></div>
            @endforeach

        </div>

    </li>
</div>
