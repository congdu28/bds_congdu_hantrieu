<main class="content-offset-to-top">  
    <div class="header-carousel offset-bottom">
        <div class="swiper-container h-100">
            <div class="swiper-wrapper h-100">  
                <div class="swiper-slide">
                    <div class="slide-item swiper-lazy" data-background="assets/images/props/flat-1/1-big.jpg">
                        <div class="swiper-lazy-preloader"></div> 
                        <span class="d-none" data-slide-title="Modern and quirky flat"></span>
                        <span class="d-none" data-slide-location="611 W 180th St, New York, NY 10033, USA"></span>
                        <span class="d-none" data-slide-price="$ 1,300,000"></span> 
                    </div> 
                </div>
                <div class="swiper-slide">
                    <div class="slide-item swiper-lazy" data-background="assets/images/props/house-1/5-big.jpg">
                        <div class="swiper-lazy-preloader"></div> 
                        <span class="d-none" data-slide-title="Comfortable family house"></span>
                        <span class="d-none" data-slide-location="3rd Ave & James St, Seattle, WA 98104, USA"></span>
                        <span class="d-none" data-slide-price="$ 2,550,000"></span> 
                    </div> 
                </div> 
                <div class="swiper-slide">
                    <div class="slide-item swiper-lazy" data-background="assets/images/props/office-2/6-big.jpg">
                        <div class="swiper-lazy-preloader"></div> 
                        <span class="d-none" data-slide-title="Luxury office space"></span>
                        <span class="d-none" data-slide-location="230 W 55th St, New York, NY 10019, USA"></span>
                        <span class="d-none" data-slide-price="$ 2,500,000"></span> 
                    </div> 
                </div>
                <div class="swiper-slide">
                    <div class="slide-item swiper-lazy" data-background="assets/images/props/apartment/1-big.jpg">
                        <div class="swiper-lazy-preloader"></div> 
                        <span class="d-none" data-slide-title="Centrally located apartment"></span>
                        <span class="d-none" data-slide-location="1627 Vine St, Los Angeles, CA 90028, USA"></span>
                        <span class="d-none" data-slide-price="$ 5,600 /month"></span> 
                    </div> 
                </div>
            </div>     
            <button class="swiper-button-prev swipe-arrow mdc-fab mdc-fab--mini primary">
                <span class="mdc-fab__ripple"></span>
                <span class="mdc-fab__icon material-icons">keyboard_arrow_left</span> 
            </button>
            <button class="swiper-button-next swipe-arrow mdc-fab mdc-fab--mini primary"> 
                <span class="mdc-fab__ripple"></span>
                <span class="mdc-fab__icon material-icons">keyboard_arrow_right</span> 
            </button>  
            <div class="slide-info column center-xs middle-xs">
                <div id="active-slide-info" class="mdc-card p-4 column center-xs middle-xs">
                    <h1 class="slide-title">Title</h1>
                    <p class="location row center-xs middle-xs"> 
                        <i class="material-icons mat-icon-lg primary-color">location_on</i>
                        <span class="px-1">Location</span>
                    </p> 
                    <a href="#" class="mdc-button mdc-button--raised price"> 
                        <span class="mdc-button__ripple"></span>
                        <span class="mdc-button__label">price</span>    
                    </a>                  
                </div>  
            </div>  
        </div>
    </div>
    <div class="px-3">  
        <div class="theme-container"> 
            <div class="mdc-card main-content-header">  
                <form action="javascript:void(0);" id="filters" class="search-wrapper"> 
                    <div class="row">  
                        <div class="col-xs-12 col-sm-6 col-md-4 p-2">
                            <div class="mdc-select mdc-select--outlined">
                                <div class="mdc-select__anchor">
                                    <i class="mdc-select__dropdown-icon"></i>
                                    <div class="mdc-select__selected-text"></div>
                                    <div class="mdc-notched-outline">
                                        <div class="mdc-notched-outline__leading"></div>
                                        <div class="mdc-notched-outline__notch">
                                            <label class="mdc-floating-label">Property Type</label>
                                        </div>
                                        <div class="mdc-notched-outline__trailing"></div>
                                    </div>
                                </div>
                                <div class="mdc-select__menu mdc-menu mdc-menu-surface">
                                    <ul class="mdc-list">
                                        <li class="mdc-list-item mdc-list-item--selected" data-value=""></li>
                                        <li class="mdc-list-item" data-value="1">Office</li>
                                        <li class="mdc-list-item" data-value="2">House</li>
                                        <li class="mdc-list-item" data-value="3">Apartment</li>
                                    </ul>
                                </div>
                            </div>
                        </div>   
                        <div class="col-xs-12 col-sm-6 col-md-4 p-2">  
                            <div class="mdc-select mdc-select--outlined">
                                <div class="mdc-select__anchor">
                                    <i class="mdc-select__dropdown-icon"></i>
                                    <div class="mdc-select__selected-text"></div>
                                    <div class="mdc-notched-outline">
                                        <div class="mdc-notched-outline__leading"></div>
                                        <div class="mdc-notched-outline__notch">
                                            <label class="mdc-floating-label">Property Status</label>
                                        </div>
                                        <div class="mdc-notched-outline__trailing"></div>
                                    </div>
                                </div>
                                <div class="mdc-select__menu mdc-menu mdc-menu-surface">
                                    <ul class="mdc-list">
                                        <li class="mdc-list-item mdc-list-item--selected" data-value=""></li>
                                        <li class="mdc-list-item" data-value="1">For Sale</li>
                                        <li class="mdc-list-item" data-value="2">For Rent</li>
                                        <li class="mdc-list-item" data-value="3">Open House</li>
                                        <li class="mdc-list-item" data-value="4">No Fees</li>
                                        <li class="mdc-list-item" data-value="5">Hot Offer</li>
                                        <li class="mdc-list-item" data-value="6">Sold</li>
                                    </ul>
                                </div>
                            </div> 

                        </div>   
                        <div class="col-xs-6 col-md-2 p-2">
                            <div class="mdc-text-field mdc-text-field--outlined">
                                <input class="mdc-text-field__input">
                                <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label class="mdc-floating-label">Price From</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-2 p-2 to">
                            <div class="mdc-text-field mdc-text-field--outlined">
                                <input class="mdc-text-field__input">
                                <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label class="mdc-floating-label">Price To</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div>
                        </div>  
                    </div>    
                    <div class="row d-none" id="more-filters"> 
                        <div class="col-xs-12 col-sm-6 col-md-4 p-2">
                            <div class="mdc-select mdc-select--outlined">
                                <div class="mdc-select__anchor">
                                    <i class="mdc-select__dropdown-icon"></i>
                                    <div class="mdc-select__selected-text"></div>
                                    <div class="mdc-notched-outline">
                                        <div class="mdc-notched-outline__leading"></div>
                                        <div class="mdc-notched-outline__notch">
                                            <label class="mdc-floating-label">City</label>
                                        </div>
                                        <div class="mdc-notched-outline__trailing"></div>
                                    </div>
                                </div>
                                <div class="mdc-select__menu mdc-menu mdc-menu-surface">
                                    <ul class="mdc-list">
                                        <li class="mdc-list-item mdc-list-item--selected" data-value=""></li>
                                        <li class="mdc-list-item" data-value="1">New York</li>
                                        <li class="mdc-list-item" data-value="2">Chicago</li>
                                        <li class="mdc-list-item" data-value="3">Los Angeles</li>
                                        <li class="mdc-list-item" data-value="4">Seattle</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 p-2">  
                            <div class="mdc-text-field mdc-text-field--outlined">
                                <input class="mdc-text-field__input">
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label class="mdc-floating-label">Zip Code</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div> 
                        </div> 
                        <div class="col-xs-12 col-sm-6 col-md-4 p-2">
                            <div class="mdc-select mdc-select--outlined">
                                <div class="mdc-select__anchor">
                                    <i class="mdc-select__dropdown-icon"></i>
                                    <div class="mdc-select__selected-text"></div>
                                    <div class="mdc-notched-outline">
                                        <div class="mdc-notched-outline__leading"></div>
                                        <div class="mdc-notched-outline__notch">
                                            <label class="mdc-floating-label">Neighborhood</label>
                                        </div>
                                        <div class="mdc-notched-outline__trailing"></div>
                                    </div>
                                </div>
                                <div class="mdc-select__menu mdc-menu mdc-menu-surface">
                                    <ul class="mdc-list">
                                        <li class="mdc-list-item mdc-list-item--selected" data-value=""></li>
                                        <li class="mdc-list-item" data-value="1">Astoria</li>
                                        <li class="mdc-list-item" data-value="2">Midtown</li>
                                        <li class="mdc-list-item" data-value="3">Chinatown</li>
                                        <li class="mdc-list-item" data-value="4">Austin</li>
                                        <li class="mdc-list-item" data-value="5">Englewood</li>
                                        <li class="mdc-list-item" data-value="6">Riverdale</li>
                                        <li class="mdc-list-item" data-value="7">Hollywood</li>
                                        <li class="mdc-list-item" data-value="8">Sherman Oaks</li>
                                        <li class="mdc-list-item" data-value="9">Highland Park</li>
                                        <li class="mdc-list-item" data-value="10">Belltown</li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 p-2">
                            <div class="mdc-select mdc-select--outlined">
                                <div class="mdc-select__anchor">
                                    <i class="mdc-select__dropdown-icon"></i>
                                    <div class="mdc-select__selected-text"></div>
                                    <div class="mdc-notched-outline">
                                        <div class="mdc-notched-outline__leading"></div>
                                        <div class="mdc-notched-outline__notch">
                                            <label class="mdc-floating-label">Street</label>
                                        </div>
                                        <div class="mdc-notched-outline__trailing"></div>
                                    </div>
                                </div>
                                <div class="mdc-select__menu mdc-menu mdc-menu-surface">
                                    <ul class="mdc-list">
                                        <li class="mdc-list-item mdc-list-item--selected" data-value=""></li>
                                        <li class="mdc-list-item" data-value="1">Astoria Street #1</li>
                                        <li class="mdc-list-item" data-value="2">Astoria Street #2</li>
                                        <li class="mdc-list-item" data-value="3">Midtown Street #1</li>
                                        <li class="mdc-list-item" data-value="4">Midtown Street #2</li>
                                        <li class="mdc-list-item" data-value="5">Chinatown Street #1</li>
                                        <li class="mdc-list-item" data-value="6">Chinatown Street #2</li>
                                        <li class="mdc-list-item" data-value="7">Austin Street #1</li>
                                        <li class="mdc-list-item" data-value="8">Austin Street #2</li>
                                        <li class="mdc-list-item" data-value="9">Englewood Street #1</li>
                                        <li class="mdc-list-item" data-value="10">Englewood Street #2</li> 
                                        <li class="mdc-list-item" data-value="11">Riverdale Street #1</li>
                                        <li class="mdc-list-item" data-value="12">Riverdale Street #2</li>
                                        <li class="mdc-list-item" data-value="13">Hollywood Street #1</li>
                                        <li class="mdc-list-item" data-value="14">Hollywood Street #2</li>
                                        <li class="mdc-list-item" data-value="15">Sherman Oaks Street #1</li>
                                        <li class="mdc-list-item" data-value="16">Sherman Oaks Street #2</li>
                                        <li class="mdc-list-item" data-value="17">Highland Park Street #1</li>
                                        <li class="mdc-list-item" data-value="18">Highland Park Street #2</li>
                                        <li class="mdc-list-item" data-value="19">Belltown Street #1</li>
                                        <li class="mdc-list-item" data-value="20">Belltown Street #2</li> 
                                    </ul>
                                </div>
                            </div>
                        </div> 
                        <div class="col-xs-6 col-md-2 p-2"> 
                            <div class="mdc-select mdc-select--outlined">
                                <div class="mdc-select__anchor">
                                    <i class="mdc-select__dropdown-icon"></i>
                                    <div class="mdc-select__selected-text"></div>
                                    <div class="mdc-notched-outline">
                                        <div class="mdc-notched-outline__leading"></div>
                                        <div class="mdc-notched-outline__notch">
                                            <label class="mdc-floating-label">Bedrooms From</label>
                                        </div>
                                        <div class="mdc-notched-outline__trailing"></div>
                                    </div>
                                </div>
                                <div class="mdc-select__menu mdc-menu mdc-menu-surface">
                                    <ul class="mdc-list">
                                        <li class="mdc-list-item mdc-list-item--selected" data-value=""></li>
                                        <li class="mdc-list-item" data-value="1">1</li>
                                        <li class="mdc-list-item" data-value="2">2</li>
                                        <li class="mdc-list-item" data-value="3">3</li>
                                        <li class="mdc-list-item" data-value="4">4</li>
                                        <li class="mdc-list-item" data-value="5">5</li>
                                        <li class="mdc-list-item" data-value="6">6</li>
                                        <li class="mdc-list-item" data-value="7">7</li>
                                        <li class="mdc-list-item" data-value="8">8</li>
                                        <li class="mdc-list-item" data-value="9">9</li>
                                        <li class="mdc-list-item" data-value="10">10</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-2 p-2 to">
                            <div class="mdc-select mdc-select--outlined">
                                <div class="mdc-select__anchor">
                                    <i class="mdc-select__dropdown-icon"></i>
                                    <div class="mdc-select__selected-text"></div>
                                    <div class="mdc-notched-outline">
                                        <div class="mdc-notched-outline__leading"></div>
                                        <div class="mdc-notched-outline__notch">
                                            <label class="mdc-floating-label">Bedrooms To</label>
                                        </div>
                                        <div class="mdc-notched-outline__trailing"></div>
                                    </div>
                                </div>
                                <div class="mdc-select__menu mdc-menu mdc-menu-surface">
                                    <ul class="mdc-list">
                                        <li class="mdc-list-item mdc-list-item--selected" data-value=""></li>
                                        <li class="mdc-list-item" data-value="1">1</li>
                                        <li class="mdc-list-item" data-value="2">2</li>
                                        <li class="mdc-list-item" data-value="3">3</li>
                                        <li class="mdc-list-item" data-value="4">4</li>
                                        <li class="mdc-list-item" data-value="5">5</li>
                                        <li class="mdc-list-item" data-value="6">6</li>
                                        <li class="mdc-list-item" data-value="7">7</li>
                                        <li class="mdc-list-item" data-value="8">8</li>
                                        <li class="mdc-list-item" data-value="9">9</li>
                                        <li class="mdc-list-item" data-value="10">10</li>
                                    </ul>
                                </div>
                            </div>
                        </div> 
                        <div class="col-xs-6 col-md-2 p-2"> 
                            <div class="mdc-select mdc-select--outlined">
                                <div class="mdc-select__anchor">
                                    <i class="mdc-select__dropdown-icon"></i>
                                    <div class="mdc-select__selected-text"></div>
                                    <div class="mdc-notched-outline">
                                        <div class="mdc-notched-outline__leading"></div>
                                        <div class="mdc-notched-outline__notch">
                                            <label class="mdc-floating-label">Bathrooms From</label>
                                        </div>
                                        <div class="mdc-notched-outline__trailing"></div>
                                    </div>
                                </div>
                                <div class="mdc-select__menu mdc-menu mdc-menu-surface">
                                    <ul class="mdc-list">
                                        <li class="mdc-list-item mdc-list-item--selected" data-value=""></li>
                                        <li class="mdc-list-item" data-value="1">1</li>
                                        <li class="mdc-list-item" data-value="2">2</li>
                                        <li class="mdc-list-item" data-value="3">3</li>
                                        <li class="mdc-list-item" data-value="4">4</li>
                                        <li class="mdc-list-item" data-value="5">5</li>
                                        <li class="mdc-list-item" data-value="6">6</li>
                                        <li class="mdc-list-item" data-value="7">7</li>
                                        <li class="mdc-list-item" data-value="8">8</li>
                                        <li class="mdc-list-item" data-value="9">9</li>
                                        <li class="mdc-list-item" data-value="10">10</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-2 p-2 to">
                            <div class="mdc-select mdc-select--outlined">
                                <div class="mdc-select__anchor">
                                    <i class="mdc-select__dropdown-icon"></i>
                                    <div class="mdc-select__selected-text"></div>
                                    <div class="mdc-notched-outline">
                                        <div class="mdc-notched-outline__leading"></div>
                                        <div class="mdc-notched-outline__notch">
                                            <label class="mdc-floating-label">Bathrooms To</label>
                                        </div>
                                        <div class="mdc-notched-outline__trailing"></div>
                                    </div>
                                </div>
                                <div class="mdc-select__menu mdc-menu mdc-menu-surface">
                                    <ul class="mdc-list">
                                        <li class="mdc-list-item mdc-list-item--selected" data-value=""></li>
                                        <li class="mdc-list-item" data-value="1">1</li>
                                        <li class="mdc-list-item" data-value="2">2</li>
                                        <li class="mdc-list-item" data-value="3">3</li>
                                        <li class="mdc-list-item" data-value="4">4</li>
                                        <li class="mdc-list-item" data-value="5">5</li>
                                        <li class="mdc-list-item" data-value="6">6</li>
                                        <li class="mdc-list-item" data-value="7">7</li>
                                        <li class="mdc-list-item" data-value="8">8</li>
                                        <li class="mdc-list-item" data-value="9">9</li>
                                        <li class="mdc-list-item" data-value="10">10</li>
                                    </ul>
                                </div>
                            </div>
                        </div> 
                        <div class="col-xs-6 col-md-2 p-2"> 
                            <div class="mdc-select mdc-select--outlined">
                                <div class="mdc-select__anchor">
                                    <i class="mdc-select__dropdown-icon"></i>
                                    <div class="mdc-select__selected-text"></div>
                                    <div class="mdc-notched-outline">
                                        <div class="mdc-notched-outline__leading"></div>
                                        <div class="mdc-notched-outline__notch">
                                            <label class="mdc-floating-label">Garages From</label>
                                        </div>
                                        <div class="mdc-notched-outline__trailing"></div>
                                    </div>
                                </div>
                                <div class="mdc-select__menu mdc-menu mdc-menu-surface">
                                    <ul class="mdc-list">
                                        <li class="mdc-list-item mdc-list-item--selected" data-value=""></li>
                                        <li class="mdc-list-item" data-value="1">1</li>
                                        <li class="mdc-list-item" data-value="2">2</li>
                                        <li class="mdc-list-item" data-value="3">3</li>
                                        <li class="mdc-list-item" data-value="4">4</li>
                                        <li class="mdc-list-item" data-value="5">5</li> 
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-2 p-2 to">
                            <div class="mdc-select mdc-select--outlined">
                                <div class="mdc-select__anchor">
                                    <i class="mdc-select__dropdown-icon"></i>
                                    <div class="mdc-select__selected-text"></div>
                                    <div class="mdc-notched-outline">
                                        <div class="mdc-notched-outline__leading"></div>
                                        <div class="mdc-notched-outline__notch">
                                            <label class="mdc-floating-label">Garages To</label>
                                        </div>
                                        <div class="mdc-notched-outline__trailing"></div>
                                    </div>
                                </div>
                                <div class="mdc-select__menu mdc-menu mdc-menu-surface">
                                    <ul class="mdc-list">
                                        <li class="mdc-list-item mdc-list-item--selected" data-value=""></li>
                                        <li class="mdc-list-item" data-value="1">1</li>
                                        <li class="mdc-list-item" data-value="2">2</li>
                                        <li class="mdc-list-item" data-value="3">3</li>
                                        <li class="mdc-list-item" data-value="4">4</li>
                                        <li class="mdc-list-item" data-value="5">5</li> 
                                    </ul>
                                </div>
                            </div>
                        </div> 
                        <div class="col-xs-6 col-md-2 p-2">
                            <div class="mdc-text-field mdc-text-field--outlined">
                                <input class="mdc-text-field__input">
                                <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label class="mdc-floating-label">Area From</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-2 p-2 to">
                            <div class="mdc-text-field mdc-text-field--outlined">
                                <input class="mdc-text-field__input">
                                <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label class="mdc-floating-label">Area To</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div>
                        </div>  
                        <div class="col-xs-6 col-md-2 p-2">
                            <div class="mdc-text-field mdc-text-field--outlined">
                                <input class="mdc-text-field__input">
                                <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label class="mdc-floating-label">Year Built From</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-2 p-2 to">
                            <div class="mdc-text-field mdc-text-field--outlined">
                                <input class="mdc-text-field__input">
                                <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label class="mdc-floating-label">Year Built To</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div>
                        </div>  
                        <div class="col-xs-12 mb-2 p-0"> 
                            <p class="uppercase m-2 fw-500">Features</p>  
                            <div class="features">
                                <div class="mdc-form-field">
                                    <div class="mdc-checkbox">
                                        <input type="checkbox" class="mdc-checkbox__native-control" id="air-conditioning"/>
                                        <div class="mdc-checkbox__background">
                                            <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                            </svg>
                                            <div class="mdc-checkbox__mixedmark"></div>
                                        </div>
                                        <div class="mdc-checkbox__ripple"></div>
                                    </div>
                                    <label for="air-conditioning">Air Conditioning</label>
                                </div>    
                                <div class="mdc-form-field">
                                    <div class="mdc-checkbox">
                                        <input type="checkbox" class="mdc-checkbox__native-control" id="barbeque"/>
                                        <div class="mdc-checkbox__background">
                                            <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                            </svg>
                                            <div class="mdc-checkbox__mixedmark"></div>
                                        </div>
                                        <div class="mdc-checkbox__ripple"></div>
                                    </div>
                                    <label for="barbeque">Barbeque</label>
                                </div>
                                <div class="mdc-form-field">
                                    <div class="mdc-checkbox">
                                        <input type="checkbox" class="mdc-checkbox__native-control" id="dryer"/>
                                        <div class="mdc-checkbox__background">
                                            <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                            </svg>
                                            <div class="mdc-checkbox__mixedmark"></div>
                                        </div>
                                        <div class="mdc-checkbox__ripple"></div>
                                    </div>
                                    <label for="dryer">Dryer</label>
                                </div>
                                <div class="mdc-form-field">
                                    <div class="mdc-checkbox">
                                        <input type="checkbox" class="mdc-checkbox__native-control" id="microwave"/>
                                        <div class="mdc-checkbox__background">
                                            <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                            </svg>
                                            <div class="mdc-checkbox__mixedmark"></div>
                                        </div>
                                        <div class="mdc-checkbox__ripple"></div>
                                    </div>
                                    <label for="microwave">Microwave</label>
                                </div>
                                <div class="mdc-form-field">
                                    <div class="mdc-checkbox">
                                        <input type="checkbox" class="mdc-checkbox__native-control" id="refrigerator"/>
                                        <div class="mdc-checkbox__background">
                                            <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                            </svg>
                                            <div class="mdc-checkbox__mixedmark"></div>
                                        </div>
                                        <div class="mdc-checkbox__ripple"></div>
                                    </div>
                                    <label for="refrigerator">Refrigerator</label>
                                </div>
                                <div class="mdc-form-field">
                                    <div class="mdc-checkbox">
                                        <input type="checkbox" class="mdc-checkbox__native-control" id="tv-cable"/>
                                        <div class="mdc-checkbox__background">
                                            <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                            </svg>
                                            <div class="mdc-checkbox__mixedmark"></div>
                                        </div>
                                        <div class="mdc-checkbox__ripple"></div>
                                    </div>
                                    <label for="tv-cable">TV Cable</label>
                                </div>
                                <div class="mdc-form-field">
                                    <div class="mdc-checkbox">
                                        <input type="checkbox" class="mdc-checkbox__native-control" id="sauna"/>
                                        <div class="mdc-checkbox__background">
                                            <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                            </svg>
                                            <div class="mdc-checkbox__mixedmark"></div>
                                        </div>
                                        <div class="mdc-checkbox__ripple"></div>
                                    </div>
                                    <label for="sauna">Sauna</label>
                                </div>
                                <div class="mdc-form-field">
                                    <div class="mdc-checkbox">
                                        <input type="checkbox" class="mdc-checkbox__native-control" id="wi-fi"/>
                                        <div class="mdc-checkbox__background">
                                            <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                            </svg>
                                            <div class="mdc-checkbox__mixedmark"></div>
                                        </div>
                                        <div class="mdc-checkbox__ripple"></div>
                                    </div>
                                    <label for="wi-fi">WiFi</label>
                                </div>
                                <div class="mdc-form-field">
                                    <div class="mdc-checkbox">
                                        <input type="checkbox" class="mdc-checkbox__native-control" id="fireplace"/>
                                        <div class="mdc-checkbox__background">
                                            <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                            </svg>
                                            <div class="mdc-checkbox__mixedmark"></div>
                                        </div>
                                        <div class="mdc-checkbox__ripple"></div>
                                    </div>
                                    <label for="fireplace">Fireplace</label>
                                </div> 
                                <div class="mdc-form-field">
                                    <div class="mdc-checkbox">
                                        <input type="checkbox" class="mdc-checkbox__native-control" id="gym"/>
                                        <div class="mdc-checkbox__background">
                                            <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                            </svg>
                                            <div class="mdc-checkbox__mixedmark"></div>
                                        </div>
                                        <div class="mdc-checkbox__ripple"></div>
                                    </div>
                                    <label for="gym">Gym</label>
                                </div>
                            </div> 
                        </div> 
                    </div>   
                    <div class="row center-xs middle-xs p-2"> 
                        <button class="mdc-button mdc-button--raised bg-warn" type="button" id="clear-filter">
                            <span class="mdc-button__ripple"></span>
                            <span class="mdc-button__label">Clear</span> 
                        </button>
                        <button class="mdc-button mdc-button--raised mx-2" type="button" id="show-more-filters">
                            <span class="mdc-button__ripple"></span>
                            <span class="mdc-button__label">Advanced</span> 
                        </button>
                        <button class="mdc-button mdc-button--raised mx-2 d-none" type="button" id="hide-more-filters">
                            <span class="mdc-button__ripple"></span>
                            <span class="mdc-button__label">Hide</span> 
                        </button>
                        <button class="mdc-button mdc-button--raised" type="submit">
                            <span class="mdc-button__ripple"></span>
                            <i class="material-icons mdc-button__icon">search</i>
                            <span class="mdc-button__label">Search</span> 
                        </button>  
                    </div>
                </form> 
            </div>  
            <div class="properties-wrapper row"> 
                <div class="row start-xs middle-xs py-2 w-100"> 
                    <div class="mdc-chip-set"> 
                        <div class="mdc-chip bg-warn">
                            <div class="mdc-chip__ripple"></div>
                            <span>
                                <span role="button" tabindex="0" class="mdc-chip__text uppercase">32 found</span>
                            </span> 
                        </div>
                        <div class="mdc-chip">
                            <div class="mdc-chip__ripple"></div>
                            <span>
                                <span role="button" tabindex="0" class="mdc-chip__text">House</span>
                            </span>
                            <span>
                                <i class="material-icons mdc-chip__icon mdc-chip__icon--trailing" tabindex="-1" role="button">cancel</i>
                            </span>
                        </div> 
                        <div class="mdc-chip">
                            <div class="mdc-chip__ripple"></div>
                            <span>
                                <span role="button" tabindex="0" class="mdc-chip__text">For sale</span>
                            </span>
                            <span>
                                <i class="material-icons mdc-chip__icon mdc-chip__icon--trailing" tabindex="-1" role="button">cancel</i>
                            </span>
                        </div> 
                        <div class="mdc-chip">
                            <div class="mdc-chip__ripple"></div>
                            <span>
                                <span role="button" tabindex="0" class="mdc-chip__text">Price > 150000</span>
                            </span>
                            <span>
                                <i class="material-icons mdc-chip__icon mdc-chip__icon--trailing" tabindex="-1" role="button">cancel</i>
                            </span>
                        </div> 
                        <div class="mdc-chip">
                            <div class="mdc-chip__ripple"></div>
                            <span>
                                <span role="button" tabindex="0" class="mdc-chip__text">Price &lt; 450000</span>
                            </span>
                            <span>
                                <i class="material-icons mdc-chip__icon mdc-chip__icon--trailing" tabindex="-1" role="button">cancel</i>
                            </span>
                        </div>
                    </div> 
                </div> 
                <div class="row p-2 w-100">  
                    <div class="row mdc-card between-xs middle-xs w-100 p-2 filter-row mdc-elevation--z1 text-muted">  
                        <div class="mdc-menu-surface--anchor"> 
                            <button class="mdc-button mdc-ripple-surface text-muted mutable"> 
                                <span class="mdc-button__ripple"></span>
                                <span class="mdc-button__label"><span class="mutable">Sort by Default</span></span>
                                <i class="material-icons mdc-button__icon m-0">arrow_drop_down</i>
                            </button> 
                            <div class="mdc-menu mdc-menu-surface">
                                <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical" tabindex="-1">
                                    <li class="mdc-list-item" role="menuitem">
                                        <span class="mdc-list-item__text">Sort by Default</span>
                                    </li>
                                    <li class="mdc-list-item" role="menuitem">
                                        <span class="mdc-list-item__text">Newest</span>
                                    </li> 
                                    <li class="mdc-list-item" role="menuitem">
                                        <span class="mdc-list-item__text">Oldest</span>
                                    </li> 
                                    <li class="mdc-list-item" role="menuitem">
                                        <span class="mdc-list-item__text">Popular</span>
                                    </li> 
                                    <li class="mdc-list-item" role="menuitem">
                                        <span class="mdc-list-item__text">Price (Low to High)</span>
                                    </li> 
                                    <li class="mdc-list-item" role="menuitem">
                                        <span class="mdc-list-item__text">Price (High to Low)</span>
                                    </li>
                                </ul>
                            </div> 
                        </div>
                        <div class="row middle-xs d-none d-sm-flex d-md-flex d-lg-flex d-xl-flex">
                            <div class="mdc-menu-surface--anchor"> 
                                <button class="mdc-button mdc-ripple-surface text-muted"> 
                                    <span class="mdc-button__ripple"></span>
                                    <span class="mdc-button__label">Show<span class="mx-2 mutable">8</span></span>
                                    <i class="material-icons mdc-button__icon m-0">arrow_drop_down</i>
                                </button> 
                                <div class="mdc-menu mdc-menu-surface">
                                    <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical" tabindex="-1">
                                        <li class="mdc-list-item" role="menuitem">
                                            <span class="mdc-list-item__text">8</span>
                                        </li>
                                        <li class="mdc-list-item" role="menuitem">
                                            <span class="mdc-list-item__text">12</span>
                                        </li> 
                                        <li class="mdc-list-item" role="menuitem">
                                            <span class="mdc-list-item__text">16</span>
                                        </li> 
                                        <li class="mdc-list-item" role="menuitem">
                                            <span class="mdc-list-item__text">24</span>
                                        </li> 
                                        <li class="mdc-list-item" role="menuitem">
                                            <span class="mdc-list-item__text">36</span>
                                        </li> 
                                    </ul>
                                </div> 
                            </div>
                            <button class="mdc-icon-button material-icons view-type" data-view-type="list" data-col="1" data-full-width-page="true">view_list</button> 
                            <button class="mdc-icon-button view-type" data-view-type="grid" data-col="2" data-full-width-page="true">
                                <svg class="material-icons mat-icon-sm" viewBox="0 0 25 25">
                                    <path d="M3,11H11V3H3M3,21H11V13H3M13,21H21V13H13M13,3V11H21V3"/>
                                </svg>
                            </button> 
                            <button class="mdc-icon-button view-type material-icons d-none d-md-flex d-lg-flex d-xl-flex" data-view-type="grid" data-col="3" data-full-width-page="true">view_module</button> 
                            <button class="mdc-icon-button view-type material-icons d-none d-lg-flex d-xl-flex" data-view-type="grid" data-col="4" data-full-width-page="true">view_comfy</button> 
                        </div>
                    </div>  
                </div> 
                <div class="row item col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3"> 
                    <div class="mdc-card property-item grid-item column-4 full-width-page">
                        <div class="thumbnail-section">
                            <div class="row property-status">
                                <span class="green">For Sale</span> 
                            </div> 
                            <div class="property-image"> 
                                <div class="swiper-container">
                                    <div class="swiper-wrapper"> 
                                        <div class="swiper-slide">
                                            <img src="assets/images/others/transparent-bg.png" alt="slide image" data-src="assets/images/props/flat-1/1-medium.jpg" class="slide-item swiper-lazy">
                                            <div class="swiper-lazy-preloader"></div> 
                                        </div> 
                                        <div class="swiper-slide">
                                            <img src="assets/images/others/transparent-bg.png" alt="slide image" data-src="assets/images/props/flat-1/2-medium.jpg" class="slide-item swiper-lazy">
                                            <div class="swiper-lazy-preloader"></div> 
                                        </div> 
                                        <div class="swiper-slide">
                                            <img src="assets/images/others/transparent-bg.png" alt="slide image" data-src="assets/images/props/flat-1/3-medium.jpg" class="slide-item swiper-lazy">
                                            <div class="swiper-lazy-preloader"></div> 
                                        </div> 
                                        <div class="swiper-slide">
                                            <img src="assets/images/others/transparent-bg.png" alt="slide image" data-src="assets/images/props/flat-1/4-medium.jpg" class="slide-item swiper-lazy">
                                            <div class="swiper-lazy-preloader"></div> 
                                        </div>  
                                    </div>  
                                    <div class="swiper-pagination white"></div>  
                                    <button class="mdc-icon-button swiper-button-prev swipe-arrow"><i class="material-icons mat-icon-lg">keyboard_arrow_left</i></button>
                                    <button class="mdc-icon-button swiper-button-next swipe-arrow"><i class="material-icons mat-icon-lg">keyboard_arrow_right</i></button>
                                </div>  
                            </div> 
                            <div class="control-icons">
                                <button class="mdc-button add-to-favorite" title="Add To Favorite">
                                    <i class="material-icons mat-icon-sm">favorite_border</i>
                                </button>
                                <button class="mdc-button" title="Add To Compare">
                                    <i class="material-icons mat-icon-sm">compare_arrows</i>
                                </button>  
                            </div>  
                        </div>
                        <div class="property-content-wrapper"> 
                            <div class="property-content">
                                <div class="content">
                                    <h1 class="title"><a href="#">Modern and quirky flat</a></h1>
                                    <p class="row address flex-nowrap">
                                        <i class="material-icons text-muted">location_on</i>
                                        <span>611 W 180th St, New York, NY 10033, USA</span>
                                    </p>
                                    <div class="row between-xs middle-xs">
                                        <h3 class="primary-color price">
                                            <span>$ 1,300,000</span> 
                                        </h3> 
                                        <div class="row start-xs middle-xs ratings" title="29">      
                                            <i class="material-icons mat-icon-sm">star</i>
                                            <i class="material-icons mat-icon-sm">star</i>
                                            <i class="material-icons mat-icon-sm">star</i>
                                            <i class="material-icons mat-icon-sm">star</i>
                                            <i class="material-icons mat-icon-sm">star_half</i>
                                        </div>
                                    </div>
                                    <div class="d-none d-md-flex d-lg-flex d-xl-flex">
                                        <div class="description mt-3"> 
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat modi dignissimos blanditiis accusamus, magni provident omnis perferendis laudantium illo recusandae ab molestiae repudiandae cum obcaecati nulla adipisci fuga culpa repellat!</p>
                                        </div>
                                    </div>
                                    <div class="features mt-3">                    
                                        <p><span>Property size</span><span>2380 ft²</span></p>
                                        <p><span>Bedrooms</span><span>2</span></p>
                                        <p><span>Bathrooms</span><span>2</span></p>
                                        <p><span>Garages</span><span>1</span></p>
                                    </div>   
                                </div> 
                                <div class="grow"></div>
                                <div class="actions row between-xs middle-xs">
                                    <p class="row date mb-0">
                                        <i class="material-icons text-muted">date_range</i>
                                        <span class="mx-2">12 August, 2012</span>
                                    </p>
                                    <a href="javascript:void(0);" class="mdc-button mdc-button--outlined">
                                        <span class="mdc-button__ripple"></span>
                                        <span class="mdc-button__label">Details</span> 
                                    </a>  
                                </div>
                            </div>  
                        </div> 
                    </div>  
                </div>  
                <div class="row item col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3"> 
                    <div class="mdc-card property-item grid-item column-4 full-width-page">
                        <div class="thumbnail-section">
                            <div class="row property-status">
                                <span class="blue">For rent</span>
                                <span class="orange">No fees</span>
                            </div> 
                            <div class="property-image"> 
                                <div class="swiper-container">
                                    <div class="swiper-wrapper"> 
                                        <div class="swiper-slide">
                                            <img src="assets/images/others/transparent-bg.png" alt="slide image" data-src="assets/images/props/office/1-medium.jpg" class="slide-item swiper-lazy">
                                            <div class="swiper-lazy-preloader"></div> 
                                        </div> 
                                        <div class="swiper-slide">
                                            <img src="assets/images/others/transparent-bg.png" alt="slide image" data-src="assets/images/props/office/2-medium.jpg" class="slide-item swiper-lazy">
                                            <div class="swiper-lazy-preloader"></div> 
                                        </div> 
                                        <div class="swiper-slide">
                                            <img src="assets/images/others/transparent-bg.png" alt="slide image" data-src="assets/images/props/office/3-medium.jpg" class="slide-item swiper-lazy">
                                            <div class="swiper-lazy-preloader"></div> 
                                        </div> 
                                        <div class="swiper-slide">
                                            <img src="assets/images/others/transparent-bg.png" alt="slide image" data-src="assets/images/props/office/4-medium.jpg" class="slide-item swiper-lazy">
                                            <div class="swiper-lazy-preloader"></div> 
                                        </div> 
                                        <div class="swiper-slide">
                                            <img src="assets/images/others/transparent-bg.png" alt="slide image" data-src="assets/images/props/office/5-medium.jpg" class="slide-item swiper-lazy">
                                            <div class="swiper-lazy-preloader"></div> 
                                        </div> 
                                        <div class="swiper-slide">
                                            <img src="assets/images/others/transparent-bg.png" alt="slide image" data-src="assets/images/props/office/6-medium.jpg" class="slide-item swiper-lazy">
                                            <div class="swiper-lazy-preloader"></div> 
                                        </div> 
                                    </div>  
                                    <div class="swiper-pagination white"></div>  
                                    <button class="mdc-icon-button swiper-button-prev swipe-arrow"><i class="material-icons mat-icon-lg">keyboard_arrow_left</i></button>
                                    <button class="mdc-icon-button swiper-button-next swipe-arrow"><i class="material-icons mat-icon-lg">keyboard_arrow_right</i></button>
                                </div>  
                            </div> 
                            <div class="control-icons">
                                <button class="mdc-button add-to-favorite" title="Add To Favorite">
                                    <i class="material-icons mat-icon-sm">favorite_border</i>
                                </button>
                                <button class="mdc-button" title="Add To Compare">
                                    <i class="material-icons mat-icon-sm">compare_arrows</i>
                                </button>  
                            </div>  
                        </div>
                        <div class="property-content-wrapper"> 
                            <div class="property-content">
                                <div class="content">
                                    <h1 class="title"><a href="#">Centrally located office</a></h1>
                                    <p class="row address flex-nowrap">
                                        <i class="material-icons text-muted">location_on</i>
                                        <span>1052 W 91st St, Los Angeles, CA 90044, USA</span>
                                    </p>
                                    <div class="row between-xs middle-xs">
                                        <h3 class="primary-color price">
                                            <span>$ 6,500 /month</span> 
                                        </h3> 
                                        <div class="row start-xs middle-xs ratings" title="29">      
                                            <i class="material-icons mat-icon-sm">star</i>
                                            <i class="material-icons mat-icon-sm">star</i>
                                            <i class="material-icons mat-icon-sm">star</i>
                                            <i class="material-icons mat-icon-sm">star</i>
                                            <i class="material-icons mat-icon-sm">star</i>
                                        </div>
                                    </div>
                                    <div class="d-none d-md-flex d-lg-flex d-xl-flex">
                                        <div class="description mt-3"> 
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat modi dignissimos blanditiis accusamus, magni provident omnis perferendis laudantium illo recusandae ab molestiae repudiandae cum obcaecati nulla adipisci fuga culpa repellat!</p>
                                        </div>
                                    </div>
                                    <div class="features mt-3">                    
                                        <p><span>Property size</span><span>1500 ft²</span></p>
                                        <p><span>Bedrooms</span><span>4</span></p>
                                        <p><span>Bathrooms</span><span>2</span></p>
                                        <p><span>Garages</span><span>2</span></p>
                                    </div>   
                                </div> 
                                <div class="grow"></div>
                                <div class="actions row between-xs middle-xs">
                                    <p class="row date mb-0">
                                        <i class="material-icons text-muted">date_range</i>
                                        <span class="mx-2">12 September, 2013</span>
                                    </p> 
                                    <a href="javascript:void(0);" class="mdc-button mdc-button--outlined">
                                        <span class="mdc-button__ripple"></span>
                                        <span class="mdc-button__label">Details</span> 
                                    </a>  
                                </div>
                            </div>  
                        </div> 
                    </div>  
                </div>
                <div class="row center-xs middle-xs p-2 mt-2 w-100">                
                    <a href="javascript:void(0);" class="mdc-button mdc-button--raised">
                        <span class="mdc-button__ripple"></span>
                        <span class="mdc-button__label">load more</span> 
                    </a>
                </div> 
            </div>  
        </div>  
    </div> 
</main> 