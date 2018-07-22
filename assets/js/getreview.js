/* Set the width of the side navigation to 250px */
function openNavleft() {
    document.getElementById("mySidenavleft").style.width = "250px";
}

/* Set the width of the side navigation to 0 */
function closeNavleft() {
    document.getElementById("mySidenavleft").style.width = "0";
}

// full width 
/* Open the sidenav */
function openNavright() {
    document.getElementById("mySidenavright").style.width = "100%";
}

/* Close/hide the sidenav */
function closeNavright() {
    document.getElementById("mySidenavright").style.width = "0";
}


// profile
$(document).ready(function(){
	  $(".onclickopen-p").hide();
    $(".edtpjs-p").click(function(){
        $(".onclckdspnone-p").hide();
        $(".onclickopen-p").show();
    });
});

// evaluator profile
$(document).ready(function(){
	  $(".ppclickshw-p").hide();
    $(".evaluedt-pp").click(function(){ //Edit click
        $(".clickhide-pevl-p").hide();
        $(".ppclickshw-p").show();
    });
});
