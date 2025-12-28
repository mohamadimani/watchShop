<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/greensock.js') }}"></script>
<script src="{{ asset('assets/js/layerslider.transitions.js') }}"></script>
<script src="{{ asset('assets/js/layerslider.kreaturamedia.jquery.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/wow.js') }}"></script>
<script src="{{ asset('assets/js/jquery.countdown.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>

<script src="{{ asset('assets/js/jquery.elevatezoom.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script>
    // Watch Demo Slider
    $('#watch-slider').layerSlider({
        sliderVersion: '6.0.5',
        maxRatio: 1,
        type: 'responsive',
        responsiveUnder: 1024,
        layersContainer: 1420,
        hideUnder: 0,
        hideOver: 100000,
        skin: 'v6',
        globalBGColor: '#ffffff',
        navStartStop: false,
        skinsPath: 'assets/skins/',
        height: 450
    });
</script>

<script>
    //initiate the plugin and pass the id of the div containing gallery images
    $("#single-image-zoom").elevateZoom({
        gallery: 'gallery_09',
        zoomType: "inner",
        cursor: "crosshair",
        galleryActiveClass: 'active',
        imageCrossfade: true,
    });
    //pass the images to Fancybox
    $("#single-image-zoom").bind("click", function(e) {
        var ez = $('#single-image-zoom').data('elevateZoom');
        $.fancybox(ez.getGalleryList());
        return false;
    });
</script>

@livewireScripts
