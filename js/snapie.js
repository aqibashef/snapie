/**
 * Created by aqib on 10/10/16.
 */


jQuery(document).ready(function ($) {
    $(".photo-container article img").one("load", function () {
        var photoContainer = $(".photo-container");
        var width = 0;
        var articles = $(".photo-container article");
        articles.each(function (index) {
            console.log("index: " + index);
            console.log("width: " + $(this).outerWidth());
            width += parseFloat($(this).outerWidth());
            console.log("summed width: " + width);
        });
        width += $(window).outerWidth() * 0.2 + 100;
        console.log(articles.length);
        console.log("total width: " + width);
        photoContainer.css('width', parseInt(width) + "px");

        var elem = $.jInvertScroll(['.photo-container'],        // an array containing the selector(s) for the elements you want to animate
            {
                height: parseInt(width), // optional: define the height the user can scroll, otherwise the overall length will be taken as scrollable height
                onScroll: function(percent) {   //optional: callback function that will be called when the user scrolls down, useful for animating other things on the page
                    // console.log(percent);
                }
            });

        photoContainer.magnificPopup({
            delegate: 'article a',
            type: 'image',
            gallery: {
                enabled: true
            },
            callbacks: {
                change: function () {
                    this.content.on("contextmenu", function () {
                        return false;
                    })
                }
            }
        });
    }).each(function () {
        if(this.complete) $(this).load();
    });

    $(".photo-container img").on("contextmenu", function () {
        return false;
    });

    $("header#masthead .site-branding .menu-toggle").on("click", function (e) {
        $(".main-navigation").toggle();
    });

    masonryGridImages = $('.grid .grid-item img');
    $(window).load( function (e) {
        // alert('img loaded');
        var project_masonry_grid = $(".grid");
        if(project_masonry_grid){
            project_masonry_grid.magnificPopup({
                delegate: 'a',
                type: 'image',
                gallery: {
                    enabled: true
                },
                callbacks:{
                    change: function () {
                        this.content.on("contextmenu", function () {
                            return false;
                        })
                    }
                }
            });
            project_masonry_grid.isotope({
                itemSelector: '.grid-item',
                percentPosition: true,
                masonry: {
                    // use outer width of grid-sizer for columnWidth
                    columnWidth: '.grid-sizer',
                    gutter: 5
                }
            });
        }
    }).each(function () {
        if($(this).complete) $(this).load();
    });

    var galleryWrapper = $(".gallery-wrapper");
    galleryWrapper.magnificPopup({
        delegate: 'article a',
        type: 'image',
        gallery: {
            enabled: true
        },
        callbacks: {
            change: function () {
                this.content.on("contextmenu", function () {
                    return false;
                })
            }
        }
    });

    $(".gallery-wrapper img").on("contextmenu", function () {
        return false;
    });

    $('body.search.search-results article.photos a img').on('contextmenu', function(){
        return false;
    });

    $('body.search.search-results main').magnificPopup({
        delegate: 'article.photos a',
        type: 'image',
        gallery: {
            enabled: false
        },
        callbacks: {
            change: function () {
                this.content.on("contextmenu", function () {
                    return false;
                })
            }
        }
    });
});