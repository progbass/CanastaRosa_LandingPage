
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
                        <form method="post" action="/admin/Categories/add">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="title" class="form-control" placeholder="Inter Your category name">
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>   
                                </div>
                            </div>
                         </form> 
                    </div>  
                     
                </div> 
               </section>
        </div> 
        
    </div>
</div>
</div>

<script type="text/javascript">
    var imageVm = function () {
        var me = this;
        me.url = ko.observable();
        me.ImgList = ko.observableArray([]);
        $('.upload').on("change", function () {
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
        me.remvoe = function (d) {
            me.ImgList.remove(d);
        }
    }
    var obj = new imageVm();
    ko.applyBindings(obj);
</script>


