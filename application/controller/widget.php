<?php
class Controller_Widget{

public function view()
{
	if( isset( $_GET['id']))
		$id = $_GET['id'];
	else
		header("Location: ?r=site/index");

	if( ! $widget = Model_Widget::findById($id))
		header("Location: ?r=site/index");

	$app = new App();
	$app->widget = $widget;
	$app->render('layout/header');
	$app->render('widget/view');
	$app->render('layout/footer');
}

}
?>