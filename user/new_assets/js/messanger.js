$(document).ready(function(){
    $("#chat_button").click(function(){
        $("#chat_widget").toggle(
            // $(".change_img").src = "assets/img/chat/upload.png"
        );
    });
});


// function openForm() {
//     document.querySelector(".myForm").style.display = "block";
// }

function closeForm() {
    document.querySelector(".myForm").style.display = "none";
}