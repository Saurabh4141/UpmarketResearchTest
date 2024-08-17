<nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar" data-simplebar="init">
        <div class="simplebar-wrapper" style="margin: 0px;">
            <div class="simplebar-height-auto-observer-wrapper">
                <div class="simplebar-height-auto-observer"></div>
            </div>
            <div class="simplebar-mask">
                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                    <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;">
                        <div class="simplebar-content" style="padding: 0px;">
                            <a class="sidebar-brand" href="{{ route('index') }}">
                                <!-- <span class="align-middle me-3">Upmarket Research</span> -->
                                 <img src="{{ asset('backend/custom/images/logo.png') }}" width="150" alt="">
                            </a>

                            <ul class="sidebar-nav">
                                <li class="sidebar-item user_create home">
                                    <a class="sidebar-link" href="{{ url('/user/create') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user align-middle me-2">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                       Create User
                                    </a>
                                </li>
                                <li class="sidebar-item user_list">
                                    <a class="sidebar-link" href="{{ url('/user/list') }}">
                                        <i class="align-middle me-2 fas fa-fw fa-list-ol  text-light"></i>
                                        User List
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="simplebar-placeholder" style="width: auto; height: 1068px;"></div>
        </div>
        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
            <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
        </div>
        <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
            <div class="simplebar-scrollbar" style="height: 247px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
        </div>
    </div>
</nav>