<nav class="navbar navbar-expand-xl navbar-light bg-white fixed-top">
    <div class="container-fluid">

        <!-- offcanvas toggle btn -->
        <button class="offcanvas-button" type="button " data-bs-toggle="offcanvas" data-bs-target="#sidebar"
                aria-controls="offcanvasExample">
            <span><i data-bs-target="#sidebar" class="bi bi-layout-text-sidebar-reverse"></i></span>
        </button>

        <!-- navbar logo -->
        <a class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold" href="https://fooddoose.com/">
           <img width="150px" src="{{asset('assets/merchant_assets/images/logo.png')}}" alt="">
        </a>

        <!-- navbar toggle button  -->
        <button class="navbar-toggle-button" type="button" data-bs-toggle="collapse" data-bs-target="#topNavBar"
                aria-controls="topNavBar" aria-expanded="false" aria-label="Toggle navigation">
            <span><i data-bs-target="#sidebar" class="bi bi-list"></i></span>
        </button>

        <!-- navbar item -->
        <div class="collapse navbar-collapse" id="topNavBar">
            <form class="d-flex ms-auto my-3 my-lg-0">
                <div class="input-group">
                    <input class="form-control navbar-search-field" type="search" placeholder="Search"
                           aria-label="Search"/>
                    <button class="btn btn-transparent" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                 aria-labelledby="offcanvasRightLabel">

                <!-- problem solve  -->
                <div class="offcanvas-body p-0">
                    <div class="offcanvas-header d-md-none ">
                        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Inbox</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                    </div>

                    <!--**********************************
                Chat box start
            ***********************************-->

                    <div class="chatbox border-0 shadow-lg p-3 " style="min-width: 320px;">
                        <div class="chatbox-close"></div>
                        <div class="custom-tab-1">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link border-0" data-bs-toggle="tab" href="#notes">Notes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link border-0" data-bs-toggle="tab" href="#alerts">Alerts</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link active border-0" data-bs-toggle="tab" href="#chat">Chat</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="chat" role="tabpanel">
                                    <div class="card mb-sm-3 mb-md-0 contacts_card dlab-chat-user-box border-0">
                                        <div class="text-center d-flex justify-content-between align-items-center p-3">
                                            <a href="javascript:void(0);">
                                                <i class="bi bi-plus fs-4"></i>
                                            </a>
                                            <div>
                                                <h6 class="mb-1">Chat List</h6>
                                                <p class="mb-0" style="font-size: 12px;">Show All</p>
                                            </div>
                                            <a href="javascript:void(0);">
                                                <i class="bi bi-search"></i>
                                            </a>
                                        </div>
                                        <div class="card-body contacts_body p-0 dlab-scroll  "
                                             id="DLAB_W_Contacts_Body">
                                            <ul class="contacts">
                                                <li class="name-first-letter">A</li>
                                                <li class="active dlab-chat-user">
                                                    <div class="d-flex bd-highlight">
                                                        <div class="img_cont">
                                                            <img
                                                                src="{{asset('assets/merchant_assets/images/avatar/1.jpg')}}"
                                                                class="rounded-circle user_img" alt="">
                                                            <span class="online_icon"></span>
                                                        </div>
                                                        <div class="user_info">
                                                            <span>Archie Parker</span>
                                                            <p>Kalid is online</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="dlab-chat-user">
                                                    <div class="d-flex bd-highlight">
                                                        <div class="img_cont">
                                                            <img
                                                                src="{{asset('assets/merchant_assets/images/avatar/2.jpg')}}"
                                                                class="rounded-circle user_img" alt="">
                                                            <span class="online_icon offline"></span>
                                                        </div>
                                                        <div class="user_info">
                                                            <span>Alfie Mason</span>
                                                            <p>Taherah left 7 mins ago</p>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="name-first-letter">B</li>
                                                <li class="dlab-chat-user">
                                                    <div class="d-flex bd-highlight">
                                                        <div class="img_cont">
                                                            <img
                                                                src="{{asset('assets/merchant_assets/images/avatar/5.jpg')}}"
                                                                class="rounded-circle user_img" alt="">
                                                            <span class="online_icon offline"></span>
                                                        </div>
                                                        <div class="user_info">
                                                            <span>Bashid Samim</span>
                                                            <p>Rashid left 50 mins ago</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="dlab-chat-user">
                                                    <div class="d-flex bd-highlight">
                                                        <div class="img_cont">
                                                            <img
                                                                src="{{asset('assets/merchant_assets/images/avatar/1.jpg')}}"
                                                                class="rounded-circle user_img" alt="">
                                                            <span class="online_icon"></span>
                                                        </div>
                                                        <div class="user_info">
                                                            <span>Breddie Ronan</span>
                                                            <p>Kalid is online</p>
                                                        </div>
                                                    </div>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="alerts" role="tabpanel">
                                    <div class="card mb-sm-3 mb-md-0 contacts_card border-0">
                                        <div class="text-center d-flex justify-content-between align-items-center p-3">
                                            <a href="javascript:void(0);"><i class="bi bi-plus fs-4"></i>
                                            </a>
                                            <div>
                                                <h6 class="mb-1">Notications</h6>
                                                <p class="mb-0" style="font-size: 12px;">Show All</p>
                                            </div>
                                            <a href="javascript:void(0);"><i class="bi bi-search"></i>
                                            </a>
                                        </div>

                                        <div class="card-body contacts_body p-0 dlab-scroll" id="DLAB_W_Contacts_Body1">
                                            <ul class="contacts">
                                                <li class="name-first-letter">SEVER STATUS</li>
                                                <li class="active">
                                                    <div class="d-flex bd-highlight">
                                                        <div class="img_cont primary">KK</div>
                                                        <div class="user_info">
                                                            <span>David Nester Birthday</span>
                                                            <p class="text-primary">Today</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="name-first-letter">SOCIAL</li>
                                                <li>
                                                    <div class="d-flex bd-highlight">
                                                        <div class="img_cont success">RU</div>
                                                        <div class="user_info">
                                                            <span>Perfection Simplified</span>
                                                            <p>Jame Smith commented on your status</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="name-first-letter">SEVER STATUS</li>
                                                <li>
                                                    <div class="d-flex bd-highlight">
                                                        <div class="img_cont primary">AU</div>
                                                        <div class="user_info">
                                                            <span>AharlieKane</span>
                                                            <p>Sami is online</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex bd-highlight">
                                                        <div class="img_cont info">MO</div>
                                                        <div class="user_info">
                                                            <span>Athan Jacoby</span>
                                                            <p>Nargis left 30 mins ago</p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-footer"></div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="notes">
                                    <div class="card mb-sm-3 mb-md-0 note_card border-0">
                                        <div class="text-center d-flex justify-content-between align-items-center p-3">
                                            <a href="javascript:void(0);">
                                                <i class="bi bi-plus fs-4"></i>
                                            </a>
                                            <div>
                                                <h6 class="mb-1">Notes</h6>
                                                <p class="mb-0" style="font-size: 12px;">Add New Nots</p>
                                            </div>
                                            <a href="javascript:void(0);">
                                                <i class="bi bi-search"></i>
                                            </a>
                                        </div>
                                        <div class="card-body contacts_body p-0 dlab-scroll" id="DLAB_W_Contacts_Body2">
                                            <ul class="contacts">
                                                <li class="active">
                                                    <div class="d-flex bd-highlight">
                                                        <div class="user_info">
                                                            <span>New order placed..</span>
                                                            <p>10 Aug 2020</p>
                                                        </div>
                                                        <div class="ms-auto">
                                                            <a href="javascript:void(0);"
                                                               class="btn btn-primary btn-xs sharp me-1">
                                                                <i class="bi bi-pencil-fill"></i></a>
                                                            <a href="javascript:void(0);"
                                                               class="btn btn-danger btn-xs sharp"><i
                                                                    class="bi bi-trash"></i></a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex bd-highlight">
                                                        <div class="user_info">
                                                            <span>Youtube, a video-sharing website..</span>
                                                            <p>10 Aug 2020</p>
                                                        </div>
                                                        <div class="ms-auto">
                                                            <a href="javascript:void(0);"
                                                               class="btn btn-primary btn-xs sharp me-1"><i
                                                                    class="bi bi-pencil-fill"></i></a>
                                                            <a href="javascript:void(0);"
                                                               class="btn btn-danger btn-xs sharp"><i
                                                                    class="bi bi-trash"></i></a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex bd-highlight">
                                                        <div class="user_info">
                                                            <span>john just buy your product..</span>
                                                            <p>10 Aug 2020</p>
                                                        </div>
                                                        <div class="ms-auto">
                                                            <a href="javascript:void(0);"
                                                               class="btn btn-primary btn-xs sharp me-1"><i
                                                                    class="bi bi-pencil-fill"></i></a>
                                                            <a href="javascript:void(0);"
                                                               class="btn btn-danger btn-xs sharp"><i
                                                                    class="bi bi-trash"></i></a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex bd-highlight">
                                                        <div class="user_info">
                                                            <span>Athan Jacoby</span>
                                                            <p>10 Aug 2020</p>
                                                        </div>
                                                        <div class="ms-auto">
                                                            <a href="javascript:void(0);"
                                                               class="btn btn-primary btn-xs sharp me-1"><i
                                                                    class="bi bi-pencil-fill"></i></a>
                                                            <a href="javascript:void(0);"
                                                               class="btn btn-danger btn-xs sharp"><i
                                                                    class="bi bi-trash"></i></a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--**********************************
            Chat box End
        ***********************************-->


                </div>
            </div>


            <ul class="navbar-nav flex-row gap-3 mt-4 mt-lg-0 justify-content-center">

{{--                <a class="nav-link ms-2" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"--}}
{{--                   aria-controls="offcanvasRight">--}}
{{--                    <span><i class="bi bi-envelope fs-4" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"--}}
{{--                             aria-controls="offcanvasRight"></i></span>--}}
{{--                    <span data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"--}}
{{--                          class="position-absolute top-25 start-75 translate-middle p-1 bg-danger border border-light rounded-circle">--}}
{{--                    </span>--}}
{{--                </a>--}}


                <!-- Notificaiton  -->

                <li class="nav-itme dropdown position-relative">
{{--                    <a class="nav-link navbar-dropdown-toggle dropdown-toggle ms-2" href="#" role="button"--}}
{{--                       data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                        <i class="bi bi-bell fs-4"></i>--}}
{{--                        <span--}}
{{--                            class="position-absolute top-25 start-75 translate-middle p-1 bg-danger border border-light rounded-circle"></span>--}}
{{--                    </a>--}}
                    <ul class="dropdown-menu border-0 shadow-lg p-3 dropdown-menu-end position-absolute"
                        style="width: 320px;">

                        <li class="my-2">
                            <div class="timeline-panel d-flex justify-content-around">
                                <div class="media me-2">
                                    <img alt="image" class="bradius" width="50"
                                         src="{{asset('assets/merchant_assets/images/avatar/3.jpg')}}">
                                </div>
                                <div class="media-body">
                                    <h6 class="mb-1">Dr sultads Send you Photo</h6>
                                    <small class="d-block">29 July 2020 - 02:26 PM</small>
                                </div>
                            </div>
                        </li>
                        <hr>
                        <li class="my-2">
                            <div class="timeline-panel d-flex justify-content-around">
                                <div class="media me-2">
                                    <img alt="image" class="bradius" width="50"
                                         src="{{asset('assets/merchant_assets/images/avatar/1.jpg')}}">
                                </div>
                                <div class="media-body">
                                    <h6 class="mb-1">Dr sultads Send you Photo</h6>
                                    <small class="d-block">29 July 2020 - 02:26 PM</small>
                                </div>
                            </div>
                        </li>
                        <hr>
                        <li class="my-2">
                            <div class="timeline-panel d-flex justify-content-around">
                                <div class="media me-2">
                                    <img alt="image" class="bradius" width="50"
                                         src="{{asset('assets/merchant_assets/images/avatar/2.jpg')}}">
                                </div>
                                <div class="media-body">
                                    <h6 class="mb-1">Dr sultads Send you Photo</h6>
                                    <small class="d-block">29 July 2020 - 02:26 PM</small>
                                </div>
                            </div>
                        </li>
                        <hr>
                        <a class="text-center text-decoration-none" href="/">See all notifications <i
                                class="ti-arrow-end"></i></a>
                    </ul>
                </li>

                <li class="nav-item dropdown position-relative">
                    <a class="nav-link navbar-dropdown-toggle dropdown-toggle ms-2" href="#" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        <img width="40px" class="rounded-circle"
                             src="{{(!empty(Auth::user()->photo))?url('./frontend_upload_asset/upload_assets/merchantphoto/'.Auth::user()->photo):url('assets/merchant_assets/images/user.jpg')}}" alt="">
                    </a>
                    <ul class="dropdown-menu border-0 shadow-lg p-3 dropdown-menu-end position-absolute">
                        <li>
                            <a href="{{ route('merchant.show.profile') }}" class="dropdown-item ai-icon">
                                <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary"
                                     width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor"
                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                <span class="ms-2">Profile </span>
                            </a>
                        </li>
                        <!--<li>-->
                        <!--    <a href="email-inbox.html" class="dropdown-item ai-icon">-->
                        <!--        <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success"-->
                        <!--             width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor"-->
                        <!--             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
                        <!--            <path-->
                        <!--                d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">-->
                        <!--            </path>-->
                        <!--            <polyline points="22,6 12,13 2,6"></polyline>-->
                        <!--        </svg>-->
                        <!--        <span class="ms-2">Inbox </span>-->
                        <!--    </a>-->
                        <!--</li>-->
                        <li>
                            <a href="{{route('merchant.logout')}}" class="dropdown-item ai-icon">
                                <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger"
                                     width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor"
                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>
                                <span class="ms-2">Logout </span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
