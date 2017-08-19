
<div class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php echo $this->element('admin_header'); ?>
        <!-- Left side column. contains the logo and sidebar -->
        <?php echo $this->element('left_bar'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content">
                <table class="table table-striped">
                    <thead>
                    <th>Product Name</th><th>product Images</th><th>Price</th><th>Offer</th><th>Product Info</th><th>Action</th>                                          
                    </thead>
                    <tbody>
                        <?php foreach ($product as $pro)  { ?>
                        <tr>
                            <td><?php echo $pro['product_name'];?></td>
                            <td><img src="/canastaroca/<?php  echo $pro['images'][0]['images'];?>" width="200" height="200"></td>
                            <td><?php echo $pro['price'];?></td>
                            <td><?php echo $pro['offer'];?></td>
                            <td><?php echo $pro['description'];?></td>
                            <td><a href="">Edit</a></td>
                            <td><a href="">delete</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </section>
        </div>
    </div>
</div>

<script type="text/javascript">
    var imageVm=function(){
        var me=this;
        me.url=ko.observable();
        me.ImgList=ko.observableArray([]);
        $('.upload').on("change",function(){
          $('#ImgForm').ajaxSubmit({
                success: function (d) {
                    console.log(d);
                    me.ImgList.push({
                        ImgId: d.id,
                        url: d.img
                    });
                }
            });  
        });
       me.remvoe=function(d){
           me.ImgList.remove(d);
       } 
    }
    var obj=new imageVm();
    ko.applyBindings(obj);
</script>


