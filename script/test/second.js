// Второстепенные функции
function rulesTime(number,arr) {
	cases = [2, 0, 1, 1, 1, 2];  
	return number + ' ' + arr[ (number%100 > 4 && number%100<20) ? 2 : cases[(number%10<5)?number%10 : 5] ];
}

function calcPercent(count_answers, count_true_answers) {
	return Math.round( (count_true_answers * 100) / count_answers);
}   

function EndTestLoading() {
	$("#ask").html(lang['loading']);
	images.html('');
	images.css({'display' : 'none'});
	
}

function isEnterDown(id) {
	$(window).keydown(function(ev){
		if (ev.keyCode == 13) {
			GoGo(id);        
		}
	});
}

function addAsk(text) {
	var k = 35;
	$('#ask').html(text);
	if(text.length > 150) {
		k = 23;
	} else if (text.length > 75) {
		k = 30;
	}
	$('#ask').css('font-size', k);
}

function addImages(array) {
		images.html('').css({'display' : 'none'});;
		if (array.path != '') {
            images.css({'display' : 'block'});
            $(array.path).each(function(){
                if (array.count_images == 1) {
                    images.append('<div class="image_row thumbnail"><img src="uploads/tests/'+test_id+'/b_'+this.path+'" /></div>');
                }
                else {
                    images.append('<div class="image_row thumbnail"><img src="uploads/tests/'+test_id+'/c_'+this.path+'" /></div>');
                }
            });
        }
}

function handleClickOne(t) {
	var button_load = $('<div>',{
		html    : '<img src="./template/images/search-preloader.gif" />'
	});
	id = t.attr('id');
	button_load.css('text-align','center');
	$('.ans').html(button_load);
	GoGo(id,1);
	return true;
}
function handleClickTwo(t) {
	id = t.attr('id');
	GoGo(id,2);
	return true;
}
function handleClickThree(t) {
	var button_load = $('<div>',{
		html    : '<img src="./template/images/search-preloader.gif" />'
	});
	id = arr.questions[i].id;
	button_load.css('text-align','center');
	$('.ans').html(button_load);
	GoGo(id,3);
	arrType.length = 0;
	return true;
}
function changeButtonType3(t) {
	var id = t.attr('id')
	if (t.hasClass('btn-ok')) {
		arrType[id] = false;
		countCheckAnswer--;
	} else {
		arrType[id] = true;
		countCheckAnswer++;
	}

	t.toggleClass('btn-ok');
	if (countCheckAnswer > 1) {
		$('#btn-enter').animate({height: '50px'});
		$('#a3').css('display', 'inline-block');
	} else {
		$('#btn-enter').animate({ height: '0px'});
		$('#a3').css('display', 'none');
	}
	return true;
}