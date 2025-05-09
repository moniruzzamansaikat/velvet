<style>
    .header {
        background-color: #f8f9fa;
        padding: 1rem 2rem;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }

    .profile-pic {
        width: 48px;
        height: 48px;
        object-fit: cover;
        border: 2px solid #dee2e6;
        transition: transform 0.2s ease;
    }

    .profile-pic:hover {
        transform: scale(1.05);
    }

    .dropdown-menu {
        min-width: 200px;
        border-radius: 0.5rem;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .dropdown-item i {
        color: #6c757d;
    }

    .dropdown-item:hover {
        background-color: #f1f1f1;
    }
</style>

<div class="header">
    <div class="row">
        <div class="col-lg-6 offset-lg-6">
            <div class="d-flex justify-content-end align-items-center">
                <div class="dropdown">
                    <button class="btn p-0 border-0 bg-transparent d-flex align-items-center" type="button"
                        id="dropdownMenu1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('uploads/admins/' . admin()->image) }}" class="profile-pic rounded-circle me-2" alt="Avatar">
                        <span class="fw-semibold text-dark">{{ admin()->name }}</span>
                        <i class="fa fa-caret-down ms-2 text-muted"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenu1">
                        <li><a class="dropdown-item" href="{{ route('admin.setting.profile') }}"><i class="fa fa-user me-2"></i>Profile</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fa fa-wrench me-2"></i>Settings</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item text-danger" href="{{ route('admin.logout') }}"><i class="fa fa-power-off me-2"></i>@lang('Logout')</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
