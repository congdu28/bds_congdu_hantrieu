@extends('client.index')

@section('content1')
<main class="content-offset-to-top">  
    <div class="header-image-wrapper">
        <div class="bg" style="background-image: url('assets/images/others/contact.html');"></div>
        <div class="mask"></div>            
        <div class="header-image-content">
            <h1 class="title">Tin Tức </h1>
            <p class="desc">Hire a real estate agent, who will invest in your  success</p> 
        </div>
    </div>
    <div class="header-carousel offset-bottom">
        <div class="swiper-container h-100">
            @foreach ($banner as $items)
            <div class="swiper-wrapper h-100">  
                
                <div class="swiper-slide">
                    <div class="slide-item swiper-lazy" data-background="{{ $items->images?''.Storage::url($items->images):'imagesProject/imagesBanner/1669922098_Mua-Ban-Nha--Dat.jpg' }}">
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
                    <h1 class="slide-title">{{$items->banner_name}}</h1>
                    <p class="location row center-xs middle-xs"> 
                        <i class="material-icons mat-icon-lg primary-color">location_on</i>
                        <span class="px-1"></span>
                    </p> 
                    <a href="#" class="mdc-button mdc-button--raised price"> 
                        <span class="mdc-button__ripple"></span>
                        <span class="mdc-button__label">{{$items->links}}}</span>    
                    </a>                  
                </div>  
            </div>  
            @endforeach
        </div>
    </div>
    <div class="px-3">  
        <div class="theme-container"> 
         
            <div class="properties-wrapper row">  
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
                @foreach($news as $item)
                <div class="row item col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3"> 
                    <div class="mdc-card property-item grid-item column-4 full-width-page">
                        <div class="property-content-wrapper"> 
                            <div class="property-content">
                                <a href="{{route('route_BackEnd_News_font_detailNews_font',['id'=>$item->id])}}">
                                    <img src="{{ $item->images?''.Storage::url($item->images):'imagesProject/' }}" class="d-block mw-100">
                                </a>
                                <div class="content">
                                    <h1 class="title"><a href="#">{{$item->category_news}}</a></h1>                                 
                                </div> 
                                
                                <div class="actions row between-xs middle-xs">
                                    <p class="row date mb-0">
                                        <i class="material-icons text-muted"></i>
                                        <span><h3>{{$item->title}}</h3></span>
                                    </p>
                                    <a href="" class="mdc-button mdc-button--outlined">
                                        <span class="mdc-button__ripple"></span>
                                        <span class="mdc-button__label">Details</span> 
                                    </a>  
                                </div>
                            </div>  
                        </div> 
                    </div>  
                </div>  
                @endforeach
               
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
@endsection