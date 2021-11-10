<style>
.select2-selection__rendered {
    line-height: 20px !important;
}
.select2-container .select2-selection--single {
    height: 35px !important;
}

.select2-selection__arrow {
    height: 35px !important;
}
select[multiple]:focus option:checked {
  background: red linear-gradient(0deg, red 0%, red 100%);
}
.select2-selection__choice{
    padding-right: 5px!important; 
}

.select2-selection__choice__remove{
    border: none!important;
    border-radius: 0!important;
    padding: 0 2px!important;
}

.select2-selection__choice__remove:hover{
    background-color: transparent!important;
    color: #ef5454 !important;
}
</style>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">

        </div><!-- /.col -->
        <div class="col-sm-6">

        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->



  <section class="content">
    <div class="card" id="app">
      <div class="card-header">

        <h3 class="box-title"><b>Add Product</b></h3>

        <div class="card-tools" style="margin-top: -35px;margin-right: 3px">
          <a href="<?php echo base_url('Product') ?>" class="btn btn-secondary">
            <font color="white">Back</font>
          </a>
        </div>
      </div>
      <div class="card-body">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-12 col-xs-12">
            <div class="box">

              <form  @submit.prevent="submitForm" autocomplete="off" >
                <div class="box-body">
                  <div class="col-md-10 col-xs-10 pull pull-right">
                  </div>

                  <div class="form-group" style="width: 50%;">
                    <label for="code">Kode</label>
                    <input readonly required="" type="text" class="form-control" id="code" name="code" v-model="code" required="">
                    <?= form_error('code', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                  <div class="form-group" style="width: 50%;">
                    <label for="code">Nama</label>
                    <input required="" type="text" class="form-control" id="name" name="name" v-model="name" required="">
                    <?= form_error('code', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>

                  <div class="form-group" style="width: 50%;">
                    <label for="code">Stock</label>
                    <input required="" type="text" class="form-control" id="stock" name="stock" v-model="stock" required="">
                    <?= form_error('code', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>

                  <div class="form-group" style="width: 50%;">
                    <label for="code">Harga Jual</label>
                    <input required="" type="text" class="form-control" id="purchasePrice" name="purchasePrice" v-model="purchasePrice" required="">
                    <?= form_error('code', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                  <div class="form-group" style="width: 50%;">
                    <label for="code">Harga beli</label>
                    <input required="" type="text" class="form-control" id="sellingPrice" name="sellingPrice" v-model="sellingPrice" required="">
                    <?= form_error('code', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                 
                 
                  <div class="form-group text-right">
                  <button align="right" class="btn btn-primary btnSave" type="button"  v-on:click="sendData">
                  
                    Save
                  </button>
                  </div>
              </form>
            </div>
            <!-- /.box -->
          </div>
          <!-- col-md-12 -->
        </div>
      </div>
      <!-- /.row -->
    </div>
  </section>
  <!-- /.content -->
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


<script>
    let API_URL="http://localhost:3000";
    let   app=new  Vue({
        el: '#app',
        data:{
          code:"<?php echo $code ?>",
            name:"",
            amount:"",
            stock:"",
            purchasePrice:"",
            sellingPrice:"",
            loading:false

        },
        methods: {
            submitForm:function(){
                this.sendData();

            },
            sendData:function(){
           
                let vm=this;
               

                axios.post(`${API_URL}/api/product/`,{
                    code:vm.code,
                    name:vm.name,
                    amount:vm.amount,
                    stock:vm.stock,
                    purchase_price:vm.purchasePrice,
                    selling_price:vm.sellingPrice
                   


                }).then((response)=>{
              Swal.fire({
                title: "success!",
                text: "Data berhasil disimpan",
                icon: "success",
                timer: 2000,
                showCancelButton: false,
                showConfirmButton: false

            });
                }).catch((error)=>{
                    console.log(error.response.data)
                Swal.fire({
                title: "Error",
                text: "Gagal menyimpan data",
                icon: "error",
                timer: 2000,
                showCancelButton: false,
                showConfirmButton: false

            });

            })
                
            }

        }

    });
</script>