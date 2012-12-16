$('.oneMark').live('click', function() {
    id = parseInt($(this).attr('id'), 10);
    if(id != 1) {
        if (id < ballOpt['3'][1]) {
            cycle(id,ballOpt['3'][1],ballOpt['3'][0],ballOpt['2'][0]);
            changeNumber(id,'3');
        } else if (ballOpt['5'][1] < id) {
            cycle(ballOpt['4'][1],id,ballOpt['4'][0],ballOpt['5'][0]);
            changeNumber(id,'5');
        }
        else if (id > ballOpt['3'][1] && ballOpt['4'][1] > id && id != ballOpt['3'][1]) {
            var i = (ballOpt['4'][1] - ballOpt['3'][1]) / 2;
            if ((i + ballOpt['3'][1]) < id) {
                cycle(id,ballOpt['4'][1],ballOpt['4'][0],ballOpt['3'][0]);
                changeNumber(id,'4');
            } else {
                cycle(ballOpt['3'][1],id,ballOpt['2'][0],ballOpt['3'][0]);
                changeNumber(id,'3');
            }
        } else if (id > ballOpt['4'][1] && ballOpt['5'][1] > id && id != ballOpt['4'][1]) {
            var i = (ballOpt['5'][1] - ballOpt['4'][1]) / 2;
            if ((i + ballOpt['4'][1]) < id) {
                cycle(id,ballOpt['5'][1],ballOpt['5'][0],ballOpt['4'][0]);
                changeNumber(id,'5');
            } else {
                cycle(ballOpt['4'][1],id,ballOpt['3'][0],ballOpt['4'][0]);
                changeNumber(id,'4');
            }
        }
        animateInput();
    }
});
$('#selectMark').live('click', function() {
    $('.blockBall').slideToggle(500);
});
function loadLines() {
    var first = 2;
    for(var a = 1; a <= 20; a++) {
        if (ballOpt[first + 1][1] == a) {
            first += 1;
            $('#'+ a).addClass('selectMark');
            $('#'+ a).text(first);
            
            $('#lines_'+a).text(a);
            $('#lines_'+a).addClass('selectLine');
        }
        $('#'+ a).addClass(ballOpt[first][0]);
    }
}

function cycle(start, end, param,toggle) {
    
    for(var s=start; s < end; s++) {
        $('#' + s).removeClass(toggle);
        $('#' + s).addClass(param);
    }
}
function changeNumber(num,params) {
    // Изменяем линию
    $('#lines_'+num).addClass('selectLine');
    $('#lines_'+ballOpt[params][1]).removeClass('selectLine');
    $('#lines_'+num).text(num);
    $('#lines_'+ballOpt[params][1]).empty();
    // Изменяем цифру в цветном квадрате
    $('#'+num).text(params);
    $('#'+ballOpt[params][1]).empty();
    
    // Меняем значение
    ballOpt[params][1] = num;
    $('#factor'+params).val(num);
    $('#is_edit').val('true');
}
function animateInput() {
    for(var a = 3; a <= 6; a++) {
        var s = (ballOpt[''+a+''][1] - ballOpt[''+a-1+''][1]) * 30;
        $('#timeInput_' + (a-1)).width(s);
    }
}
$(document).ready(function(){
    loadLines();
});
