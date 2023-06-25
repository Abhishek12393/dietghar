window.onload = function() {
    // Global Js for Sidebar/nav
    hamburger = document.querySelector('.hamburger');
    const wrapper = document.querySelector('.wrapper');
    const push_hamburger = document.querySelector('#hamburger_push');
    const mobile_sidenav = document.querySelector('#mobile_sidenav');   
    // After toggle Change the color of sidenav Also:
    const sidebar = document.getElementsByClassName('sidebar');


    hamburger.addEventListener('click', () => {
        wrapper.classList.toggle('collapse_sm');
        mobile_sidenav.classList.toggle('d-block');
        mobile_sidenav.classList.toggle('bg-white');
        hamburger.classList.toggle('bg-white');
    })
	
	

    // Search top nav:
    // $("#searchInput").click(function() {
    //     $("#searchInput").css({
    //         width: "200px",
    //         padding: "0 6px",
    //         color: "#333",
    //     });
    // });

    // videos page.



    if ((window.screen.width >= '992') && (window.screen.width <= '1199')) {

        $("button").click(function() {
            $("button").removeClass("active");
            $(this).addClass("active");
        });
        $('.grid_changer').click(function() {
            $(".video_container").removeClass('col-sm-4 col-md-4 col-lg-4 col-xl-3');
            $(".video_container").addClass('col-sm-6 col-md-6 col-lg-6 col-xl-3');
        });
        $('.grid_changer-2').click(function() {
            $(".video_container").removeClass('col-sm-6 col-md-6 col-lg-6 col-xl-3');
            $(".video_container").addClass('col-sm-4 col-md-4 col-lg-4 col-xl-3');
        });
    } else if (window.screen.width >= '1200') {
        $("button").click(function() {
            $("button").removeClass("active");
            $(this).addClass("active");
        });
        $('.grid_changer').click(function() {
            $(".video_container").removeClass('col-sm-4 col-md-4 col-lg-4 col-xl-3');
            $(".video_container").addClass('col-sm-6 col-md-6 col-lg-6 col-xl-4');
        });
        $('.grid_changer-2').click(function() {
            $(".video_container").removeClass('col-sm-6 col-md-6 col-lg-6 col-xl-4');
            $(".video_container").addClass('col-sm-4 col-md-4 col-lg-4 col-xl-3');
        });
    } else if ((window.screen.width >= '768') && (window.screen.width <= '991')) {
        $("button").click(function() {
            $("button").removeClass("active");
            $(this).addClass("active");
        });
        $('.grid_changer').click(function() {
            $(".video_container").removeClass('col-sm-4 col-md-4 col-lg-4 col-xl-4');
            $(".video_container").addClass('col-sm-6 col-md-6 col-lg-6 col-xl-6');
        });
        $('.grid_changer-2').click(function() {
            $(".video_container").removeClass('col-sm-6 col-md-6 col-lg-6 col-xl-6');
            $(".video_container").addClass('col-sm-4 col-md-4 col-lg-4 col-xl-4');
        });
    } else if ((window.screen.width >= '576') && (window.screen.width <= '767')) {
        $("button").click(function() {
            $("button").removeClass("active");
            $(this).addClass("active");
        });
        $('.grid_changer').click(function() {
            $(".video_container").removeClass('col-sm-4 col-lg-4 col-xl-4');
            $(".video_container").addClass('col-sm-6 col-lg-6 col-xl-6');
        });
        $('.grid_changer-2').click(function() {
            $(".video_container").removeClass('col-sm-6 col-lg-6 col-xl-6');
            $(".video_container").addClass('col-sm-4 col-lg-4 col-xl-4');
        });
    } else if ((window.screen.width >= '425') && (window.screen.width <= '575')) {
        $("button").click(function() {
            $("button").removeClass("active");
            $(this).addClass("active");
        });
        $('.grid_changer').click(function() {
            $(".video_container").removeClass('col-12');
            $(".video_container").addClass('col-6');
        });
        $('.grid_changer-2').click(function() {
            $(".video_container").removeClass('col-6');
            $(".video_container").addClass('col-12');
        });
    } else if ((window.screen.width >= '375') && (window.screen.width <= '424')) {
        $("button").click(function() {
            $("button").removeClass("active");
            $(this).addClass("active");
        });
        $("button").click(function() {
            $("button").removeClass("active");
            $(this).addClass("active");
        });
        $('.grid_changer').click(function() {
            $(".video_container").removeClass('col-12');
            $(".video_container").addClass('col-6');
        });
        $('.grid_changer-2').click(function() {
            $(".video_container").removeClass('col-6');
            $(".video_container").addClass('col-12');
        });
    } else if ((window.screen.width >= '320') && (window.screen.width <= '374')) {
        $("button").click(function() {
            $("button").removeClass("active");
            $(this).addClass("active");
        });
        $('.grid_changer').click(function() {
            $(".video_container").removeClass('col-12');
            $(".video_container").addClass('col-6');
        });
        $('.grid_changer-2').click(function() {
            $(".video_container").removeClass('col-6');
            $(".video_container").addClass('col-12');
        });
    }


    var theToggle = document.getElementById("toggle");

    // hasClass
    function hasClass(elem, className) {
        return new RegExp(" " + className + " ").test(" " + elem.className + " ");
    }
    // addClass
    function addClass(elem, className) {
        if (!hasClass(elem, className)) {
            elem.className += " " + className;
        }
    }
    // removeClass
    function removeClass(elem, className) {
        var newClass = " " + elem.className.replace(/[\t\r\n]/g, " ") + " ";
        if (hasClass(elem, className)) {
            while (newClass.indexOf(" " + className + " ") >= 0) {
                newClass = newClass.replace(" " + className + " ", " ");
            }
            elem.className = newClass.replace(/^\s+|\s+$/g, "");
        }
    }
    // toggleClass
    function toggleClass(elem, className) {
        var newClass = " " + elem.className.replace(/[\t\r\n]/g, " ") + " ";
        if (hasClass(elem, className)) {
            while (newClass.indexOf(" " + className + " ") >= 0) {
                newClass = newClass.replace(" " + className + " ", " ");
            }
            elem.className = newClass.replace(/^\s+|\s+$/g, "");
        } else {
            elem.className += " " + className;
        }
    }

    theToggle.onclick = function() {
        toggleClass(this, "on");
        return false;
    };

    // Recipe one Page Js
    $("#toggle").click(function() {
        $("#menu").css({
            "position": "absolute",
            "top": "170px !important",
            "left": "8px !important",
            "animation-name": "menu",
            "animation-duration": "1.3s",
        });
    });

    var theToggle_sm = document.getElementById("toggle_sm");

    // hasClass
    function hasClass(elem, className) {
        return new RegExp(" " + className + " ").test(" " + elem.className + " ");
    }
    // addClass
    function addClass(elem, className) {
        if (!hasClass(elem, className)) {
            elem.className += " " + className;
        }
    }
    // removeClass
    function removeClass(elem, className) {
        var newClass = " " + elem.className.replace(/[\t\r\n]/g, " ") + " ";
        if (hasClass(elem, className)) {
            while (newClass.indexOf(" " + className + " ") >= 0) {
                newClass = newClass.replace(" " + className + " ", " ");
            }
            elem.className = newClass.replace(/^\s+|\s+$/g, "");
        }
    }
    // toggleClass
    function toggleClass(elem, className) {
        var newClass = " " + elem.className.replace(/[\t\r\n]/g, " ") + " ";
        if (hasClass(elem, className)) {
            while (newClass.indexOf(" " + className + " ") >= 0) {
                newClass = newClass.replace(" " + className + " ", " ");
            }
            elem.className = newClass.replace(/^\s+|\s+$/g, "");
        } else {
            elem.className += " " + className;
        }
    }

    theToggle_sm.onclick = function() {
        toggleClass(this, "on_sm");
        return false;
    };
    $("#toggle_sm").click(function() {
        $("#menu_sm").css({
            "animation-name": "menu_sm",
            "animation-duration": "1.3s",
        });
    });
    // Chart widget toggle button:
    function chat_toggle() {
        var x = document.getElementById("chat_widget");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
};