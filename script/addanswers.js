$(document).ready(function(){
        var i_old = i,
        table=$('#right_bar'),
        input_hidden=$('#valans');
        if(i > 2) {
            $('#delans').addClass('delansact').css('color','#69C');
        }
        
        $("span#addans").live("click", function() {
            if (i < 8) {
                $('#delans').addClass('delansact').css('color','#69C');
                i=i+1;
                input_hidden.val(i);
                if (i > i_old) {
                table.append('<div class="answer" id="input'+i+'"><input name="ok'+i+'" type="checkbox" value="2" class="big_checkbox" /><textarea name="answer'+i+'" class="big_input answerInput" id="answer'+i+'" onkeyup="dynamicTextarea(this)" style="width: 445px; min-height: 25px; height: 25px; resize: none;overflow: hidden; " /></textarea></div>');
                i_old=i_old+1;
                }
                else {
                     $('#input'+i).css('display', 'table-row');
                }
                    if(i > 7) {
                        $('#addans').removeClass('addansact').css('color','#666');
                    }
            }
        });
        $("span#delans").live("click", function() {
            if(i > 2) {
                $('#addans').addClass('addansact').css('color','#69C');
                $('#input'+i).css('display', 'none');
                i=i-1;
                input_hidden.val(i);
                if(i==2) {
                            $('#delans').removeClass('delansact').css('color','#666');
                        }
            }
        });
        
        $('.toogle').click(function() {
        $('#'+$(this).attr('to')).slideToggle("slow");
        $(this).toggleClass('on'); 
        });
        var numChange = 0;
        $('.preview.done').live('click',function () {
            var id = $(this).attr('id');
            $('#file_'+id).remove();
            $('#img_'+id+'').remove();
            $('#'+id).append('<div id="restore_'+id+'" style="margin-top: 30px; cursor: pointer;">Восстановить</div>'); 
            $('#'+ id).removeClass('done');
            $('#'+ id).addClass('restore');
            $('#'+id+' .progressHolder').css('display','none');
            numChange++;
        });
        
        $('.preview.restore').live('click',function () {
            var id = $(this).attr('id');
            var path = $('#path_'+id).val();
            $(this).append('<input type="hidden" id="file_1" name="file1" value="'+path+'">');
            $(this).append('<span class="imageHolder" id="img_'+id+'"><img src="../uploads/tests/'+test_id+'/c_'+path+'" /><span class="uploaded"></span></span>');
            $('#restore_'+id).remove(); 
            $('#'+ id).addClass('done');
            $('#'+ id).removeClass('restore');
            $('#'+id+' .progressHolder').css('display','block');
            numChange--;
        });
        
        $('#submit').live('click', function() {
            numChange = 0;
        });
        
        window.onbeforeunload = function() {
            if (numChange > 0) {
                return "Вы не сохранили изменения. Изменения не вступят в силу.";
            };
        };        
		
});

function textAreaHeight(textarea) {
		// Minimum height
        if (!textarea._tester) {
            var ta = textarea.cloneNode();
			ta.style.position = 'absolute';
            ta.style.zIndex = -2000000;
            ta.style.visibility = 'hidden'; 
            ta.style.height = '1px';
            ta.id = '';
            ta.name = '';
            textarea.parentNode.appendChild(ta);
            textarea._tester = ta;
			textarea._tester.first = textarea.clientHeight;
            textarea._offset = ta.clientHeight - 1;
        }
        if (textarea._timer) clearTimeout(textarea._timer);
        textarea._timer = setTimeout(function () {
            textarea._tester.style.width = textarea.clientWidth + 'px';
            textarea._tester.value = textarea.value;
			if (parseInt(textarea._tester.first) < parseInt(textarea.scrollHeight)) {
				 textarea.style.height = textarea._tester.scrollHeight + 'px';
			}
            textarea._timer = false;
        }, 1);
}