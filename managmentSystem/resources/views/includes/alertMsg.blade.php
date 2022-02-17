@if (session('success'))
    <div   class="alert-holder bg-success " data-alert="alert-holder">
        <span class="alert-close-icon js-alert-click"><i class="fas fa-window-close"></i></span>
        <span class="alert-content">{{ session('success') }}</span>
    </div>

@else 
    @if ($errors->any()|| session('error'))
        <div   class="alert-holder bg-danger " data-alert="alert-holder">
        <span class="alert-close-icon js-alert-click"><i class="fas fa-window-close"></i></span>
        <span class="alert-content">
            @if (session('error'))
                {{ session('error') }} 
            @else
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                    @endforeach
                </ul>
                
            @endif
        </span>
    </div>
    @endif
@endif

 