<script>
    window.ga = function () {
        ga.q.push(arguments)
    };
    ga.q = [];
    ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto');
    ga('send', 'pageview')
</script>
<script src="https://www.google-analytics.com/analytics.js" async defer></script>

<!--====== Vendor Js ======-->
<script src="js/vendor.js"></script>

<!--====== jQuery Shopnav plugin ======-->
<script src="js/jquery.shopnav.js"></script>

<!--====== App ======-->
<script src="js/app.js"></script>
<script>


    function domReady(fn) {
        if (document.attachEvent ? document.readyState === "complete" : document.readyState !== "loading") {
            fn();
        } else {
            document.addEventListener('DOMContentLoaded', fn);
        }
    }

    domReady(() => {
        const elems = document.querySelectorAll('.ugb-video-popup')
        const openVideo = el => {
            if (BigPicture) {
                const videoID = el.getAttribute('data-video')
                const args = {
                    el,
                    noLoader: true,
                }
                if (videoID.match(/^\d+$/g)) {
                    args['vimeoSrc'] = videoID
                } else if (videoID.match(/^https?:\/\//g)) {
                    args['vidSrc'] = videoID
                } else {
                    args['ytSrc'] = videoID
                }
                BigPicture(args)
            }
        }
        elems.forEach(el => {
            const a = el.querySelector('a')
            a.addEventListener('click', ev => {
                ev.preventDefault()
                openVideo(el)
            })
            a.addEventListener('touchend', ev => {
                ev.preventDefault()
                openVideo(el)
            })
        })
    })
</script>
<!--====== Noscript ======-->
<noscript>
    <div class="app-setting">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="app-setting__wrap">
                        <h1 class="app-setting__h1">JavaScript is disabled in your browser.</h1>

                        <span class="app-setting__text">Please enable JavaScript in your browser or upgrade to a JavaScript-capable browser.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</noscript>
</body>
</html>