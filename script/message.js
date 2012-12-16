$(document).ready(function(){
    var boxText = $('#messageBox p b'),
        box = $('#messageBox');
	/* Converting the #box div into a bounceBox: */
	$('#messageBox').bounceBox();

        setTimeout(function (e) {
            box.bounceBoxToggle();
        }, 1000);
        
        setTimeout(function (e) {
            box.bounceBoxHide();
        }, 5000);
});
