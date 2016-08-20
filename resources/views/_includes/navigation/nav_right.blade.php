@if(auth()->user()->notifications->count())
<li class="dropdown notifications">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
        <i class="fa fa-bell" aria-hidden="true"></i>
    </a>

    <ul class="dropdown-menu" role="menu">
            @foreach(auth()->user()->notifications as $notification)
                <li>
                    <a href="#">{{ $notification->data }}</a>
                </li>
            @endforeach

            <li class="divider"></li>

            <li>
                <a href="{{ url('/notifications') }}">All Notifications</a>
            </li>
    </ul>
</li>
@endif