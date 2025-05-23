<style>
    .notification-list .notify-item .notify-details{
        white-space: initial!important;
    }
</style>
<li class="dropdown notification-list topbar-dropdown">
    <a class="nav-link dropdown-toggle waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
        <i class="fe-bell noti-icon"></i>
        <span class="badge bg-danger rounded-circle noti-icon-badge">{{ $notifications->where('status', 0)->count() }}</span>
    </a>
    <div class="dropdown-menu dropdown-menu-end dropdown-lg">
        <div class="dropdown-item noti-title">
            <h5 class="m-0">
                <span class="float-end">
                    <a href="{{ route('notifications.clear') }}" class="text-dark">
                        <small>Clear All</small>
                    </a>
                </span>Notifications
            </h5>
        </div>

        <div class="noti-scroll" data-simplebar>
            @forelse ($notifications as $notification)
                <a href="{{ route('notifications.read', $notification->id) }}" class="dropdown-item notify-item {{ $notification->status == 0 ? 'active' : '' }}">
                    <div class="notify-icon bg-primary">
                        <i class="mdi mdi-bell-outline"></i>
                    </div>
                    <p class="notify-details">{{ $notification->text }}
                        <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                    </p>
                </a>
            @empty
                <p class="text-center text-muted m-3">No notifications</p>
            @endforelse
        </div>

        <a href="{{ route('notifications.all') }}" class="dropdown-item text-center text-primary notify-item notify-all">
            View all
            <i class="fe-arrow-right"></i>
        </a>
    </div>
</li>