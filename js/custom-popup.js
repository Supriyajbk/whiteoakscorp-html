jQuery(document).ready(function() {
    jQuery('.popup-youtube').magnificPopup({
        type: 'iframe',
        mainClass: 'mfp-video',
        removalDelay: 160,
        preloader: !1,
        fixedContentPos: !0,
        iframe: {
            patterns: {
                youtube: {
                    index: 'youtube.com/',
                    id: 'v=',
                    src: getYouTubeSrc()
                }
            }
        }
    });

    function getYouTubeSrc() {
        var isChrome = /Chrome/.test(navigator.userAgent) && /Google Inc/.test(navigator.vendor);
        var baseSrc = 'https://www.youtube.com/embed/%id%?autoplay=1&rel=0';
        if (isChrome) {
            return baseSrc + '&mute=1'
        } else {
            return baseSrc
        }
    }
})