<section class="content-header">
  <h1>
    <?php echo $title ?>
    <small>Version 2.0</small>
  </h1>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <!-- /.box-header -->
        <div class="box-body">
          <div class="container" style="margin: 10px 0;">
            <span class="btn btn-primary glyphicon glyphicon-plus btn-sm" id="addBtn"></span>
          </div>
          
          <i id="addError" style="color: red"></i>
          <div class="container" id="editArea" style="width: 100%; display: none; padding-bottom: 10px;">
            <form id='formSuaSanPham' action="" method="POST" role="form" enctype="multipart/form-data" >
              <legend>Sửa Sản phẩm</legend>
              <div class="form-group">
                <label for="tenSanPham4Edit">Tên Sản phẩm</label>
                <input type="text" class="form-control" name="tenSanPham4Edit" id="tenSanPham4Edit">
              </div>
              <div class="form-group">
                <label for="giaBan4Edit">Giá bán</label>
                <input type="text" class="form-control" name="giaBan4Edit" id="giaBan4Edit">
              </div>
              <div class="form-group">
                <label for="baoHanh4Edit">Bảo hành</label>
                <input type="text" class="form-control" name="baoHanh4Edit" id="baoHanh4Edit">
              </div>
              <div class="form-group">
                <label for="khuyenMai4Edit">Khuyến mãi</label>
                <input type="text" class="form-control" name="khuyenMai4Edit" id="khuyenMai4Edit">
              </div>
              <div class="form-group">
                <label for="anhChinh4Edit">Ảnh chính</label>
                <input type="file" accept="image/*" class="form-control" name="anhChinh4Edit" id="anhChinh4Edit">
              </div>
              <div class="form-group">
                <label for="madm4Edit">Nhà Sản xuất</label>
                <select class="form-control" name="madm4Edit" id="madm4Edit">
                  <?php
                    $categories = $data['categories'];
                    for ($i=0; $i < count($categories); $i++) { 
                  ?>
                      <option value="<?php echo $categories[$i]['madm'] ?>">
                        <?php echo $categories[$i]['tendm'] ?>
                      </option>
                  <?php
                    }
                  ?>
                </select>
              </div>
              <input type="text" style="display: none;" name="masp4Edit" id="masp4Edit">
              <button type="submit" class="btn btn-success" id="add2Btn">Lưu</button>
              <span class="btn btn-default" id="cancelAddBtn">Hủy</span>
            </form>
          </div>
          <div class="container" id="addArea" style="width: 100%; display: none; padding-bottom: 10px;">
            <form id='formThemSanPham' action="" method="POST" role="form" enctype="multipart/form-data" >
              <legend>Thêm Sản phẩm</legend>
              <div class="form-group">
                <label for="tenSanPham">Tên Sản phẩm</label>
                <input type="text" class="form-control" name="tenSanPham" id="tenSanPham">
              </div>
              <div class="form-group">
                <label for="giaBan">Giá bán</label>
                <input type="text" class="form-control" name="giaBan" id="giaBan">
              </div>
              <div class="form-group">
                <label for="baoHanh">Bảo hành</label>
                <input type="text" class="form-control" name="baoHanh" id="baoHanh">
              </div>
              <div class="form-group">
                <label for="khuyenMai">Khuyến mãi</label>
                <input type="text" class="form-control" name="khuyenMai" id="khuyenMai">
              </div>
              <div class="form-group">
                <label for="anhChinh">Ảnh chính</label>
                <input type="file" accept="image/*" class="form-control" name="anhChinh" id="anhChinh">
              </div>
              <div class="form-group">
                <label for="madm ">Nhà Sản xuất</label>
                <select class="form-control" name="madm" id="madm">
                  <?php
                    $categories = $data['categories'];
                    for ($i=0; $i < count($categories); $i++) { 
                  ?>
                      <option value="<?php echo $categories[$i]['madm'] ?>">
                        <?php echo $categories[$i]['tendm'] ?>
                      </option>
                  <?php
                    }
                  ?>
                </select>
              </div>
  
              <button type="submit" class="btn btn-success" id="edit2Btn">Thêm</button>
              <span class="btn btn-default" id="cancelAddBtn">Hủy</span>
            </form>
          </div>
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr id="tbheader">
                <!-- <th><input type="checkbox" id="check-all-gd"></th> -->
                <th>STT</th>
                <th>Mã sp</th>
                <th>Tên sản phẩm</th>
                <th>Ảnh</th>
                <th>Giá</th>
                <th>Mã NSX</th>
                <th>Bảo hành</th>
                <th>Lượt mua</th>
                <th>Lượt xem</th>
                <th>Ngày nhập</th>
                <th>Hành động</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $products = $data['products'];
                for ($i=0; $i < count($products); $i++) { ?>
                  <tr>
                    <!-- <td><input type="checkbox" class="cbsp" value="<?php echo $products[$i]['masp'] ?>" /></td> -->
                    <td><?php echo $i + 1 ?></td>
                    <td><?php echo $products[$i]['masp'] ?></td>
                    <td><?php echo $products[$i]['tensp'] ?></td>
                    <td><img style="width: 250px" src="<?php echo "/nguyen-duy-thuan/images/uploads/".$products[$i]['anhchinh'] ?>"></td>
                    <td><?php echo $products[$i]['gia'] ?></td>
                    <td><?php echo $products[$i]['madm'] ?></td>
                    <td><?php echo $products[$i]['baohanh'] ?> tháng</td>
                    <td><?php echo $products[$i]['luotmua'] ?></td>
                    <td><?php echo $products[$i]['luotxem'] ?></td>
                    <td><?php echo $products[$i]['ngay_nhap'] ?></td>
                    <td class="text-center">
                      <span class="btn btn-primary editItemBtn" data-id='<?php echo $products[$i]['masp'] ?>'>Chỉnh sửa</span>
                      <span class="btn btn-danger delItemBtn" data-id='<?php echo $products[$i]['masp'] ?>'>Xóa</span>
                    </td>
                  </tr>
                <?php }
               ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->

<!-- jQuery 3 -->
<script src="views/admin/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="views/admin/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="views/admin/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="views/admin/AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="views/admin/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="views/admin/AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="views/admin/AdminLTE/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="views/admin/AdminLTE/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $('#addBtn').on('click',function(){
    $('#addArea').toggle(300);
  })
  $('#cancelAddBtn').on('click',function(){
    $('#addArea').toggle(300);
  })
  
  $('#edit2Btn').on('click',function(){
    var id = $(this).data('id');
    action('edit',id);
  })
  $('.delItemBtn').on('click',function(){
    const cf = confirm('Bạn chắc chứ?');
    if(cf){
      const masp = $(this).data('id');
      $.ajax({
        url: 'product/delete',
        type: 'POST',
        data: { masp },
        success: function(result){
          if(result == 'OK'){
            $('#modalThongBaoAdminBody').text(`Xóa sản phẩm ${masp} thành công!!` );
            $('#modalThongBaoAdmin').modal('show');          
          } else {
            $('#addError').html(result);
          }
        }
      })
    }
  })
  $('.editItemBtn').on('click',function(){
    $('#edit2Btn').attr('data-id',$(this).data('id'));    
    $('#editArea').toggle(300);
    $('#masp4Edit').val($(this).data('id'));
    $('#tenSanPham4Edit').val($(this).closest('tr').children('td:nth-child(3)').text());
    $('#giaBan4Edit').val($(this).closest('tr').children('td:nth-child(5)').text());
    $('#madm4Edit').val(parseInt($(this).closest('tr').children('td:nth-child(6)').text()));
    $('#baoHanh4Edit').val(parseInt($(this).closest('tr').children('td:nth-child(7)').text()));
  })
  $('#cancelEditBtn').on('click',function(){
    $('#example1').toggle();
    $('#editArea').toggle(300);
  })
  $('#sptab').addClass('active');
  $(document).ready(function(){
      $('#example1 tr').not($('#tbheader')).click(function(event){
        if (event.target.type !== 'checkbox') {
          $(':checkbox', this).trigger('click');
        }
      })
      $('#example1').addClass('active');
      $('#check-all-gd').click(function() {
       $('input:checkbox').not(this).prop('checked', this.checked);
     });
    })
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
  $("#formThemSanPham").on('submit',(function(e) {
    e.preventDefault();

    $.ajax({
      url: 'product/add',
      type: 'POST',
      data:  new FormData(this),
      contentType: false,
      cache: false,
      processData:false,
      success: function(result){
        if(result == 'OK'){
          $('#modalThongBaoAdmin').modal('show');          
        } else {
          $('#addError').html(result);
        }
      }
    })
  }));
  $("#formSuaSanPham").on('submit',(function(e) {
    e.preventDefault();

    $.ajax({
      url: 'product/edit',
      type: 'POST',
      data:  new FormData(this),
      contentType: false,
      cache: false,
      processData:false,
      success: function(result){
        if(result == 'OK'){
          $('#modalThongBaoAdminBody').text('Sửa sản phẩm thành công');
          $('#modalThongBaoAdmin').modal('show');
        } else {
          $('#addError').html(result);
        }
      }
    })
  }));
</script>