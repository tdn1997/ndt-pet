<?php 

/**
* 
*/
class ProductController extends Controller
{
	
	function __construct()
	{
		$this->folder = "default";
	}
	function index(){
		$this->List();
	}
	function List($type = null){
		require_once 'vendor/Model.php';
		require_once 'models/default/productModel.php';
		require_once 'models/admin/categoryModel.php';
		$ctgr = new categoryModel;
		$allCtgrs = $ctgr->getAllCtgrs();
		$md = new productModel;

		$data = $title = null;
		switch ($type) {
			case 'BestSelling':
			$data = $md->getPrds('luotmua',0,8);
			$title = "<span id='contentTitle' data-type='bestselling'>Mua nhiều tuần qua</span>";
			break;
			case 'Newest':
			$data = $md->getPrds('ngay_nhap',0,8);
			$title = "<span id='contentTitle' data-type='newest'>Sản phẩm mới</span>";
			break;
			case 'OnSale':
			$data = $md->getPrds('khuyenmai',0,8);
			$title = "<span id='contentTitle' data-type='onsale'>Sản phẩm đang giảm giá</span>";
			break;
			case 'All':
			$data = $md->getPrds('gia',0,8);
			$title = "<span id='contentTitle' data-type='all'>Sản phẩm đang giảm giá</span>";
			break;
			case '':
			$data = $md->getPrds('gia',0,8);
			$title = "<span id='contentTitle' data-type='all'>Sản phẩm đang giảm giá</span>";
			break;

			default:
			for ($i=0; $i < count($allCtgrs); $i++) {
				$case = preg_replace('/\s+/', '', ucfirst($allCtgrs[$i]['tendm']));
				switch ($type) {
					case $case:
					$data = $md->getPrds('gia',0,8,'madm = '.$allCtgrs[$i]['madm']);
					$title = "<span id='contentTitle' data-type='".$case."'>Thương hiệu: ".$allCtgrs[$i]['tendm']."</span>";
					break;
				}
			}
		}
		$this->render('Products',$data, $title);
	}

	function PrdDetail($masp){
		require_once 'vendor/Model.php';
		require_once 'models/default/productModel.php';
		$md = new productModel;
		$data = $md->getPrdById($masp);
		$title = $data['tensp'];
		require_once 'views/default/ProductDetail.php';
	}
	
	function add(){
		if(!isset($_POST['tenSanPham']) 
		|| !isset($_POST['giaBan']) 
		|| !isset($_POST['baoHanh'])
		|| !isset($_POST['madm'])
		|| !isset($_FILES["anhChinh"]["name"])
		|| $_POST['tenSanPham'] == ""
		|| $_POST['baoHanh'] == ""
		|| $_POST['giaBan'] == ""
		|| $_POST['madm'] == ""
		|| $_FILES["anhChinh"]["name"] == ""
		){
			echo "Xin nhập đầy đủ thông tin";
			return;
		}
		
		require_once 'vendor/Model.php';
		require_once 'models/admin/productModel.php';

		$path = 'images/uploads/'; // upload directory
		$md = new productModel;
		
		$img = $_FILES["anhChinh"]["name"] ;
		$tmp = $_FILES['anhChinh']['tmp_name'];
		// get uploaded file's extension
		$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
		// can upload same image using rand function
		$final_image = rand(1000,1000000).$img;
		
		$path = $path.strtolower($final_image);
		
		if(!move_uploaded_file($tmp,$path)) {
			echo "Lỗi khi tải lên hình ảnh";
			return;
		}
		
		$tenSanPham = $_POST['tenSanPham'];
		$giaBan = $_POST['giaBan'];
		$baoHanh = $_POST['baoHanh'];
		$khuyenMai = $_POST['khuyenMai'];
		$madm = $_POST['madm'];
		$anhChinh = $final_image;
		$ngay_nhap = date("Y-m-d H:i:s");

		$data = array('', $tenSanPham, $giaBan, $baoHanh, $khuyenMai, $madm, $anhChinh, 0, 0, $ngay_nhap);
		if($md->insert('sanpham', $data)){
			echo "OK";
		}
	}

	function edit(){
		if(!isset($_POST['tenSanPham4Edit']) 
		|| !isset($_POST['giaBan4Edit']) 
		|| !isset($_POST['baoHanh4Edit'])
		|| !isset($_POST['madm4Edit'])
		|| $_POST['tenSanPham4Edit'] == ""
		|| $_POST['baoHanh4Edit'] == ""
		|| $_POST['giaBan4Edit'] == ""
		|| $_POST['madm4Edit'] == ""
		){
			echo "Xin nhập đầy đủ thông tin cần sửa";
			return;
		}
		
		require_once 'vendor/Model.php';
		require_once 'models/admin/productModel.php';

		$path = 'images/uploads/'; // upload directory
		$md = new productModel;
		
		$final_image = "";

		if(isset($_FILES["anhChinh4Edit"]["name"]) && $_FILES["anhChinh4Edit"]["name"] != ""){
			$img = $_FILES["anhChinh4Edit"]["name"] ;
			$tmp = $_FILES['anhChinh4Edit']['tmp_name'];
			// get uploaded file's extension
			$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
			// can upload same image using rand function
			$final_image = rand(1000,1000000).$img;
			
			$path = $path.strtolower($final_image);
			
			if(!move_uploaded_file($tmp,$path)) {
				echo "Lỗi khi tải lên hình ảnh";
				return;
			}
		}
		
		$masp = $_POST['masp4Edit'];
		$tenSanPham = $_POST['tenSanPham4Edit'];
		$giaBan = $_POST['giaBan4Edit'];
		$baoHanh = $_POST['baoHanh4Edit'];
		$khuyenMai = $_POST['khuyenMai4Edit'];
		$madm = $_POST['madm4Edit'];
		$anhChinh = $final_image;

		$setRow = array('tensp', 'gia', 'baohanh', 'khuyenmai', 'madm');
		$setVal = array($tenSanPham, $giaBan, $baoHanh, $khuyenMai, $madm);

		if($final_image != ""){
			array_push($setRow, "anhchinh");
			array_push($setVal, $anhChinh);
		}
		if($md->update('sanpham',$setRow, $setVal, 'masp = '.$masp)){
			echo "OK";
		}
	}

	function delete(){
		require_once 'vendor/Model.php';
		require_once 'models/admin/productModel.php';

		$md = new productModel;

		if(!isset($_POST['masp'])){
			echo "Có gì đó sai sai..";
			return;
		}
		$masp = $_POST['masp'];

		$md->delete('sanpham','masp = '.$masp);
		echo "OK";
	}
}