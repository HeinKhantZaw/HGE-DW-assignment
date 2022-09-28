/**
 * This is main script file.
 */
(function ($) {
    // Main Object
    let HGE = {};
    // get one day from current date in YYYY/MM/DD format
    const getTmrDate = () => {
        let tmr = new Date();
        tmr.setDate(tmr.getDate() + 1);
        return tmr.getFullYear() + "/" + (tmr.getMonth() + 1) + "/" + tmr.getDate();
    };
    // Predefined variables
    let
        $filterGridWrapper = $('.filter__grid-wrapper'),
        $collectionOfFilterBtn = $('.filter__btn'),
        $primarySlider = $('#hero-slider'),
        $testimonialSlider = $('#testimonial-slider'),
        $collectionaClickScroll = $('[data-click-scroll]'),
        $collectionProductSlider = $('.product-slider'),
        $collectionTabSlider = $('.tab-slider'),
        $collectionInputCounter = $('.input-counter'),
        $collectionCountDown = $('[data-countdown]'),
        $collectionCartModalLink = $('[data-modal="modal"]'),
        $collectionPostGallery = $('.post-gallery'),
        $blogMasonry = $('.blog-m'),
        $collectionPostVideo = $('.post-video-block'),
        // $("iframe[src*="youtube"], iframe[src*="vimeo"]") jQuery Multiple Selector
        $collectionEmbedVideo = $('iframe[src*="youtube"]'),
        $productDetailElement = $('#pd-o-initiate'),
        $productDetailElementThumbnail = $('#pd-o-thumbnail'),
        $modalProductDetailElement = $('#js-product-detail-modal'),
        $modalProductDetailElementThumbnail = $('#js-product-detail-modal-thumbnail'),
        $shopCategoryToggleSpan = $('.shop-w__category-list .has-list > .js-shop-category-span'),// Recursive
        $shopGridBtn = $('.js-shop-grid-target'),
        $shopListBtn = $('.js-shop-list-target'),
        $shopPerspectiveRow = $('.shop-p__collection > div'),
        $shopFilterBtn = $('.js-shop-filter-target');


    // Bind Scroll Up to all pages
    HGE.initScrollUp = function () {
        $.scrollUp({
            scrollName: 'topScroll',
            scrollText: '<i class="fas fa-long-arrow-alt-up"></i>',
            easingType: 'linear',
            scrollSpeed: 900,
            animation: 'fade',
            zIndex: 100
        });
    };

    HGE.initScrollSpy = function () {
        let $bodyScrollSpy = $('#js-scrollspy-trigger');
        if ($bodyScrollSpy.length) {
            $bodyScrollSpy.scrollspy({
                target: '#init-scrollspy'
            });
        }
    };

    HGE.onClickScroll = function () {
        $collectionaClickScroll.on('click', function (e) {
            // prevent default behavior means page doesn't move or show up id's on browser status-bar
            e.preventDefault();
            // Get Target
            let target = $(this).data('click-scroll');
            // check if anchor has hash
            if ($(target).length) {
                $('html').animate({
                    // .offset() is jQuery function and it returns jQuery object which
                    // has top, left, bottom property and returns total distance from the html container
                    scrollTop: $(target).offset().top
                }, 1000, function () {
                });
            }
        });
    };

    // Bind Tooltip to all pages
    HGE.initTooltip = function () {

        $('[data-tooltip="tooltip"]').tooltip({
            // The default value for trigger is 'hover focus',
            // thus the tooltip stay visible after a button is clicked,
            // until another button is clicked, because the button is focused.
            trigger: 'hover'
        });
    };

    // Bind Modals
    HGE.initModal = function () {
        // Check if these anchors are on page
        if ($collectionCartModalLink.length) {
            $collectionCartModalLink.on('click', function () {
                let getElemId = $(this).data('modal-id');
                $(getElemId).modal({
                    backdrop: 'static',
                    keyboard: false,
                    show: true
                });


            });
        }

    };




    HGE.reshopNavigation = function () {
        $('#navigation').shopNav();
        $('#navigation1').shopNav();
        $('#navigation2').shopNav();
        $('#navigation3').shopNav();
    };

    HGE.onTabActiveRefreshSlider = function () {
        // When showing a new tab, the events fire.
        // Specificity = 2
        $('.tab-list [data-toggle="tab"]').on('shown.bs.tab', function (e) {
            // Get the current click id of tab
            let currentID = $(e.target).attr('href');
            // Trigger refresh `event` to current active `tab`
            $(currentID + '.active').find('.tab-slider').trigger('refresh.owl.carousel');
        });
    };

    // Bind all sliders into the page
    HGE.primarySlider = function () {
        if ($primarySlider.length) {
            $primarySlider.owlCarousel({
                items: 1,
                autoplay: true,
                autoplayTimeout: 4000,
                loop: true,
                margin: -1,
                dots: false,
                smartSpeed: 1500,
                rewind: false, // Go backwards when the boundary has reached
                nav: false,
                responsive: {
                    992: {
                        dots: true
                    }
                }
            });
        }
    };

    // Bind all sliders into the page
    HGE.productSlider = function () {
        // 0 is falsy value, 1 is truthy
        if ($collectionProductSlider.length) {
            $collectionProductSlider.on('initialize.owl.carousel', function () {
                $(this).closest('.slider-fouc').removeAttr('class');
            }).each(function () {
                let thisInstance = $(this);
                let itemPerLine = thisInstance.data('item');
                thisInstance.owlCarousel({
                    autoplay: false,
                    loop: false,
                    dots: false,
                    rewind: true,
                    smartSpeed: 1500,
                    nav: true,
                    navElement: 'div',
                    navClass: ['p-prev', 'p-next'],
                    navText: ['<i class="fas fa-long-arrow-alt-left"></i>', '<i class="fas fa-long-arrow-alt-right"></i>'],
                    responsive: {
                        0: {
                            items: 1
                        },
                        768: {
                            items: itemPerLine - 2
                        },
                        991: {
                            items: itemPerLine - 1
                        },
                        1200: {
                            items: itemPerLine
                        }
                    }
                });
            });
        }
    };


    // Bind all sliders into the page
    HGE.tabSlider = function () {
        if ($collectionTabSlider.length) {
            $collectionTabSlider.on('initialize.owl.carousel', function () {
                $(this).closest('.slider-fouc').removeAttr('class');
            }).each(function () {
                let thisInstance = $(this);
                let itemPerLine = thisInstance.data('item');
                thisInstance.owlCarousel({
                    autoplay: false,
                    loop: false,
                    dots: false,
                    rewind: true,
                    smartSpeed: 1500,
                    nav: true,
                    navElement: 'div',
                    navClass: ['t-prev', 't-next'],
                    navText: ['<i class="fas fa-long-arrow-alt-left"></i>', '<i class="fas fa-long-arrow-alt-right"></i>'],
                    responsive: {
                        0: {
                            items: 1
                        },
                        768: {
                            items: itemPerLine - 2
                        },
                        991: {
                            items: itemPerLine - 1
                        },
                        1200: {
                            items: itemPerLine
                        }
                    }
                });
            });
        }
    };

    // Bind Brand slider
    HGE.brandSlider = function () {
        let $brandSlider = $('#brand-slider');
        // Check if brand slider on the page
        if ($brandSlider.length) {
            let itemPerLine = $brandSlider.data('item');
            $brandSlider.on('initialize.owl.carousel', function () {
                $(this).closest('.slider-fouc').removeAttr('class');
            }).owlCarousel({
                autoplay: true,
                loop: false,
                dots: false,
                rewind: false,
                nav: true,
                navElement: 'div',
                navClass: ['b-prev', 'b-next'],
                navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 3,
                    },
                    991: {
                        items: itemPerLine
                    },
                    1200: {
                        items: itemPerLine
                    }
                }

            });
        }
    };

    // Testimonial Slider
    HGE.testimonialSlider = function () {
        // Check if Testimonial-Slider on the page
        if ($testimonialSlider.length) {
            $testimonialSlider.on('initialize.owl.carousel', function () {
                $(this).closest('.slider-fouc').removeAttr('class');
            }).owlCarousel({
                items: 1,
                autoplay: true,
                loop: true,
                dots: true,
                rewind: false,
                smartSpeed: 1500,
                nav: false
            });
        }
    };
    // Remove Class from body element
    HGE.appConfiguration = function () {
        $('body').removeAttr('class');
        $('.preloader').removeClass('is-active');
    };

    // Bind isotope filter plugin
    HGE.isotopeFilter = function () {

        // Check if filter grid wrapper on the page
        if ($filterGridWrapper.length) {

            $filterGridWrapper.isotope({
                itemSelector: '.filter__item',
                filter: '*'
            });
        }

        // Check if filter buttons are on page then attach click
        if ($collectionOfFilterBtn.length) {
            // Attack click event to these filter buttons
            $collectionOfFilterBtn.on('click', function () {
                // Get Value of the attribute data-filter
                let selectorValue = $(this).attr('data-filter');
                // Now initialize isotope plugin
                $filterGridWrapper.isotope({
                    filter: selectorValue
                });
                $(this).closest('.filter-category-container').find('.js-checked').removeClass('js-checked');
                $(this).addClass('js-checked');
            });
        }
    };

    // Bind countdown plugin
    HGE.timerCountDown = function () {
        const countdownDate = getTmrDate();
        // Check if Count Down on the page
        if ($collectionCountDown.length) {
            $collectionCountDown.each(function () {
                let $this = $(this);
                $this.countdown(countdownDate, function (event) {
                    $this.html(event.strftime('<div class="countdown__content"><div><span class="countdown__value">%D</span><span class="countdown__key">Days</span></div></div><div class="countdown__content"><div><span class="countdown__value">%H</span><span class="countdown__key">Hours</span></div></div><div class="countdown__content"><div><span class="countdown__value">%M</span><span class="countdown__key">Mins</span></div></div><div class="countdown__content"><div><span class="countdown__value">%S</span><span class="countdown__key">Secs</span></div></div>'));
                });
            });
        }

    };

    // Input Counter
    HGE.initInputCounter = function () {
        // Check if Input Counters on the page
        if ($collectionInputCounter.length) {
            // Attach Click event to plus button
            $collectionInputCounter.find('.input-counter__plus').on('click', function () {
                let $input = $(this).parent().find('input');
                let count = parseInt($input.val()) + 1; // Number + Number
                $input.val(count).change();
            });
            // Attach Click event to minus button
            $collectionInputCounter.find('.input-counter__minus').on('click', function () {
                let $input = $(this).parent().find('input');
                let count = parseInt($input.val()) - 1; // Number - Number
                $input.val(count).change();
            });
            // Fires when the value of the element is changed
            $collectionInputCounter.find('input').change(function () {
                let $this = $(this);
                let min = $this.data('min');
                let max = $this.data('max');
                let val = parseInt($this.val());// Current value
                // Restrictions check
                if (!val) {
                    val = 1;
                }
                // The min() method returns the number with the lowest value
                val = Math.min(val, max);
                // The max() method returns the number with the highest value
                val = Math.max(val, min);
                // Sets the Value
                $this.val(val);
            });
        }
    };


    // Blog Post Gallery
    HGE.blogPostGallery = function () {
        if ($collectionPostGallery.length) {
            $collectionPostGallery.on('initialize.owl.carousel', function () {
                $(this).closest('.slider-fouc').removeAttr('class');
            }).each(function () {
                $(this).owlCarousel({
                    items: 1,
                    autoplay: false,
                    loop: false,
                    dots: false,
                    rewind: true,
                    smartSpeed: 1500,
                    nav: true,
                    navElement: 'div',
                    navClass: ['post-prev', 'post-next'],
                    navText: ['<i class="fas fa-long-arrow-alt-left"></i>', '<i class="fas fa-long-arrow-alt-right"></i>'],
                });
            });
        }
    };

    // Blog Post Masonry
    HGE.blogPostMasonry = function () {
        if ($blogMasonry.length) {
            $blogMasonry.find('.blog-m-init').isotope({
                itemSelector: '.blog-m__element',
                layoutMode: 'masonry'
            });
        }
    };

    // Blog Post Video
    HGE.blogPostVideo = function () {
        if ($collectionPostVideo.length) {
            $collectionPostVideo.on('click', function (e) {
                e.preventDefault();
                let $this = $(this);
                // Find immediate child that has .bp__video class
                let myVideo = $this.find('.post-video')[0];
                // Add ended event
                $(myVideo).on('ended', function () {
                    $this.removeClass('process');// Add play icon
                });
                // By default it is paused
                if (myVideo.paused) {
                    // Play Video
                    myVideo.play();
                    $(this).addClass('process');
                    if ($(this).hasClass('pause')) {
                        $(this).removeClass('pause');
                    }
                } // if user again click that block just pause the video and add icon
                else {
                    myVideo.pause();
                    $(this).addClass('pause');
                }
            });
        }
    };

    // Blog Post Embed Video
    HGE.blogPostEmbedVideo = function () {
        if ($collectionEmbedVideo.length) {
            $collectionEmbedVideo.parent().fitVids();
        }
    };


    // Product Detail Init
    HGE.productDetailInit = function () {
        if ($productDetailElement.length && $productDetailElementThumbnail.length) {

            let ELEVATE_ZOOM_OBJ = {
                borderSize: 1,
                autoWidth: true,
                zoomWindowWidth: 540,
                zoomWindowHeight: 540,
                zoomWindowOffetx: 10,
                borderColour: '#e9e9e9',
                cursor: 'pointer'
            };
            // Fires after first initialization
            $productDetailElement.on('init', function () {
                $(this).closest('.slider-fouc').removeClass('slider-fouc');
            });

            $productDetailElement.slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: false,
                arrows: false,
                dots: false,
                fade: true,
                asNavFor: $productDetailElementThumbnail
            });
            // Init elevate zoom plugin to the first image
            $('#pd-o-initiate .slick-current img').elevateZoom(ELEVATE_ZOOM_OBJ);

            // Fires before slide change
            $productDetailElement.on('beforeChange', function (event, slick, currentSlide, nextSlide) {
                // Get the next slide image
                let $img = $(slick.$slides[nextSlide]).find('img');
                // Remove old zoom elements
                $('.zoomWindowContainer,.zoomContainer').remove();
                // Reinit elevate zoom plugin to the next slide image
                $($img).elevateZoom(ELEVATE_ZOOM_OBJ);
            });

            // Init Lightgallery plugin
            $productDetailElement.lightGallery({
                selector: '.pd-o-img-wrap',// lightgallery-core
                download: false,// lightgallery-core
                thumbnail: false,// Thumbnails
                autoplayControls: false,// Autoplay-plugin
                actualSize: false,// Zoom-plugin: Enable actual pixel icon
                hash: false, // Hash-plugin
                share: false// share-plugin
            });
            // Thumbnail images
            // Fires after first initialization
            $productDetailElementThumbnail.on('init', function () {
                $(this).closest('.slider-fouc').removeAttr('class');
            });

            $productDetailElementThumbnail.slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                infinite: false,
                arrows: true,
                dots: false,
                focusOnSelect: true,
                asNavFor: $productDetailElement,
                prevArrow: '<div class="pt-prev"><i class="fas fa-angle-left"></i>',
                nextArrow: '<div class="pt-next"><i class="fas fa-angle-right"></i>',
                responsive: [
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 4
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 2
                        }
                    }
                ]
            });
        }
    };

    // Modal Product Detail Init
    HGE.modalProductDetailInit = function () {
        if ($modalProductDetailElement.length && $modalProductDetailElementThumbnail.length) {
            $modalProductDetailElement.slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: false,
                arrows: false,
                dots: false,
                fade: true,
                asNavFor: $modalProductDetailElementThumbnail
            });

            $modalProductDetailElementThumbnail.slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                infinite: false,
                arrows: true,
                dots: false,
                focusOnSelect: true,
                asNavFor: $modalProductDetailElement,
                prevArrow: '<div class="pt-prev"><i class="fas fa-angle-left"></i>',
                nextArrow: '<div class="pt-next"><i class="fas fa-angle-right"></i>',
                responsive: [
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 4
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 2
                        }
                    }
                ]
            });
            // Hook into Bootstrap shown event and manually trigger 'resize' event
            // so that Slick recalculates the widths
            $('#quick-look').on('shown.bs.modal', function () {
                $modalProductDetailElement.resize();
            });
        }
    };
    // Shop Category Toggle Functionality
    HGE.shopCategoryToggle = function () {
        if ($shopCategoryToggleSpan.length) {
            $shopCategoryToggleSpan.on('click', function () {
                $(this).toggleClass('is-expanded');
                $(this).next('ul').stop(true, true).slideToggle();
            });
        }
    };


    // Shop Perspective Change
    HGE.shopPerspectiveChange = function () {
        if ($shopGridBtn.length && $shopListBtn.length) {
            $shopGridBtn.on('click', function () {
                $(this).addClass('is-active');
                $shopListBtn.removeClass('is-active');
                $shopPerspectiveRow.removeClass('is-list-active');
                $shopPerspectiveRow.addClass('is-grid-active');
            });
            $shopListBtn.on('click', function () {
                $(this).addClass('is-active');
                $shopGridBtn.removeClass('is-active');
                $shopPerspectiveRow.removeClass('is-grid-active');
                $shopPerspectiveRow.addClass('is-list-active');
            });
        }
    };
    // Shop Side Filter Settings
    HGE.shopSideFilter = function () {
        if ($shopFilterBtn.length) {
            $shopFilterBtn.on('click', function () {
                // Add Class Active
                $(this).toggleClass('is-active');
                // Get Value of the attribute data-side
                let target = $(this).attr('data-side');
                // Open Side
                $(target).toggleClass('is-open');
            });
        }
    };
    





    HGE.initScrollUp();
    HGE.initTooltip();
    HGE.initModal();
    HGE.initScrollSpy();
    HGE.onClickScroll();
    HGE.reshopNavigation();
    HGE.primarySlider();
    HGE.productSlider();
    HGE.tabSlider();
    HGE.onTabActiveRefreshSlider();
    HGE.brandSlider();
    HGE.testimonialSlider();
    HGE.appConfiguration();
    HGE.isotopeFilter();
    HGE.timerCountDown();
    HGE.initInputCounter();
    HGE.blogPostGallery();
    HGE.blogPostVideo();
    HGE.blogPostEmbedVideo();
    HGE.blogPostMasonry();
    HGE.productDetailInit();
    HGE.modalProductDetailInit();
    HGE.shopCategoryToggle();
    HGE.shopPerspectiveChange();
    HGE.shopSideFilter();
})(jQuery);