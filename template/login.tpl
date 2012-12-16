{HEADER}
     <div class="container">
        <div class="row">
            <div class="span8">
                <div class="hero-unit">
					<form class="form-horizontal" action="login.php?act=login" method="post">
						<h2>Вход</h2>
						{message}
						<div class="control-group">
							<label class="control-label" for="inputEmail">Логин</label>
							<div class="controls">
							  <input type="text" id="inputEmail" name="login" placeholder="Введите логин">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputPassword">Пароль</label>
							<div class="controls">
							  <input type="password" id="inputPassword" name="pass" placeholder="Введите пароль">
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
							  <label class="checkbox">
								<input type="checkbox" name="alien" value="2"> Чужой компьютер
							  </label>
							  <button type="submit" class="btn">Вход</button>
							</div>
						</div>
                    </form>	
                </div>
                <div class="span4">
          <h2>Регистрация</h2>
           <p>После регистрации Вам будет доступен личный кабинет.</p>
          <p><a class="btn" href="subject.php?sec=list">Регистрация</a></p>
        </div>
        <div class="span3">
          <h2>Забыли пароль?</h2>
           <p>Легкое восстановление пароля</p>
          <p><a class="btn" href="test.php?id=3">Восстановить</a></p>
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

