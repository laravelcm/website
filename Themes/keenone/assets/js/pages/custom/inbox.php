<!--Begin::Inbox-->
<div class="kt-grid kt-grid--desktop kt-grid--ver-desktop  kt-inbox" id="kt_inbox">
    <!--Begin::Aside Mobile Toggle-->
    <button class="kt-inbox__aside-close" id="kt_inbox_aside_close">
        <i class="la la-close"></i>
    </button>
    <!--End:: Aside Mobile Toggle-->

    <!--Begin:: Inbox Aside-->
    <div class="kt-grid__item   kt-portlet  kt-inbox__aside" id="kt_inbox_aside">
        <button type="button" class="btn btn-brand  btn-upper btn-bold  kt-inbox__compose" data-toggle="modal" data-target="#kt_inbox_compose">new message</button>

        <div class="kt-inbox__nav">
            <ul class="kt-nav">
                <li class="kt-nav__item kt-nav__item--active">
                    <a href="#" class="kt-nav__link">
                        <?php echo Page::getSVG(Page::getMediaPath() . "icons/svg/Communication/Mail-heart.svg", "kt-nav__link-icon");?>
                            <span class="kt-nav__link-text">Inbox</span>
                            <span class="kt-nav__link-badge">
                            <span class="kt-badge kt-badge--unified-success kt-badge--md kt-badge--rounded kt-badge--boldest">3</span>
                            </span>
                    </a>
                </li>
                <li class="kt-nav__item">
                    <a href="#" class="kt-nav__link">
                        <?php echo Page::getSVG(Page::getMediaPath() . "icons/svg/General/Half-star.svg", "kt-nav__link-icon");?>
                            <span class="kt-nav__link-text">Marked</span>
                    </a>
                </li>
                <li class="kt-nav__item">
                    <a href="#" class="kt-nav__link">
                        <?php echo Page::getSVG(Page::getMediaPath() . "icons/svg/Design/Pen&ruller.svg", "kt-nav__link-icon");?>
                            <span class="kt-nav__link-text">Draft Mail</span>
                            <span class="kt-nav__link-badge">
                            <span class="kt-badge kt-badge--unified-warning kt-badge--md kt-badge--rounded kt-badge--boldest">1</span>
                            </span>
                    </a>
                </li>
                <li class="kt-nav__item">
                    <a href="#" class="kt-nav__link">
                        <?php echo Page::getSVG(Page::getMediaPath() . "icons/svg/Communication/Sending.svg", "kt-nav__link-icon");?>
                            <span class="kt-nav__link-text">Sent</span>
                    </a>
                </li>
                <li class="kt-nav__item">
                    <a href="#" class="kt-nav__link">
                        <?php echo Page::getSVG(Page::getMediaPath() . "icons/svg/General/Trash.svg", "kt-nav__link-icon");?>
                            <span class="kt-nav__link-text">Trash</span>
                    </a>
                </li>

                <li class="kt-nav__item kt-margin-t-30">
                    <a href="#" class="kt-nav__link">
                        <i class="kt-nav__link-icon fa fa-genderless kt-font-warning"></i>
                        <span class="kt-nav__link-text">Custom Work</span>
                    </a>
                </li>
                <li class="kt-nav__item">
                    <a href="#" class="kt-nav__link">
                        <i class="kt-nav__link-icon fa fa-genderless kt-font-success"></i>
                        <span class="kt-nav__link-text">Partnership</span>
                    </a>
                </li>
                <li class="kt-nav__item">
                    <a href="#" class="kt-nav__link">
                        <i class="kt-nav__link-icon fa fa-genderless kt-font-info"></i>
                        <span class="kt-nav__link-text">In Progres</span>
                    </a>
                </li>
                <li class="kt-nav__item">
                    <a href="#" class="kt-nav__link">
                        <i class="kt-nav__link-icon fa flaticon2-plus"></i>
                        <span class="kt-nav__link-text">Add Label</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!--End::Aside-->

    <!--Begin:: Inbox List-->
    <div class="kt-grid__item kt-grid__item--fluid    kt-portlet    kt-inbox__list kt-inbox__list--shown" id="kt_inbox_list">
        <div class="kt-portlet__head">
            <div class="kt-inbox__toolbar kt-inbox__toolbar--extended">
                <div class="kt-inbox__actions kt-inbox__actions--expanded">
                    <div class="kt-inbox__check">
                        <label class="kt-checkbox kt-checkbox--single kt-checkbox--tick kt-checkbox--brand">
                            <input type="checkbox">
                            <span></span>
                        </label>

                        <div class="btn-group">
                            <button type="button" class="kt-inbox__icon kt-inbox__icon--sm kt-inbox__icon--light" data-toggle="dropdown">
                                <i class="flaticon2-down-arrow"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-left dropdown-menu-fit dropdown-menu-xs">
                                <ul class="kt-nav">
                                    <li class="kt-nav__item kt-nav__item--active">
                                        <a href="#" class="kt-nav__link">
                                            <span class="kt-nav__link-text">All</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link">
                                            <span class="kt-nav__link-text">Read</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link">
                                            <span class="kt-nav__link-text">Unread</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link">
                                            <span class="kt-nav__link-text">Starred</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link">
                                            <span class="kt-nav__link-text">Unstarred</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <button type="button" class="kt-inbox__icon kt-inbox__icon--light" data-toggle="kt-tooltip" title="Reload list">
                            <i class="flaticon2-refresh-arrow"></i>
                        </button>
                    </div>

                    <div class="kt-inbox__panel">
                        <button class="kt-inbox__icon" data-toggle="kt-tooltip" title="Archive">
                            <?php echo Page::getSVG(Page::getMediaPath() . "icons/svg/Communication/Mail-opened.svg", "");?>
                        </button>
                        <button class="kt-inbox__icon" data-toggle="kt-tooltip" title="Spam">
                            <?php echo Page::getSVG(Page::getMediaPath() . "icons/svg/Code/Warning-1-circle.svg", "");?>
                        </button>
                        <button class="kt-inbox__icon" data-toggle="kt-tooltip" title="Delete">
                            <?php echo Page::getSVG(Page::getMediaPath() . "icons/svg/General/Trash.svg", "");?>
                        </button>
                        <button class="kt-inbox__icon" data-toggle="kt-tooltip" title="Mark as read">
                            <?php echo Page::getSVG(Page::getMediaPath() . "icons/svg/General/Duplicate.svg", "");?>
                        </button>
                        <button class="kt-inbox__icon" data-toggle="kt-tooltip" title="Move">
                            <?php echo Page::getSVG(Page::getMediaPath() . "icons/svg/Files/Media-folder.svg", "");?>
                        </button>
                    </div>
                </div>
                <div class="kt-inbox__search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <!--<i class="la la-group"></i>-->
                                <?php echo Page::getSVG(Page::getMediaPath() . "icons/svg/General/Search.svg");?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="kt-inbox__controls">
                    <div class="kt-inbox__pages" data-toggle="kt-tooltip" title="Records per page">
                        <span class="kt-inbox__perpage" data-toggle="dropdown">1 - 50 of 235</span>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-fit dropdown-menu-xs">
                            <ul class="kt-nav">
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <span class="kt-nav__link-text">20 per page</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item kt-nav__item--active">
                                    <a href="#" class="kt-nav__link">
                                        <span class="kt-nav__link-text">50 par page</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <span class="kt-nav__link-text">100 per page</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <button class="kt-inbox__icon" data-toggle="kt-tooltip" title="Previose page">
                        <i class="flaticon2-left-arrow"></i>
                    </button>

                    <button class="kt-inbox__icon" data-toggle="kt-tooltip" title="Next page">
                        <i class="flaticon2-right-arrow"></i>
                    </button>

                    <div class="kt-inbox__sort" data-toggle="kt-tooltip" title="Sort">
                        <button type="button" class="kt-inbox__icon" data-toggle="dropdown">
                            <i class="flaticon2-console"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-fit dropdown-menu-xs">
                            <ul class="kt-nav">
                                <li class="kt-nav__item kt-nav__item--active">
                                    <a href="#" class="kt-nav__link">
                                        <span class="kt-nav__link-text">Newest</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <span class="kt-nav__link-text">Olders</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <span class="kt-nav__link-text">Unread</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="btn-group" data-toggle="kt-tooltip" title="Settings">
                        <button type="button" class="kt-inbox__icon" data-toggle="dropdown">
                            <i class="flaticon-more-1"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-fit dropdown-menu-md">
                            <?php Page::getGlobalPartialView('content/general/dropdown-menu-3');?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body kt-portlet__body--fit-x">
            <div class="kt-inbox__items">
                <div class="kt-inbox__item kt-inbox__item--unread" data-id="1">
                    <div class="kt-inbox__info">
                        <div class="kt-inbox__actions">
                            <label class="kt-checkbox kt-checkbox--single kt-checkbox--tick kt-checkbox--brand">
                                <input type="checkbox">
                                <span></span>
                            </label>
                            <span class="kt-inbox__icon kt-inbox__icon--on kt-inbox__icon--light" data-toggle="kt-tooltip" data-placement="right" title="Star">
                                <i class="flaticon-star"></i>
                            </span>
                            <span class="kt-inbox__icon kt-inbox__icon--light" data-toggle="kt-tooltip" data-placement="right" title="Mark as important">
                                <i class="flaticon-add-label-button"></i>
                            </span>
                        </div>
                        <div class="kt-inbox__sender" data-toggle="view">
                            <span class="kt-media kt-media--sm kt-media--danger" style="background-image: url('./assets/media/users/100_13.jpg')">
                                <span></span>
                            </span>
                            <a href="#" class="kt-inbox__author">Sean Paul</a>
                        </div>
                    </div>
                    <div class="kt-inbox__details" data-toggle="view">
                        <div class="kt-inbox__message">
                            <span class="kt-inbox__subject">Digital PPV Customer Confirmation - </span>
                            <span class="kt-inbox__summary">Thank you for ordering UFC 240 Holloway vs Edgar Alternate camera angles...</span>
                        </div>
                        <div class="kt-inbox__labels">
                            <span class="kt-inbox__label kt-badge kt-badge--unified-brand kt-badge--bold kt-badge--inline">inbox</span>
                        </div>
                    </div>
                    <div class="kt-inbox__datetime" data-toggle="view">
                        8:30 PM
                    </div>
                </div>
                <div class="kt-inbox__item kt-inbox__item--unread" data-id="2">
                    <div class="kt-inbox__info">
                        <div class="kt-inbox__actions">
                            <label class="kt-checkbox kt-checkbox--single kt-checkbox--tick kt-checkbox--brand">
                                <input type="checkbox">
                                <span></span>
                            </label>
                            <span class="kt-inbox__icon kt-inbox__icon--light" data-toggle="kt-tooltip" data-placement="right" title="Star">
                                <i class="flaticon-star"></i>
                            </span>
                            <span class="kt-inbox__icon kt-inbox__icon--light" data-toggle="kt-tooltip" data-placement="right" title="Mark as important">
                                <i class="flaticon-add-label-button"></i>
                            </span>
                        </div>
                        <div class="kt-inbox__sender" data-toggle="view">
                            <span class="kt-media kt-media--sm kt-media--danger">
                                <span>OJ</span>
                            </span>
                            <a href="#" class="kt-inbox__author">Oliver	Jake</a>
                        </div>
                    </div>

                    <div class="kt-inbox__details" data-toggle="view">
                        <div class="kt-inbox__message">
                            <span class="kt-inbox__subject">Your iBuy.com grocery shopping confirmation - </span>
                            <span class="kt-inbox__summary">Please make sure that you have one of the following cards with you when we deliver your order...</span>
                        </div>
                    </div>
                    <div class="kt-inbox__datetime" data-toggle="view">
                        day ago
                    </div>
                </div>
                <div class="kt-inbox__item" data-id="3">
                    <div class="kt-inbox__info">
                        <div class="kt-inbox__actions">
                            <label class="kt-checkbox kt-checkbox--single kt-checkbox--tick kt-checkbox--brand">
                                <input type="checkbox">
                                <span></span>
                            </label>
                            <span class="kt-inbox__icon kt-inbox__icon--light" data-toggle="kt-tooltip" data-placement="right" title="Star">
                                <i class="flaticon-star"></i>
                            </span>
                            <span class="kt-inbox__icon kt-inbox__icon--light" data-toggle="kt-tooltip" data-placement="right" title="Mark as important">
                                <i class="flaticon-add-label-button"></i>
                            </span>
                        </div>
                        <div class="kt-inbox__sender" data-toggle="view">
                            <span class="kt-media kt-media--sm kt-media--brand">
                                <span>EF</span>
                            </span>
                            <a href="#" class="kt-inbox__author">Enrico Fermi</a>
                        </div>
                    </div>

                    <div class="kt-inbox__details" data-toggle="view">
                        <div class="kt-inbox__message">
                            <span class="kt-inbox__subject">Your Order #224820998666029 has been Confirmed - </span>
                            <span class="kt-inbox__summary">Your Order #224820998666029 has been placed on Saturday, 29 June, 2019 10:02:41 via Online Banking...</span>
                        </div>
                    </div>
                    <div class="kt-inbox__datetime" data-toggle="view">
                        11:20PM
                    </div>
                </div>
                <div class="kt-inbox__item" data-id="4">
                    <div class="kt-inbox__info">
                        <div class="kt-inbox__actions">
                            <label class="kt-checkbox kt-checkbox--single kt-checkbox--tick kt-checkbox--brand">
                                <input type="checkbox">
                                <span></span>
                            </label>
                            <span class="kt-inbox__icon kt-inbox__icon--on kt-inbox__icon--light" data-toggle="kt-tooltip" data-placement="right" title="Star">
                                <i class="flaticon-star"></i>
                            </span>
                            <span class="kt-inbox__icon kt-inbox__icon--on kt-inbox__icon--light" data-toggle="kt-tooltip" data-placement="right" title="Mark as important">
                                <i class="flaticon-add-label-button"></i>
                            </span>
                        </div>
                        <div class="kt-inbox__sender" data-toggle="view">
                            <span class="kt-media kt-media--sm kt-media--brand" style="background-image: url('./assets/media/users/100_11.jpg')">
                                <span></span>
                            </span>
                            <a href="#" class="kt-inbox__author">Jane Goodall</a>
                        </div>
                    </div>

                    <div class="kt-inbox__details" data-toggle="view">
                        <div class="kt-inbox__message">
                            <span class="kt-inbox__subject">Payment Notification DLOP2329KD - </span>
                            <span class="kt-inbox__summary">Your payment of 4500USD to AirCar has been authorized and confirmed, thank you...</span>
                        </div>
                    </div>
                    <div class="kt-inbox__datetime" data-toggle="view">
                        2 days ago
                    </div>
                </div>
                <div class="kt-inbox__item" data-id="5">
                    <div class="kt-inbox__info">
                        <div class="kt-inbox__actions">
                            <label class="kt-checkbox kt-checkbox--single kt-checkbox--tick kt-checkbox--brand">
                                <input type="checkbox">
                                <span></span>
                            </label>
                            <span class="kt-inbox__icon kt-inbox__icon--light" data-toggle="kt-tooltip" data-placement="right" title="Star">
                                <i class="flaticon-star"></i>
                            </span>
                            <span class="kt-inbox__icon kt-inbox__icon--light" data-toggle="kt-tooltip" data-placement="right" title="Mark as important">
                                <i class="flaticon-add-label-button"></i>
                            </span>
                        </div>
                        <div class="kt-inbox__sender" data-toggle="view">
                            <span class="kt-media kt-media--sm kt-media--success">
                                <span>MP</span>
                            </span>
                            <a href="#" class="kt-inbox__author">Max O'Brien Planck</a>
                        </div>
                    </div>

                    <div class="kt-inbox__details" data-toggle="view">
                        <div class="kt-inbox__message">
                            <span class="kt-inbox__subject">Congratulations on your iRun Coach subscription - </span>
                            <span class="kt-inbox__summary">Congratulations on your iRun Coach subscription. You made no space for excuses and you decided on a healthier and happier life...</span>
                        </div>
                    </div>
                    <div class="kt-inbox__datetime" data-toggle="view">
                        Jul 25
                    </div>
                </div>
                <div class="kt-inbox__item" data-id="6">
                    <div class="kt-inbox__info">
                        <div class="kt-inbox__actions">
                            <label class="kt-checkbox kt-checkbox--single kt-checkbox--tick kt-checkbox--brand">
                                <input type="checkbox">
                                <span></span>
                            </label>
                            <span class="kt-inbox__icon kt-inbox__icon--light" data-toggle="kt-tooltip" data-placement="right" title="Star">
                                <i class="flaticon-star"></i>
                            </span>
                            <span class="kt-inbox__icon kt-inbox__icon--light" data-toggle="kt-tooltip" data-placement="right" title="Mark as important">
                                <i class="flaticon-add-label-button"></i>
                            </span>
                        </div>
                        <div class="kt-inbox__sender" data-toggle="view">
                            <span class="kt-media kt-media--sm kt-media--brand" style="background-image: url('./assets/media/users/100_7.jpg')">
                                <span></span>
                            </span>
                            <a href="#" class="kt-inbox__author">Rita Levi-Montalcini</a>
                        </div>
                    </div>

                    <div class="kt-inbox__details" data-toggle="view">
                        <div class="kt-inbox__message">
                            <span class="kt-inbox__subject">Pay bills & win up to 600$ Cashback! - </span>
                            <span class="kt-inbox__summary">Please make sure that you have one of the following cards with you when we deliver your order...</span>
                        </div>
                    </div>
                    <div class="kt-inbox__datetime" data-toggle="view">
                        July 24
                    </div>
                </div>
                <div class="kt-inbox__item kt-inbox__item--unread" data-id="7">
                    <div class="kt-inbox__info">
                        <div class="kt-inbox__actions">
                            <label class="kt-checkbox kt-checkbox--single kt-checkbox--tick kt-checkbox--brand">
                                <input type="checkbox">
                                <span></span>
                            </label>
                            <span class="kt-inbox__icon kt-inbox__icon--on kt-inbox__icon--light" data-toggle="kt-tooltip" data-placement="right" title="Star">
                                <i class="flaticon-star"></i>
                            </span>
                            <span class="kt-inbox__icon kt-inbox__icon--light" data-toggle="kt-tooltip" data-placement="right" title="Mark as important">
                                <i class="flaticon-add-label-button"></i>
                            </span>
                        </div>
                        <div class="kt-inbox__sender" data-toggle="view">
                            <span class="kt-media kt-media--sm kt-media--brand" style="background-image: url('./assets/media/users/100_8.jpg')">
                                <span></span>
                            </span>
                            <a href="#" class="kt-inbox__author">Stephen Hawking</a>
                        </div>
                    </div>

                    <div class="kt-inbox__details" data-toggle="view">
                        <div class="kt-inbox__message">
                            <span class="kt-inbox__subject">Activate your LIPO Account today - </span>
                            <span class="kt-inbox__summary">Thank you for creating a LIPO Account. Please click the link below to activate your account. This link will expire in 24 hours...</span>
                        </div>
                    </div>
                    <div class="kt-inbox__datetime" data-toggle="view">
                        Jun 13
                    </div>
                </div>
                <div class="kt-inbox__item" data-id="8">
                    <div class="kt-inbox__info">
                        <div class="kt-inbox__actions">
                            <label class="kt-checkbox kt-checkbox--single kt-checkbox--tick kt-checkbox--brand">
                                <input type="checkbox">
                                <span></span>
                            </label>
                            <span class="kt-inbox__icon kt-inbox__icon--light" data-toggle="kt-tooltip" data-placement="right" title="Star">
                                <i class="flaticon-star"></i>
                            </span>
                            <span class="kt-inbox__icon kt-inbox__icon--on kt-inbox__icon--light" data-toggle="kt-tooltip" data-placement="right" title="Mark as important">
                                <i class="flaticon-add-label-button"></i>
                            </span>
                        </div>
                        <div class="kt-inbox__sender" data-toggle="view">
                            <span class="kt-media kt-media--sm kt-media--dark">
                                <span>WE</span>
                            </span>
                            <a href="#" class="kt-inbox__author">Wolfgang Ernst Pauli</a>
                        </div>
                    </div>

                    <div class="kt-inbox__details" data-toggle="view">
                        <div class="kt-inbox__message">
                            <span class="kt-inbox__subject">About your request for PalmLake - </span>
                            <span class="kt-inbox__summary">What you requested can't be arranged ahead of time but PalmLake said they'll do their best to accommodate you upon arrival....</span>
                        </div>
                    </div>
                    <div class="kt-inbox__datetime" data-toggle="view">
                        25 May
                    </div>
                </div>
                <div class="kt-inbox__item" data-id="9">
                    <div class="kt-inbox__info">
                        <div class="kt-inbox__actions">
                            <label class="kt-checkbox kt-checkbox--single kt-checkbox--tick kt-checkbox--brand">
                                <input type="checkbox">
                                <span></span>
                            </label>
                            <span class="kt-inbox__icon kt-inbox__icon--light" data-toggle="kt-tooltip" data-placement="right" title="Star">
                                <i class="flaticon-star"></i>
                            </span>
                            <span class="kt-inbox__icon kt-inbox__icon--light" data-toggle="kt-tooltip" data-placement="right" title="Mark as important">
                                <i class="flaticon-add-label-button"></i>
                            </span>
                        </div>
                        <div class="kt-inbox__sender" data-toggle="view">
                            <span class="kt-media kt-media--sm" style="background-image: url('./assets/media/users/100_12.jpg')">
                                <span></span>
                            </span>
                            <a href="#" class="kt-inbox__author">Sarah Boysen</a>
                        </div>
                    </div>
                    <div class="kt-inbox__details" data-toggle="view">
                        <div class="kt-inbox__message">
                            <span class="kt-inbox__subject">Verification of your card transaction - </span>
                            <span class="kt-inbox__summary">This is to confirm that you have used your credit/debit card for the booking. If you did not make this booking, please contact us immediately....</span>
                        </div>
                    </div>
                    <div class="kt-inbox__datetime" data-toggle="view">
                        May 23
                    </div>
                </div>
                <div class="kt-inbox__item" data-id="10">
                    <div class="kt-inbox__info">
                        <div class="kt-inbox__actions">
                            <label class="kt-checkbox kt-checkbox--single kt-checkbox--tick kt-checkbox--brand">
                                <input type="checkbox">
                                <span></span>
                            </label>
                            <span class="kt-inbox__icon kt-inbox__icon--light" data-toggle="kt-tooltip" data-placement="right" title="Star">
                                <i class="flaticon-star"></i>
                            </span>
                            <span class="kt-inbox__icon kt-inbox__icon--light" data-toggle="kt-tooltip" data-placement="right" title="Mark as important">
                                <i class="flaticon-add-label-button"></i>
                            </span>
                        </div>
                        <div class="kt-inbox__sender" data-toggle="view">
                            <span class="kt-media kt-media--sm kt-media--brand" style="background-image: url('./assets/media/users/100_14.jpg')">
                                <span></span>
                            </span>
                            <a href="#" class="kt-inbox__author">Max Born</a>
                        </div>
                    </div>
                    <div class="kt-inbox__details" data-toggle="view">
                        <div class="kt-inbox__message">
                            <span class="kt-inbox__subject">Payment Notification (DE223232034) - </span>
                            <span class="kt-inbox__summary">Your payment of 4500USD to AirCar has been authorized and confirmed, thank you....</span>
                        </div>
                    </div>
                    <div class="kt-inbox__datetime" data-toggle="view">
                        Apr 12
                    </div>
                </div>
                <div class="kt-inbox__item" data-id="11">
                    <div class="kt-inbox__info">
                        <div class="kt-inbox__actions">
                            <label class="kt-checkbox kt-checkbox--single kt-checkbox--tick kt-checkbox--brand">
                                <input type="checkbox">
                                <span></span>
                            </label>
                            <span class="kt-inbox__icon kt-inbox__icon--light" data-toggle="kt-tooltip" data-placement="right" title="Star">
                                <i class="flaticon-star"></i>
                            </span>
                            <span class="kt-inbox__icon kt-inbox__icon--light" data-toggle="kt-tooltip" data-placement="right" title="Mark as important">
                                <i class="flaticon-add-label-button"></i>
                            </span>
                        </div>
                        <div class="kt-inbox__sender" data-toggle="view">
                            <span class="kt-media kt-media--sm kt-media--brand" style="background-image: url('./assets/media/users/100_5.jpg')">
                                <span></span>
                            </span>
                            <a href="#" class="kt-inbox__author">Patty Jo Watson</a>
                        </div>
                    </div>
                    <div class="kt-inbox__details" data-toggle="view">
                        <div class="kt-inbox__message">
                            <span class="kt-inbox__subject">Welcome, Patty  - </span>
                            <span class="kt-inbox__summary">Discover interesting ideas and unique perspectives. Read, explore and follow your interests. Get personalized recommendations delivered to you....</span>
                        </div>
                    </div>
                    <div class="kt-inbox__datetime" data-toggle="view">
                        Mar 1
                    </div>
                </div>
                <div class="kt-inbox__item" data-id="12">
                    <div class="kt-inbox__info">
                        <div class="kt-inbox__actions">
                            <label class="kt-checkbox kt-checkbox--single kt-checkbox--tick kt-checkbox--brand">
                                <input type="checkbox">
                                <span></span>
                            </label>
                            <span class="kt-inbox__icon kt-inbox__icon--light" data-toggle="kt-tooltip" data-placement="right" title="Star">
                                <i class="flaticon-star"></i>
                            </span>
                            <span class="kt-inbox__icon kt-inbox__icon--light" data-toggle="kt-tooltip" data-placement="right" title="Mark as important">
                                <i class="flaticon-add-label-button"></i>
                            </span>
                        </div>
                        <div class="kt-inbox__sender" data-toggle="view">
                            <span class="kt-media kt-media--sm kt-media--warning">
                                <span>RW</span>
                            </span>
                            <a href="#" class="kt-inbox__author">Roberts O'Neill Wilson</a>
                        </div>
                    </div>
                    <div class="kt-inbox__details" data-toggle="view">
                        <div class="kt-inbox__message">
                            <span class="kt-inbox__subject">Optimize with Recommendations, now used by most advertisers - </span>
                            <span class="kt-inbox__summary">Your weekly report is a good way to track your performance. See what’s working so far and explore new opportunities for improvement....</span>
                        </div>
                    </div>
                    <div class="kt-inbox__datetime" data-toggle="view">
                        Feb 11
                    </div>
                </div>
                <div class="kt-inbox__item" data-id="13">
                    <div class="kt-inbox__info">
                        <div class="kt-inbox__actions">
                            <label class="kt-checkbox kt-checkbox--single kt-checkbox--tick kt-checkbox--brand">
                                <input type="checkbox">
                                <span></span>
                            </label>
                            <span class="kt-inbox__icon kt-inbox__icon--light" data-toggle="kt-tooltip" data-placement="right" title="Star">
                                <i class="flaticon-star"></i>
                            </span>
                            <span class="kt-inbox__icon kt-inbox__icon--light" data-toggle="kt-tooltip" data-placement="right" title="Mark as important">
                                <i class="flaticon-add-label-button"></i>
                            </span>
                        </div>
                        <div class="kt-inbox__sender" data-toggle="view">
                            <span class="kt-media kt-media--sm kt-media--brand" style="background-image: url('./assets/media/users/100_12.jpg')">
                                <span></span>
                            </span>
                            <a href="#" class="kt-inbox__author">Blaise Pascal</a>
                        </div>
                    </div>
                    <div class="kt-inbox__details" data-toggle="view">
                        <div class="kt-inbox__message">
                            <span class="kt-inbox__subject">Free Video Marketing Guide - </span>
                            <span class="kt-inbox__summary">Video has rolled into every marketing platform or channel, leaving...</span>
                        </div>
                    </div>
                    <div class="kt-inbox__datetime">
                        Jan 24
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End:: Inbox List-->

    <!--Begin:: Inbox View-->
    <div class="kt-grid__item kt-grid__item--fluid    kt-portlet    kt-inbox__view kt-inbox__view--shown-" id="kt_inbox_view">
        <div class="kt-portlet__head">
            <div class="kt-inbox__toolbar">
                <div class="kt-inbox__actions">
                    <a href="#" class="kt-inbox__icon kt-inbox__icon--back">
                        <i class="flaticon2-left-arrow-1"></i>
                    </a>

                    <a href="#" class="kt-inbox__icon">
                        <?php echo Page::getSVG(Page::getMediaPath() . "icons/svg/Communication/Mail-opened.svg", "");?>
                    </a>
                    <a href="#" class="kt-inbox__icon">
                        <?php echo Page::getSVG(Page::getMediaPath() . "icons/svg/Code/Warning-1-circle.svg", "");?>
                    </a>
                    <a href="#" class="kt-inbox__icon">
                        <?php echo Page::getSVG(Page::getMediaPath() . "icons/svg/General/Trash.svg", "");?>
                    </a>

                    <a href="#" class="kt-inbox__icon">
                        <?php echo Page::getSVG(Page::getMediaPath() . "icons/svg/General/Duplicate.svg", "");?>
                    </a>
                    <a href="#" class="kt-inbox__icon">
                        <?php echo Page::getSVG(Page::getMediaPath() . "icons/svg/Files/Media-folder.svg", "");?>
                    </a>
                </div>
                <div class="kt-inbox__controls">
                    <span class="kt-inbox__pages">
                        <span class="kt-inbox__perpage" data-toggle="dropdown">3 of 230 pages</span>
                    </span>

                    <button class="kt-inbox__icon" data-toggle="kt-tooltip" title="Previose message">
                        <i class="flaticon2-left-arrow"></i>
                    </button>

                    <button class="kt-inbox__icon" data-toggle="kt-tooltip" title="Next message">
                        <i class="flaticon2-right-arrow"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="kt-portlet__body kt-portlet__body--fit-x">
            <div class="kt-inbox__subject">
                <div class="kt-inbox__title">
                    <h3 class="kt-inbox__text">Trip Reminder. Thank you for flying with us!</h3>
                    <span class="kt-inbox__label kt-badge kt-badge--unified-brand kt-badge--bold kt-badge--inline">
                        inbox
                    </span>
                    <span class="kt-inbox__label kt-badge kt-badge--unified-danger kt-badge--bold kt-badge--inline">
                        important
                    </span>
                </div>
                <div class="kt-inbox__actions">
                    <a href="#" class="kt-inbox__icon">
                        <i class="flaticon2-sort"></i>
                    </a>
                    <a href="#" class="kt-inbox__icon">
                        <i class="flaticon2-fax"></i>
                    </a>
                </div>
            </div>

            <div class="kt-inbox__messages">
                <div class="kt-inbox__message kt-inbox__message--expanded">
                    <div class="kt-inbox__head">
                        <span class="kt-media" data-toggle="expand" style="background-image: url('./assets/media/users/100_13.jpg')">
                            <span></span>
                        </span>
                        <div class="kt-inbox__info">
                            <div class="kt-inbox__author" data-toggle="expand">
                                <a href="#" class="kt-inbox__name">Chris Muller</a>

                                <div class="kt-inbox__status">
                                    <span class="kt-badge kt-badge--success kt-badge--dot"></span> 1 Day ago
                                </div>
                            </div>
                            <div class="kt-inbox__details">
                                <div class="kt-inbox__tome">
                                    <span class="kt-inbox__label" data-toggle="dropdown">
                                        to me <i class="flaticon2-down"></i>
                                    </span>
                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-md dropdown-menu-left">
                                        <table class="kt-inbox__details">
                                            <tr>
                                                <td>from</td>
                                                <td>Mark Andre</td>
                                            </tr>
                                            <tr>
                                                <td>date:</td>
                                                <td>Jul 30, 2019, 11:27 PM</td>
                                            </tr>
                                            <tr>
                                                <td>from:</td>
                                                <td>Mark Andre</td>
                                            </tr>
                                            <tr>
                                                <td>subject:</td>
                                                <td>Trip Reminder. Thank you for flying with us!</td>
                                            </tr>
                                            <tr>
                                                <td>reply to:</td>
                                                <td>mark.andre@gmail.com</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="kt-inbox__desc" data-toggle="expand">
                                    With resrpect, i must disagree with Mr.Zinsser. We all know the most part of important part....
                                </div>
                            </div>
                        </div>
                        <div class="kt-inbox__actions">
                            <div class="kt-inbox__datetime" data-toggle="expand">
                                Jul 15, 2019, 11:19AM
                            </div>

                            <div class="kt-inbox__group">
                                <span class="kt-inbox__icon kt-inbox__icon--label kt-inbox__icon--light" data-toggle="kt-tooltip" data-placement="top" title="Star">
                                    <i class="flaticon-star"></i>
                                </span>
                                <span class="kt-inbox__icon kt-inbox__icon--label kt-inbox__icon--light" data-toggle="kt-tooltip" data-placement="top" title="Mark as important">
                                    <i class="flaticon-add-label-button"></i>
                                </span>
                                <span class="kt-inbox__icon kt-inbox__icon--reply kt-inbox__icon--light" data-toggle="kt-tooltip" data-placement="top" title="Reply">
                                    <i class="flaticon2-reply-1"></i>
                                </span>
                                <span class="kt-inbox__icon kt-inbox__icon--light" data-toggle="kt-tooltip" data-placement="top" title="Settings">
                                    <i class="flaticon-more"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="kt-inbox__body">
                        <div class="kt-inbox__text">
                            <p>Hi Bob,</p>
                            <p class="kt-margin-t-25">
                                With resrpect, i must disagree with Mr.Zinsser. We all know the most part of important part of any article is the title.Without a compelleing title, your reader won't even get to the first sentence.After the title, however, the first few sentences of your article are certainly the most important part.
                            </p>
                            <p class="kt-margin-t-25">
                                Jornalists call this critical, introductory section the "Lede," and when bridge properly executed, it's the that carries your reader from an headine try at attention-grabbing to the body of your blog post, if you want to get it right on of these 10 clever ways to omen your next blog posr with a bang

                            </p>
                            <p class="kt-margin-t-25">
                                Best regards,
                            </p>
                            <p>
                                Jason Muller
                            </p>
                        </div>
                    </div>
                </div>
                <div class="kt-inbox__message">
                    <div class="kt-inbox__head">
                        <span class="kt-media" data-toggle="expand" style="background-image: url('./assets/media/users/100_10.jpg')">
                            <span></span>
                        </span>

                        <div class="kt-inbox__info">
                            <div class="kt-inbox__author" data-toggle="expand">
                                <a href="#" class="kt-inbox__name">Lina Nilson</a>

                                <div class="kt-inbox__status">
                                    <span class="kt-badge kt-badge--success kt-badge--dot"></span> 2 Day ago
                                </div>
                            </div>
                            <div class="kt-inbox__details">
                                <div class="kt-inbox__tome">
                                    <span class="kt-inbox__label" data-toggle="dropdown">
                                        to me <i class="flaticon2-down"></i>
                                    </span>
                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-md dropdown-menu-left">
                                        <table class="kt-inbox__details">
                                            <tr>
                                                <td>from</td>
                                                <td>Mark Andre</td>
                                            </tr>
                                            <tr>
                                                <td>date:</td>
                                                <td>Jul 30, 2019, 11:27 PM</td>
                                            </tr>
                                            <tr>
                                                <td>from:</td>
                                                <td>Mark Andre</td>
                                            </tr>
                                            <tr>
                                                <td>subject:</td>
                                                <td>Trip Reminder. Thank you for flying with us!</td>
                                            </tr>
                                            <tr>
                                                <td>reply to:</td>
                                                <td>mark.andre@gmail.com</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <div class="kt-inbox__desc" data-toggle="expand">
                                    Jornalists call this critical, introductory section the "Lede," and when bridge properly executed....
                                </div>
                            </div>
                        </div>

                        <div class="kt-inbox__actions">
                            <div class="kt-inbox__datetime" data-toggle="expand">
                                Jul 20, 2019, 03:20PM
                            </div>

                            <div class="kt-inbox__group">
                                <span class="kt-inbox__icon kt-inbox__icon--label kt-inbox__icon--on kt-inbox__icon--light" data-toggle="kt-tooltip" data-placement="top" title="Star">
                                    <i class="flaticon-star"></i>
                                </span>
                                <span class="kt-inbox__icon kt-inbox__icon--label kt-inbox__icon--light" data-toggle="kt-tooltip" data-placement="top" title="Mark as important">
                                    <i class="flaticon-add-label-button"></i>
                                </span>
                                <span class="kt-inbox__icon kt-inbox__icon--light" data-toggle="kt-tooltip" data-placement="top" title="Reply">
                                    <i class="flaticon2-reply-1"></i>
                                </span>
                                <span class="kt-inbox__icon kt-inbox__icon--light" data-toggle="kt-tooltip" data-placement="top" title="Settings">
                                    <i class="flaticon-more"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="kt-inbox__body">
                        <p>Hi,</p>
                        <p class="kt-margin-t-25">
                            The guide price is based on today's prices instore. However as we shop for your order on the day you want it delivered, some of the prices may have changed. Weighed products: the guide price on the website uses an estimate weight for weighed products such as grapes or cheese. But what you pay will be based on the exact weight of your product, so the price may vary slightly.
                        </p>
                        <p class="kt-margin-t-25">
                            Best regards,
                            <br> Jason Muller
                        </p>
                    </div>
                </div>
                <div class="kt-inbox__message">
                    <div class="kt-inbox__head">
                        <span class="kt-media" data-toggle="expand" style="background-image: url('./assets/media/users/100_3.jpg')">
                            <span></span>
                        </span>

                        <div class="kt-inbox__info">
                            <div class="kt-inbox__author" data-toggle="expand">
                                <a href="#" class="kt-inbox__name">Sean Stone</a>

                                <div class="kt-inbox__status">
                                    <span class="kt-badge kt-badge--success kt-badge--dot"></span> 1 Day ago
                                </div>
                            </div>
                            <div class="kt-inbox__details">
                                <div class="kt-inbox__tome">
                                    <span class="kt-inbox__label" data-toggle="dropdown">
                                        to me <i class="flaticon2-down"></i>
                                    </span>
                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-md dropdown-menu-left">
                                        <table class="kt-inbox__details">
                                            <tr>
                                                <td>from</td>
                                                <td>Mark Andre</td>
                                            </tr>
                                            <tr>
                                                <td>date:</td>
                                                <td>Jul 30, 2019, 11:27 PM</td>
                                            </tr>
                                            <tr>
                                                <td>from:</td>
                                                <td>Mark Andre</td>
                                            </tr>
                                            <tr>
                                                <td>subject:</td>
                                                <td>Trip Reminder. Thank you for flying with us!</td>
                                            </tr>
                                            <tr>
                                                <td>reply to:</td>
                                                <td>mark.andre@gmail.com</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <div class="kt-inbox__desc" data-toggle="expand">
                                    Headine try at attention-grabbing to the body of your blog post....
                                </div>
                            </div>
                        </div>

                        <div class="kt-inbox__actions">
                            <div class="kt-inbox__datetime">
                                Jul 15, 2019, 11:19AM
                            </div>

                            <div class="kt-inbox__group">
                                <span class="kt-inbox__icon kt-inbox__icon--label kt-inbox__icon--label--on kt-inbox__icon--light" data-toggle="kt-tooltip" data-placement="top" title="Star">
                                    <i class="flaticon-star"></i>
                                </span>
                                <span class="kt-inbox__icon kt-inbox__icon--label kt-inbox__icon--light" data-toggle="kt-tooltip" data-placement="top" title="Mark as important">
                                    <i class="flaticon-add-label-button"></i>
                                </span>
                                <span class="kt-inbox__icon kt-inbox__icon--light" data-toggle="kt-tooltip" data-placement="top" title="Reply">
                                    <i class="flaticon2-reply-1"></i>
                                </span>
                                <span class="kt-inbox__icon kt-inbox__icon--light" data-toggle="kt-tooltip" data-placement="top" title="Settings">
                                    <i class="flaticon-more"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="kt-inbox__body">
                        <p>Hi Bob,</p>
                        <p class="kt-margin-t-25">
                            With resrpect, i must disagree with Mr.Zinsser. We all know the most part of important part of any article is the title.Without a compelleing title, your reader won't even get to the first sentence.After the title, however, the first few sentences of your article are certainly the most important part.
                        </p>
                        <p class="kt-margin-t-25">
                            Jornalists call this critical, introductory section the "Lede," and when bridge properly executed, it's the that carries your reader from an headine try at attention-grabbing to the body of your blog post, if you want to get it right on of these 10 clever ways to omen your next blog posr with a bang

                        </p>
                        <p class="kt-margin-t-25">
                            Best regards,
                        </p>
                        <p>
                            Jason Muller
                        </p>
                    </div>
                </div>
            </div>

            <div class="kt-inbox__reply kt-inbox__reply--on">
                <div class="kt-inbox__actions">
                    <button class="btn btn-secondary btn-bold">
                        <i class="flaticon2-reply-1 kt-font-brand"></i> Reply
                    </button>

                    <button class="btn btn-secondary btn-bold">
                        <i class="flaticon2-left-arrow-1 kt-font-brand"></i> Forward
                    </button>
                </div>

                <div class="kt-inbox__form" id="kt_inbox_reply_form">
                    <div class="kt-inbox__body">
                        <div class="kt-inbox__to">
                            <div class="kt-inbox__wrapper">
                                <div class="kt-inbox__field kt-inbox__field--to">
                                    <div class="kt-inbox__label">
                                        To:
                                    </div>
                                    <div class="kt-inbox__input">
                                        <input type="text" name="compose_to" value="Chris Muller, Lina Nilson"></input>
                                    </div>
                                    <div class="kt-inbox__tools">
                                        <span class="kt-inbox__tool kt-inbox__tool--cc">Cc</span>
                                        <span class="kt-inbox__tool kt-inbox__tool--bcc">Bcc</span>
                                    </div>
                                </div>
                                <div class="kt-inbox__field kt-inbox__field--cc">
                                    <div class="kt-inbox__label">
                                        Cc:
                                    </div>
                                    <div class="kt-inbox__input">
                                        <input type="text" name="compose_cc"></input>
                                    </div>
                                    <div class="kt-inbox__tools">
                                        <button type="button" class="kt-inbox__icon kt-inbox__icon--delete kt-inbox__icon--sm kt-inbox__icon--light">
                                            <i class="flaticon2-cross"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="kt-inbox__field kt-inbox__field--bcc">
                                    <div class="kt-inbox__label">
                                        Bcc:
                                    </div>
                                    <div class="kt-inbox__input">
                                        <input type="text" name="compose_bcc"></input>
                                    </div>
                                    <div class="kt-inbox__tools">
                                        <button type="button" class="kt-inbox__icon kt-inbox__icon--delete kt-inbox__icon--sm kt-inbox__icon--light">
                                            <i class="flaticon2-cross"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="kt-inbox__editor" id="kt_inbox_reply_editor" style="height: 200px;">
                        </div>

                        <div class="kt-inbox__attachments">
                            <div class="dropzone dropzone-multi" id="kt_inbox_reply_attachments">
                                <div class="dropzone-items">
                                    <div class="dropzone-item">
                                        <div class="dropzone-file">
                                            <div class="dropzone-filename" title="some_image_file_name.jpg">
                                                <span data-dz-name>some_image_file_name.jpg</span> <strong>(<span  data-dz-size>340kb</span>)</strong>
                                            </div>
                                            <div class="dropzone-error" data-dz-errormessage></div>
                                        </div>
                                        <div class="dropzone-progress">
                                            <div class="progress">
                                                <div class="progress-bar kt-bg-brand" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" data-dz-uploadprogress></div>
                                            </div>
                                        </div>
                                        <div class="dropzone-toolbar">
                                            <span class="dropzone-delete" data-dz-remove><i class="flaticon2-cross"></i></span>
                                        </div>
                                    </div>
                                    <div class="dropzone-item">
                                        <div class="dropzone-file">
                                            <div class="dropzone-filename" title="some_image_file_name.jpg">
                                                <span data-dz-name>design_files.zip</span> <strong>(<span  data-dz-size>450kb</span>)</strong>
                                            </div>
                                            <div class="dropzone-error" data-dz-errormessage></div>
                                        </div>
                                        <div class="dropzone-progress">
                                            <div class="progress">
                                                <div class="progress-bar kt-bg-brand" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" data-dz-uploadprogress></div>
                                            </div>
                                        </div>
                                        <div class="dropzone-toolbar">
                                            <span class="dropzone-delete" data-dz-remove><i class="flaticon2-cross"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-inbox__foot">
                        <div class="kt-inbox__primary">
                            <div class="btn-group">
                                <button type="button" class="btn btn-brand btn-bold">
                                    Send
                                </button>

                                <button type="button" class="btn btn-brand btn-bold dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                </button>

                                <div class="dropdown-menu dropup dropdown-menu-fit dropdown-menu-right">
                                    <ul class="kt-nav">
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-writing"></i>
                                                <span class="kt-nav__link-text">Schedule Send</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-medical-records"></i>
                                                <span class="kt-nav__link-text">Save & archive</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-hourglass-1"></i>
                                                <span class="kt-nav__link-text">Cancel</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="kt-inbox__panel">
                                <button class="kt-inbox__icon kt-inbox__icon--light" id="kt_inbox_reply_attachments_select">
                                    <i class="flaticon2-clip-symbol"></i>
                                </button>
                                <button class="kt-inbox__icon kt-inbox__icon--light">
                                    <i class="flaticon2-pin"></i>
                                </button>
                            </div>
                        </div>

                        <div class="kt-inbox__secondary">
                            <button class="kt-inbox__icon kt-inbox__icon--light" data-toggle="kt-tooltip" title="More actions">
                                <i class="flaticon2-settings"></i>
                            </button>
                            <button class="kt-inbox__icon kt-inbox__icon--remove kt-inbox__icon--light" data-toggle="kt-tooltip" title="Dismiss reply">
                                <i class="flaticon2-rubbish-bin-delete-button"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End:: Inbox View-->
</div>
<!--End::Inbox-->

<!--Begin:: Inbox Compose-->
<div class="modal modal-sticky-bottom-right modal-sticky-lg" id="kt_inbox_compose" role="dialog" data-backdrop="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content kt-inbox">
            <div class="kt-inbox__form" id="kt_inbox_compose_form">
                <div class="kt-inbox__head">
                    <div class="kt-inbox__title">Compose</div>
                    <div class="kt-inbox__actions">
                        <button type="button" class="kt-inbox__icon kt-inbox__icon--md kt-inbox__icon--light">
                            <i class="flaticon2-arrow-1"></i>
                        </button>
                        <button type="button" class="kt-inbox__icon kt-inbox__icon--md kt-inbox__icon--light" data-dismiss="modal">
                            <i class="flaticon2-cross"></i>
                        </button>
                    </div>
                </div>
                <div class="kt-inbox__body">
                    <div class="kt-inbox__to">
                        <div class="kt-inbox__wrapper">
                            <div class="kt-inbox__field kt-inbox__field--to">
                                <div class="kt-inbox__label">
                                    To:
                                </div>
                                <div class="kt-inbox__input">
                                    <input type="text" name="compose_to" value="Chris Muller, Lina Nilson"></input>
                                </div>
                                <div class="kt-inbox__tools">
                                    <span class="kt-inbox__tool kt-inbox__tool--cc">Cc</span>
                                    <span class="kt-inbox__tool kt-inbox__tool--bcc">Bcc</span>
                                </div>
                            </div>
                            <div class="kt-inbox__field kt-inbox__field--cc">
                                <div class="kt-inbox__label">
                                    Cc:
                                </div>
                                <div class="kt-inbox__input">
                                    <input type="text" name="compose_cc"></input>
                                </div>
                                <div class="kt-inbox__tools">
                                    <button type="button" class="kt-inbox__icon kt-inbox__icon--delete kt-inbox__icon--sm kt-inbox__icon--light">
                                        <i class="flaticon2-cross"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="kt-inbox__field kt-inbox__field--bcc">
                                <div class="kt-inbox__label">
                                    Bcc:
                                </div>
                                <div class="kt-inbox__input">
                                    <input type="text" name="compose_bcc"></input>
                                </div>
                                <div class="kt-inbox__tools">
                                    <button type="button" class="kt-inbox__icon kt-inbox__icon--delete kt-inbox__icon--sm kt-inbox__icon--light">
                                        <i class="flaticon2-cross"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="kt-inbox__subject">
                        <input class="form-control" name="compose_subject" placeholder="Subject"></input>
                    </div>

                    <div class="kt-inbox__editor" id="kt_inbox_compose_editor" style="height: 300px">
                    </div>

                    <div class="kt-inbox__attachments">
                        <div class="dropzone dropzone-multi" id="kt_inbox_compose_attachments">
                            <div class="dropzone-items">
                                <div class="dropzone-item" style="display:none">
                                    <div class="dropzone-file">
                                        <div class="dropzone-filename" title="some_image_file_name.jpg">
                                            <span data-dz-name>some_image_file_name.jpg</span> <strong>(<span  data-dz-size>340kb</span>)</strong>
                                        </div>
                                        <div class="dropzone-error" data-dz-errormessage></div>
                                    </div>
                                    <div class="dropzone-progress">
                                        <div class="progress">
                                            <div class="progress-bar kt-bg-brand" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" data-dz-uploadprogress></div>
                                        </div>
                                    </div>
                                    <div class="dropzone-toolbar">
                                        <span class="dropzone-delete" data-dz-remove><i class="flaticon2-cross"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kt-inbox__foot">
                    <div class="kt-inbox__primary">
                        <div class="btn-group">
                            <button type="button" class="btn btn-brand btn-bold">
                                Send
                            </button>

                            <button type="button" class="btn btn-brand btn-bold dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            </button>

                            <div class="dropdown-menu dropup dropdown-menu-fit dropdown-menu-right">
                                <ul class="kt-nav">
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link">
                                            <i class="kt-nav__link-icon flaticon2-writing"></i>
                                            <span class="kt-nav__link-text">Schedule Send</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link">
                                            <i class="kt-nav__link-icon flaticon2-medical-records"></i>
                                            <span class="kt-nav__link-text">Save & archive</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link">
                                            <i class="kt-nav__link-icon flaticon2-hourglass-1"></i>
                                            <span class="kt-nav__link-text">Cancel</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="kt-inbox__panel">
                            <label class="kt-inbox__icon kt-inbox__icon--light" id="kt_inbox_compose_attachments_select">
                                <i class="flaticon2-clip-symbol"></i>
                            </label>
                            <label class="kt-inbox__icon kt-inbox__icon--light">
                                <i class="flaticon2-pin"></i>
                            </label>
                        </div>
                    </div>

                    <div class="kt-inbox__secondary">
                        <button class="kt-inbox__icon kt-inbox__icon--light" data-toggle="kt-tooltip" title="More actions">
                            <i class="flaticon2-settings"></i>
                        </button>
                        <button class="kt-inbox__icon kt-inbox__icon--remove kt-inbox__icon--light" data-toggle="kt-tooltip" title="Dismiss reply">
                            <i class="flaticon2-rubbish-bin-delete-button"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End:: Inbox Compose-->
