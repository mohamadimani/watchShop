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
@livewireScripts
