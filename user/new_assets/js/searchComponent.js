$(document).ready(function(){

    if( (window.screen.width >='992') && (window.screen.width <='1199')) {
       
    // Search top nav:
    $("#searchInput").click(function() {
        $("#searchInput").css({
            width: "200px",
            padding: "0 6px",
            color: "#333",
        });
    });
    }
    else if(window.screen.width >='1200'){
       
    // Search top nav:
    $("#searchInput").click(function() {
        $("#searchInput").css({
            width: "200px",
            padding: "0 6px",
            color: "#333",
        });
    });
    }
    else if((window.screen.width >='768') && (window.screen.width <='991')){
       
    // Search top nav:
    $("#searchInput").click(function() {
        $("#searchInput").css({
            width: "200px",
            padding: "0 6px",
            color: "#333",
        });
    });
    }
    else if((window.screen.width >='576') && (window.screen.width <='767')) {
       
    // Search top nav:
    $("#searchInput").click(function() {
        $("#searchInput").css({
            width: "200px",
            padding: "0 6px",
            color: "#333",
        });
    });
    }
    else if((window.screen.width >='425') && (window.screen.width <='575')){
       
        // Search top nav:
        $("#searchInput").click(function() {
            $("#searchInput").css({
                width: "140px",
                padding: "0 6px",
                color: "#333",
            });
        });
    }
    else if((window.screen.width >='375') && (window.screen.width <='424')) {
    
        // Search top nav:
        $("#searchInput").click(function() {
            $("#searchInput").css({
                width: "100px",
                padding: "0 6px",
                color: "#333",
            });
        });
    }
    else if((window.screen.width >='320') && (window.screen.width <='374')) {
        // Search top nav:
        $("#searchInput").click(function() {
            $("#searchInput").css({
                width: "60px",
                padding: "0 6px",
                color: "#333",
            });
        });
    }

});