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
            if (sessionStorage.getItem("cookieDenied") !== "true") {
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