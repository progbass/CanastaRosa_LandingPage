
<div class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php echo $this->element('admin_header'); ?>
        <!-- Left side column. contains the logo and sidebar -->
        <?php echo $this->element('left_bar'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-md-offset-1">
                             <form enctype="multipart/form-data" method="post" action="/canastaroca/admin/Categories/image" id="ImgForm">
                                <div class="form-group">
                                    <label>Upload Product Image</label>
                                    <input type="file" name="images" class="upload">
                                    <span class="uplod_icon" style="display: none;"><i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i></span>
                                </div>
                            </form>
                        </div>
                        <div data-bind="foreach: ImgList" class="col-md-12  col-md-offset-1" style="border: 1px solid #eee;">
                            <div class="col-md-3">
                                <a href="" class="close" data-bind="attr: {'id':ImgId},click: $root.remvoe">&#10006</a>
                                <div class="thumbnail">
                                    <img data-bind="attr: {'src':'/canastaroca/'+url}">
                                </div>  
                            </div>
                        </div>
                    </div>
                    <form method="post" action="/canastaroca/admin/Categories/product">
                        <div class="row">
                            <div class="col-lg-8 col-md-offset-1">
                                <div class="form-group">
                                    <label>select Category</label>
                                    <select name="category_id" class="form-control">
                                        <?php foreach ($cat as $cat) { ?>
                                            <option value="<?php echo $cat['id']; ?>"><?php echo $cat['title']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Enter Product Name</label>
                                    <input type="text" name="product_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Enter Product Price</label>
                                    <input type="text" name="price" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Offer</label>
                                    <input type="text" name="offer" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>product Discription</label>
                                    <textarea name="description" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 col-md-offset-1">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div> 
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

