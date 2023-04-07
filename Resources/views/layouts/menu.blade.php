<li class="nav-item">
    <a href="{{route('organization.module')}}" class="nav-link">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>

@can('organization-profile')
    <li class="nav-item">
        <a href="{{route('organization.profile')}}" class="nav-link">
            <i class="nav-icon fas fa-users-cog"></i>
            <p>Organization</p>
        </a>
    </li>
@endcan

@can('read-financial-year')
    <li class="nav-item">
        <a href="{{route('financialyear.index')}}" class="nav-link">
            <i class="nav-icon fas fa-calendar"></i>
            <p>Financial Year</p>
        </a>
    </li>
@endcan


@can('read-branch')
    <li class="nav-item">
        <a href="{{route('branch.index')}}" class="nav-link">
            <i class="nav-icon fas fa-building"></i>
            <p>Branches</p>
        </a>
    </li>
@endcan

@can('read-campus')
    <li class="nav-item">
        <a href="{{route('campus.index')}}" class="nav-link">
            <i class="nav-icon fas fa-building"></i>
            <p>Campuses</p>
        </a>
    </li>
@endcan

@can('read-faculty')
    <li class="nav-item">
        <a href="{{route('faculty.index')}}" class="nav-link">
            <i class="nav-icon fas fa-building"></i>
            <p>Faculties</p>
        </a>
    </li>
@endcan

@can('read-department')
    <li class="nav-item">
        <a href="{{route('department.index')}}" class="nav-link">
            <i class="nav-icon fas fa-building"></i>
            <p>Departments</p>
        </a>
    </li>
@endcan

@can('read-section')
    <li class="nav-item">
        <a href="{{route('section.index')}}" class="nav-link">
            <i class="nav-icon fas fa-building"></i>
            <p>Sections</p>
        </a>
    </li>
@endcan

