<?php 
include 'header.php';
include 'connection.php';
if(isset($_REQUEST['submit']))
{
	$id=$_POST['sub_cat_id'];

	$sql=mysqli_fetch_array(mysqli_query($conn,"select *from sub_cat where sub_cat_id=$id"));
	$sub_cat_id=$_POST['sub_cat_id'];
	$menu_name=$sql['sub_cat_name'];
	$menu_content=$sql['sub_cat_content'];
	$menu_price=$sql['sub_price'];
	$insert=mysqli_query($conn,"insert into menu (sub_cat_id,menu_name,menu_content,menu_price) values($sub_cat_id,'$menu_name','$menu_content',$menu_price)");
	if ($insert) 
	{
		$success="Insert successfull.....";
	}
	else
	{
		$danger="Not Inserted.........";
	}
}
?><script>
function showUser(str) {
  if (str == "") {
    document.getElementById("html").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("html").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","menu.php?q="+str,true);
    xmlhttp.send();
  }
}
</script> 


        <div id="content" class="main-content">
            <div class="container">

                <div class="container">

                    <div id="navSection" data-spy="affix" class="nav  sidenav">
                    
                    </div>
  <?php
    if(isset($success))
{
?>
<div class="alert alert-success"><?php echo $success; ?> </div>
<?php } ?>

<?php
if(isset($danger))
{
?>
<div class="alert alert-danger"><?php echo $danger; ?></div>
<?php } ?>

                        <div class="col-lg-12 col-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">                                
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Sub Categories</h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="widget-content widget-content-area">
                                    <form method="post" enctype="multipart/form-data"  name="sub" >
                                        <div class="form-group mb-4">
                                            <label for="exampleFormControlInput2"><h5>Category Name</h5></label>
                                            <select class="form-control" id="exampleFormControlInput2" name="cat_id" onchange="showUser(this.value)" >
                                                <?php include'connection.php';
                                                $sql=mysqli_query($conn,"select * from category");
                                                 while($row=mysqli_fetch_array($sql)){ ?>

                                                <option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_name']; ?></option>

                                            <?php } ?>

                                            </select> 
                                        </div>
                                        <div id="html">
                                        </div>
                                        <input type="submit" name="submit" value="submit" class="btn btn-primary">
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

        
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->
    
    
    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="plugins/highlight/highlight.pack.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/scrollspyNav.js"></script>
</body>

<!-- Mirrored from designreset.com/cork/ltr/demo3/form_bootstrap_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Apr 2021 03:08:31 GMT -->
</html>