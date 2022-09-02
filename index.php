<?php
$GLOBALS['title'] = "HGE - Home";
include 'components/header.php';
?>
<!--====== Main App ======-->
<div id="app">

    <!--====== Main Header ======-->
    <?php include 'components/navbar.php'; ?>
    <!--====== End - Main Header ======-->


    <!--====== App Content ======-->
    <div class="app-content">

        <!--====== Primary Slider ======-->
        <?php include "components/slider.php"; ?>
        <!--====== End - Primary Slider ======-->

        <!--====== Cookie Policy Modal ======-->
        <div id="cookiePopup" class="hide">
            <img src="images/cookie.png"/>
            <p>
                HGE website uses cookies to provide your browsing experience and
                relevant information. Before continuing to use our website, you agree &
                accept of our Cookie Policy & Privacy.
            </p>
            <div class="cookieBtn">
                <button id="denyCookie">Deny</button>
                <button id="acceptCookie">Accept</button>
            </div>
        </div>
        <!--====== End - Cookie Policy Modal ======-->
        <!--====== Section 1 ======-->
        <div class="u-s-p-y-60">

            <!--====== Section Intro ======-->
            <div class="section__intro u-s-m-b-46">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section__text-wrap">
                                <h1 class="content-span-1 u-c-silver u-s-m-b-12">ARE YOU READY TO</h1>
                                <span class="section__heading u-c-secondary"> Get Fit, Stay Strong & Motivated</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Intro ======-->


            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-7 col-md-7 u-s-m-b-30">
                            <div class="aspect aspect--bg-grey aspect--1286-890">
                                <img class="aspect__img collection__img" src="images/home/gym-trainer-1.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 u-s-m-b-30">
                            <span class="content-span-2 u-c-black">BEAST MODE ON</span>
                            <blockquote class="testimonial__block-quote">
                                <p>
                                    After you've gotten into the habit of going to the gym on a daily basis, the most
                                    difficult part will be giving it up. When you feel like giving up is the time you've
                                    really put in some work.
                                </p>
                            </blockquote>

                            <blockquote>
                                <p>
                                    The sport of bodybuilding is indeed not different to any other sport. If you want to
                                    be successful, you have to give one hundred percent of yourself to your workouts,
                                    food, and mental attitude.
                                </p>
                            </blockquote>
                            </a></div>
                        <div class="col-lg-7 col-md-7 u-s-m-b-30">
                            <span class="content-span-2 u-c-black text-align-right text-margin-top">BE STRONGER THAN YOUR EXCUSES</span>
                        </div>
                        <div class="col-lg-5 col-md-5 u-s-m-b-30">

                            <div class="aspect aspect--square">
                                <img class="aspect__img" src="images/home/gym-trainer.png" alt="Gym Trainer">
                            </div>
                            <blockquote>
                                <p>Let's face it: it's not always simple to get yourself to the gym. You know you should
                                    prioritize your health and fitness, but you might use some motivation to get started
                                    (or finish) your newest at-home workout.</p>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>

            <!--====== Section Content ======-->
        </div>
        <!--====== End - Section 1 ======-->


        <!--====== Section 3 ======-->
        <div class="u-s-p-b-60">

            <!--====== Section Intro ======-->
            <div class="section__intro u-s-m-b-46">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section__text-wrap">
                                <h1 class="section__heading u-c-secondary u-s-m-b-12">FEATURED PRODUCT OF THIS
                                    MONTH</h1>

                                <span class="section__span u-c-silver">WE SELECT ONE OF OUR FAVORITE PRODUCTS EACH MONTH TO HIGHLIGHT AND SHOW OFF.</span>

                                <span class="section__span u-c-silver">ADD THESE ON YOUR CART.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Intro ======-->


            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 u-s-m-b-30">
                            <div class="product-o product-o--radius product-o--hover-off u-h-100">
                                <div class="product-o__wrap">

                                    <a class="aspect aspect--bg-grey aspect--square u-d-block"
                                       href="product-detail.html">

                                        <img class="aspect__img" src="images/product/electronic/product11.jpg"
                                             alt=""></a>
                                    <div class="product-o__special-count-wrap">
                                        <div class="countdown countdown--style-special" data-countdown="2022-10-30">
                                        </div>
                                    </div>
                                    <div class="product-o__action-wrap">
                                        <ul class="product-o__action-list">
                                            <li>

                                                <a data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip"
                                                   data-placement="top" title="Quick View"><i
                                                            class="fas fa-search-plus"></i></a></li>
                                            <li>

                                                <a data-modal="modal" data-modal-id="#add-to-cart"
                                                   data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i
                                                            class="fas fa-plus-circle"></i></a></li>
                                            <li>

                                                <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                                   title="Add to Wishlist"><i class="fas fa-heart"></i></a></li>
                                            <li>

                                                <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                                   title="Email me When the price drops"><i class="fas fa-envelope"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <span class="product-o__category">

                                        <a href="shop-side-version-2.html">Electronics</a></span>

                                <span class="product-o__name">

                                        <a href="product-detail.html">DJI Phantom Drone 4k</a></span>
                                <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i><i
                                            class="fas fa-star"></i>

                                    <span class="product-o__review">(2)</span></div>

                                <span class="product-o__price">$125.00

                                        <span class="product-o__discount">$160.00</span></span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 u-s-m-b-30">
                            <div class="product-o product-o--radius product-o--hover-off u-h-100">
                                <div class="product-o__wrap">

                                    <a class="aspect aspect--bg-grey aspect--square u-d-block"
                                       href="product-detail.html">

                                        <img class="aspect__img" src="images/product/electronic/product12.jpg"
                                             alt=""></a>
                                    <div class="product-o__special-count-wrap">
                                        <div class="countdown countdown--style-special"
                                             data-countdown="2022/10/30"></div>
                                    </div>
                                    <div class="product-o__action-wrap">
                                        <ul class="product-o__action-list">
                                            <li>

                                                <a data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip"
                                                   data-placement="top" title="Quick View"><i
                                                            class="fas fa-search-plus"></i></a></li>
                                            <li>

                                                <a data-modal="modal" data-modal-id="#add-to-cart"
                                                   data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i
                                                            class="fas fa-plus-circle"></i></a></li>
                                            <li>

                                                <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                                   title="Add to Wishlist"><i class="fas fa-heart"></i></a></li>
                                            <li>

                                                <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                                   title="Email me When the price drops"><i class="fas fa-envelope"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <span class="product-o__category">

                                        <a href="shop-side-version-2.html">Electronics</a></span>

                                <span class="product-o__name">

                                        <a href="product-detail.html">DJI Phantom Drone 2k</a></span>
                                <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i><i
                                            class="fas fa-star"></i>

                                    <span class="product-o__review">(2)</span></div>

                                <span class="product-o__price">$125.00

                                        <span class="product-o__discount">$160.00</span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 3 ======-->


        <!--====== Section 4 ======-->
        <div class="u-s-p-b-60">

            <!--====== Section Intro ======-->
            <div class="section__intro u-s-m-b-46">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section__text-wrap">
                                <h1 class="section__heading u-c-secondary u-s-m-b-12">NEW ARRIVALS</h1>

                                <span class="section__span u-c-silver">GET UP FOR NEW ARRIVALS</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Intro ======-->


            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="slider-fouc">
                        <div class="owl-carousel product-slider" data-item="4">
                            <div class="u-s-m-b-30">
                                <div class="product-o product-o--hover-on">
                                    <div class="product-o__wrap">

                                        <a class="aspect aspect--bg-grey aspect--square u-d-block"
                                           href="product-detail.html">

                                            <img class="aspect__img" src="images/product/electronic/product13.jpg"
                                                 alt=""></a>
                                        <div class="product-o__action-wrap">
                                            <ul class="product-o__action-list">
                                                <li>

                                                    <a data-modal="modal" data-modal-id="#quick-look"
                                                       data-tooltip="tooltip" data-placement="top" title="Quick View"><i
                                                                class="fas fa-search-plus"></i></a></li>
                                                <li>

                                                    <a data-modal="modal" data-modal-id="#add-to-cart"
                                                       data-tooltip="tooltip" data-placement="top"
                                                       title="Add to Cart"><i class="fas fa-plus-circle"></i></a></li>
                                                <li>

                                                    <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                                       title="Add to Wishlist"><i class="fas fa-heart"></i></a></li>
                                                <li>

                                                    <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                                       title="Email me When the price drops"><i
                                                                class="fas fa-envelope"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <span class="product-o__category">

                                            <a href="shop-side-version-2.html">Electronics</a></span>

                                    <span class="product-o__name">

                                            <a href="product-detail.html">Nikon DSLR 4K Camera</a></span>
                                    <div class="product-o__rating gl-rating-style"><i class="far fa-star"></i><i
                                                class="far fa-star"></i><i class="far fa-star"></i><i
                                                class="far fa-star"></i><i class="far fa-star"></i>

                                        <span class="product-o__review">(0)</span></div>

                                    <span class="product-o__price">$125.00

                                            <span class="product-o__discount">$160.00</span></span>
                                </div>
                            </div>
                            <div class="u-s-m-b-30">
                                <div class="product-o product-o--hover-on">
                                    <div class="product-o__wrap">

                                        <a class="aspect aspect--bg-grey aspect--square u-d-block"
                                           href="product-detail.html">

                                            <img class="aspect__img" src="images/product/electronic/product14.jpg"
                                                 alt=""></a>
                                        <div class="product-o__action-wrap">
                                            <ul class="product-o__action-list">
                                                <li>

                                                    <a data-modal="modal" data-modal-id="#quick-look"
                                                       data-tooltip="tooltip" data-placement="top" title="Quick View"><i
                                                                class="fas fa-search-plus"></i></a></li>
                                                <li>

                                                    <a data-modal="modal" data-modal-id="#add-to-cart"
                                                       data-tooltip="tooltip" data-placement="top"
                                                       title="Add to Cart"><i class="fas fa-plus-circle"></i></a></li>
                                                <li>

                                                    <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                                       title="Add to Wishlist"><i class="fas fa-heart"></i></a></li>
                                                <li>

                                                    <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                                       title="Email me When the price drops"><i
                                                                class="fas fa-envelope"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <span class="product-o__category">

                                            <a href="shop-side-version-2.html">Electronics</a></span>

                                    <span class="product-o__name">

                                            <a href="product-detail.html">Nikon DSLR 2K Camera</a></span>
                                    <div class="product-o__rating gl-rating-style"><i class="far fa-star"></i><i
                                                class="far fa-star"></i><i class="far fa-star"></i><i
                                                class="far fa-star"></i><i class="far fa-star"></i>

                                        <span class="product-o__review">(0)</span></div>

                                    <span class="product-o__price">$125.00

                                            <span class="product-o__discount">$160.00</span></span>
                                </div>
                            </div>
                            <div class="u-s-m-b-30">
                                <div class="product-o product-o--hover-on">
                                    <div class="product-o__wrap">

                                        <a class="aspect aspect--bg-grey aspect--square u-d-block"
                                           href="product-detail.html">

                                            <img class="aspect__img" src="images/product/electronic/product15.jpg"
                                                 alt=""></a>
                                        <div class="product-o__action-wrap">
                                            <ul class="product-o__action-list">
                                                <li>

                                                    <a data-modal="modal" data-modal-id="#quick-look"
                                                       data-tooltip="tooltip" data-placement="top" title="Quick View"><i
                                                                class="fas fa-search-plus"></i></a></li>
                                                <li>

                                                    <a data-modal="modal" data-modal-id="#add-to-cart"
                                                       data-tooltip="tooltip" data-placement="top"
                                                       title="Add to Cart"><i class="fas fa-plus-circle"></i></a></li>
                                                <li>

                                                    <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                                       title="Add to Wishlist"><i class="fas fa-heart"></i></a></li>
                                                <li>

                                                    <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                                       title="Email me When the price drops"><i
                                                                class="fas fa-envelope"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <span class="product-o__category">

                                            <a href="shop-side-version-2.html">Electronics</a></span>

                                    <span class="product-o__name">

                                            <a href="product-detail.html">Sony DSLR 4K Camera</a></span>
                                    <div class="product-o__rating gl-rating-style"><i class="far fa-star"></i><i
                                                class="far fa-star"></i><i class="far fa-star"></i><i
                                                class="far fa-star"></i><i class="far fa-star"></i>

                                        <span class="product-o__review">(0)</span></div>

                                    <span class="product-o__price">$125.00

                                            <span class="product-o__discount">$160.00</span></span>
                                </div>
                            </div>
                            <div class="u-s-m-b-30">
                                <div class="product-o product-o--hover-on">
                                    <div class="product-o__wrap">

                                        <a class="aspect aspect--bg-grey aspect--square u-d-block"
                                           href="product-detail.html">

                                            <img class="aspect__img" src="images/product/electronic/product16.jpg"
                                                 alt=""></a>
                                        <div class="product-o__action-wrap">
                                            <ul class="product-o__action-list">
                                                <li>

                                                    <a data-modal="modal" data-modal-id="#quick-look"
                                                       data-tooltip="tooltip" data-placement="top" title="Quick View"><i
                                                                class="fas fa-search-plus"></i></a></li>
                                                <li>

                                                    <a data-modal="modal" data-modal-id="#add-to-cart"
                                                       data-tooltip="tooltip" data-placement="top"
                                                       title="Add to Cart"><i class="fas fa-plus-circle"></i></a></li>
                                                <li>

                                                    <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                                       title="Add to Wishlist"><i class="fas fa-heart"></i></a></li>
                                                <li>

                                                    <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                                       title="Email me When the price drops"><i
                                                                class="fas fa-envelope"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <span class="product-o__category">

                                            <a href="shop-side-version-2.html">Electronics</a></span>

                                    <span class="product-o__name">

                                            <a href="product-detail.html">Sony DSLR 2K Camera</a></span>
                                    <div class="product-o__rating gl-rating-style"><i class="far fa-star"></i><i
                                                class="far fa-star"></i><i class="far fa-star"></i><i
                                                class="far fa-star"></i><i class="far fa-star"></i>

                                        <span class="product-o__review">(0)</span></div>

                                    <span class="product-o__price">$125.00

                                            <span class="product-o__discount">$160.00</span></span>
                                </div>
                            </div>
                            <div class="u-s-m-b-30">
                                <div class="product-o product-o--hover-on">
                                    <div class="product-o__wrap">

                                        <a class="aspect aspect--bg-grey aspect--square u-d-block"
                                           href="product-detail.html">

                                            <img class="aspect__img" src="images/product/electronic/product17.jpg"
                                                 alt=""></a>
                                        <div class="product-o__action-wrap">
                                            <ul class="product-o__action-list">
                                                <li>

                                                    <a data-modal="modal" data-modal-id="#quick-look"
                                                       data-tooltip="tooltip" data-placement="top" title="Quick View"><i
                                                                class="fas fa-search-plus"></i></a></li>
                                                <li>

                                                    <a data-modal="modal" data-modal-id="#add-to-cart"
                                                       data-tooltip="tooltip" data-placement="top"
                                                       title="Add to Cart"><i class="fas fa-plus-circle"></i></a></li>
                                                <li>

                                                    <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                                       title="Add to Wishlist"><i class="fas fa-heart"></i></a></li>
                                                <li>

                                                    <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                                       title="Email me When the price drops"><i
                                                                class="fas fa-envelope"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <span class="product-o__category">

                                            <a href="shop-side-version-2.html">Electronics</a></span>

                                    <span class="product-o__name">

                                            <a href="product-detail.html">Canon DSLR 4K Camera</a></span>
                                    <div class="product-o__rating gl-rating-style"><i class="far fa-star"></i><i
                                                class="far fa-star"></i><i class="far fa-star"></i><i
                                                class="far fa-star"></i><i class="far fa-star"></i>

                                        <span class="product-o__review">(0)</span></div>

                                    <span class="product-o__price">$125.00

                                            <span class="product-o__discount">$160.00</span></span>
                                </div>
                            </div>
                            <div class="u-s-m-b-30">
                                <div class="product-o product-o--hover-on">
                                    <div class="product-o__wrap">

                                        <a class="aspect aspect--bg-grey aspect--square u-d-block"
                                           href="product-detail.html">

                                            <img class="aspect__img" src="images/product/electronic/product18.jpg"
                                                 alt=""></a>
                                        <div class="product-o__action-wrap">
                                            <ul class="product-o__action-list">
                                                <li>

                                                    <a data-modal="modal" data-modal-id="#quick-look"
                                                       data-tooltip="tooltip" data-placement="top" title="Quick View"><i
                                                                class="fas fa-search-plus"></i></a></li>
                                                <li>

                                                    <a data-modal="modal" data-modal-id="#add-to-cart"
                                                       data-tooltip="tooltip" data-placement="top"
                                                       title="Add to Cart"><i class="fas fa-plus-circle"></i></a></li>
                                                <li>

                                                    <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                                       title="Add to Wishlist"><i class="fas fa-heart"></i></a></li>
                                                <li>

                                                    <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                                       title="Email me When the price drops"><i
                                                                class="fas fa-envelope"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <span class="product-o__category">

                                            <a href="shop-side-version-2.html">Electronics</a></span>

                                    <span class="product-o__name">

                                            <a href="product-detail.html">Canon DSLR 2K Camera</a></span>
                                    <div class="product-o__rating gl-rating-style"><i class="far fa-star"></i><i
                                                class="far fa-star"></i><i class="far fa-star"></i><i
                                                class="far fa-star"></i><i class="far fa-star"></i>

                                        <span class="product-o__review">(0)</span></div>

                                    <span class="product-o__price">$125.00

                                            <span class="product-o__discount">$160.00</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 4 ======-->


        <!--====== Section 5 ======-->
        <div class="banner-bg">

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="banner-bg__countdown">
                                <div class="countdown countdown--style-banner" data-countdown="2022/10/30"></div>
                            </div>
                            <div class="banner-bg__wrap">
                                <div class="banner-bg__text-1">

                                    <span class="u-c-black">Global</span>

                                    <span class="u-c-secondary">Offers</span></div>
                                <div class="banner-bg__text-2">

                                    <span class="u-c-secondary">Official Launch</span>

                                    <span class="u-c-black">Don't Miss!</span></div>

                                <span class="banner-bg__text-block banner-bg__text-3 u-c-secondary">Enjoy Free Shipping when you buy 2 items and above!</span>

                                <a class="banner-bg__shop-now btn--e-secondary" href="shop-side-version-2.html">Shop
                                    Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 5 ======-->


       <!--====== Section 6 ======-->
        <div class="u-s-p-y-60">

        </div>
        <!--====== End - Section 6 ======-->


        <!--====== Section 7 ======-->
        <div class="u-s-p-b-60">

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6 u-s-m-b-30">

                            <a class="promotion" href="shop-side-version-2.html">
                                <div class="aspect aspect--bg-grey aspect--square">

                                    <img class="aspect__img promotion__img" src="images/promo/promo-img-1.jpg" alt="">
                                </div>
                                <div class="promotion__content">
                                    <div class="promotion__text-wrap">
                                        <div class="promotion__text-1">

                                            <span class="u-c-secondary">ACCESSORIES FOR YOUR EVERYDAY</span></div>
                                        <div class="promotion__text-2">

                                            <span class="u-c-secondary">GET IN</span>

                                            <span class="u-c-brand">TOUCH</span></div>
                                    </div>
                                </div>
                            </a></div>
                        <div class="col-lg-4 col-md-4 col-sm-6 u-s-m-b-30">

                            <a class="promotion" href="shop-side-version-2.html">
                                <div class="aspect aspect--bg-grey aspect--square">

                                    <img class="aspect__img promotion__img" src="images/promo/promo-img-2.jpg" alt="">
                                </div>
                                <div class="promotion__content">
                                    <div class="promotion__text-wrap">
                                        <div class="promotion__text-1">

                                            <span class="u-c-secondary">SMARTPHONE</span>

                                            <span class="u-c-brand">2019</span></div>
                                        <div class="promotion__text-2">

                                            <span class="u-c-secondary">NEW ARRIVALS</span></div>
                                    </div>
                                </div>
                            </a></div>
                        <div class="col-lg-4 col-md-4 col-sm-6 u-s-m-b-30">

                            <a class="promotion" href="shop-side-version-2.html">
                                <div class="aspect aspect--bg-grey aspect--square">

                                    <img class="aspect__img promotion__img" src="images/promo/promo-img-3.jpg" alt="">
                                </div>
                                <div class="promotion__content">
                                    <div class="promotion__text-wrap">
                                        <div class="promotion__text-1">

                                            <span class="u-c-secondary">DSLR FOR NEW GENERATION</span></div>
                                        <div class="promotion__text-2">

                                            <span class="u-c-brand">GET UP TO 10% OFF</span></div>
                                    </div>
                                </div>
                            </a></div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 7 ======-->


        <!--====== Section 8 ======-->
        <div class="u-s-p-b-60">

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6 u-s-m-b-30">
                            <div class="column-product">

                                <span class="column-product__title u-c-secondary u-s-m-b-25">SPECIAL PRODUCTS</span>
                                <ul class="column-product__list">
                                    <li class="column-product__item">
                                        <div class="product-l">
                                            <div class="product-l__img-wrap">

                                                <a class="aspect aspect--bg-grey aspect--square u-d-block product-l__link"
                                                   href="product-detail.html">

                                                    <img class="aspect__img"
                                                         src="images/product/electronic/product23.jpg" alt=""></a></div>
                                            <div class="product-l__info-wrap">

                                                    <span class="product-l__category">

                                                        <a href="shop-side-version-2.html">Electronics</a></span>

                                                <span class="product-l__name">

                                                        <a href="product-detail.html">Razor Gear 15 Ram 16GB</a></span>

                                                <span class="product-l__price">$125.00</span></div>
                                        </div>
                                    </li>
                                    <li class="column-product__item">
                                        <div class="product-l">
                                            <div class="product-l__img-wrap">

                                                <a class="aspect aspect--bg-grey aspect--square u-d-block product-l__link"
                                                   href="product-detail.html">

                                                    <img class="aspect__img"
                                                         src="images/product/electronic/product24.jpg" alt=""></a></div>
                                            <div class="product-l__info-wrap">

                                                    <span class="product-l__category">

                                                        <a href="shop-side-version-2.html">Electronics</a></span>

                                                <span class="product-l__name">

                                                        <a href="product-detail.html">Razor Gear 13 Ram 16GB</a></span>

                                                <span class="product-l__price">$125.00</span></div>
                                        </div>
                                    </li>
                                    <li class="column-product__item">
                                        <div class="product-l">
                                            <div class="product-l__img-wrap">

                                                <a class="aspect aspect--bg-grey aspect--square u-d-block product-l__link"
                                                   href="product-detail.html">

                                                    <img class="aspect__img"
                                                         src="images/product/electronic/product25.jpg" alt=""></a></div>
                                            <div class="product-l__info-wrap">

                                                    <span class="product-l__category">

                                                        <a href="shop-side-version-2.html">Electronics</a></span>

                                                <span class="product-l__name">

                                                        <a href="product-detail.html">Razor Gear 15 Ram 8GB</a></span>

                                                <span class="product-l__price">$125.00</span></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 u-s-m-b-30">
                            <div class="column-product">

                                <span class="column-product__title u-c-secondary u-s-m-b-25">WEEKLY PRODUCTS</span>
                                <ul class="column-product__list">
                                    <li class="column-product__item">
                                        <div class="product-l">
                                            <div class="product-l__img-wrap">

                                                <a class="aspect aspect--bg-grey aspect--square u-d-block product-l__link"
                                                   href="product-detail.html">

                                                    <img class="aspect__img"
                                                         src="images/product/electronic/product26.jpg" alt=""></a></div>
                                            <div class="product-l__info-wrap">

                                                    <span class="product-l__category">

                                                        <a href="shop-side-version-2.html">Electronics</a></span>

                                                <span class="product-l__name">

                                                        <a href="product-detail.html">Razor Gear 10 Ram 16GB</a></span>

                                                <span class="product-l__price">$125.00

                                                        <span class="product-l__discount">$160</span></span></div>
                                        </div>
                                    </li>
                                    <li class="column-product__item">
                                        <div class="product-l">
                                            <div class="product-l__img-wrap">

                                                <a class="aspect aspect--bg-grey aspect--square u-d-block product-l__link"
                                                   href="product-detail.html">

                                                    <img class="aspect__img"
                                                         src="images/product/electronic/product27.jpg" alt=""></a></div>
                                            <div class="product-l__info-wrap">

                                                    <span class="product-l__category">

                                                        <a href="shop-side-version-2.html">Electronics</a></span>

                                                <span class="product-l__name">

                                                        <a href="product-detail.html">Razor Gear 15 Ram 8GB</a></span>

                                                <span class="product-l__price">$125.00

                                                        <span class="product-l__discount">$160</span></span></div>
                                        </div>
                                    </li>
                                    <li class="column-product__item">
                                        <div class="product-l">
                                            <div class="product-l__img-wrap">

                                                <a class="aspect aspect--bg-grey aspect--square u-d-block product-l__link"
                                                   href="product-detail.html">

                                                    <img class="aspect__img"
                                                         src="images/product/electronic/product28.jpg" alt=""></a></div>
                                            <div class="product-l__info-wrap">

                                                    <span class="product-l__category">

                                                        <a href="shop-side-version-2.html">Electronics</a></span>

                                                <span class="product-l__name">

                                                        <a href="product-detail.html">Razor Gear 15 Ultra Ram 16GB</a></span>

                                                <span class="product-l__price">$125.00

                                                        <span class="product-l__discount">$160</span></span></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 u-s-m-b-30">
                            <div class="column-product">

                                <span class="column-product__title u-c-secondary u-s-m-b-25">FLASH PRODUCTS</span>
                                <ul class="column-product__list">
                                    <li class="column-product__item">
                                        <div class="product-l">
                                            <div class="product-l__img-wrap">

                                                <a class="aspect aspect--bg-grey aspect--square u-d-block product-l__link"
                                                   href="product-detail.html">

                                                    <img class="aspect__img"
                                                         src="images/product/electronic/product29.jpg" alt=""></a></div>
                                            <div class="product-l__info-wrap">
                                                <div class="product-l__rating gl-rating-style"><i
                                                            class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                            class="fas fa-star"></i><i class="far fa-star"></i><i
                                                            class="far fa-star"></i></div>

                                                <span class="product-l__category">

                                                        <a href="shop-side-version-2.html">Electronics</a></span>

                                                <span class="product-l__name">

                                                        <a href="product-detail.html">Razor Gear 20 Ultra Ram 16GB</a></span>

                                                <span class="product-l__price">$125.00</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="column-product__item">
                                        <div class="product-l">
                                            <div class="product-l__img-wrap">

                                                <a class="aspect aspect--bg-grey aspect--square u-d-block product-l__link"
                                                   href="product-detail.html">

                                                    <img class="aspect__img"
                                                         src="images/product/electronic/product30.jpg" alt=""></a></div>
                                            <div class="product-l__info-wrap">
                                                <div class="product-l__rating gl-rating-style"><i
                                                            class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                            class="fas fa-star"></i><i class="far fa-star"></i><i
                                                            class="far fa-star"></i></div>

                                                <span class="product-l__category">

                                                        <a href="shop-side-version-2.html">Electronics</a></span>

                                                <span class="product-l__name">

                                                        <a href="product-detail.html">Razor Gear 11 Ultra Ram 16GB</a></span>

                                                <span class="product-l__price">$125.00</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="column-product__item">
                                        <div class="product-l">
                                            <div class="product-l__img-wrap">

                                                <a class="aspect aspect--bg-grey aspect--square u-d-block product-l__link"
                                                   href="product-detail.html">

                                                    <img class="aspect__img"
                                                         src="images/product/electronic/product31.jpg" alt=""></a></div>
                                            <div class="product-l__info-wrap">
                                                <div class="product-l__rating gl-rating-style"><i
                                                            class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                            class="fas fa-star"></i><i class="far fa-star"></i><i
                                                            class="far fa-star"></i></div>

                                                <span class="product-l__category">

                                                        <a href="shop-side-version-2.html">Electronics</a></span>

                                                <span class="product-l__name">

                                                        <a href="product-detail.html">Razor Gear 10 Ultra Ram 16GB</a></span>

                                                <span class="product-l__price">$125.00</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 8 ======-->


        <!--====== Section 9 ======-->
        <div class="u-s-p-b-60">

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 u-s-m-b-30">
                            <div class="service u-h-100">
                                <div class="service__icon"><i class="fas fa-truck"></i></div>
                                <div class="service__info-wrap">

                                    <span class="service__info-text-1">Free Shipping</span>

                                    <span class="service__info-text-2">Free shipping on all US order or order above $200</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 u-s-m-b-30">
                            <div class="service u-h-100">
                                <div class="service__icon"><i class="fas fa-redo"></i></div>
                                <div class="service__info-wrap">

                                    <span class="service__info-text-1">Shop with Confidence</span>

                                    <span class="service__info-text-2">Our Protection covers your purchase from click to delivery</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 u-s-m-b-30">
                            <div class="service u-h-100">
                                <div class="service__icon"><i class="fas fa-headphones-alt"></i></div>
                                <div class="service__info-wrap">

                                    <span class="service__info-text-1">24/7 Help Center</span>

                                    <span class="service__info-text-2">Round-the-clock assistance for a smooth shopping experience</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 9 ======-->


        <!--====== Section 10 ======-->
        <div class="u-s-p-b-60">

            <!--====== Section Intro ======-->
            <div class="section__intro u-s-m-b-46">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section__text-wrap">
                                <h1 class="section__heading u-c-secondary u-s-m-b-12">LATEST FROM BLOG</h1>

                                <span class="section__span u-c-silver">START YOU DAY WITH FRESH AND LATEST NEWS</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Intro ======-->


            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 u-s-m-b-30">
                            <div class="bp-mini bp-mini--img u-h-100">
                                <div class="bp-mini__thumbnail">

                                    <!--====== Image Code ======-->

                                    <a class="aspect aspect--bg-grey aspect--1366-768 u-d-block"
                                       href="blog-detail.html">

                                        <img class="aspect__img" src="images/blog/post-2.jpg" alt=""></a>
                                    <!--====== End - Image Code ======-->
                                </div>
                                <div class="bp-mini__content">
                                    <div class="bp-mini__stat">

                                            <span class="bp-mini__stat-wrap">

                                                <span class="bp-mini__publish-date">

                                                    <a>

                                                        <span>25 February 2018</span></a></span></span>

                                        <span class="bp-mini__stat-wrap">

                                                <span class="bp-mini__preposition">By</span>

                                                <span class="bp-mini__author">

                                                    <a href="#">Dayle</a></span></span>

                                        <span class="bp-mini__stat">

                                                <span class="bp-mini__comment">

                                                    <a href="blog-detail.html"><i class="far fa-comments u-s-m-r-4"></i>

                                                        <span>8</span></a></span></span></div>
                                    <div class="bp-mini__category">

                                        <a>Learning</a>

                                        <a>News</a>

                                        <a>Health</a></div>

                                    <span class="bp-mini__h1">

                                            <a href="blog-detail.html">Life is an extraordinary Adventure</a></span>
                                    <p class="bp-mini__p">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry.</p>
                                    <div class="blog-t-w">

                                        <a class="gl-tag btn--e-transparent-hover-brand-b-2">Travel</a>

                                        <a class="gl-tag btn--e-transparent-hover-brand-b-2">Culture</a>

                                        <a class="gl-tag btn--e-transparent-hover-brand-b-2">Place</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 u-s-m-b-30">
                            <div class="bp-mini bp-mini--img u-h-100">
                                <div class="bp-mini__thumbnail">

                                    <!--====== Image Code ======-->

                                    <a class="aspect aspect--bg-grey aspect--1366-768 u-d-block"
                                       href="blog-detail.html">

                                        <img class="aspect__img" src="images/blog/post-12.jpg" alt=""></a>
                                    <!--====== End - Image Code ======-->
                                </div>
                                <div class="bp-mini__content">
                                    <div class="bp-mini__stat">

                                            <span class="bp-mini__stat-wrap">

                                                <span class="bp-mini__publish-date">

                                                    <a>

                                                        <span>25 February 2018</span></a></span></span>

                                        <span class="bp-mini__stat-wrap">

                                                <span class="bp-mini__preposition">By</span>

                                                <span class="bp-mini__author">

                                                    <a href="#">Dayle</a></span></span>

                                        <span class="bp-mini__stat">

                                                <span class="bp-mini__comment">

                                                    <a href="blog-detail.html"><i class="far fa-comments u-s-m-r-4"></i>

                                                        <span>8</span></a></span></span></div>
                                    <div class="bp-mini__category">

                                        <a>Learning</a>

                                        <a>News</a>

                                        <a>Health</a></div>

                                    <span class="bp-mini__h1">

                                            <a href="blog-detail.html">Wait till its open</a></span>
                                    <p class="bp-mini__p">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry.</p>
                                    <div class="blog-t-w">

                                        <a class="gl-tag btn--e-transparent-hover-brand-b-2">Travel</a>

                                        <a class="gl-tag btn--e-transparent-hover-brand-b-2">Culture</a>

                                        <a class="gl-tag btn--e-transparent-hover-brand-b-2">Place</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 u-s-m-b-30">
                            <div class="bp-mini bp-mini--img u-h-100">
                                <div class="bp-mini__thumbnail">

                                    <!--====== Image Code ======-->

                                    <a class="aspect aspect--bg-grey aspect--1366-768 u-d-block"
                                       href="blog-detail.html">

                                        <img class="aspect__img" src="images/blog/post-5.jpg" alt=""></a>
                                    <!--====== End - Image Code ======-->
                                </div>
                                <div class="bp-mini__content">
                                    <div class="bp-mini__stat">

                                            <span class="bp-mini__stat-wrap">

                                                <span class="bp-mini__publish-date">

                                                    <a>

                                                        <span>25 February 2018</span></a></span></span>

                                        <span class="bp-mini__stat-wrap">

                                                <span class="bp-mini__preposition">By</span>

                                                <span class="bp-mini__author">

                                                    <a href="#">Dayle</a></span></span>

                                        <span class="bp-mini__stat">

                                                <span class="bp-mini__comment">

                                                    <a href="blog-detail.html"><i class="far fa-comments u-s-m-r-4"></i>

                                                        <span>8</span></a></span></span></div>
                                    <div class="bp-mini__category">

                                        <a>Learning</a>

                                        <a>News</a>

                                        <a>Health</a></div>

                                    <span class="bp-mini__h1">

                                            <a href="blog-detail.html">Tell me difference between smoke and vape</a></span>
                                    <p class="bp-mini__p">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry.</p>
                                    <div class="blog-t-w">

                                        <a class="gl-tag btn--e-transparent-hover-brand-b-2">Travel</a>

                                        <a class="gl-tag btn--e-transparent-hover-brand-b-2">Culture</a>

                                        <a class="gl-tag btn--e-transparent-hover-brand-b-2">Place</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 10 ======-->


        <!--====== Section 11 ======-->
        <div class="u-s-p-b-90 u-s-m-b-30">

            <!--====== Section Intro ======-->
            <div class="section__intro u-s-m-b-46">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section__text-wrap">
                                <h1 class="section__heading u-c-secondary u-s-m-b-12">CLIENTS FEEDBACK</h1>

                                <span class="section__span u-c-silver">WHAT OUR CLIENTS SAY</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Intro ======-->


            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">

                    <!--====== Testimonial Slider ======-->
                    <div class="slider-fouc">
                        <div class="owl-carousel" id="testimonial-slider">
                            <div class="testimonial">
                                <div class="testimonial__img-wrap">

                                    <img class="testimonial__img" src="images/about/test-1.jpg" alt=""></div>
                                <div class="testimonial__content-wrap">

                                    <span class="testimonial__double-quote"><i class="fas fa-quote-right"></i></span>
                                    <blockquote class="testimonial__block-quote">
                                        <p>"Far far away, behind the word mountains, far from the countries Vokalia and
                                            Consonantia, there live the blind texts. Separated they live in
                                            Bookmarksgrove right at the coast of the Semantics, a large language
                                            ocean."</p>
                                    </blockquote>

                                    <span class="testimonial__author">John D. / DVNTR Inc.</span>
                                </div>
                            </div>
                            <div class="testimonial">
                                <div class="testimonial__img-wrap">

                                    <img class="testimonial__img" src="images/about/test-2.jpg" alt=""></div>
                                <div class="testimonial__content-wrap">

                                    <span class="testimonial__double-quote"><i class="fas fa-quote-right"></i></span>
                                    <blockquote class="testimonial__block-quote">
                                        <p>"Far far away, behind the word mountains, far from the countries Vokalia and
                                            Consonantia, there live the blind texts. Separated they live in
                                            Bookmarksgrove right at the coast of the Semantics, a large language
                                            ocean."</p>
                                    </blockquote>

                                    <span class="testimonial__author">John D. / DVNTR Inc.</span>
                                </div>
                            </div>
                            <div class="testimonial">
                                <div class="testimonial__img-wrap">

                                    <img class="testimonial__img" src="images/about/test-3.jpg" alt=""></div>
                                <div class="testimonial__content-wrap">

                                    <span class="testimonial__double-quote"><i class="fas fa-quote-right"></i></span>
                                    <blockquote class="testimonial__block-quote">
                                        <p>"Far far away, behind the word mountains, far from the countries Vokalia and
                                            Consonantia, there live the blind texts. Separated they live in
                                            Bookmarksgrove right at the coast of the Semantics, a large language
                                            ocean."</p>
                                    </blockquote>

                                    <span class="testimonial__author">John D. / DVNTR Inc.</span>
                                </div>
                            </div>
                            <div class="testimonial">
                                <div class="testimonial__img-wrap">

                                    <img class="testimonial__img" src="images/about/test-4.jpg" alt=""></div>
                                <div class="testimonial__content-wrap">

                                    <span class="testimonial__double-quote"><i class="fas fa-quote-right"></i></span>
                                    <blockquote class="testimonial__block-quote">
                                        <p>"Far far away, behind the word mountains, far from the countries Vokalia and
                                            Consonantia, there live the blind texts. Separated they live in
                                            Bookmarksgrove right at the coast of the Semantics, a large language
                                            ocean."</p>
                                    </blockquote>

                                    <span class="testimonial__author">John D. / DVNTR Inc.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--====== End - Testimonial Slider ======-->
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 11 ======-->


        <!--====== Section 12 ======-->
        <div class="u-s-p-b-60">

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">

                    <!--====== Brand Slider ======-->
                    <div class="slider-fouc">
                        <div class="owl-carousel" id="brand-slider" data-item="5">
                            <div class="brand-slide">

                                <a href="shop-side-version-2.html">

                                    <img src="images/brand/b1.png" alt=""></a></div>
                            <div class="brand-slide">

                                <a href="shop-side-version-2.html">

                                    <img src="images/brand/b2.png" alt=""></a></div>
                            <div class="brand-slide">

                                <a href="shop-side-version-2.html">

                                    <img src="images/brand/b3.png" alt=""></a></div>
                            <div class="brand-slide">

                                <a href="shop-side-version-2.html">

                                    <img src="images/brand/b4.png" alt=""></a></div>
                            <div class="brand-slide">

                                <a href="shop-side-version-2.html">

                                    <img src="images/brand/b5.png" alt=""></a></div>
                            <div class="brand-slide">

                                <a href="shop-side-version-2.html">

                                    <img src="images/brand/b6.png" alt=""></a></div>
                        </div>
                    </div>
                    <!--====== End - Brand Slider ======-->
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 12 ======-->
    </div>
    <!--====== End - App Content ======-->


    <!--====== Main Footer ======-->
    <?php include 'components/footer.php'; ?>
    <!--====== Modal Section ======-->


    <!--====== Quick Look Modal ======-->
    <div class="modal fade" id="quick-look">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal--shadow">

                <button class="btn dismiss-button fas fa-times" type="button" data-dismiss="modal"></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-5">

                            <!--====== Product Breadcrumb ======-->
                            <div class="pd-breadcrumb u-s-m-b-30">
                                <ul class="pd-breadcrumb__list">
                                    <li class="has-separator">

                                        <a href="index.hml">Home</a></li>
                                    <li class="has-separator">

                                        <a href="shop-side-version-2.html">Electronics</a></li>
                                    <li class="has-separator">

                                        <a href="shop-side-version-2.html">DSLR Cameras</a></li>
                                    <li class="is-marked">

                                        <a href="shop-side-version-2.html">Nikon Cameras</a></li>
                                </ul>
                            </div>
                            <!--====== End - Product Breadcrumb ======-->


                            <!--====== Product Detail ======-->
                            <div class="pd u-s-m-b-30">
                                <div class="pd-wrap">
                                    <div id="js-product-detail-modal">
                                        <div>

                                            <img class="u-img-fluid" src="images/product/product-d-1.jpg" alt=""></div>
                                        <div>

                                            <img class="u-img-fluid" src="images/product/product-d-2.jpg" alt=""></div>
                                        <div>

                                            <img class="u-img-fluid" src="images/product/product-d-3.jpg" alt=""></div>
                                        <div>

                                            <img class="u-img-fluid" src="images/product/product-d-4.jpg" alt=""></div>
                                        <div>

                                            <img class="u-img-fluid" src="images/product/product-d-5.jpg" alt=""></div>
                                    </div>
                                </div>
                                <div class="u-s-m-t-15">
                                    <div id="js-product-detail-modal-thumbnail">
                                        <div>

                                            <img class="u-img-fluid" src="images/product/product-d-1.jpg" alt=""></div>
                                        <div>

                                            <img class="u-img-fluid" src="images/product/product-d-2.jpg" alt=""></div>
                                        <div>

                                            <img class="u-img-fluid" src="images/product/product-d-3.jpg" alt=""></div>
                                        <div>

                                            <img class="u-img-fluid" src="images/product/product-d-4.jpg" alt=""></div>
                                        <div>

                                            <img class="u-img-fluid" src="images/product/product-d-5.jpg" alt=""></div>
                                    </div>
                                </div>
                            </div>
                            <!--====== End - Product Detail ======-->
                        </div>
                        <div class="col-lg-7">

                            <!--====== Product Right Side Details ======-->
                            <div class="pd-detail">
                                <div>

                                    <span class="pd-detail__name">Nikon Camera 4k Lens Zoom Pro</span></div>
                                <div>
                                    <div class="pd-detail__inline">

                                        <span class="pd-detail__price">$6.99</span>

                                        <span class="pd-detail__discount">(76% OFF)</span>
                                        <del class="pd-detail__del">$28.97</del>
                                    </div>
                                </div>
                                <div class="u-s-m-b-15">
                                    <div class="pd-detail__rating gl-rating-style"><i class="fas fa-star"></i><i
                                                class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>

                                        <span class="pd-detail__review u-s-m-l-4">

                                                <a href="product-detail.html">23 Reviews</a></span></div>
                                </div>
                                <div class="u-s-m-b-15">
                                    <div class="pd-detail__inline">

                                        <span class="pd-detail__stock">200 in stock</span>

                                        <span class="pd-detail__left">Only 2 left</span></div>
                                </div>
                                <div class="u-s-m-b-15">

                                    <span class="pd-detail__preview-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span>
                                </div>
                                <div class="u-s-m-b-15">
                                    <div class="pd-detail__inline">

                                            <span class="pd-detail__click-wrap"><i class="far fa-heart u-s-m-r-6"></i>

                                                <a href="signin.html">Add to Wishlist</a>

                                                <span class="pd-detail__click-count">(222)</span></span></div>
                                </div>
                                <div class="u-s-m-b-15">
                                    <div class="pd-detail__inline">

                                            <span class="pd-detail__click-wrap"><i
                                                        class="far fa-envelope u-s-m-r-6"></i>

                                                <a href="signin.html">Email me When the price drops</a>

                                                <span class="pd-detail__click-count">(20)</span></span></div>
                                </div>
                                <div class="u-s-m-b-15">
                                    <ul class="pd-social-list">
                                        <li>

                                            <a class="s-fb--color-hover" href="#"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li>

                                            <a class="s-tw--color-hover" href="#"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li>

                                            <a class="s-insta--color-hover" href="#"><i
                                                        class="fab fa-instagram"></i></a></li>
                                        <li>

                                            <a class="s-wa--color-hover" href="#"><i class="fab fa-whatsapp"></i></a>
                                        </li>
                                        <li>

                                            <a class="s-gplus--color-hover" href="#"><i
                                                        class="fab fa-google-plus-g"></i></a></li>
                                    </ul>
                                </div>
                                <div class="u-s-m-b-15">
                                    <form class="pd-detail__form">
                                        <div class="pd-detail-inline-2">
                                            <div class="u-s-m-b-15">

                                                <!--====== Input Counter ======-->
                                                <div class="input-counter">

                                                    <span class="input-counter__minus fas fa-minus"></span>

                                                    <input class="input-counter__text input-counter--text-primary-style"
                                                           type="text" value="1" data-min="1" data-max="1000">

                                                    <span class="input-counter__plus fas fa-plus"></span></div>
                                                <!--====== End - Input Counter ======-->
                                            </div>
                                            <div class="u-s-m-b-15">

                                                <button class="btn btn--e-brand-b-2" type="submit">Add to Cart</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="u-s-m-b-15">

                                    <span class="pd-detail__label u-s-m-b-8">Product Policy:</span>
                                    <ul class="pd-detail__policy-list">
                                        <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                            <span>Buyer Protection.</span></li>
                                        <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                            <span>Full Refund if you don't receive your order.</span></li>
                                        <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                            <span>Returns accepted if product not as described.</span></li>
                                    </ul>
                                </div>
                            </div>
                            <!--====== End - Product Right Side Details ======-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Quick Look Modal ======-->


    <!--====== Add to Cart Modal ======-->
    <div class="modal fade" id="add-to-cart">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-radius modal-shadow">

                <button class="btn dismiss-button fas fa-times" type="button" data-dismiss="modal"></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="success u-s-m-b-30">
                                <div class="success__text-wrap"><i class="fas fa-check"></i>

                                    <span>Item is added successfully!</span></div>
                                <div class="success__img-wrap">

                                    <img class="u-img-fluid" src="images/product/electronic/product1.jpg" alt=""></div>
                                <div class="success__info-wrap">

                                    <span class="success__name">Beats Bomb Wireless Headphone</span>

                                    <span class="success__quantity">Quantity: 1</span>

                                    <span class="success__price">$170.00</span></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="s-option">

                                <span class="s-option__text">1 item (s) in your cart</span>
                                <div class="s-option__link-box">

                                    <a class="s-option__link btn--e-white-brand-shadow" data-dismiss="modal">CONTINUE
                                        SHOPPING</a>

                                    <a class="s-option__link btn--e-white-brand-shadow" href="cart.html">VIEW CART</a>

                                    <a class="s-option__link btn--e-brand-shadow" href="checkout.html">PROCEED TO
                                        CHECKOUT</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Add to Cart Modal ======-->


    <!--====== Newsletter Subscribe Modal ======-->
    <!--    <div class="modal fade new-l" id="newsletter-modal">-->
    <!--        <div class="modal-dialog modal-dialog-centered">-->
    <!--            <div class="modal-content modal&#45;&#45;shadow">-->

    <!--                <button class="btn new-l__dismiss fas fa-times" type="button" data-dismiss="modal"></button>-->
    <!--                <div class="modal-body">-->
    <!--                    <div class="row u-s-m-x-0">-->
    <!--                        <div class="col-lg-6 new-l__col-1 u-s-p-x-0">-->

    <!--                            <a class="new-l__img-wrap u-d-block" href="shop-side-version-2.html">-->

    <!--                                <img class="u-img-fluid u-d-block" src="https://www.syzygy.co.uk/app/themes/syzygy/assets/illustrations/cookie-layer.svg" alt=""></a>-->
    <!--                        </div>-->
    <!--                        <div class="col-lg-6 new-l__col-2">-->
    <!--                            <div class="new-l__section u-s-m-t-30">-->
    <!--                                <div class="u-s-m-b-8 new-l&#45;&#45;center">-->
    <!--                                    <h3 class="new-l__h3">We value your privacy</h3>-->
    <!--                                </div>-->
    <!--                                <div class="u-s-m-b-30 new-l&#45;&#45;center">-->
    <!--                                    <p class="new-l__p1">We use cookies to enhance your browsing experience, serve-->
    <!--                                        personalized ads or content, and analyze our traffic. By clicking "Accept All",-->
    <!--                                        you consent to our use of cookies.</p>-->
    <!--                                </div>-->

    <!--                                <div class="u-s-m-b-15 new-l&#45;&#45;center">-->
    <!--                                    <button class="shop-now-link btn&#45;&#45;e-brand">Accept All</button>-->
    <!--                                    <br>-->
    <!--                                    <a class="new-l__link" data-dismiss="modal"><u>No Thanks</u></a></div>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
</div>
<!--====== End - Main App ======-->


<!--====== Google Analytics: change UA-XXXXX-Y to be your site's ID ======-->

<?php include 'components/scripts.php'; ?>

<!--custom script-->
<script>
    function getCookie(cname) {
        let name = cname + "=";
        let decodedCookie = decodeURIComponent(document.cookie);
        let ca = decodedCookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    let popUp = document.getElementById("cookiePopup");
    //When user clicks the accept button
    document.getElementById("denyCookie").addEventListener("click", function () {
        //Hide the popup
        popUp.classList.add("hide");
        popUp.classList.remove("show");
        sessionStorage.setItem("cookieDenied", "true");
    });
    document.getElementById("acceptCookie").addEventListener("click", () => {
        //Create date object
        let d = new Date();
        //Increment the current time by 1 minute (cookie will expire after 1 minute)
        d.setMinutes(2 + d.getMinutes());
        $.getJSON('https://json.geoiplookup.io/?callback=?', function (data) {
            let userInfo = JSON.stringify(data);
            document.cookie = "info=" + userInfo + "; expires = " + d + ";";
        });
        //Hide the popup
        popUp.classList.add("hide");
        popUp.classList.remove("show");
    });
    //Check if cookie is already present
    const checkCookie = () => {
        //Read the cookie and split on "="
        let input = document.cookie.split("=");
        //Check for our cookie
        if (input[0] === "info") {
            //Hide the popup
            const userInfo = getCookie("info");
            const currency = JSON.parse(userInfo).currency_code;
            alert("Your currency code is " + currency)
            popUp.classList.add("hide");
            popUp.classList.remove("show");
        } else {
            //Show the popup
            if(sessionStorage.getItem("cookieDenied")!=="true") {
                popUp.classList.add("show");
                popUp.classList.remove("hide");
            }
        }
    };
    //Check if cookie exists when page loads
    window.onload = () => {
        setTimeout(() => {
            checkCookie();
        }, 2000);
    }
</script>