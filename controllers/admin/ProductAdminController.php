<?php

/**
* 
*/
class ProductAdminController extends Controller
{
	
	function __construct()
	{
		$this->folder = "admin";
		if(!isset($_SESSION['admin'])){
			header("Location: http://localhost:8010/nguyen-duy-thuan/indexadmin");
		}
	}
	function index(){
		require_once 'vendor/Model.php';
		require_once 'models/admin/productModel.php';
		require_once 'models/admin/categoryModel.php';
		$md = new productModel;
		$mdCat = new categoryModel;
		$data['products'] = $md->getAllPrds();
		$data['categories'] = $mdCat->getAllCtgrs();
		$dmsp = 
		$this->render('product',$data,'SẢN PHẨM','admin');
	}
}