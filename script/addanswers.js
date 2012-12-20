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
                table.append('<div class="answer" id="input'+i+'"><input name="ok'+i+'" type="checkbox" value="2" class="big_checkbox" /><input name="answer'+i+'" type="text" class="big_input" style="width: 445px" /></div>');
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
                return "Вы не сохранили изменения. При закрытии страницы картинки не удалится.";
            };
        };        
		
});
function dynamicTextarea(t) {
    content = t.val();
    content = content.replace(/\n$/, '<br/>&nbsp;')
    .replace(/\n/g, '<br/>')
    .replace(/\s/g, '&nbsp;');
    $('.textAreanone').html(content).append('<br/>&nbsp;');
    t.animate({ height : $('.textAreanone').height()},100)
}
