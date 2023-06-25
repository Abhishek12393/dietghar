        // Get all buttons with class="btn" inside the container
        let btn_1 = document.getElementById("thyroid_yes");
        let btn_2 = document.getElementById("thyroid_no");
        let btn_3 = document.getElementById("thyroid-2_yes");
        let btn_4 = document.getElementById("thyroid-2_no");
        let btn_5 = document.getElementById("thyroid-3_yes");
        let btn_6 = document.getElementById("thyroid-3_no");
        let btn_7 = document.getElementById("thyroid-4_yes");
        let btn_8 = document.getElementById("thyroid-4_no");

        let btn_week_1 = document.getElementById("weekOne");
        let btn_week_2 = document.getElementById("weekTwo");
        let btn_week_3 = document.getElementById("weekThree");
        let btn_week_4 = document.getElementById("weekFour");
        let btn_week_5 = document.getElementById("weekFive");

        let gender_1 = document.getElementById("genderOne");
        let gender_2 = document.getElementById("genderTwo");

        // gender listners: 
        gender_1.addEventListener("click", function() {
            $("#genderTwo").removeClass("active-gender");
            $("#genderOne").addClass("active-gender");
        });
        gender_2.addEventListener("click", function() {
            $("#genderOne").removeClass("active-gender");
            $("#genderTwo").addClass("active-gender");
        });


        // Medical Questions 
        btn_2.addEventListener("click", function() {
            $("#thyroid_yes").removeClass("active-1");
            $("#thyroid_no").addClass("active-1");
        });
        btn_1.addEventListener("click", function() {
            $("#thyroid_no").removeClass("active-1");
            $("#thyroid_yes").addClass("active-1");
        });

        btn_4.addEventListener("click", function() {
            $("#thyroid-2_yes").removeClass("active-2");
            $("#thyroid-2_no").addClass("active-2");
        });
        btn_3.addEventListener("click", function() {
            $("#thyroid-2_no").removeClass("active-2");
            $("#thyroid-2_yes").addClass("active-2");
        });

        btn_6.addEventListener("click", function() {
            $("#thyroid-3_yes").removeClass("active-3");
            $("#thyroid-3_no").addClass("active-3");
        });
        btn_5.addEventListener("click", function() {
            $("#thyroid-3_no").removeClass("active-3");
            $("#thyroid-3_yes").addClass("active-3");
        });

        btn_8.addEventListener("click", function() {
            $("#thyroid-4_yes").removeClass("active-4");
            $("#thyroid-4_no").addClass("active-4");
        });
        btn_7.addEventListener("click", function() {
            $("#thyroid-4_no").removeClass("active-4");
            $("#thyroid-4_yes").addClass("active-4");
        });

        // Outing Per week
        btn_week_1.addEventListener("click", function() {
            $(this).addClass("active-w")
            $("#weekTwo").removeClass("active-w");
            $("#weekThree").removeClass("active-w");
            $("#weekFour").removeClass("active-w");
            $("#weekFive").removeClass("active-w");
        })
        btn_week_2.addEventListener("click", function() {
            $(this).addClass("active-w")
            $("#weekOne").removeClass("active-w");
            $("#weekThree").removeClass("active-w");
            $("#weekFour").removeClass("active-w");
            $("#weekFive").removeClass("active-w");
        })
        btn_week_3.addEventListener("click", function() {
            $(this).addClass("active-w")
            $("#weekTwo").removeClass("active-w");
            $("#weekOne").removeClass("active-w");
            $("#weekFour").removeClass("active-w");
            $("#weekFive").removeClass("active-w");
        })
        btn_week_4.addEventListener("click", function() {
            $(this).addClass("active-w")
            $("#weekTwo").removeClass("active-w");
            $("#weekThree").removeClass("active-w");
            $("#weekOne").removeClass("active-w");
            $("#weekFive").removeClass("active-w");
        })
        btn_week_5.addEventListener("click", function() {
            $(this).addClass("active-w")
            $("#weekTwo").removeClass("active-w");
            $("#weekThree").removeClass("active-w");
            $("#weekFour").removeClass("active-w");
            $("#weekOne").removeClass("active-w");
        })

        // $("button").click(function() {
        //     // $("button").removeClass("active");
        //     $(this).addClass("active");
        // });

        // $("#pages_btn button#weekOne").click(function() {
        //     $("#pages_btn button").removeClass("active");
        //     $(this).addClass("active");
        // });

        // $("#defination_s button#thyroid_yes").click(function() {
        //     // $("#pages_btn button").removeClass("active");
        //     $(this).addClass("active");
        // });
        // $("#defination_s button#thyroid-2_yes").click(function() {
        //     // $("#pages_btn button").removeClass("active");
        //     $(this).addClass("active");
        // });