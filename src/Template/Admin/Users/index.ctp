
<div class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php echo $this->element('admin_header');?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php echo $this->element('left_bar');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">
        <div class="container">
            <form method="post" action="/Categories/add">
            <div class="row">
                <div class="col-md-6">
                
                    <div class="form-group">
                        <label>Enter Your Category name</label>
                        <input type="text" name="title" class="form-control">
                    </div> 
               
                </div>
                <div class="col-md-3" style="margin-top: 25px;">
                    <button type="submit" class="btn btn-primary">Sumbit</button>
                </div>               
            </div>
           </form>
        </div> 
        
    </section>
  </div>
</div>
</div>
