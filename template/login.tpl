{HEADER}
     <div class="container">
        <div class="row">
            <div class="span8">
                <div class="hero-unit">
					<form class="form-horizontal" action="login.php?act=login" method="post">
						<h2>����</h2>
						{message}
						<div class="control-group">
							<label class="control-label" for="inputEmail">�����</label>
							<div class="controls">
							  <input type="text" id="inputEmail" name="login" placeholder="������� �����">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputPassword">������</label>
							<div class="controls">
							  <input type="password" id="inputPassword" name="pass" placeholder="������� ������">
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
							  <label class="checkbox">
								<input type="checkbox" name="alien" value="2"> ����� ���������
							  </label>
							  <button type="submit" class="btn">����</button>
							</div>
						</div>
                    </form>	
                </div>
                <div class="span4">
          <h2>�����������</h2>
           <p>����� ����������� ��� ����� �������� ������ �������.</p>
          <p><a class="btn" href="subject.php?sec=list">�����������</a></p>
        </div>
        <div class="span3">
          <h2>������ ������?</h2>
           <p>������ �������������� ������</p>
          <p><a class="btn" href="test.php?id=3">������������</a></p>
       </div>
        
            </div>
            <div class="span4">
                <h1>������ ���������</h1>
                
                <ul class="nav nav-list">
                    {rightBar}
                </ul>
                
            </div>
            
        
        </div>
     
{FOOTER}

