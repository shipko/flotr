    function calcBall(percent,id,time) {
        $.ajax({ type: 'POST', async: false, cache: false, url: "./test.php?act=getBall",
            data: ({ 
				'percent': percent, 
				'id': id, 
				'time': time, 
				'true_answer': number_true_answers,
				'array': arrResultAnswer
				}),
            success: function(data) { 
                $('.percent').text(data);
            }
        });
        
    }
    
    // Конец
    
    function succesRequest(arr) {
        if(arr.bool == 'true') {
            number_true_answers = number_true_answers + 1;
            $('button.btn#' + arr.id).addClass('btn-success');
        } else
            $('button.btn#' + arr.id).addClass('btn-danger');
        
		arrResultAnswer[arr.id] = arr.bool;
		
        $('#'+arr.id).popover({ 
				trigger: 'hover',
				placement: 'top',
				content: showAsk(arr.id),
				title: lang['questions']
		});
		
		
    }
    
    
    function AjaxTest(id,type,async) {
        // Следующий вопрос
		i++;
		if (type == 1) {
			// Проверка теста
            $.ajax({ type: "POST", dataType: 'json', async: async, cache: false, url: "./test.php?act=test&type=1",
                data: ({ 'id': id}),
                success: function(data) { succesRequest(data)  }
            });
		}
        else if (type == 2) {
            var valueinp = $('.InputAns').val();
            $.ajax({ type: "POST", dataType: 'json', async: async, cache: false, url: "./test.php?act=test&type=2",
                data: ({ 'id': id, 'value' : valueinp }),
                success: function(data) { succesRequest(data)  }
            });     
        } 
        else if (type == 3) {
			var idParam = new Array()
			a = 0;
			for (var j in arrType) { 
				if (arrType) {
					idParam[a] = j;
					a++;
				}
			}

            $('#btn-enter').animate({ height: '0px'});
			$('#a3').css('display', 'none');
            $.ajax({ type: "POST", dataType: 'json', async: async, cache: false, url: "./test.php?act=test&type=3",
                data: { 'id' : idParam, 'test' : id },
                success: function(data) { succesRequest(data)  }
            }); 
        }
    }
	
    function NextAsk(i) {
        ul.html('');
		addAsk(arr.questions[i].text);
        
		addImages(arr.questions[i]);
		
        if (arr.questions[i].type == 1) {
            AskType1(i);
        } else if(arr.questions[i].type == 2) {
            AskType2(i);
        } else if (arr.questions[i].type == 3) {
			AskType3(i);
		}
		$('button.btn#' + (i+1) ).attr('id', arr.questions[i].id);
        $(window).load(function () {
            $('.LeftBar').height($('.MainBar').innerHeight()-5);
        });
    }
    function EndTest(time) {
        percent = calcPercent(arr.questions.length,number_true_answers);
        block_answer.css({'width' : '100%'});
        $("#ask").html(lang['test_complete']);
        block_answer.html("<div class='percent'></div>\n\
        <div class='inform'><p>"+lang['test_complete_in'] + rulesTime(time,lang['arr_seconds']) + " <br />"+lang['number_true_answers']+number_true_answers+"<br />"+lang['test_complete_on']+percent+"%<br /> <br /> <div class='buttonVK'><a href='javascript:location.reload(true)'>"+lang['refresh']+"</a></p></div><div class='buttonVK'><a href='http://vkontakte.ru/share.php?url=http://sfml.tom.ru/tests/&image=http://sfml.tom.ru/tests/template/images/logo_main.png&title=%D0%AF+%D0%BF%D1%80%D0%B0%D0%B2%D0%B8%D0%BB%D1%8C%D0%BD%D0%BE+%D0%BE%D1%82%D0%B2%D0%B5%D1%82%D0%B8%D0%BB+%D0%BD%D0%B0+"+number_true_answers+"+%D0%B8%D0%B7+"+rulesTime(arr.questions.length,lang['arr_questions'])+"&description=%D0%92+%D1%82%D0%B5%D1%81%D1%82%D0%B5+%D0%BF%D0%BE+%D1%82%D0%B5%D0%BC%D0%B5+%22"+encodeURIComponent(theme)+"%22' target='_blank'>"+lang['tell_vk']+"</a></div></div>");
        calcBall(percent,test_id,time);
        $('.LeftBar').height($('.MainBar').innerHeight()-5);
        return true;
    }
    function AskType1(i) {
        $(arr.questions[i].answers).each(function(){
            var li = $('<li>',{
                id      : this.id,
                html    : this.text
            });
            li.addClass(this.add_class);
            li.data('object',this);
            ul.append(li);
        });
        
    }
    function AskType2(i) {
		$(arr.questions[i].answers).each(function(){
			var input = $('<input>',{ id : this.id+'_input', value : lang['enter_answer'] });
			input.addClass('InputAns');
			input.data('object',this);
			var but = $('<div>',{
				id      : this.id,
				html    : lang['reply']
			});
			but.addClass('but a2');
			
			
			ul.append(input);
			ul.append(but);
			Focus(this.id);
		});
    }
	function AskType3(i) {
	funcType3();
		$(arr.questions[i].answers).each(function(){
            var li = $('<li>',{
                id      : this.id,
                html    : this.text
            });
            li.addClass(this.add_class);
            li.data('object',this);
            ul.append(li);
        });
    }
	
	function funcType3() {
		countCheckAnswer = 0;
	}
	
    function isClick() {
		$('.a1').live('click', function(event) { handleClickOne($(this)) });
		$('.a2').live('click', function(event) { handleClickTwo($(this)) });
		// Нажимаем кнопку "Ответить"
		$('#a3').live('click', function(event) { handleClickThree($(this)) });
		// Выбираем ответ
		$('.a3').live('click', function(event) { changeButtonType3($(this)) });
    }
    
    function Focus(id) {
        $('.InputAns').focus(function(){
            if($('.InputAns').val() == lang['enter_answer']) {
            $('.InputAns').val('');
            }
        });
        $('.InputAns').blur(function(){
            if($('.InputAns').val().length == '') {
            $('.InputAns').val(lang['enter_answer']);
            }
        });
    }  
	function GoGo(id,type) {
        if((arr.questions.length - 1) == i) {
            time = (Math.round(+new Date()/1000)-time);
			EndTestLoading();
            // Проверка теста
            // Выполняется синхронный запрос
            AjaxTest(id,type,false);
            EndTest(time);
           }
        else {
            // Проверка теста
            AjaxTest(id,type,true); 
            // Следующий вопрос
            NextAsk(i);
        }
    }

    function showAsk(id) {
        for(var j = 0; j < arr.questions.length; j++) {
            if (arr.questions[j].id == id) {
                return arr.questions[j].text;
            }
        }
    }
    
    var i = 0,
    time = Math.round(+new Date()/1000),
    number_true_answers = 0, // количество правильных ответов
    ul=$('ul.ans'),
    sc=$('ul.sc'),
    images = $('div.images'), 
    block_answer=$('div.answer'),
	arrType = [],
	arrResultAnswer = {},
	countCheckAnswer = 0;
    // слова
    theme=$('#theme').text();
    // конец слов
    $('#theme').html();
    // Первый вопрос
    NextAsk(0);
    isClick();
    
    $("#error_message").ajaxError(function(event, request, settings){ 
        $(this).css({'display' : 'block'});
        $(this).html(lang['ajax_error'] + ' ' + lang['on_page'] + settings.url + "</br>" + lang['you_cannot_test_complete']);   
    });  