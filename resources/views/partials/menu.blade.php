<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('home_page_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/home-page-slides*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-home c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.homePage.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('home_page_slide_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.home-page-slides.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/home-page-slides") || request()->is("admin/home-page-slides/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-images c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.homePageSlide.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('about_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/about-our-companies*") ? "c-show" : "" }} {{ request()->is("admin/why-choose-our-companies*") ? "c-show" : "" }} {{ request()->is("admin/teams*") ? "c-show" : "" }} {{ request()->is("admin/testimonies*") ? "c-show" : "" }} {{ request()->is("admin/social-media-links*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-people-carry c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.about.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('about_our_company_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.about-our-companies.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/about-our-companies") || request()->is("admin/about-our-companies/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.aboutOurCompany.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('why_choose_our_company_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.why-choose-our-companies.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/why-choose-our-companies") || request()->is("admin/why-choose-our-companies/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-check-double c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.whyChooseOurCompany.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('team_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.teams.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/teams") || request()->is("admin/teams/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-friends c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.team.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('testimony_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.testimonies.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/testimonies") || request()->is("admin/testimonies/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-edit c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.testimony.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('social_media_link_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.social-media-links.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/social-media-links") || request()->is("admin/social-media-links/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-share-square c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.socialMediaLink.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('service_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.services.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/services") || request()->is("admin/services/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-list-alt c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.service.title') }}
                </a>
            </li>
        @endcan
        @can('blog_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.blogs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/blogs") || request()->is("admin/blogs/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-pen c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.blog.title') }}
                </a>
            </li>
        @endcan
        @can('contact_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.contacts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/contacts") || request()->is("admin/contacts/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.contact.title') }}
                </a>
            </li>
        @endcan
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>