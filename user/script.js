
var sideNavResponsive = document.querySelector('#sideNavResponsive');
const dropImageClick = document.querySelector('.header-left .profile-image img');
const dropProfile = document.querySelector('.header-left .drop-profile');
const dropProfileImage = document.querySelector('.header-left .drop-profile .profile-image');

function closeSideNav() {
    sideNavResponsive.style.transform = 'translate(-100%, -0%)';
}
function sideNav() {
    sideNavResponsive.style.transform = 'translate(0%, 0%)';

}

window.onload = function() {
    document.onclick = function(event) {
        if(event.target.id !== 'sideNavResponsive' && event.target !== document.querySelector('.ham')) {
            sideNavResponsive.style.transform = 'translate(-100%, 0%)';
        }
    }
}

function closeProf() {
    document.querySelector('.drop-profile-details').style.display = "none";
}



function showDrop() {
    dropProfile.classList.remove('upAnimate');
    dropProfile.style.visibility = 'visible';
    dropProfile.classList.add('downAnimate');
    dropProfileImage.style.display = 'block';
    dropImageClick.style.display = 'none';
}
 function custom() {
        
        dropProfile.classList.remove('downAnimate');
        dropProfile.classList.add('upAnimate');
        dropProfile.style.visibility = 'hidden';
        dropImageClick.style.display = 'block';
        dropProfileImage.style.display = 'none';
    }


window.onload = function() {
    document.onclick = function(event) {
        if(event.target.id !== 'sideNavResponsive' && event.target !== document.querySelector('.ham')) {
            sideNavResponsive.style.transform = 'translate(-100%, 0%)';
        }
    }
}