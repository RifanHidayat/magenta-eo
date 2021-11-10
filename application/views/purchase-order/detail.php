
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



  <section class="content" >
  <div class="content" id="app">
    <div class="w-100 mb-3" >
    <span class="text-black ml-3 text-xl  " >Detail Pembelian</span>
    <!-- <span class="text-secondary ml-3 text-lg  " >No. Order : <span class="text-primary">{{purchaseOrderCode}}</span></span>
    <span class="text-secondary ml-3 text-lg  " >Tanggal :{{purchaseOrderDate}}</span> -->
    <a  href="/magentaeo/purchase" class="btn btn-outline-light bg-white d-none d-sm-inline-flex float-right mr-3"><span> <em class="fas fa-arrow-left"></em>  Back</span></a>
    
        
        
    </div> 
        <div class="float-left w-50 p-3" >
        <div class="card bg-white " style="width: 100%;">
       
        <div class="card-header">
    <h1 class="card-title">Summary</h1>
          
        </div>
        <div class="alert alert-info" role="alert">Info tercancum adalah info summary pembelian</div>
      
        <div class="card-body" >
        <div class="content left-10 text-secondary">
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between">
                <Span >Net Total</span>
                <Span>{{currencyFormat(netTotal)}}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
                <Span > Biaya Kirim</span>
                <Span>{{currencyFormat(shippingCost)}}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
                <Span >Diskon</span>
                <Span>{{currencyFormat(purchaseDiscount)}}</span>
            </li>
            
            <li class="list-group-item d-flex justify-content-between">
                <Span >Jumlah Bayar</span>
                <Span>{{currencyFormat(payAmount)}}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
                <Span >Total</span>
                <Span>{{currencyFormat(total)}}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
                <Span >Sisa Bayar</span>
                <Span>{{currencyFormat(remainingPay)}}</span>
            </li>
        </ul>  
        </div>
        
           
        </div>
        </div>
            
        </div>
        <div class="float-right w-50 p-3">
        <div class="card" style="width: 100%;">
       
        <div class="card-header" style="width: 100%;">
            <h3 class="card-title">Info Pembelian</h3>
           
        </div>
       
        <div class="card-body">
        <form   autocomplete="off" >
                <div class="box-body">
                  <div class="col-md-10 col-xs-10 pull pull-right">
                  </div>

                
                  <div class="form-group" >
                    <label for="code">Tanggal</label>
                    <input required="" type="date" class="form-control" id="date" name="date" v-model="date" required="">
                    <?= form_error('code', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                  <div class="form-group" >
                    <label for="code">Supplier</label>
                    <select v-model="suppliersId" class="form-control" id="supplier">
                           <option v-for="supplier in suppliers" :value="supplier.id">{{supplier.name}}</option>
                                    </select>
                    <?= form_error('code', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                  <div class="form-group">
                    <label for="code">Biaya Kirim</label>
                    <input required="" type="text" class="form-control" id="shippingCost" name="shippingCost" v-model="shippingCost" required="">
                    <?= form_error('code', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                  <div class="form-group">
                    <label for="code">Diskon</label>
                    <input required="" type="text" class="form-control" id="purchaseDiscount" name="purchaseDiscount" v-model="purchaseDiscount" required="">
                    <?= form_error('code', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                  <div class="form-group" >
                    <label for="code">Jumlah Bayar</label>
                    <input required="" type="text" class="form-control" id="payAmount" name="payAmount" v-model="payAmount" required="">
                    <?= form_error('code', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                  <div class="form-group" >
                    <label for="code">Account</label>
                    <select v-model="accountsId" class="form-control" id="accounts">
                           <option v-for="account in accounts" :value="account.id">{{account.name}}</option>
                                    </select>
                    <?= form_error('code', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                  <div class="form-group text-right">
                  <button align="right" class="btn btn-primary btnSave" type="button"  v-on:click="sendData">
                  
                    Save
                  </button>
                  </div>
                  </div>
              </form>
      
        </div>
        </div>
            </div>
            <div class="card" style="width: 100%;">
      
      
              <div class="card-header">
                <div class="float-left">
                Penambahan Produk
                </div>
                <div class="float-right">
            <a  class="btn btn-light text-secondary"  v-on:click="addProduct"><i class="fa fa-plus"></i> </a>
             <a  class="btn btn-light text-secondary"  v-on:click="revmoveSelectedProduct"><i class="fa fa-trash"></i> </a>
                </div>
            
            
            </div>  
     
            
        <div class="card-body">
            <div class="content">
            <div class="form-group text-right">
            <!-- <a  class="btn btn-primary text-white" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus"></i> product</a> -->
                  </div>
            <div>
            <div v-if="selectedProducts.length === 0" class="text-center text-secondary">
                            <em class="fas fa-dolly fa-4x"></em>
                            <p class="mt-3">Belum ada barang yang dipilih</p>
                        </div>
        <div>
        <form>
        <table class="table" v-if="selectedProducts.length > 0">
            <thead>
                <tr>
                <th scope="col" style="width: 25%;">Desckripsi</th>
               
                <th scope="col" style="width: 15%;">harga</th>
                <th scope="col"style="width: 5%;">Quantity</th>
               
                
                <th scope="col" style="width: 15%;">Diskon</th>
                <th scope="col" style="width: 15%;">amount</th>
                <td scope="col" align="right" style="width: 5%;"><b>Action</b></td>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(product, index) in selectedProducts" >
                
                <td>
                <textarea  class="form-control"  v-model='product.description' id="description' + Nomor + '" ></textarea>
                </td>
               
                <td><input type="text" class="form-control" v-model="product.purchase_price" @input="calculateAmountProduct(product)"></td>
               
                <td><input type="text" class="form-control" v-model="product.quantity" @input="calculateAmountProduct(product)"></td>
                <td><input type="text" class="form-control" v-model="product.discount" @input="calculateAmountProduct(product)" ></td>

                <td><input type="text" class="form-control" v-model="product.amount"></td>
                <td><button @click.prevent="removeSelectedProduct(index)" type="button" class="close text-danger" aria-label="Close"><span aria-hidden="true">&times;</span></button></td>
                </tr>
            

            </tbody>
            </table>
            </form>
                

        </div>

        </div>
        </div>
  </div>
  </div>
  <div style="width: 100%;" class="w-100 p-3" >
  <div class="row" >
     <div class="ml-auto card w-25">
 

  <div class="card-body" >
    <span   class="fs-2" style='font-family: "Times New Roman", Times, serif;  font-weight: bold;' >  Net Total</span><br>
    <span class="left-10 text-secondary">{{currencyFormat(netTotal)}}</span>
  </div>
  

</div>
<!-- <div class="card w-25 p-3 ml-2 ">

<div class="card-body">
    <span   class="fs-2" style='font-family: "Times New Roman", Times, serif;  font-weight: bold;' >  Total Diskon</span><br>
    <span class="left-10 text-secondary">{{currencyFormat(totalDiscount)}}</span>
 
  </div>

</div> -->
  </div>
  </div>

  <!-- modal  -->
  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
    <span>Products</span>
    </div>
    <div class="modal-body">
    <table class="table table-striped" id="datatableProducts">
    <thead>
                      <tr>
                        <th>Kode</th>
                        <th >Name</th>
                        <th>Purchase Price</th>
                        <th >
                          <center>Action</center>
                        </th>
                      </tr>
                    </thead>
                    <tbody>

                            </tbody>
</table>
    </div>
      
    </div>
  </div>
</div>

  </section>
  <!-- /.content -->
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="<?php echo base_url('assets/lte/tiny/tinymce.min.js') ?>" referrerpolicy="origin" referrerpolicy="origin"></script>

<script type="text/javascript">
$("#purchaseMainNav").addClass('active');
    $("#purchaseNav").addClass('active');
    $("#openPurchaseNav").addClass('menu-open');
let API_URL="http://localhost:3000";
let FINANCE_API="http://localhost:3002";

$( document ).ready(function() {
    $(document).ready(function() {
      var dataTable = $('#datatableProducts').DataTable({
        "processing": true,
        
        "responsive": true,
        "autoWidth": false,
        "order": [],
        "ajax": {
          url: "<?php echo base_url("Purchase/datatablesProducts") ?>",
          type: "GET",
          dataType:'json',
        },
        columns: [
            { 'data': 'code' },
            { 'data': 'name' },
            { 'data': 'purchase_price' },
            { 'data': 'id',render: function (data, type, row) {
                return '<button class="btn btn-outline-primary btn-sm btn-choose"><em class="fas fa-plus"></em>&nbsp;Pilih</button>'
            } } ,
         
           
     
        ], 
      });

    });




    $('#datatableProducts tbody').on('click', '.btn-choose', function() {
  
             const rowData = $('#datatableProducts').DataTable().row($(this).parents('tr')).data();
             console.log(rowData);
             
             
            const data = {
                ...rowData
            };

            // console.log(rowData)
             const selectedproducts = app.$data.selectedProducts;

            const productIds = selectedproducts.map(product => product.id);
          //  data['amount_product']=rowData.purchase_price;
            if (productIds.indexOf(data.id) < 0) {
                data['quantity'] = 1;
                data['amount'] = data['purchase_price']*data['quantity'];
                data['discount'] = 0;
                selectedproducts.push(data);
            }
        });

        //get supplier
        axios.get(`${API_URL}/api/supplier`).then((response)=>{
          console.log(response.data.data);
          const suppliers=app.$data.suppliers;
         // suppliers.push(data)
         response.data.data.map((item)=>{
           suppliers.push(item)
         })

        }).catch((error)=>{
          console.log("error")

        });
         //get supplier
         axios.get(`${FINANCE_API}/api/account`).then((response)=>{
         
         console.log(response.data.data);
          const accounts=app.$data.accounts;
         // suppliers.push(data)
         response.data.data.map((item)=>{
           accounts.push(item)
         })

        }).catch((error)=>{
          console.log("error")

        });


});


</script>

<script>
// let API_URL="http://localhost:3000";

    let   app=new  Vue({
        el: '#app',
        data:{
            code:"<?php echo $code ?>",
            suppliersId: '',
            accountsId:'',
            shippingCost:0,
            discount:0,
            payAmount:0,
            purchaseDiscount:0,
            products:[],
            selectedProducts:[],
            suppliers:[],
            accounts:[],

            loading:false

        },
        methods: {
            submitForm:function(){
              //  this.sendData();
            },
            sendData:function(){
              let vm=this;
            //  console.log(this.selectedProducts)
            
             
                axios.post(`${API_URL}/api/purchase-order`,{
                    code:vm.code,
                    date:vm.date,
                    supplier_id:vm.suppliersId,
                    account_id:vm.accountsId,
                    shipping_cost:vm.shippingCost,
                    discount:vm.purchaseDiscount,
                    pay_amount:vm.payAmount,
                    selected_products:vm.selectedProducts,
                    net_total:vm.netTotal,
                    total:vm.total

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
                
                  Swal.fire({
                  title: "Error",
                  text: "Gagal menyimpan data",
                  icon: "error",
                  timer: 2000,
                  showCancelButton: false,
                  showConfirmButton: false
                  });
            })
                
            },
            removeSelectedProduct: function(index) {
                this.selectedProducts.splice(index, 1);
            },
            revmoveSelectedProduct:function(index){
              Swal.fire({
              title: 'Are you sure?',
              text: "Data list akan dihapus",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              //console.log(result.value  )
              if (result.value) {

                this.selectedProducts=[];
                // Swal.fire(
                //   'Deleted!',
                //   'Your file has been deleted.',
                //   'success'
                // )
              }
            })

            },
            calculateAmountProduct:function(product){
                product.amount=(product.quantity * product.purchase_price)-product.discount;
 
            },
            currencyFormat: function(number) {
               return Intl.NumberFormat('de-DE').format(number);
                return number;
            },
            clearCurrencyFormat: function(number) {
                if (!number) {
                    return 0;
                }
                // return number.replaceAll(".", "");
                return number;
            },
            addProduct:function(){
               const data = {
                ...[]
            };
            data['description']="";
            data['purchase_price']="";
            data['quantity']="";
            data['discount']="";
            data['amount']="";
            this.selectedProducts.push(data)
            

            },
            
     


        },
        computed: {
            netTotal: function() {
                const netTotal = this.selectedProducts.map(product => {
                        const amount = (Number(product.quantity) * product.purchase_price) - Number(product.discount);
                        

                        return amount;
                    })
                    .reduce((acc, cur) => {
                        return acc + cur;
                    }, 0);


                return netTotal;

            },
            totalDiscount: function() {
                const totalDiscount = this.selectedProducts
                    .reduce((acc, cur) => {
                        return Number(acc) + Number(cur.discount);
                    }, "");
                return totalDiscount;

            },
            total: function() {
                const total = Number(this.clearCurrencyFormat(this.netTotal))+ Number(this.clearCurrencyFormat(this.shippingCost)-Number(this.clearCurrencyFormat(this.purchaseDiscount)));
                return total;
            },
            remainingPay: function() {
                const remainingPay= Number(this.clearCurrencyFormat(this.total)) - Number(this.clearCurrencyFormat(this.payAmount) );
                return remainingPay;
            },
            payment: function() {
                $("#accounts").select2()
                if (this.isPaid) {
                    return this.netTotal;
                  
                }

                return 0;
            },
            
           
            accountOptions: function() {
                let vm = this;
                if (this.paymentMethod !== '') {
                    return this.accounts.filter(account => account.type == vm.paymentMethod);
                }

                return this.accounts;
            },
           
        }

    });
  
</script>