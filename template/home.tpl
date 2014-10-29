{HEADER}
<style type="text/css">
	.popover {
		width: 415px;
	}
	.popover_center {
		width: 100%;
		text-align: center;
	}
</style>
     <div class="container">
        <div class="row">
         <div class="span8">

                <h3>Добрый день, {username}</h3>

                <p>Последние пройденные тесты</p>
                <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Дата</th>
                  <th>Название теста</th>
                  <th>Оценка</th>
                  <th>Опции</th>
                </tr>
              </thead>

              <tbody>
				{result}
              </tbody>

            </table>

        

            </div>
            <div class="span4">
                <h3>Предметы</h3>
                <div class="well">
					<ul class="nav nav-list nav-stacked">
						{rightBar}
					</ul>
				</div>
                
                
            </div>
            
        
        </div>
{FOOTER}

