<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Housekey</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{ asset('assets/css/libs/swiper.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/libs/swiper.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/libs/material-components-web.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/skins/blue.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css')}}">
</head>

<body class="mdc-theme--background">
    <!-- animation -->
    <div class="spinner-wrapper" id="preloader">
        <div class="spinner-container">
            <div class="spinner-outer">
                <div class="spinner">
                    <div class="left mask">
                        <div class="plane"></div>
                    </div>
                    <div class="top mask">
                        <div class="plane"></div>
                    </div>
                    <div class="right mask">
                        <div class="plane"></div>
                    </div>
                    <div class="triangle">
                        <div class="triangle-plane"></div>
                    </div>
                    <div class="top-left mask">
                        <div class="plane"></div>
                    </div>
                    <div class="top-right mask">
                        <div class="plane"></div>
                    </div>
                </div>
                <p class="spinner-text">HouseKey</p>
            </div>
        </div>
    </div>
    <div class="options transition">
        <button id="options-toggle" class="mdc-button options-icon mdc-elevation--z0">
            <i class="material-icons m-0 palette">palette</i>
            <i class="material-icons m-0 close">close</i>
        </button>
        <div class="mdc-card column between-xs middle-xs">
            <div class="skin-primary blue" data-name="blue"></div>
            <div class="skin-primary green" data-name="green"></div>
            <div class="skin-primary red" data-name="red"></div>
            <div class="skin-primary pink" data-name="pink"></div>
            <div class="skin-primary purple" data-name="purple"></div>
            <div class="skin-primary grey" data-name="grey"></div>
            <div class="skin-primary orange-dark" data-name="orange-dark">
                <div class="skin-secondary"></div>
            </div>
        </div>
    </div>
        <!-- thanh tab bar -->
    <aside class="mdc-drawer mdc-drawer--modal sidenav">
        <div class="row end-xs middle-xs py-1 px-3">
            <button id="sidenav-close" class="mdc-icon-button material-icons warn-color">close</button>
        </div>
        <hr class="mdc-list-divider m-0">
        <div class="mdc-drawer__content">
            <div class="vertical-menu">
                <div class="mdc-menu-surface--anchor">
                    <a href="javascript:void(0);" class="mdc-button menu-item-has-children">
                        <span class="mdc-button__ripple"></span>
                        <span class="mdc-button__label">Home</span>
                    </a>
                    <div class="mdc-menu mdc-menu-surface">
                        <div class="mdc-list">
                            <div>
                                <a href="header-carousel.html" class="mdc-button">
                                    <span class="mdc-button__ripple"></span>
                                    <span class="mdc-button__label">Header carousel</span>
                                </a>
                            </div>
                            <div class="mdc-menu-surface--anchor">
                                <div>
                                    <a href="#" class="mdc-button menu-item-has-children">
                                        <span class="mdc-button__ripple"></span>
                                        <span class="mdc-button__label">Toolbar</span>
                                    </a>
                                </div>
                                <div class="mdc-menu mdc-menu-surface">
                                    <div class="mdc-list">
                                        <div>
                                            <a href="header-default.html" class="mdc-button">
                                                <span class="mdc-button__ripple"></span>
                                                <span class="mdc-button__label">Toolbar version 1</span>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="toolbar-2.html" class="mdc-button">
                                                <span class="mdc-button__ripple"></span>
                                                <span class="mdc-button__label">Toolbar version 2</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <a href="properties.html" class="mdc-button">
                        <span class="mdc-button__ripple"></span>
                        <span class="mdc-button__label">Properties</span>
                    </a>
                </div>
                <div class="mdc-menu-surface--anchor">
                    <a href="javascript:void(0);" class="mdc-button menu-item-has-children">
                        <span class="mdc-button__ripple"></span>
                        <span class="mdc-button__label">Pages</span>
                    </a>
                    <div class="mdc-menu mdc-menu-surface">
                        <div class="mdc-list">
                            <div>
                                <a href="property.html" class="mdc-button">
                                    <span class="mdc-button__ripple"></span>
                                    <span class="mdc-button__label">Single Property</span>
                                </a>
                            </div>
                            <div>
                                <a href="agents.html" class="mdc-button">
                                    <span class="mdc-button__ripple"></span>
                                    <span class="mdc-button__label">Agents</span>
                                </a>
                            </div>
                            <div>
                                <a href="agent.html" class="mdc-button">
                                    <span class="mdc-button__ripple"></span>
                                    <span class="mdc-button__label">Agent</span>
                                </a>
                            </div>
                            <div>
                                <a href="login.html" class="mdc-button">
                                    <span class="mdc-button__ripple"></span>
                                    <span class="mdc-button__label">Login</span>
                                </a>
                            </div>
                            <div>
                                <a href="register.html" class="mdc-button">
                                    <span class="mdc-button__ripple"></span>
                                    <span class="mdc-button__label">Register</span>
                                </a>
                            </div>
                            <div>
                                <a href="faqs.html" class="mdc-button">
                                    <span class="mdc-button__ripple"></span>
                                    <span class="mdc-button__label">FAQs</span>
                                </a>
                            </div>
                            <div>
                                <a href="pricing.html" class="mdc-button">
                                    <span class="mdc-button__ripple"></span>
                                    <span class="mdc-button__label">Pricing</span>
                                </a>
                            </div>
                            <div>
                                <a href="terms.html" class="mdc-button">
                                    <span class="mdc-button__ripple"></span>
                                    <span class="mdc-button__label">Terms & Conditions</span>
                                </a>
                            </div>
                            <div>
                                <a href="index.html" class="mdc-button">
                                    <span class="mdc-button__ripple"></span>
                                    <span class="mdc-button__label">Landing</span>
                                </a>
                            </div>
                            <div>
                                <a href="404.html" class="mdc-button">
                                    <span class="mdc-button__ripple"></span>
                                    <span class="mdc-button__label">404 Page</span>
                                </a>
                            </div>
                            <div class="mdc-menu-surface--anchor">
                                <a href="#" class="mdc-button menu-item-has-children">
                                    <span class="mdc-button__ripple"></span>
                                    <span class="mdc-button__label">Other</span>
                                </a>
                                <div class="mdc-menu mdc-menu-surface">
                                    <div class="mdc-list">
                                        <div>
                                            <a href="http://themeseason.com/" target="_blank" class="mdc-button">
                                                <span class="mdc-button__ripple"></span>
                                                <span class="mdc-button__label">External Link</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <a href="contact.html" class="mdc-button">
                        <span class="mdc-button__ripple"></span>
                        <span class="mdc-button__label">Contact</span>
                    </a>
                </div>
                <div>
                    <a href="about.html" class="mdc-button">
                        <span class="mdc-button__ripple"></span>
                        <span class="mdc-button__label">About us</span>
                    </a>
                </div>
            </div>
        </div>
        <hr class="mdc-list-divider m-0">
        <div class="row center-xs middle-xs py-3">
            <a href="https://www.facebook.com/" target="blank" class="social-icon">
                <svg class="material-icons mat-icon-xlg primary-color" viewBox="0 0 24 24">
                    <path
                        d="M5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3M18,5H15.5A3.5,3.5 0 0,0 12,8.5V11H10V14H12V21H15V14H18V11H15V9A1,1 0 0,1 16,8H18V5Z" />
                </svg>
            </a>
            <a href="https://twitter.com/" target="blank" class="social-icon">
                <svg class="material-icons mat-icon-xlg primary-color" viewBox="0 0 24 24">
                    <path
                        d="M5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3M17.71,9.33C18.19,8.93 18.75,8.45 19,7.92C18.59,8.13 18.1,8.26 17.56,8.33C18.06,7.97 18.47,7.5 18.68,6.86C18.16,7.14 17.63,7.38 16.97,7.5C15.42,5.63 11.71,7.15 12.37,9.95C9.76,9.79 8.17,8.61 6.85,7.16C6.1,8.38 6.75,10.23 7.64,10.74C7.18,10.71 6.83,10.57 6.5,10.41C6.54,11.95 7.39,12.69 8.58,13.09C8.22,13.16 7.82,13.18 7.44,13.12C7.81,14.19 8.58,14.86 9.9,15C9,15.76 7.34,16.29 6,16.08C7.15,16.81 8.46,17.39 10.28,17.31C14.69,17.11 17.64,13.95 17.71,9.33Z" />
                </svg>
            </a>
            <a href="https://www.linkedin.com/" target="blank" class="social-icon">
                <svg class="material-icons mat-icon-xlg primary-color" viewBox="0 0 24 24">
                    <path
                        d="M19,3A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3H19M18.5,18.5V13.2A3.26,3.26 0 0,0 15.24,9.94C14.39,9.94 13.4,10.46 12.92,11.24V10.13H10.13V18.5H12.92V13.57C12.92,12.8 13.54,12.17 14.31,12.17A1.4,1.4 0 0,1 15.71,13.57V18.5H18.5M6.88,8.56A1.68,1.68 0 0,0 8.56,6.88C8.56,5.95 7.81,5.19 6.88,5.19A1.69,1.69 0 0,0 5.19,6.88C5.19,7.81 5.95,8.56 6.88,8.56M8.27,18.5V10.13H5.5V18.5H8.27Z" />
                </svg>
            </a>
            <a href="https://plus.google.com/" target="blank" class="social-icon">
                <svg class="material-icons mat-icon-xlg primary-color" viewBox="0 0 24 24">
                    <path
                        d="M5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3M19.5,12H18V10.5H17V12H15.5V13H17V14.5H18V13H19.5V12M9.65,11.36V12.9H12.22C12.09,13.54 11.45,14.83 9.65,14.83C8.11,14.83 6.89,13.54 6.89,12C6.89,10.46 8.11,9.17 9.65,9.17C10.55,9.17 11.13,9.56 11.45,9.88L12.67,8.72C11.9,7.95 10.87,7.5 9.65,7.5C7.14,7.5 5.15,9.5 5.15,12C5.15,14.5 7.14,16.5 9.65,16.5C12.22,16.5 13.96,14.7 13.96,12.13C13.96,11.81 13.96,11.61 13.89,11.36H9.65Z" />
                </svg>
            </a>
        </div>
    </aside>

    <!-- header  -->
    <div class="mdc-drawer-scrim sidenav-scrim"></div>
    <header class="toolbar-1 has-bg-image">
        <div id="top-toolbar" class="mdc-top-app-bar">
            <div class="theme-container row between-xs middle-xs h-100">
                <div class="row start-xs middle-xs">
                    <button id="sidenav-toggle" class="mdc-button mdc-ripple-surface d-md-none d-lg-none d-xl-none">
                        <span class="mdc-button__ripple"></span>
                        <i class="material-icons">menu</i>
                    </button>
                    <div class="row start-xs middle-xs fw-500 d-none d-md-flex d-lg-flex d-xl-flex">
                        <span class="d-flex center-xs middle-xs item">
                            <i class="material-icons mat-icon-sm">call</i>
                            <span class="px-1">0961080094</span>
                        </span>
                        <span class="v-divider"></span>
                        <span class="d-flex center-xs middle-xs item">
                            <i class="material-icons mat-icon-sm">location_on</i>
                            <span class="px-1">Trịnh Văn Bô</span>
                        </span>
                        <span class="v-divider"></span>
                        <span class="d-flex center-xs middle-xs item">
                            <i class="material-icons mat-icon-sm">mail</i>
                            <span class="px-1">trieuthph18663@fpt.edu.vn</span>
                        </span>
                    </div>
                </div>
                <div class="row start-xs middle-xs d-none d-lg-flex d-xl-flex">
                    <a href="https://www.facebook.com/" target="blank" class="social-icon">
                        <svg class="material-icons" viewBox="0 0 24 24">
                            <path
                                d="M5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3M18,5H15.5A3.5,3.5 0 0,0 12,8.5V11H10V14H12V21H15V14H18V11H15V9A1,1 0 0,1 16,8H18V5Z" />
                        </svg>
                    </a>
                    <a href="https://twitter.com/" target="blank" class="social-icon">
                        <svg class="material-icons" viewBox="0 0 24 24">
                            <path
                                d="M5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3M17.71,9.33C18.19,8.93 18.75,8.45 19,7.92C18.59,8.13 18.1,8.26 17.56,8.33C18.06,7.97 18.47,7.5 18.68,6.86C18.16,7.14 17.63,7.38 16.97,7.5C15.42,5.63 11.71,7.15 12.37,9.95C9.76,9.79 8.17,8.61 6.85,7.16C6.1,8.38 6.75,10.23 7.64,10.74C7.18,10.71 6.83,10.57 6.5,10.41C6.54,11.95 7.39,12.69 8.58,13.09C8.22,13.16 7.82,13.18 7.44,13.12C7.81,14.19 8.58,14.86 9.9,15C9,15.76 7.34,16.29 6,16.08C7.15,16.81 8.46,17.39 10.28,17.31C14.69,17.11 17.64,13.95 17.71,9.33Z" />
                        </svg>
                    </a>
                    <a href="https://www.linkedin.com/" target="blank" class="social-icon">
                        <svg class="material-icons" viewBox="0 0 24 24">
                            <path
                                d="M19,3A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3H19M18.5,18.5V13.2A3.26,3.26 0 0,0 15.24,9.94C14.39,9.94 13.4,10.46 12.92,11.24V10.13H10.13V18.5H12.92V13.57C12.92,12.8 13.54,12.17 14.31,12.17A1.4,1.4 0 0,1 15.71,13.57V18.5H18.5M6.88,8.56A1.68,1.68 0 0,0 8.56,6.88C8.56,5.95 7.81,5.19 6.88,5.19A1.69,1.69 0 0,0 5.19,6.88C5.19,7.81 5.95,8.56 6.88,8.56M8.27,18.5V10.13H5.5V18.5H8.27Z" />
                        </svg>
                    </a>
                    <a href="https://plus.google.com/" target="blank" class="social-icon">
                        <svg class="material-icons" viewBox="0 0 24 24">
                            <path
                                d="M5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3M19.5,12H18V10.5H17V12H15.5V13H17V14.5H18V13H19.5V12M9.65,11.36V12.9H12.22C12.09,13.54 11.45,14.83 9.65,14.83C8.11,14.83 6.89,13.54 6.89,12C6.89,10.46 8.11,9.17 9.65,9.17C10.55,9.17 11.13,9.56 11.45,9.88L12.67,8.72C11.9,7.95 10.87,7.5 9.65,7.5C7.14,7.5 5.15,9.5 5.15,12C5.15,14.5 7.14,16.5 9.65,16.5C12.22,16.5 13.96,14.7 13.96,12.13C13.96,11.81 13.96,11.61 13.89,11.36H9.65Z" />
                        </svg>
                    </a>
                </div>
                <div class="row end-xs middle-xs">
                    <div class="mdc-menu-surface--anchor">
                        <button class="mdc-button mdc-ripple-surface mutable">
                            <span class="mdc-button__ripple"></span>
                            <span class="mdc-button__label"><span class="mutable">vnd</span></span>
                            <i class="material-icons mdc-button__icon m-0">arrow_drop_down</i>
                        </button>
                        <div class="mdc-menu mdc-menu-surface">
                            <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical"
                                tabindex="-1">
                                <li class="mdc-list-item" role="menuitem">
                                    <span class="mdc-list-item__text">usd</span>
                                </li>
                                <li class="mdc-list-item" role="menuitem">
                                    <span class="mdc-list-item__text">eur</span>
                                </li>
                                <li class="mdc-list-item" role="menuitem">
                                    <span class="mdc-list-item__text">vnd</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="mdc-menu-surface--anchor">
                        <button class="mdc-button mdc-ripple-surface mutable">
                            <span class="mdc-button__ripple"></span>
                            <img src="assets/images/flags/vm-flag.gif" alt="" width="18">
                            <span class="mdc-button__label flag-name d-none d-lg-flex d-xl-flex"><span
                                    class="mutable">VietNam</span></span>
                            <i class="material-icons mdc-button__icon m-0">arrow_drop_down</i>
                        </button>
                        <div class="mdc-menu mdc-menu-surface">
                            <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical"
                                tabindex="-1">
                                <li class="mdc-list-item" role="menuitem">
                                    <img src="assets/images/flags/vm-flag.gif" alt="" width="18" class="mdc-elevation--z1">
                                    <span class="mdc-list-item__text flag-name">VietNam</span>
                                </li>
                                <li class="mdc-list-item" role="menuitem">
                                    <img src="assets/images/flags/de.svg" alt="" width="18" class="mdc-elevation--z1">
                                    <span class="mdc-list-item__text flag-name">German</span>
                                </li>
                                <li class="mdc-list-item" role="menuitem">
                                    <img src="assets/images/flags/fr.svg" alt="" width="18" class="mdc-elevation--z1">
                                    <span class="mdc-list-item__text flag-name">French</span>
                                </li>
                                <li class="mdc-list-item" role="menuitem">
                                    <img src="assets/images/flags/ru.svg" alt="" width="18" class="mdc-elevation--z1">
                                    <span class="mdc-list-item__text flag-name">Russian</span>
                                </li>
                                <li class="mdc-list-item" role="menuitem">
                                    <img src="assets/images/flags/gb.svg" alt="" width="18" class="mdc-elevation--z1">
                                    <span class="mdc-list-item__text flag-name">English</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="mdc-menu-surface--anchor">
                        <button class="mdc-button mdc-ripple-surface">
                            <span class="mdc-button__ripple"></span>
                            <i class="material-icons mdc-button__icon mx-1">person</i>
                            <span class="mdc-button__label">account</span>
                            <i class="material-icons mdc-button__icon m-0">arrow_drop_down</i>
                        </button>
                        <div class="mdc-menu mdc-menu-surface user-menu">
                            <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical"
                                tabindex="-1">
                                <li class="user-info row start-xs middle-xs">
                                    <img src="assets/images/others/user.jpg" alt="user-image" width="50">
                                    <p class="m-0">Emilio Verdines <br> <small><i>emilio_v</i></small></p>
                                </li>
                                <li role="separator" class="mdc-list-divider m-0"></li>
                                <li>
                                    <a href="submit-property.html" class="mdc-list-item" role="menuitem">
                                        <i class="material-icons mat-icon-sm text-muted">add_circle</i>
                                        <span class="mdc-list-item__text px-3">Submit Property</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="my-properties.html" class="mdc-list-item" role="menuitem">
                                        <i class="material-icons mat-icon-sm text-muted">home</i>
                                        <span class="mdc-list-item__text px-3">My Properties</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="favorites.html" class="mdc-list-item" role="menuitem">
                                        <i class="material-icons mat-icon-sm text-muted">favorite_border</i>
                                        <span class="mdc-list-item__text px-3">Favorites
                                            <span class="badge warn">2</span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="compare.html" class="mdc-list-item" role="menuitem">
                                        <i class="material-icons mat-icon-sm text-muted">compare_arrows</i>
                                        <span class="mdc-list-item__text px-3">Compare
                                            <span class="badge primary">3</span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="mdc-list-item" role="menuitem">
                                        <i class="material-icons mat-icon-sm text-muted">search</i>
                                        <span class="mdc-list-item__text px-3">Saved Searches</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="profile.html" class="mdc-list-item" role="menuitem">
                                        <i class="material-icons mat-icon-sm text-muted">edit</i>
                                        <span class="mdc-list-item__text px-3">Edit Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="lock-screen.html" class="mdc-list-item" role="menuitem">
                                        <i class="material-icons mat-icon-sm text-muted">lock</i>
                                        <span class="mdc-list-item__text px-3">Lock screen</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="faqs.html" class="mdc-list-item" role="menuitem">
                                        <i class="material-icons mat-icon-sm text-muted">help</i>
                                        <span class="mdc-list-item__text px-3">Help</span>
                                    </a>
                                </li>
                                <li role="separator" class="mdc-list-divider m-0"></li>
                                <li>
                                    <a href="login.html" class="mdc-list-item" role="menuitem">
                                        <i class="material-icons mat-icon-sm text-muted">power_settings_new</i>
                                        <span class="mdc-list-item__text px-3">Sign Out</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="main-toolbar" class="mdc-elevation--z2">
            <div class="theme-container row between-xs middle-xs h-100">
                <a class="logo" href="index.html">
                    <svg xmlns="http://www.w3.org/2000/svg" style="fill-rule:evenodd;" width="212" height="37"
                        viewBox="0 0 4271.87 748.74">
                        <path
                            d="M771 322.2l686.37 0c6.63,0 12.05,5.43 12.05,12.06l0 0c0,6.63 -5.42,12.06 -12.05,12.06l-686.37 -0.01c-6.63,0.01 -12.06,-5.42 -12.06,-12.05l0 0c0,-6.63 5.43,-12.06 12.06,-12.06zm943.37 263.22c0,-6.24 -5.13,-11.37 -11.37,-11.37 -6.24,0 -11.37,5.13 -11.37,11.37l0 99.19c0,6.24 5.13,11.37 11.37,11.37 6.24,0 11.37,-5.13 11.37,-11.37l0 -49.48c0,-21.4 16.94,-38.34 38.34,-38.34 5.35,0 10.26,0.89 14.71,2.67 2.01,0.89 3.57,1.34 4.9,1.34 6.24,0 11.37,-5.13 11.37,-11.59 0,-12.26 -18.27,-15.16 -30.98,-15.16 -14.48,0 -27.41,4.68 -38.34,13.6l0 -2.23zm106.54 38.34c4.68,-16.05 20.06,-26.97 36.55,-26.97 16.72,0 32.1,10.92 36.78,26.97l-73.33 0zm68.43 37.89c-2.9,0.22 -5.35,1.12 -7.58,2.9 -6.91,5.57 -14.49,8.69 -24.3,8.69 -16.72,0 -31.87,-10.92 -36.55,-26.97l86.26 0c6.24,0 11.37,-4.68 11.37,-11.14 0,-16.94 -6.02,-31.43 -17.83,-43.24 -12.04,-11.81 -26.53,-17.83 -43.24,-17.83 -16.72,0 -31.21,6.02 -43.01,17.83 -11.81,11.81 -17.83,26.3 -17.83,43.24 0,16.72 6.02,31.21 17.83,43.01 11.81,11.81 26.3,17.83 43.01,17.83 15.38,0 28.75,-4.9 39.9,-14.71 2.23,-2.45 3.34,-5.13 3.34,-8.25 0,-6.47 -4.9,-11.37 -11.37,-11.37zm107.44 -64.86c21.4,0 38.34,17.39 38.34,38.34 0,20.73 -16.94,38.11 -38.34,38.11 -21.17,0 -38.11,-17.39 -38.11,-38.11 0,-20.95 16.94,-38.34 38.11,-38.34zm38.34 87.82c0,6.24 5.13,11.37 11.37,11.37 6.24,0 11.37,-5.13 11.37,-11.37l0 -49.48c0,-16.94 -6.02,-31.43 -17.83,-43.24 -12.04,-11.81 -26.53,-17.83 -43.24,-17.83 -16.72,0 -31.21,6.02 -43.01,17.83 -11.81,11.81 -17.83,26.3 -17.83,43.24 0,16.72 6.02,31.21 17.83,43.01 11.81,11.81 26.3,17.83 43.01,17.83 14.49,0 27.42,-4.68 38.34,-13.6l0 2.23zm39.01 0c0,6.24 4.91,11.37 11.14,11.37l16.72 0c6.24,0 11.37,-5.13 11.37,-11.37 0,-6.24 -5.13,-11.37 -11.37,-11.37l-5.13 0 0 -139.98c0,-6.24 -4.9,-11.37 -11.37,-11.37 -6.46,0 -11.37,5.13 -11.37,11.37l0 151.34zm142.88 -60.85c4.68,-16.05 20.06,-26.97 36.55,-26.97 16.72,0 32.1,10.92 36.78,26.97l-73.33 0zm68.43 37.89c-2.9,0.22 -5.35,1.12 -7.58,2.9 -6.91,5.57 -14.49,8.69 -24.3,8.69 -16.72,0 -31.87,-10.92 -36.55,-26.97l86.26 0c6.24,0 11.37,-4.68 11.37,-11.14 0,-16.94 -6.02,-31.43 -17.83,-43.24 -12.04,-11.81 -26.53,-17.83 -43.24,-17.83 -16.72,0 -31.21,6.02 -43.01,17.83 -11.81,11.81 -17.83,26.3 -17.83,43.24 0,16.72 6.02,31.21 17.83,43.01 11.81,11.81 26.3,17.83 43.01,17.83 15.38,0 28.75,-4.9 39.9,-14.71 2.23,-2.45 3.34,-5.13 3.34,-8.25 0,-6.47 -4.9,-11.37 -11.37,-11.37zm119.7 -6.91c2,0.66 2.9,2.23 2.9,4.23 0,1.78 -0.45,3.34 -1.56,4.46 -6.47,6.46 -14.71,9.8 -25.19,9.8 -10.7,0 -19.61,-3.79 -26.97,-11.14 -2.9,-2.67 -6.02,-6.24 -10.7,-6.24 -6.47,0 -11.37,4.9 -11.37,11.37 0,2.67 0.89,5.13 2.45,7.14 12.7,14.49 28.31,21.62 46.58,21.62 23.85,0 49.49,-14.04 49.49,-36.11 0,-7.58 -2.67,-14.04 -8.25,-19.61l0.22 0c-2.45,-2.67 -7.36,-5.35 -14.49,-8.25l-50.82 -16.72c-2,-0.67 -2.9,-2.01 -2.9,-4.01 0,-2 0.67,-3.79 1.78,-4.9 6.24,-6.47 14.49,-9.59 24.96,-9.59 10.7,0 19.62,3.79 26.97,11.14 3.34,2.9 6.24,6.24 10.7,6.24 6.47,0 11.37,-4.9 11.37,-11.37 0,-2.67 -0.67,-4.9 -2.23,-6.91 -13.15,-14.48 -28.75,-21.84 -46.81,-21.84 -23.85,0 -49.48,14.04 -49.48,36.11 0,7.58 2.67,14.27 8.25,19.84l-0.22 0c2.9,2.67 7.58,5.35 14.49,8.03l50.82 16.72zm53.05 -80.69c-6.24,0 -11.14,5.13 -11.14,11.37 0,6.24 4.9,11.37 11.14,11.37l5.13 0 0 54.83c0,29.64 14.94,44.35 44.58,44.35 6.24,0 11.14,-5.13 11.14,-11.37 0,-6.24 -4.91,-11.37 -11.14,-11.37 -14.49,0 -21.85,-7.13 -21.85,-21.62l0 -54.83 13.6 0c6.24,0 11.14,-5.13 11.14,-11.37 0,-6.24 -4.9,-11.37 -11.14,-11.37l-13.6 0 0 -40.79c0,-6.24 -5.13,-11.37 -11.37,-11.37 -6.24,0 -11.37,5.13 -11.37,11.37l0 40.79 -5.13 0zm124.15 22.74c21.4,0 38.34,17.39 38.34,38.34 0,20.73 -16.94,38.11 -38.34,38.11 -21.17,0 -38.11,-17.39 -38.11,-38.11 0,-20.95 16.94,-38.34 38.11,-38.34zm38.34 87.82c0,6.24 5.13,11.37 11.37,11.37 6.24,0 11.37,-5.13 11.37,-11.37l0 -49.48c0,-16.94 -6.02,-31.43 -17.83,-43.24 -12.04,-11.81 -26.53,-17.83 -43.24,-17.83 -16.72,0 -31.21,6.02 -43.01,17.83 -11.81,11.81 -17.83,26.3 -17.83,43.24 0,16.72 6.02,31.21 17.83,43.01 11.81,11.81 26.3,17.83 43.01,17.83 14.49,0 27.42,-4.68 38.34,-13.6l0 2.23zm50.82 -110.56c-6.24,0 -11.14,5.13 -11.14,11.37 0,6.24 4.9,11.37 11.14,11.37l5.13 0 0 54.83c0,29.64 14.94,44.35 44.58,44.35 6.24,0 11.14,-5.13 11.14,-11.37 0,-6.24 -4.91,-11.37 -11.14,-11.37 -14.49,0 -21.85,-7.13 -21.85,-21.62l0 -54.83 13.6 0c6.24,0 11.14,-5.13 11.14,-11.37 0,-6.24 -4.9,-11.37 -11.14,-11.37l-13.6 0 0 -40.79c0,-6.24 -5.13,-11.37 -11.37,-11.37 -6.24,0 -11.37,5.13 -11.37,11.37l0 40.79 -5.13 0zm87.6 49.71c4.68,-16.05 20.06,-26.97 36.55,-26.97 16.72,0 32.1,10.92 36.78,26.97l-73.33 0zm68.43 37.89c-2.9,0.22 -5.35,1.12 -7.58,2.9 -6.91,5.57 -14.49,8.69 -24.3,8.69 -16.72,0 -31.87,-10.92 -36.55,-26.97l86.26 0c6.24,0 11.37,-4.68 11.37,-11.14 0,-16.94 -6.02,-31.43 -17.83,-43.24 -12.04,-11.81 -26.53,-17.83 -43.24,-17.83 -16.72,0 -31.21,6.02 -43.01,17.83 -11.81,11.81 -17.83,26.3 -17.83,43.24 0,16.72 6.02,31.21 17.83,43.01 11.81,11.81 26.3,17.83 43.01,17.83 15.38,0 28.75,-4.9 39.9,-14.71 2.23,-2.45 3.34,-5.13 3.34,-8.25 0,-6.47 -4.9,-11.37 -11.37,-11.37zm204.62 -0.22c-2.67,0.22 -5.13,0.89 -7.13,2.45 -7.36,6.24 -15.16,9.36 -24.75,9.36 -21.4,0 -38.34,-17.16 -38.34,-38.11 0,-21.4 16.94,-38.34 38.34,-38.34 9.59,0 17.39,3.34 24.75,9.59 2.23,1.56 4.68,2.45 7.58,2.45 6.47,0 11.14,-4.9 11.14,-11.37 0,-3.34 -1.34,-6.24 -3.79,-8.47 -11.14,-10.03 -24.29,-14.94 -39.68,-14.94 -16.94,0 -31.43,6.02 -43.24,17.83 -11.81,11.81 -17.83,26.3 -17.83,43.24 0,16.72 6.02,31.21 17.83,43.01 11.81,11.81 26.3,17.83 43.24,17.83 15.16,0 28.31,-4.9 39.68,-14.71 2.45,-2.45 3.57,-5.35 3.57,-8.47 0,-6.46 -4.9,-11.37 -11.37,-11.37zm151.13 -26.3c-0.22,-16.94 -6.02,-31.43 -17.83,-43.24 -12.04,-11.81 -26.53,-17.83 -43.24,-17.83 -16.72,0 -31.21,6.02 -43.01,17.83 -11.81,11.81 -17.83,26.3 -17.83,43.24 0,16.72 6.02,31.21 17.83,43.01 11.81,11.81 26.3,17.83 43.01,17.83 16.72,0 31.21,-6.02 43.24,-17.83 11.81,-11.81 17.83,-26.07 17.83,-43.01zm-61.08 -38.34c21.4,0 38.34,17.39 38.34,38.34 0,20.73 -16.94,38.11 -38.34,38.11 -21.17,0 -38.11,-17.39 -38.11,-38.11 0,-20.95 16.94,-38.34 38.11,-38.34zm250.54 25.86c0,-26.53 -22.07,-48.59 -48.59,-48.59 -14.49,0 -26.97,5.8 -37,17.39 -9.58,-11.59 -22.74,-17.39 -37.22,-17.39 -10.03,0 -18.72,2.67 -26.52,7.8 -1.56,-4.68 -5.57,-7.8 -10.7,-7.8 -6.24,0 -11.37,5.13 -11.37,11.37l0 99.19c0,6.24 5.13,11.37 11.37,11.37 6.24,0 11.37,-5.13 11.37,-11.37l0 -61.96c0,-14.27 11.59,-25.86 25.85,-25.86 14.27,0 25.63,11.81 25.63,25.86l0 61.96c0,6.24 5.13,11.37 11.59,11.37 6.24,0 11.37,-5.13 11.37,-11.37l0 -61.96c0,-14.04 11.37,-25.86 25.63,-25.86 14.71,0 25.86,11.81 25.86,25.86l0 61.96c0,6.24 5.13,11.37 11.37,11.37 6.24,0 11.37,-5.13 11.37,-11.37l0 -61.96zm42.13 12.48c0,-20.95 16.94,-38.34 38.11,-38.34 21.4,0 38.34,17.39 38.34,38.34 0,20.73 -16.94,38.11 -38.34,38.11 -21.17,0 -38.11,-17.39 -38.11,-38.11zm38.11 60.85c16.94,0 30.98,-6.02 43.24,-17.83 11.81,-11.81 17.83,-26.07 17.83,-43.01 0,-16.94 -6.02,-31.43 -17.83,-43.24 -12.04,-11.81 -26.53,-17.83 -43.24,-17.83 -16.72,0 -31.21,6.02 -43.01,17.83 -11.81,11.81 -17.83,26.3 -17.83,43.24l0 101.86c0,6.47 4.9,11.15 11.37,11.15 6.24,0 11.37,-4.68 11.37,-11.15l0 -54.38c10.92,8.92 23.62,13.37 38.11,13.37zm139.31 -99.19c21.4,0 38.34,17.39 38.34,38.34 0,20.73 -16.94,38.11 -38.34,38.11 -21.17,0 -38.11,-17.39 -38.11,-38.11 0,-20.95 16.94,-38.34 38.11,-38.34zm38.34 87.82c0,6.24 5.13,11.37 11.37,11.37 6.24,0 11.37,-5.13 11.37,-11.37l0 -49.48c0,-16.94 -6.02,-31.43 -17.83,-43.24 -12.04,-11.81 -26.53,-17.83 -43.24,-17.83 -16.72,0 -31.21,6.02 -43.01,17.83 -11.81,11.81 -17.83,26.3 -17.83,43.24 0,16.72 6.02,31.21 17.83,43.01 11.81,11.81 26.3,17.83 43.01,17.83 14.49,0 27.42,-4.68 38.34,-13.6l0 2.23zm62.86 -99.41c0,-6.02 -5.13,-11.14 -11.37,-11.14 -6.47,0 -11.37,5.13 -11.37,11.37l0 99.19c0,6.24 4.9,11.37 11.37,11.37 6.24,0 11.37,-5.13 11.37,-11.37l0 -53.72c0,-18.72 15.38,-34.1 33.88,-34.1 18.72,0 34.1,15.61 34.1,34.1l0 53.72c0,6.24 5.13,11.37 11.59,11.37 6.24,0 11.14,-5.13 11.14,-11.37l0 -53.72c0,-31.43 -26.08,-56.84 -56.84,-56.84 -12.93,0 -24.3,3.79 -33.88,11.14zm128.17 146.67c-0.67,1.56 -1.12,3.12 -1.12,4.91 0,6.46 4.9,11.37 11.37,11.37 4.68,0 8.92,-3.12 10.92,-7.58l62.41 -150.01c0.89,-1.78 1.34,-3.56 1.34,-5.13 0,-6.24 -5.13,-11.37 -11.59,-11.37 -6.02,0 -8.92,2.9 -10.48,7.36l-30.76 73.11 -30.54 -72.89c-2,-5.13 -6.24,-7.58 -10.7,-7.58 -6.24,0 -11.37,5.13 -11.37,11.37 0,1.79 0.45,3.57 1.12,5.13l39.23 94.06 -19.84 47.25zm-1879.08 -645.92c2.96,-5.54 7.94,-9.42 14.96,-11.63 7.02,-2.22 15.88,-3.33 26.59,-3.33 10.71,0 19.21,0.93 25.48,2.77 6.28,1.85 11.08,4.06 14.4,6.65 3.33,2.59 5.91,6.27 7.76,11.08 1.85,6.27 2.77,15.88 2.77,28.81l0 307.43c0,8.49 -0.28,14.86 -0.83,19.11 -0.56,4.24 -2.31,9.14 -5.26,14.69 -5.17,9.96 -19.57,14.95 -43.21,14.95 -25.85,0 -40.99,-6.83 -45.42,-20.49 -2.22,-6.28 -3.32,-15.88 -3.32,-28.8l0 -112.45 -146.8 0 0 113c0,8.49 -0.28,14.86 -0.83,19.11 -0.55,4.24 -2.3,9.14 -5.26,14.69 -5.17,9.96 -19.57,14.95 -43.21,14.95 -25.85,0 -40.99,-6.83 -45.42,-20.49 -2.22,-6.28 -3.32,-15.88 -3.32,-28.8l0 -307.44c0,-8.49 0.28,-14.86 0.83,-19.11 0.56,-4.25 2.31,-9.14 5.26,-14.68 5.17,-9.97 19.58,-14.96 43.21,-14.96 25.85,0 41.17,6.84 45.98,20.5 1.85,6.27 2.77,15.88 2.77,28.81l0 113 146.8 0 0 -113.56c0,-8.49 0.27,-14.86 0.83,-19.11 0.56,-4.25 2.31,-9.14 5.26,-14.68zm127.96 245.39c0,-44.32 15.51,-80.87 46.53,-109.68 31.02,-28.8 66.46,-43.21 106.35,-43.21 39.89,0 75.16,14.31 105.8,42.94 30.66,28.61 45.98,65.07 45.98,109.39 0,30.65 -7.94,57.88 -23.82,81.7 -15.88,23.82 -35.17,41.36 -57.89,52.63 -22.7,11.26 -46.25,16.89 -70.62,16.89 -24.38,0 -48.02,-6 -70.91,-18.01 -22.89,-12 -42.19,-29.72 -57.88,-53.17 -15.69,-23.45 -23.54,-49.94 -23.54,-79.49zm115.78 39.6c11.81,9.05 23.82,13.57 36,13.57 12.19,0 24.38,-4.62 36.56,-13.85 12.18,-9.23 18.28,-22.89 18.28,-40.99 0,-18.09 -5.72,-31.58 -17.17,-40.44 -11.44,-8.86 -23.81,-13.3 -37.11,-13.3 -13.3,0 -25.67,4.62 -37.12,13.85 -11.45,9.23 -17.17,22.8 -17.17,40.71 0,17.92 5.91,31.39 17.72,40.44zm354.52 104.97c-37.3,0 -68.22,-14.13 -92.78,-42.38 -24.55,-28.25 -36.83,-62.69 -36.83,-103.31l0 -96.94c0,-8.86 0.28,-15.33 0.83,-19.39 0.56,-4.06 2.11,-8.86 4.72,-14.4 5.17,-9.97 19.56,-14.95 43.2,-14.95 25.85,0 40.99,7.02 45.42,21.05 2.22,5.91 3.32,15.33 3.32,28.25l0 96.94c0,15.14 4.34,26.96 13.02,35.45 8.68,8.49 20.31,12.74 34.9,12.74 14.59,0 26.41,-4.43 35.45,-13.3 9.05,-8.86 13.57,-20.49 13.57,-34.89l0 -98.05c0,-8.49 0.28,-14.86 0.83,-19.1 0.55,-4.24 2.3,-9.14 5.26,-14.68 4.8,-9.6 19.02,-14.4 42.65,-14.4 23.27,0 37.49,4.98 42.66,14.95 2.59,5.54 4.16,10.44 4.71,14.68 0.56,4.24 0.83,10.62 0.83,19.11l0 196.1c0,8.12 -0.28,14.3 -0.83,18.55 -0.55,4.25 -2.3,8.95 -5.26,14.12 -5.55,9.6 -19.76,14.4 -42.65,14.4 -22.53,0 -36.37,-4.43 -41.55,-13.29 -3.69,-6.28 -5.53,-13.85 -5.53,-22.71 -1.48,2.59 -4.8,6.28 -9.98,11.08 -5.16,4.8 -10.14,8.86 -14.95,12.18 -12.56,8.13 -26.22,12.19 -40.99,12.19zm208.28 -24.93c-7.02,-4.43 -10.52,-11.44 -10.52,-21.05 0,-9.6 7.02,-24.19 21.05,-43.76 4.06,-6.28 10.62,-9.42 19.66,-9.42 9.05,0 21.32,4.53 36.84,13.57 15.51,9.05 29.54,13.57 42.1,13.57 22.52,0 33.79,-4.43 33.79,-13.3 0,-7.02 -12.37,-12.18 -37.11,-15.51 -23.27,-3.32 -46.35,-12 -69.24,-26.04 -10.73,-6.65 -19.58,-17.08 -26.59,-31.3 -7.02,-14.22 -10.52,-31.11 -10.52,-50.68 0,-58.34 40.07,-87.52 120.2,-87.52 26.22,0 53.18,6.28 80.88,18.84 12.92,5.91 19.39,13.3 19.39,22.16 0,8.86 -4.06,19.76 -12.18,32.68 -8.13,12.93 -16.43,19.39 -24.93,19.39 -4.43,0 -12.65,-2.77 -24.65,-8.31 -12.01,-5.54 -25.02,-8.31 -39.05,-8.31 -21.78,0 -32.68,4.06 -32.68,12.19 0,11.08 12.56,18.27 37.67,21.6 24.36,2.58 48,9.6 70.9,21.05 10.71,5.17 19.66,14.12 26.86,26.87 7.2,12.74 10.8,28.71 10.8,47.91 0,19.21 -3.6,35.55 -10.8,49.02 -7.2,13.48 -17.27,23.54 -30.19,30.19 -23.63,11.44 -53.26,17.17 -88.91,17.17 -35.63,0 -69.88,-10.34 -102.76,-31.02zm550.06 -154.82c0,22.71 -5.63,39.52 -16.89,50.41 -11.27,10.89 -23.73,16.34 -37.39,16.34l-131.28 0c0,10.34 6.1,19.02 18.28,26.04 12.19,7.02 24.38,10.53 36.56,10.53 21.42,0 38.22,-2.22 50.41,-6.65l6.1 -2.22c8.86,-4.06 16.25,-6.09 22.16,-6.09 11.81,0 21.97,8.31 30.46,24.93 4.8,9.97 7.2,18.47 7.2,25.48 0,32.86 -39.33,49.29 -117.99,49.29 -27.32,0 -51.61,-4.7 -72.84,-14.11 -21.23,-9.42 -37.76,-21.89 -49.58,-37.39 -23.26,-29.91 -34.9,-63.33 -34.9,-100.26 0,-46.53 15.05,-83.74 45.15,-111.61 30.09,-27.88 67.67,-41.82 112.73,-41.82 51.33,0 89,18.09 113,54.28 12.56,19.2 18.83,40.16 18.83,62.87zm-116.88 16.34c14.03,0 21.05,-5.9 21.05,-17.72 0,-8.49 -3.23,-15.33 -9.7,-20.5 -6.46,-5.17 -15.69,-7.75 -27.69,-7.75 -12.01,0 -23.91,4.89 -35.73,14.67 -11.81,9.79 -17.72,20.22 -17.72,31.3l69.8 0zm326.82 -39.33c56.5,54.28 96.57,95.09 120.2,122.42 12.19,13.66 18.27,25.2 18.27,34.62 0,9.42 -7.38,20.49 -22.14,33.23 -14.78,12.74 -26.88,19.11 -36.29,19.11 -9.41,0 -20.77,-7.76 -34.07,-23.26l-121.87 -139.04 0 108.01c0,8.87 -0.28,15.33 -0.83,19.39 -0.55,4.06 -2.3,8.86 -5.26,14.4 -5.17,9.97 -19.57,14.96 -43.21,14.96 -25.85,0 -40.99,-7.02 -45.42,-21.05 -2.22,-5.91 -3.32,-15.32 -3.32,-28.25l0 -307.99c0,-8.49 0.28,-14.86 0.83,-19.11 0.56,-4.25 2.31,-9.14 5.26,-14.68 5.17,-9.97 19.58,-14.96 43.21,-14.96 25.85,0 41.17,6.84 45.98,20.5 1.85,6.27 2.77,15.88 2.77,28.81l0 105.8c50.22,-56.5 90.84,-102.85 121.87,-139.04 12.93,-15.14 24.19,-22.71 33.8,-22.71 9.59,0 21.78,6.37 36.56,19.11 14.76,12.75 22.14,23.82 22.14,33.24 0,9.42 -5.53,20.58 -16.61,33.51 -21.42,24.75 -54.66,58.72 -99.71,101.92l-22.16 21.05zm439.28 22.99c0,22.71 -5.64,39.52 -16.9,50.41 -11.26,10.89 -23.73,16.34 -37.39,16.34l-131.28 0c0,10.34 6.1,19.02 18.28,26.04 12.19,7.02 24.38,10.53 36.56,10.53 21.42,0 38.22,-2.22 50.41,-6.65l6.1 -2.22c8.86,-4.06 16.25,-6.09 22.16,-6.09 11.81,0 21.97,8.31 30.46,24.93 4.8,9.97 7.2,18.47 7.2,25.48 0,32.86 -39.33,49.29 -117.99,49.29 -27.33,0 -51.61,-4.7 -72.84,-14.11 -21.23,-9.42 -37.76,-21.89 -49.58,-37.39 -23.26,-29.91 -34.9,-63.33 -34.9,-100.26 0,-46.53 15.05,-83.74 45.15,-111.61 30.09,-27.88 67.67,-41.82 112.73,-41.82 51.33,0 89,18.09 113.01,54.28 12.55,19.2 18.83,40.16 18.83,62.87zm-116.89 16.34c14.04,0 21.05,-5.9 21.05,-17.72 0,-8.49 -3.23,-15.33 -9.69,-20.5 -6.47,-5.17 -15.7,-7.75 -27.7,-7.75 -12.01,0 -23.91,4.89 -35.73,14.67 -11.81,9.79 -17.72,20.22 -17.72,31.3l69.79 0zm407.7 -124.08c21.79,9.6 32.68,21.24 32.68,34.9 0,6.65 -1.48,12.93 -4.43,18.84 -2.95,5.91 -4.43,9.05 -4.43,9.42l-145.13 324.61c-2.95,7.02 -5.45,12.37 -7.47,16.06 -2.03,3.69 -5.27,7.2 -9.7,10.52 -4.43,3.32 -9.97,4.98 -16.62,4.98 -6.65,0 -16.43,-2.77 -29.36,-8.31 -21.79,-9.6 -32.68,-21.05 -32.68,-34.34 0,-8.86 17.72,-51.14 53.18,-126.85l-110.24 -185.57c-7.39,-12.18 -11.08,-21.23 -11.08,-27.14 0,-11.81 9.97,-23.63 29.91,-35.45 12.56,-7.38 22.34,-11.07 29.36,-11.07 7.02,0 12.74,1.48 17.17,4.42 4.43,2.97 7.66,6.01 9.7,9.15 2.03,3.14 12.18,20.31 30.46,51.52 18.28,31.21 35.74,60.29 52.35,87.24 1.85,-5.91 11.81,-28.71 29.91,-68.41 18.09,-39.7 27.79,-60.84 29.08,-63.42 1.3,-2.58 3.42,-5.72 6.37,-9.42 4.8,-6.27 11.54,-9.41 20.22,-9.41 8.68,0 18.92,2.58 30.74,7.75zm-3864.81 -188.42c18.31,0 36.3,1.34 53.9,3.88 137.39,19.23 263.51,113 306.81,268.23 6.2,22.24 10.3,16.14 67.08,16.14l674.24 -0.04c44.88,-0.01 36.67,-0.15 64.31,20.75 14.45,10.92 89.93,65.51 93.38,76.11 -5.51,9.1 -41.5,34.9 -52.11,42.89 -17.88,13.45 -35.29,27.66 -53.2,40.89 -22.51,14.76 -20.99,11.63 -64.38,11.84 -18.57,0.09 -44.81,2.95 -55.64,-8.38 -27.59,-39.7 -54.87,-61.08 -86.12,-61 -43.13,0.11 -49.91,71.43 -108.64,71.61 -49.81,0.84 -61.2,-67.34 -111.3,-63.35 -35.72,-1.45 -50.2,61.27 -90.98,61.74 -44.32,0.52 -58.7,-68.23 -109.03,-65.19 -35.65,2.16 -67.47,58.32 -89.65,63.76 -18.54,4.55 -56.27,-2.84 -77.51,2.04 -1.66,1.85 -3.44,4.99 -5.25,8.82 -16.16,49.41 -42.3,94.31 -76.07,132.29 -6.42,7.54 -12.76,14.26 -18.8,19.66 -67.43,65.63 -159.5,106.05 -261.04,106.05 -206.76,-0.01 -374.37,-167.61 -374.37,-374.36 0,-206.77 167.61,-374.38 374.37,-374.38zm64.12 549.2c16.22,2.14 104.16,2.39 113.66,-0.68 4.6,-12.68 1.94,-100.04 1.94,-120.33 0,-70.74 4.93,-50.9 -37.85,-84.48 -22.82,-17.9 -47.41,-36.86 -69.12,-52.44 -8.78,-6.3 -63.32,-50.98 -72.23,-50.35 -7.81,0.57 -133.16,98.15 -141.7,104.36 -43.26,31.48 -35.83,18.61 -35.82,84.87 -0.01,21.92 -2.92,104.75 2.21,118.42 9.31,3.03 99.78,2.76 114.16,0.57 0,-42.12 0,-84.21 0,-126.31l124.75 0 0 126.37zm-299.47 -159.55c7.82,0.44 24,-15.36 30.27,-20.07 57.08,-42.81 119.42,-94.03 176.43,-137.18 7.99,-6.05 21.54,-20.91 30.95,-20.21 7.63,0.56 105.37,79.22 118.73,89.57 21.01,16.28 37.24,29.34 58.47,45.42 8.45,6.43 51.89,42.79 58.73,42.3 2.28,-11.46 0.96,-43.85 0.9,-57.48 -0.08,-19.47 -11.41,-22.37 -23.84,-32.4 -61.11,-49.26 -131.07,-99.95 -195.35,-151.57 -18.86,-15.15 -16.68,-15.91 -35.82,-0.91l-162.11 126.17c-11.73,9.37 -19.94,14.86 -33.22,25.4 -11.59,9.2 -24.94,14.42 -24.94,31.48l0.8 59.48zm207.14 -308.73c96.19,-11.37 185.35,30.68 239.76,87.14 46.43,48.18 73.01,102.83 81.93,172.94 21.32,167.6 -110.68,308.64 -260.08,323.96 -124.94,12.81 -234.91,-51.84 -289.12,-150.85 -98.47,-179.84 10.88,-407.56 227.5,-433.18z" />
                    </svg>
                </a>
                <div class="horizontal-menu d-none d-md-flex d-lg-flex d-xl-flex" >
                    <div class="mdc-menu-surface--anchor">
                        <a href="javascript:void(0);" class="mdc-button menu-item-has-children">
                            <span class="mdc-button__ripple"></span>
                            <span class="mdc-button__label" style="color:black">Dự án</span>
                        </a>
                        <div class="mdc-menu mdc-menu-surface">
                            <div class="mdc-list">
{{--                                @foreach($list as $item)--}}
                                <div>
                                    <a href="#" class="mdc-button">
                                        <span class="mdc-button__ripple"></span>
                                        <span class="mdc-button__label">DD</span>
                                    </a>
                                </div>
{{--                                @endforeach--}}
                            </div>
                        </div>
                    </div>
                    <div >
                        <a href="" class="mdc-button">
                            <span class="mdc-button__ripple"></span>
                            <span class="mdc-button__label" style="color:black">Properties</span>
                        </a>
                    </div>
                    <div class="mdc-menu-surface--anchor">
                        <a href="javascript:void(0);" class="mdc-button menu-item-has-children">
                            <span class="mdc-button__ripple"></span>
                            <span class="mdc-button__label" style="color:black">Nhà cho thuê</span>
                        </a>
                        <div class="mdc-menu mdc-menu-surface">
                            <div class="mdc-list">
                                <div>
                                    <a href="" class="mdc-button">
                                        <span class="mdc-button__ripple"></span>
                                        <span class="mdc-button__label" style="color:black">căn hộ chung cư</span>
                                    </a>
                                </div>
                                <div>
                                    <a href="" class="mdc-button">
                                        <span class="mdc-button__ripple"></span>
                                        <span class="mdc-button__label">phòng trọ</span>
                                    </a>
                                </div>

                                <div>
                                    <a href="" class="mdc-button">
                                        <span class="mdc-button__ripple"></span>
                                        <span class="mdc-button__label">biệt thự</span>
                                    </a>
                                </div>
                                <div>
                                    <a href="" class="mdc-button">
                                        <span class="mdc-button__ripple"></span>
                                        <span class="mdc-button__label">nhà riêng</span>
                                    </a>
                                </div>
                                <div>
                                    <a href="" class="mdc-button">
                                        <span class="mdc-button__ripple"></span>
                                        <span class="mdc-button__label">văn phòng</span>
                                    </a>
                                </div>
                                <div>
                                    <a href="" class="mdc-button">
                                        <span class="mdc-button__ripple"></span>
                                        <span class="mdc-button__label">làm xưởng</span>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="mdc-menu-surface--anchor">
                        <a href="javascript:void(0);" class="mdc-button menu-item-has-children">
                            <span class="mdc-button__ripple"></span>
                            <span class="mdc-button__label" style="color:black">Tin tức</span>
                        </a>
                        <div class="mdc-menu mdc-menu-surface">
                            <div class="mdc-list">
                                <div>
                                    <a href="" class="mdc-button">
                                        <span class="mdc-button__ripple"></span>
                                        <span class="mdc-button__label">Bất động sản HCm</span>
                                    </a>
                                </div>
                                <div>
                                    <a href="" class="mdc-button">
                                        <span class="mdc-button__ripple"></span>
                                        <span class="mdc-button__label">Bất động sản HN</span>
                                    </a>
                                </div>

                                <div>
                                    <a href="" class="mdc-button">
                                        <span class="mdc-button__ripple"></span>
                                        <span class="mdc-button__label">Tin thị trường</span>
                                    </a>
                                </div>
                                <div>
                                    <a href="" class="mdc-button">
                                        <span class="mdc-button__ripple"></span>
                                        <span class="mdc-button__label">báo cáo  </span>
                                    </a>
                                </div>
                                <div>
                                    <a href="" class="mdc-button">
                                        <span class="mdc-button__ripple"></span>
                                        <span class="mdc-button__label">phân tích</span>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div>
                        <a href="about.html" class="mdc-button">
                            <span class="mdc-button__ripple"></span>
                            <span class="mdc-button__label" style="color:black">Bảng tin</span>
                        </a>
                    </div>
                </div>
                <div class="row middle-xs">
                    <a href="submit-property.html"
                        class="mdc-button mdc-button--raised d-none d-sm-flex d-md-flex d-lg-flex d-xl-flex">
                        <span class="mdc-button__ripple"></span>
                        <span class="mdc-button__label" style="color:black">Post</span>
                    </a>
                </div>
            </div>
        </div>
    </header>

    @yield('content1')
    {{-- @yield('name') --}}
    <footer>
        <div class="px-3">
            <div class="theme-container">

                <div class="py-5 content">
                    <div class="row between-xs">
                        <div class="col-xs-12 col-sm-5 col-md-4 p-0">
                            <a class="logo" href="index.html">
                                <svg xmlns="http://www.w3.org/2000/svg" style="fill-rule:evenodd;" width="212"
                                    height="37" viewBox="0 0 4271.87 748.74">
                                    <path
                                        d="M771 322.2l686.37 0c6.63,0 12.05,5.43 12.05,12.06l0 0c0,6.63 -5.42,12.06 -12.05,12.06l-686.37 -0.01c-6.63,0.01 -12.06,-5.42 -12.06,-12.05l0 0c0,-6.63 5.43,-12.06 12.06,-12.06zm943.37 263.22c0,-6.24 -5.13,-11.37 -11.37,-11.37 -6.24,0 -11.37,5.13 -11.37,11.37l0 99.19c0,6.24 5.13,11.37 11.37,11.37 6.24,0 11.37,-5.13 11.37,-11.37l0 -49.48c0,-21.4 16.94,-38.34 38.34,-38.34 5.35,0 10.26,0.89 14.71,2.67 2.01,0.89 3.57,1.34 4.9,1.34 6.24,0 11.37,-5.13 11.37,-11.59 0,-12.26 -18.27,-15.16 -30.98,-15.16 -14.48,0 -27.41,4.68 -38.34,13.6l0 -2.23zm106.54 38.34c4.68,-16.05 20.06,-26.97 36.55,-26.97 16.72,0 32.1,10.92 36.78,26.97l-73.33 0zm68.43 37.89c-2.9,0.22 -5.35,1.12 -7.58,2.9 -6.91,5.57 -14.49,8.69 -24.3,8.69 -16.72,0 -31.87,-10.92 -36.55,-26.97l86.26 0c6.24,0 11.37,-4.68 11.37,-11.14 0,-16.94 -6.02,-31.43 -17.83,-43.24 -12.04,-11.81 -26.53,-17.83 -43.24,-17.83 -16.72,0 -31.21,6.02 -43.01,17.83 -11.81,11.81 -17.83,26.3 -17.83,43.24 0,16.72 6.02,31.21 17.83,43.01 11.81,11.81 26.3,17.83 43.01,17.83 15.38,0 28.75,-4.9 39.9,-14.71 2.23,-2.45 3.34,-5.13 3.34,-8.25 0,-6.47 -4.9,-11.37 -11.37,-11.37zm107.44 -64.86c21.4,0 38.34,17.39 38.34,38.34 0,20.73 -16.94,38.11 -38.34,38.11 -21.17,0 -38.11,-17.39 -38.11,-38.11 0,-20.95 16.94,-38.34 38.11,-38.34zm38.34 87.82c0,6.24 5.13,11.37 11.37,11.37 6.24,0 11.37,-5.13 11.37,-11.37l0 -49.48c0,-16.94 -6.02,-31.43 -17.83,-43.24 -12.04,-11.81 -26.53,-17.83 -43.24,-17.83 -16.72,0 -31.21,6.02 -43.01,17.83 -11.81,11.81 -17.83,26.3 -17.83,43.24 0,16.72 6.02,31.21 17.83,43.01 11.81,11.81 26.3,17.83 43.01,17.83 14.49,0 27.42,-4.68 38.34,-13.6l0 2.23zm39.01 0c0,6.24 4.91,11.37 11.14,11.37l16.72 0c6.24,0 11.37,-5.13 11.37,-11.37 0,-6.24 -5.13,-11.37 -11.37,-11.37l-5.13 0 0 -139.98c0,-6.24 -4.9,-11.37 -11.37,-11.37 -6.46,0 -11.37,5.13 -11.37,11.37l0 151.34zm142.88 -60.85c4.68,-16.05 20.06,-26.97 36.55,-26.97 16.72,0 32.1,10.92 36.78,26.97l-73.33 0zm68.43 37.89c-2.9,0.22 -5.35,1.12 -7.58,2.9 -6.91,5.57 -14.49,8.69 -24.3,8.69 -16.72,0 -31.87,-10.92 -36.55,-26.97l86.26 0c6.24,0 11.37,-4.68 11.37,-11.14 0,-16.94 -6.02,-31.43 -17.83,-43.24 -12.04,-11.81 -26.53,-17.83 -43.24,-17.83 -16.72,0 -31.21,6.02 -43.01,17.83 -11.81,11.81 -17.83,26.3 -17.83,43.24 0,16.72 6.02,31.21 17.83,43.01 11.81,11.81 26.3,17.83 43.01,17.83 15.38,0 28.75,-4.9 39.9,-14.71 2.23,-2.45 3.34,-5.13 3.34,-8.25 0,-6.47 -4.9,-11.37 -11.37,-11.37zm119.7 -6.91c2,0.66 2.9,2.23 2.9,4.23 0,1.78 -0.45,3.34 -1.56,4.46 -6.47,6.46 -14.71,9.8 -25.19,9.8 -10.7,0 -19.61,-3.79 -26.97,-11.14 -2.9,-2.67 -6.02,-6.24 -10.7,-6.24 -6.47,0 -11.37,4.9 -11.37,11.37 0,2.67 0.89,5.13 2.45,7.14 12.7,14.49 28.31,21.62 46.58,21.62 23.85,0 49.49,-14.04 49.49,-36.11 0,-7.58 -2.67,-14.04 -8.25,-19.61l0.22 0c-2.45,-2.67 -7.36,-5.35 -14.49,-8.25l-50.82 -16.72c-2,-0.67 -2.9,-2.01 -2.9,-4.01 0,-2 0.67,-3.79 1.78,-4.9 6.24,-6.47 14.49,-9.59 24.96,-9.59 10.7,0 19.62,3.79 26.97,11.14 3.34,2.9 6.24,6.24 10.7,6.24 6.47,0 11.37,-4.9 11.37,-11.37 0,-2.67 -0.67,-4.9 -2.23,-6.91 -13.15,-14.48 -28.75,-21.84 -46.81,-21.84 -23.85,0 -49.48,14.04 -49.48,36.11 0,7.58 2.67,14.27 8.25,19.84l-0.22 0c2.9,2.67 7.58,5.35 14.49,8.03l50.82 16.72zm53.05 -80.69c-6.24,0 -11.14,5.13 -11.14,11.37 0,6.24 4.9,11.37 11.14,11.37l5.13 0 0 54.83c0,29.64 14.94,44.35 44.58,44.35 6.24,0 11.14,-5.13 11.14,-11.37 0,-6.24 -4.91,-11.37 -11.14,-11.37 -14.49,0 -21.85,-7.13 -21.85,-21.62l0 -54.83 13.6 0c6.24,0 11.14,-5.13 11.14,-11.37 0,-6.24 -4.9,-11.37 -11.14,-11.37l-13.6 0 0 -40.79c0,-6.24 -5.13,-11.37 -11.37,-11.37 -6.24,0 -11.37,5.13 -11.37,11.37l0 40.79 -5.13 0zm124.15 22.74c21.4,0 38.34,17.39 38.34,38.34 0,20.73 -16.94,38.11 -38.34,38.11 -21.17,0 -38.11,-17.39 -38.11,-38.11 0,-20.95 16.94,-38.34 38.11,-38.34zm38.34 87.82c0,6.24 5.13,11.37 11.37,11.37 6.24,0 11.37,-5.13 11.37,-11.37l0 -49.48c0,-16.94 -6.02,-31.43 -17.83,-43.24 -12.04,-11.81 -26.53,-17.83 -43.24,-17.83 -16.72,0 -31.21,6.02 -43.01,17.83 -11.81,11.81 -17.83,26.3 -17.83,43.24 0,16.72 6.02,31.21 17.83,43.01 11.81,11.81 26.3,17.83 43.01,17.83 14.49,0 27.42,-4.68 38.34,-13.6l0 2.23zm50.82 -110.56c-6.24,0 -11.14,5.13 -11.14,11.37 0,6.24 4.9,11.37 11.14,11.37l5.13 0 0 54.83c0,29.64 14.94,44.35 44.58,44.35 6.24,0 11.14,-5.13 11.14,-11.37 0,-6.24 -4.91,-11.37 -11.14,-11.37 -14.49,0 -21.85,-7.13 -21.85,-21.62l0 -54.83 13.6 0c6.24,0 11.14,-5.13 11.14,-11.37 0,-6.24 -4.9,-11.37 -11.14,-11.37l-13.6 0 0 -40.79c0,-6.24 -5.13,-11.37 -11.37,-11.37 -6.24,0 -11.37,5.13 -11.37,11.37l0 40.79 -5.13 0zm87.6 49.71c4.68,-16.05 20.06,-26.97 36.55,-26.97 16.72,0 32.1,10.92 36.78,26.97l-73.33 0zm68.43 37.89c-2.9,0.22 -5.35,1.12 -7.58,2.9 -6.91,5.57 -14.49,8.69 -24.3,8.69 -16.72,0 -31.87,-10.92 -36.55,-26.97l86.26 0c6.24,0 11.37,-4.68 11.37,-11.14 0,-16.94 -6.02,-31.43 -17.83,-43.24 -12.04,-11.81 -26.53,-17.83 -43.24,-17.83 -16.72,0 -31.21,6.02 -43.01,17.83 -11.81,11.81 -17.83,26.3 -17.83,43.24 0,16.72 6.02,31.21 17.83,43.01 11.81,11.81 26.3,17.83 43.01,17.83 15.38,0 28.75,-4.9 39.9,-14.71 2.23,-2.45 3.34,-5.13 3.34,-8.25 0,-6.47 -4.9,-11.37 -11.37,-11.37zm204.62 -0.22c-2.67,0.22 -5.13,0.89 -7.13,2.45 -7.36,6.24 -15.16,9.36 -24.75,9.36 -21.4,0 -38.34,-17.16 -38.34,-38.11 0,-21.4 16.94,-38.34 38.34,-38.34 9.59,0 17.39,3.34 24.75,9.59 2.23,1.56 4.68,2.45 7.58,2.45 6.47,0 11.14,-4.9 11.14,-11.37 0,-3.34 -1.34,-6.24 -3.79,-8.47 -11.14,-10.03 -24.29,-14.94 -39.68,-14.94 -16.94,0 -31.43,6.02 -43.24,17.83 -11.81,11.81 -17.83,26.3 -17.83,43.24 0,16.72 6.02,31.21 17.83,43.01 11.81,11.81 26.3,17.83 43.24,17.83 15.16,0 28.31,-4.9 39.68,-14.71 2.45,-2.45 3.57,-5.35 3.57,-8.47 0,-6.46 -4.9,-11.37 -11.37,-11.37zm151.13 -26.3c-0.22,-16.94 -6.02,-31.43 -17.83,-43.24 -12.04,-11.81 -26.53,-17.83 -43.24,-17.83 -16.72,0 -31.21,6.02 -43.01,17.83 -11.81,11.81 -17.83,26.3 -17.83,43.24 0,16.72 6.02,31.21 17.83,43.01 11.81,11.81 26.3,17.83 43.01,17.83 16.72,0 31.21,-6.02 43.24,-17.83 11.81,-11.81 17.83,-26.07 17.83,-43.01zm-61.08 -38.34c21.4,0 38.34,17.39 38.34,38.34 0,20.73 -16.94,38.11 -38.34,38.11 -21.17,0 -38.11,-17.39 -38.11,-38.11 0,-20.95 16.94,-38.34 38.11,-38.34zm250.54 25.86c0,-26.53 -22.07,-48.59 -48.59,-48.59 -14.49,0 -26.97,5.8 -37,17.39 -9.58,-11.59 -22.74,-17.39 -37.22,-17.39 -10.03,0 -18.72,2.67 -26.52,7.8 -1.56,-4.68 -5.57,-7.8 -10.7,-7.8 -6.24,0 -11.37,5.13 -11.37,11.37l0 99.19c0,6.24 5.13,11.37 11.37,11.37 6.24,0 11.37,-5.13 11.37,-11.37l0 -61.96c0,-14.27 11.59,-25.86 25.85,-25.86 14.27,0 25.63,11.81 25.63,25.86l0 61.96c0,6.24 5.13,11.37 11.59,11.37 6.24,0 11.37,-5.13 11.37,-11.37l0 -61.96c0,-14.04 11.37,-25.86 25.63,-25.86 14.71,0 25.86,11.81 25.86,25.86l0 61.96c0,6.24 5.13,11.37 11.37,11.37 6.24,0 11.37,-5.13 11.37,-11.37l0 -61.96zm42.13 12.48c0,-20.95 16.94,-38.34 38.11,-38.34 21.4,0 38.34,17.39 38.34,38.34 0,20.73 -16.94,38.11 -38.34,38.11 -21.17,0 -38.11,-17.39 -38.11,-38.11zm38.11 60.85c16.94,0 30.98,-6.02 43.24,-17.83 11.81,-11.81 17.83,-26.07 17.83,-43.01 0,-16.94 -6.02,-31.43 -17.83,-43.24 -12.04,-11.81 -26.53,-17.83 -43.24,-17.83 -16.72,0 -31.21,6.02 -43.01,17.83 -11.81,11.81 -17.83,26.3 -17.83,43.24l0 101.86c0,6.47 4.9,11.15 11.37,11.15 6.24,0 11.37,-4.68 11.37,-11.15l0 -54.38c10.92,8.92 23.62,13.37 38.11,13.37zm139.31 -99.19c21.4,0 38.34,17.39 38.34,38.34 0,20.73 -16.94,38.11 -38.34,38.11 -21.17,0 -38.11,-17.39 -38.11,-38.11 0,-20.95 16.94,-38.34 38.11,-38.34zm38.34 87.82c0,6.24 5.13,11.37 11.37,11.37 6.24,0 11.37,-5.13 11.37,-11.37l0 -49.48c0,-16.94 -6.02,-31.43 -17.83,-43.24 -12.04,-11.81 -26.53,-17.83 -43.24,-17.83 -16.72,0 -31.21,6.02 -43.01,17.83 -11.81,11.81 -17.83,26.3 -17.83,43.24 0,16.72 6.02,31.21 17.83,43.01 11.81,11.81 26.3,17.83 43.01,17.83 14.49,0 27.42,-4.68 38.34,-13.6l0 2.23zm62.86 -99.41c0,-6.02 -5.13,-11.14 -11.37,-11.14 -6.47,0 -11.37,5.13 -11.37,11.37l0 99.19c0,6.24 4.9,11.37 11.37,11.37 6.24,0 11.37,-5.13 11.37,-11.37l0 -53.72c0,-18.72 15.38,-34.1 33.88,-34.1 18.72,0 34.1,15.61 34.1,34.1l0 53.72c0,6.24 5.13,11.37 11.59,11.37 6.24,0 11.14,-5.13 11.14,-11.37l0 -53.72c0,-31.43 -26.08,-56.84 -56.84,-56.84 -12.93,0 -24.3,3.79 -33.88,11.14zm128.17 146.67c-0.67,1.56 -1.12,3.12 -1.12,4.91 0,6.46 4.9,11.37 11.37,11.37 4.68,0 8.92,-3.12 10.92,-7.58l62.41 -150.01c0.89,-1.78 1.34,-3.56 1.34,-5.13 0,-6.24 -5.13,-11.37 -11.59,-11.37 -6.02,0 -8.92,2.9 -10.48,7.36l-30.76 73.11 -30.54 -72.89c-2,-5.13 -6.24,-7.58 -10.7,-7.58 -6.24,0 -11.37,5.13 -11.37,11.37 0,1.79 0.45,3.57 1.12,5.13l39.23 94.06 -19.84 47.25zm-1879.08 -645.92c2.96,-5.54 7.94,-9.42 14.96,-11.63 7.02,-2.22 15.88,-3.33 26.59,-3.33 10.71,0 19.21,0.93 25.48,2.77 6.28,1.85 11.08,4.06 14.4,6.65 3.33,2.59 5.91,6.27 7.76,11.08 1.85,6.27 2.77,15.88 2.77,28.81l0 307.43c0,8.49 -0.28,14.86 -0.83,19.11 -0.56,4.24 -2.31,9.14 -5.26,14.69 -5.17,9.96 -19.57,14.95 -43.21,14.95 -25.85,0 -40.99,-6.83 -45.42,-20.49 -2.22,-6.28 -3.32,-15.88 -3.32,-28.8l0 -112.45 -146.8 0 0 113c0,8.49 -0.28,14.86 -0.83,19.11 -0.55,4.24 -2.3,9.14 -5.26,14.69 -5.17,9.96 -19.57,14.95 -43.21,14.95 -25.85,0 -40.99,-6.83 -45.42,-20.49 -2.22,-6.28 -3.32,-15.88 -3.32,-28.8l0 -307.44c0,-8.49 0.28,-14.86 0.83,-19.11 0.56,-4.25 2.31,-9.14 5.26,-14.68 5.17,-9.97 19.58,-14.96 43.21,-14.96 25.85,0 41.17,6.84 45.98,20.5 1.85,6.27 2.77,15.88 2.77,28.81l0 113 146.8 0 0 -113.56c0,-8.49 0.27,-14.86 0.83,-19.11 0.56,-4.25 2.31,-9.14 5.26,-14.68zm127.96 245.39c0,-44.32 15.51,-80.87 46.53,-109.68 31.02,-28.8 66.46,-43.21 106.35,-43.21 39.89,0 75.16,14.31 105.8,42.94 30.66,28.61 45.98,65.07 45.98,109.39 0,30.65 -7.94,57.88 -23.82,81.7 -15.88,23.82 -35.17,41.36 -57.89,52.63 -22.7,11.26 -46.25,16.89 -70.62,16.89 -24.38,0 -48.02,-6 -70.91,-18.01 -22.89,-12 -42.19,-29.72 -57.88,-53.17 -15.69,-23.45 -23.54,-49.94 -23.54,-79.49zm115.78 39.6c11.81,9.05 23.82,13.57 36,13.57 12.19,0 24.38,-4.62 36.56,-13.85 12.18,-9.23 18.28,-22.89 18.28,-40.99 0,-18.09 -5.72,-31.58 -17.17,-40.44 -11.44,-8.86 -23.81,-13.3 -37.11,-13.3 -13.3,0 -25.67,4.62 -37.12,13.85 -11.45,9.23 -17.17,22.8 -17.17,40.71 0,17.92 5.91,31.39 17.72,40.44zm354.52 104.97c-37.3,0 -68.22,-14.13 -92.78,-42.38 -24.55,-28.25 -36.83,-62.69 -36.83,-103.31l0 -96.94c0,-8.86 0.28,-15.33 0.83,-19.39 0.56,-4.06 2.11,-8.86 4.72,-14.4 5.17,-9.97 19.56,-14.95 43.2,-14.95 25.85,0 40.99,7.02 45.42,21.05 2.22,5.91 3.32,15.33 3.32,28.25l0 96.94c0,15.14 4.34,26.96 13.02,35.45 8.68,8.49 20.31,12.74 34.9,12.74 14.59,0 26.41,-4.43 35.45,-13.3 9.05,-8.86 13.57,-20.49 13.57,-34.89l0 -98.05c0,-8.49 0.28,-14.86 0.83,-19.1 0.55,-4.24 2.3,-9.14 5.26,-14.68 4.8,-9.6 19.02,-14.4 42.65,-14.4 23.27,0 37.49,4.98 42.66,14.95 2.59,5.54 4.16,10.44 4.71,14.68 0.56,4.24 0.83,10.62 0.83,19.11l0 196.1c0,8.12 -0.28,14.3 -0.83,18.55 -0.55,4.25 -2.3,8.95 -5.26,14.12 -5.55,9.6 -19.76,14.4 -42.65,14.4 -22.53,0 -36.37,-4.43 -41.55,-13.29 -3.69,-6.28 -5.53,-13.85 -5.53,-22.71 -1.48,2.59 -4.8,6.28 -9.98,11.08 -5.16,4.8 -10.14,8.86 -14.95,12.18 -12.56,8.13 -26.22,12.19 -40.99,12.19zm208.28 -24.93c-7.02,-4.43 -10.52,-11.44 -10.52,-21.05 0,-9.6 7.02,-24.19 21.05,-43.76 4.06,-6.28 10.62,-9.42 19.66,-9.42 9.05,0 21.32,4.53 36.84,13.57 15.51,9.05 29.54,13.57 42.1,13.57 22.52,0 33.79,-4.43 33.79,-13.3 0,-7.02 -12.37,-12.18 -37.11,-15.51 -23.27,-3.32 -46.35,-12 -69.24,-26.04 -10.73,-6.65 -19.58,-17.08 -26.59,-31.3 -7.02,-14.22 -10.52,-31.11 -10.52,-50.68 0,-58.34 40.07,-87.52 120.2,-87.52 26.22,0 53.18,6.28 80.88,18.84 12.92,5.91 19.39,13.3 19.39,22.16 0,8.86 -4.06,19.76 -12.18,32.68 -8.13,12.93 -16.43,19.39 -24.93,19.39 -4.43,0 -12.65,-2.77 -24.65,-8.31 -12.01,-5.54 -25.02,-8.31 -39.05,-8.31 -21.78,0 -32.68,4.06 -32.68,12.19 0,11.08 12.56,18.27 37.67,21.6 24.36,2.58 48,9.6 70.9,21.05 10.71,5.17 19.66,14.12 26.86,26.87 7.2,12.74 10.8,28.71 10.8,47.91 0,19.21 -3.6,35.55 -10.8,49.02 -7.2,13.48 -17.27,23.54 -30.19,30.19 -23.63,11.44 -53.26,17.17 -88.91,17.17 -35.63,0 -69.88,-10.34 -102.76,-31.02zm550.06 -154.82c0,22.71 -5.63,39.52 -16.89,50.41 -11.27,10.89 -23.73,16.34 -37.39,16.34l-131.28 0c0,10.34 6.1,19.02 18.28,26.04 12.19,7.02 24.38,10.53 36.56,10.53 21.42,0 38.22,-2.22 50.41,-6.65l6.1 -2.22c8.86,-4.06 16.25,-6.09 22.16,-6.09 11.81,0 21.97,8.31 30.46,24.93 4.8,9.97 7.2,18.47 7.2,25.48 0,32.86 -39.33,49.29 -117.99,49.29 -27.32,0 -51.61,-4.7 -72.84,-14.11 -21.23,-9.42 -37.76,-21.89 -49.58,-37.39 -23.26,-29.91 -34.9,-63.33 -34.9,-100.26 0,-46.53 15.05,-83.74 45.15,-111.61 30.09,-27.88 67.67,-41.82 112.73,-41.82 51.33,0 89,18.09 113,54.28 12.56,19.2 18.83,40.16 18.83,62.87zm-116.88 16.34c14.03,0 21.05,-5.9 21.05,-17.72 0,-8.49 -3.23,-15.33 -9.7,-20.5 -6.46,-5.17 -15.69,-7.75 -27.69,-7.75 -12.01,0 -23.91,4.89 -35.73,14.67 -11.81,9.79 -17.72,20.22 -17.72,31.3l69.8 0zm326.82 -39.33c56.5,54.28 96.57,95.09 120.2,122.42 12.19,13.66 18.27,25.2 18.27,34.62 0,9.42 -7.38,20.49 -22.14,33.23 -14.78,12.74 -26.88,19.11 -36.29,19.11 -9.41,0 -20.77,-7.76 -34.07,-23.26l-121.87 -139.04 0 108.01c0,8.87 -0.28,15.33 -0.83,19.39 -0.55,4.06 -2.3,8.86 -5.26,14.4 -5.17,9.97 -19.57,14.96 -43.21,14.96 -25.85,0 -40.99,-7.02 -45.42,-21.05 -2.22,-5.91 -3.32,-15.32 -3.32,-28.25l0 -307.99c0,-8.49 0.28,-14.86 0.83,-19.11 0.56,-4.25 2.31,-9.14 5.26,-14.68 5.17,-9.97 19.58,-14.96 43.21,-14.96 25.85,0 41.17,6.84 45.98,20.5 1.85,6.27 2.77,15.88 2.77,28.81l0 105.8c50.22,-56.5 90.84,-102.85 121.87,-139.04 12.93,-15.14 24.19,-22.71 33.8,-22.71 9.59,0 21.78,6.37 36.56,19.11 14.76,12.75 22.14,23.82 22.14,33.24 0,9.42 -5.53,20.58 -16.61,33.51 -21.42,24.75 -54.66,58.72 -99.71,101.92l-22.16 21.05zm439.28 22.99c0,22.71 -5.64,39.52 -16.9,50.41 -11.26,10.89 -23.73,16.34 -37.39,16.34l-131.28 0c0,10.34 6.1,19.02 18.28,26.04 12.19,7.02 24.38,10.53 36.56,10.53 21.42,0 38.22,-2.22 50.41,-6.65l6.1 -2.22c8.86,-4.06 16.25,-6.09 22.16,-6.09 11.81,0 21.97,8.31 30.46,24.93 4.8,9.97 7.2,18.47 7.2,25.48 0,32.86 -39.33,49.29 -117.99,49.29 -27.33,0 -51.61,-4.7 -72.84,-14.11 -21.23,-9.42 -37.76,-21.89 -49.58,-37.39 -23.26,-29.91 -34.9,-63.33 -34.9,-100.26 0,-46.53 15.05,-83.74 45.15,-111.61 30.09,-27.88 67.67,-41.82 112.73,-41.82 51.33,0 89,18.09 113.01,54.28 12.55,19.2 18.83,40.16 18.83,62.87zm-116.89 16.34c14.04,0 21.05,-5.9 21.05,-17.72 0,-8.49 -3.23,-15.33 -9.69,-20.5 -6.47,-5.17 -15.7,-7.75 -27.7,-7.75 -12.01,0 -23.91,4.89 -35.73,14.67 -11.81,9.79 -17.72,20.22 -17.72,31.3l69.79 0zm407.7 -124.08c21.79,9.6 32.68,21.24 32.68,34.9 0,6.65 -1.48,12.93 -4.43,18.84 -2.95,5.91 -4.43,9.05 -4.43,9.42l-145.13 324.61c-2.95,7.02 -5.45,12.37 -7.47,16.06 -2.03,3.69 -5.27,7.2 -9.7,10.52 -4.43,3.32 -9.97,4.98 -16.62,4.98 -6.65,0 -16.43,-2.77 -29.36,-8.31 -21.79,-9.6 -32.68,-21.05 -32.68,-34.34 0,-8.86 17.72,-51.14 53.18,-126.85l-110.24 -185.57c-7.39,-12.18 -11.08,-21.23 -11.08,-27.14 0,-11.81 9.97,-23.63 29.91,-35.45 12.56,-7.38 22.34,-11.07 29.36,-11.07 7.02,0 12.74,1.48 17.17,4.42 4.43,2.97 7.66,6.01 9.7,9.15 2.03,3.14 12.18,20.31 30.46,51.52 18.28,31.21 35.74,60.29 52.35,87.24 1.85,-5.91 11.81,-28.71 29.91,-68.41 18.09,-39.7 27.79,-60.84 29.08,-63.42 1.3,-2.58 3.42,-5.72 6.37,-9.42 4.8,-6.27 11.54,-9.41 20.22,-9.41 8.68,0 18.92,2.58 30.74,7.75zm-3864.81 -188.42c18.31,0 36.3,1.34 53.9,3.88 137.39,19.23 263.51,113 306.81,268.23 6.2,22.24 10.3,16.14 67.08,16.14l674.24 -0.04c44.88,-0.01 36.67,-0.15 64.31,20.75 14.45,10.92 89.93,65.51 93.38,76.11 -5.51,9.1 -41.5,34.9 -52.11,42.89 -17.88,13.45 -35.29,27.66 -53.2,40.89 -22.51,14.76 -20.99,11.63 -64.38,11.84 -18.57,0.09 -44.81,2.95 -55.64,-8.38 -27.59,-39.7 -54.87,-61.08 -86.12,-61 -43.13,0.11 -49.91,71.43 -108.64,71.61 -49.81,0.84 -61.2,-67.34 -111.3,-63.35 -35.72,-1.45 -50.2,61.27 -90.98,61.74 -44.32,0.52 -58.7,-68.23 -109.03,-65.19 -35.65,2.16 -67.47,58.32 -89.65,63.76 -18.54,4.55 -56.27,-2.84 -77.51,2.04 -1.66,1.85 -3.44,4.99 -5.25,8.82 -16.16,49.41 -42.3,94.31 -76.07,132.29 -6.42,7.54 -12.76,14.26 -18.8,19.66 -67.43,65.63 -159.5,106.05 -261.04,106.05 -206.76,-0.01 -374.37,-167.61 -374.37,-374.36 0,-206.77 167.61,-374.38 374.37,-374.38zm64.12 549.2c16.22,2.14 104.16,2.39 113.66,-0.68 4.6,-12.68 1.94,-100.04 1.94,-120.33 0,-70.74 4.93,-50.9 -37.85,-84.48 -22.82,-17.9 -47.41,-36.86 -69.12,-52.44 -8.78,-6.3 -63.32,-50.98 -72.23,-50.35 -7.81,0.57 -133.16,98.15 -141.7,104.36 -43.26,31.48 -35.83,18.61 -35.82,84.87 -0.01,21.92 -2.92,104.75 2.21,118.42 9.31,3.03 99.78,2.76 114.16,0.57 0,-42.12 0,-84.21 0,-126.31l124.75 0 0 126.37zm-299.47 -159.55c7.82,0.44 24,-15.36 30.27,-20.07 57.08,-42.81 119.42,-94.03 176.43,-137.18 7.99,-6.05 21.54,-20.91 30.95,-20.21 7.63,0.56 105.37,79.22 118.73,89.57 21.01,16.28 37.24,29.34 58.47,45.42 8.45,6.43 51.89,42.79 58.73,42.3 2.28,-11.46 0.96,-43.85 0.9,-57.48 -0.08,-19.47 -11.41,-22.37 -23.84,-32.4 -61.11,-49.26 -131.07,-99.95 -195.35,-151.57 -18.86,-15.15 -16.68,-15.91 -35.82,-0.91l-162.11 126.17c-11.73,9.37 -19.94,14.86 -33.22,25.4 -11.59,9.2 -24.94,14.42 -24.94,31.48l0.8 59.48zm207.14 -308.73c96.19,-11.37 185.35,30.68 239.76,87.14 46.43,48.18 73.01,102.83 81.93,172.94 21.32,167.6 -110.68,308.64 -260.08,323.96 -124.94,12.81 -234.91,-51.84 -289.12,-150.85 -98.47,-179.84 10.88,-407.56 227.5,-433.18z" />
                                </svg>
                            </a>
                            <p class="mt-5 mb-3 desc">"Mua bất động sản không chỉ là cách tốt nhất, cách nhanh nhất, cách an toàn nhất mà còn là cách duy nhất để trở nên giàu có". - Marshall Field </p>
                            <p class="row middle-xs mt-2">
                                <i class="material-icons primary-color">location_on</i>
                                <span class="mx-2">Trịnh Văn Bô</span>
                            </p>
                            <p class="row middle-xs mt-1">
                                <i class="material-icons primary-color">call</i>
                                <span class="mx-2">0961080094</span>
                            </p>
                            <p class="row middle-xs mt-1">
                                <i class="material-icons primary-color">mail_outline</i>
                                <span class="mx-2">trieuthph18663@fpt.edu.vn</span>
                            </p>
                            <p class="row middle-xs mt-1">
                                <i class="material-icons primary-color">schedule</i>
                                <span class="mx-2">Mon - Sun / 9:00AM - 8:00PM</span>
                            </p>
                            <div class="row start-xs middle-xs desc">
                                <a href="https://www.facebook.com/" target="blank" class="social-icon">
                                    <svg class="material-icons mat-icon-lg" viewBox="0 0 24 24">
                                        <path
                                            d="M5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3M18,5H15.5A3.5,3.5 0 0,0 12,8.5V11H10V14H12V21H15V14H18V11H15V9A1,1 0 0,1 16,8H18V5Z" />
                                    </svg>
                                </a>
                                <a href="https://twitter.com/" target="blank" class="social-icon">
                                    <svg class="material-icons mat-icon-lg" viewBox="0 0 24 24">
                                        <path
                                            d="M5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3M17.71,9.33C18.19,8.93 18.75,8.45 19,7.92C18.59,8.13 18.1,8.26 17.56,8.33C18.06,7.97 18.47,7.5 18.68,6.86C18.16,7.14 17.63,7.38 16.97,7.5C15.42,5.63 11.71,7.15 12.37,9.95C9.76,9.79 8.17,8.61 6.85,7.16C6.1,8.38 6.75,10.23 7.64,10.74C7.18,10.71 6.83,10.57 6.5,10.41C6.54,11.95 7.39,12.69 8.58,13.09C8.22,13.16 7.82,13.18 7.44,13.12C7.81,14.19 8.58,14.86 9.9,15C9,15.76 7.34,16.29 6,16.08C7.15,16.81 8.46,17.39 10.28,17.31C14.69,17.11 17.64,13.95 17.71,9.33Z" />
                                    </svg>
                                </a>
                                <a href="https://www.linkedin.com/" target="blank" class="social-icon">
                                    <svg class="material-icons mat-icon-lg" viewBox="0 0 24 24">
                                        <path
                                            d="M19,3A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3H19M18.5,18.5V13.2A3.26,3.26 0 0,0 15.24,9.94C14.39,9.94 13.4,10.46 12.92,11.24V10.13H10.13V18.5H12.92V13.57C12.92,12.8 13.54,12.17 14.31,12.17A1.4,1.4 0 0,1 15.71,13.57V18.5H18.5M6.88,8.56A1.68,1.68 0 0,0 8.56,6.88C8.56,5.95 7.81,5.19 6.88,5.19A1.69,1.69 0 0,0 5.19,6.88C5.19,7.81 5.95,8.56 6.88,8.56M8.27,18.5V10.13H5.5V18.5H8.27Z" />
                                    </svg>
                                </a>
                                <a href="https://plus.google.com/" target="blank" class="social-icon">
                                    <svg class="material-icons mat-icon-lg" viewBox="0 0 24 24">
                                        <path
                                            d="M5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3M19.5,12H18V10.5H17V12H15.5V13H17V14.5H18V13H19.5V12M9.65,11.36V12.9H12.22C12.09,13.54 11.45,14.83 9.65,14.83C8.11,14.83 6.89,13.54 6.89,12C6.89,10.46 8.11,9.17 9.65,9.17C10.55,9.17 11.13,9.56 11.45,9.88L12.67,8.72C11.9,7.95 10.87,7.5 9.65,7.5C7.14,7.5 5.15,9.5 5.15,12C5.15,14.5 7.14,16.5 9.65,16.5C12.22,16.5 13.96,14.7 13.96,12.13C13.96,11.81 13.96,11.61 13.89,11.36H9.65Z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-5 col-md-3 p-0 feedback">
                            <h2 class="uppercase">Feedback</h2>
                            <p class="desc">Chúng tôi muốn bạn gửi phản hồi mọi lúc mọi nơi</p>
                            <form action="javascript:void(0);" class="feedback-form pt-2">
                                <div class="mdc-text-field mdc-text-field--outlined w-100">
                                    <input id="feedback-email" class="mdc-text-field__input"
                                        placeholder="Email is required">
                                    <div class="mdc-notched-outline">
                                        <div class="mdc-notched-outline__leading"></div>
                                        <div class="mdc-notched-outline__notch">
                                            <label for="feedback-email" class="mdc-floating-label">Email</label>
                                        </div>
                                        <div class="mdc-notched-outline__trailing"></div>
                                    </div>
                                </div>
                                <div
                                    class="mdc-text-field mdc-text-field--outlined mdc-text-field--textarea w-100 mt-4">
                                    <textarea id="feedback-message" class="mdc-text-field__input" rows="5"
                                        placeholder="Message is required"></textarea>
                                    <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                        <div class="mdc-notched-outline__leading"></div>
                                        <div class="mdc-notched-outline__notch">
                                            <label for="feedback-message" class="mdc-floating-label">Message for
                                                us</label>
                                        </div>
                                        <div class="mdc-notched-outline__trailing"></div>
                                    </div>
                                </div>
                                <div class="w-100 text-center mt-4">
                                    <button type="submit" class="mdc-button mdc-button--raised">
                                        <span class="mdc-button__ripple"></span>
                                        <span class="mdc-button__label">Submit</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="col-xs-12 col-md-4 p-0 location">
                            <h2 class="uppercase mb-3">Vị trí của chúng tôi</h2>
                            <div id="">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14896.16047430684!2d105.72338175!3d21.0310807!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1670001704283!5m2!1svi!2s" width="400" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </footer>
    <div id="favorites-snackbar" class="mdc-snackbar">
        <div class="mdc-snackbar__surface">
            <div class="mdc-snackbar__label">The property has been added to favorites.</div>
            <div class="mdc-snackbar__actions">
                <button type="button" class="mdc-button mdc-snackbar__action">
                    <div class="mdc-button__ripple"></div>
                    <span class="mdc-button__label">
                        <i class="material-icons warn-color">close</i>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div id="back-to-top"><i class="material-icons">arrow_upward</i></div>
    <script src="../cdnjs.cloudflare.com/ajax/libs/mobile-detect/1.4.3/mobile-detect.js"></script>
    <script src="{{ asset('assets/js/libs/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/js/libs/material-components-web.min.js')}}"></script>
    <script src="{{ asset('assets/js/libs/swiper.min.js')}}"></script>
    <script src="{{ asset('assets/js/scripts.js')}}"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1rF9bttCxRmsNdZYjW7FzIoyrul5jb-s&amp;callback=initMap"
        async defer></script>
</body>



</html>
