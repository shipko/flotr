$(document).ready(function() {
    
    var dropZone = $('#dropZone'),
        maxFileSize = 1000000; // ������������ ������ ����� - 1 ��.
    
    // �������� ��������� ���������
    if (typeof(window.FileReader) == 'undefined') {
        dropZone.text('�� �������������� ���������!');
        dropZone.addClass('error');
    }
    
    // ��������� ����� hover ��� ���������
    dropZone[0].ondragover = function() {
        dropZone.addClass('hover');
        return false;
    };
    
    // ������� ����� hover
    dropZone[0].ondragleave = function() {
        dropZone.removeClass('hover');
        return false;
    };
    
    // ������������ ������� Drop
    dropZone[0].ondrop = function(event) {
        event.preventDefault();
        dropZone.removeClass('hover');
        dropZone.addClass('drop');
        
        var file = event.dataTransfer.files[0];
        
        // ��������� ������ �����
        if (file.size > maxFileSize) {
            dropZone.text('���� ������� �������!');
            dropZone.addClass('error');
            return false;
        }
        
        // ������� ������
        var xhr = new XMLHttpRequest();
        xhr.upload.addEventListener('progress', uploadProgress, false);
        xhr.onreadystatechange = stateChange;
        xhr.open('POST', 'upload.php');
        xhr.setRequestHeader('X-FILE-NAME', file.name);
        xhr.send(file);
    };
    
    // ���������� ������� ��������
    function uploadProgress(event) {
        var percent = parseInt(event.loaded / event.total * 100);
        dropZone.text('��������: ' + percent + '%');
    }
    
    // ���� ���������
    function stateChange(event) {
        if (event.target.readyState == 4) {
            if (event.target.status == 200) {
                dropZone.text('�������� ������� ���������!');
            } else {
                dropZone.text('��������� ������!');
                dropZone.addClass('error');
            }
        }
    }
    
});