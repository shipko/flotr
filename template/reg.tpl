{HEADER}
     <div class="container">
        <div class="row">
            <div class="span8">
                <div class="hero-unit">
					<form class="form-horizontal" id="submitForm" action="signup.php?act=do" method="post">
						<h2>Регистрация</h2>
						{message}
                                                <div id="controlName" class="control-group">
							<label class="control-label" for="inputName">Имя</label>
							<div class="controls">
							  <input type="text" id="inputName" name="name" placeholder="Введите ваше имя"><span class="help-inline" style="font-size: 14px;"></span>
							</div>
						</div>
                                                <div id="controlSurname" class="control-group">
							<label class="control-label" for="inputSurname">Фамилия</label>
							<div class="controls">
							  <input type="text" id="inputSurname" name="surname" placeholder="Введите вашу фамилию"><span class="help-inline" style="font-size: 14px;"></span>
							</div>
						</div>
						<div id="controlLogin" class="control-group">
							<label class="control-label" for="inputLogin">Логин</label>
							<div class="controls">
							  <input type="text" id="inputLogin" name="login" placeholder="Введите логин"><span class="help-inline" style="font-size: 14px;"></span>
							</div>
						</div>
						<div id="controlPassword" class="control-group">
							<label class="control-label" for="inputPassword">Пароль</label>
							<div class="controls">
							  <input type="password" id="inputPassword" name="pass" placeholder="Введите пароль"><span class="help-inline" style="font-size: 14px;"></span>
							</div>
						</div>
                                                <div id="controlEmail" class="control-group">
							<label class="control-label" for="inputEmail">Email</label>
							<div class="controls">
							  <input type="text" id="inputEmail" name="email" placeholder="Введите ваш email"><span class="help-inline" style="font-size: 14px;"></span>
							</div>
						</div>
						<div class="control-group">
							<div class="controls">	
							  <button type="submit" id="submit" class="btn btn-success">Регистрация</button>
							</div>
						</div>
                    </form>	
                </div>
            </div>
            <div class="span4">
                <h1>Список предметов</h1>
                
                <ul class="nav nav-list">
                    {rightBar}
                </ul>
                
            </div>
            
        
        </div>
     
{FOOTER}