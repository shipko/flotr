{HEADER}
     <div class="container">
        <div class="row">
            <div class="span8">
                <div class="hero-unit">
					<form class="form-horizontal" id="submitForm" action="signup.php?act=do" method="post">
						<h2>�����������</h2>
						{message}
                                                <div id="controlName" class="control-group">
							<label class="control-label" for="inputName">���</label>
							<div class="controls">
							  <input type="text" id="inputName" name="name" placeholder="������� ���� ���"><span class="help-inline" style="font-size: 14px;"></span>
							</div>
						</div>
                                                <div id="controlSurname" class="control-group">
							<label class="control-label" for="inputSurname">�������</label>
							<div class="controls">
							  <input type="text" id="inputSurname" name="surname" placeholder="������� ���� �������"><span class="help-inline" style="font-size: 14px;"></span>
							</div>
						</div>
						<div id="controlLogin" class="control-group">
							<label class="control-label" for="inputLogin">�����</label>
							<div class="controls">
							  <input type="text" id="inputLogin" name="login" placeholder="������� �����"><span class="help-inline" style="font-size: 14px;"></span>
							</div>
						</div>
						<div id="controlPassword" class="control-group">
							<label class="control-label" for="inputPassword">������</label>
							<div class="controls">
							  <input type="password" id="inputPassword" name="pass" placeholder="������� ������"><span class="help-inline" style="font-size: 14px;"></span>
							</div>
						</div>
                                                <div id="controlEmail" class="control-group">
							<label class="control-label" for="inputEmail">Email</label>
							<div class="controls">
							  <input type="text" id="inputEmail" name="email" placeholder="������� ��� email"><span class="help-inline" style="font-size: 14px;"></span>
							</div>
						</div>
						<div class="control-group">
							<div class="controls">	
							  <button type="submit" id="submit" class="btn btn-success">�����������</button>
							</div>
						</div>
                    </form>	
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