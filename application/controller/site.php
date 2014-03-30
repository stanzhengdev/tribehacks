<?php
	class Controller_Site{

		public function index(){
			$app = new App();
			$app->render('layout/header');
			$app->render('site/index');
			$app->render('layout/footer');
		}

	}
?>          