
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
  <div class="w-100" >
  <span class="text-black ml-3 text-xl  " >Pembayaran Supplier</span><br>
  <span class="text-secondary ml-3 text-lg  " >No. Order : <span class="text-primary">{{purchaseOrderCode}}</span></span>
  
  <span class="text-secondary ml-3 text-lg  " >Tanggal :{{purchaseOrderDate}}</span>
  
  <a  href="/magentaeo/purchase" class="btn btn-outline-light bg-white d-none d-sm-inline-flex float-right mr-3"><span> <em class="fas fa-arrow-left"></em>  Back</span></a>


  
  </div>


        <div class="float-left w-50 p-3">
        <div class="card bg-white" style="width: 100%;">
       
        <div class="card-header">
    <h1 class="card-title">Summary</h1>
           
        </div>
         <div class="alert alert-info" role="alert">Info tercantum adalah info summary pembelian</div>
      
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
                <Span>{{currencyFormat(discount)}}</span>
            </li>
          
            <li class="list-group-item d-flex justify-content-between">
                <Span >Jumlah Bayar</span>
                <Span>{{currencyFormat(paymentSubtotal)}}</span>
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
        <div class="card bg-white" style="width: 100%;">
       
       <div class="card-header">
   <h1 class="card-title">Riwayat Pembayaran</h1>
         
       </div>
     
       <div class="card-body" >
       <div class="content left-10 text-secondary">
       <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Kode Transaksi</th>
                                         <th>Note</th>
                                        
                                        <th class="text-right">Jumlah Pembayaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                    <tr  v-for="(transaction, index) in transactions">
                                        <td>{{transaction.date}}</td>
                                        <td><span class="text-primary">{{transaction.code}}</span></td>
                                        <td>{{transaction.note}}</td>
                                       
                                        <td class="text-right">{{currencyFormat(transaction.amount)}}</td>
                                    </tr>
                                   
                                
                                 
                                </tbody>
                                <tfooter>
                                <tr >
                                <th colspan="3">Sub Total</th>
                                <th class="text-right" >{{currencyFormat(paymentSubtotal)}}</th>
                                <tr>
                                
                                <tr >
                                <th colspan="3">Sisa hutang</th>
                                <th class="text-right" >{{currencyFormat(remainingPay)}}</th>
                                <tr>
                                <tfooter>
                              
                            </table>
       
       </div>
       
          
       </div>
       </div>
            
        </div>
        <div class="float-right w-50 p-3" >
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
                    <label for="code">Jumlah Bayar</label>
                    <input required="" type="text" class="form-control" id="payAmount" name="payAmount" v-model="payAmount" required="">
                    <?= form_error('code', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                  <div class="form-group" >
                    <label for="code">Akun</label>
                    <select v-model="accountsId" class="form-control" id="accounts">
                           <option v-for="account in accounts" :value="account.id">{{account.name}}</option>
                                    </select>
                    <?= form_error('code', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                  <div class="form-group">
                                <label class="form-label" for="full-name-1">Note</label>
                                <div class="form-control-wrap">
                                    <textarea v-model="note" class="form-control" rows="3" style="min-height: auto;"></textarea>
                                </div>
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
            <h5 class="card-title">Pembelian product</h5>
           
        </div>
            
        <div class="card-body">
            <div class="content">
           
            <div>
            <div v-if="selectedProducts.length === 0" class="text-center text-soft">
                            <em class="fas fa-dolly fa-4x"></em>
                            <p class="mt-3">Tidak ada produk</p>
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
                <td scope="col" align="right" style="width: 5%;"><b></b></td>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(product, index) in selectedProducts" >
                
                <td>
                <textarea readonly  class="form-control"  v-model='product.description' id="description' + Nomor + '" ></textarea>
                </td>
               
                <td><input readonly type="text" class="form-control" v-model="product.price" @input="calculateAmountProduct(product)"></td>
               
                <td><input readonly type="text" class="form-control" v-model="product.quantity" @input="calculateAmountProduct(product)"></td>
                <td><input readonly type="text" class="form-control" v-model="product.discount" @input="calculateAmountProduct(product)" ></td>

                <td><input readonly type="text" class="form-control" v-model="product.amount"></td>
                <td></td>
                </tr>
            

            </tbody>s


            </form>
                

        </div>

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
       
             
             
            const data = {
                ...rowData
            };

            // console.log(rowData)
             const selectedproducts = app.$data.selectedProducts;

            const productIds = selectedproducts.map(product => product.id);
          //  data['amount_product']=rowData.purchase_price;
            if (productIds.indexOf(data.id) < 0) {
                data['quantity'] = 1;
                data['amount'] = data['purchase']*data['quantity'];
                data['discount'] = 0;
                selectedproducts.push(data);
            }
        });


         //get account
         axios.get(`${FINANCE_API}/api/account`).then((response)=>{    
          const accounts=app.$data.accounts;
         // suppliers.push(data)
         response.data.data.map((item)=>{
           accounts.push(item)
         })
        }).catch((error)=>{
          console.log("error")
        });
       
         //get payment History
         axios.get(`${API_URL}/api/purchase-transaction/<?php echo $id ?>`).then((response)=>{
          const transactions=app.$data.transactions;
        
          console.log(response.data.data)
         response.data.data.map((item)=>{
           transactions.push(item)
         })
        }).catch((error)=>{
          console.log("error")
        });

        //get products
        axios.get(`${API_URL}/api/purchase-order/<?php echo $id ?>/product`).then((response)=>{
          const selectedProducts=app.$data.selectedProducts;
         // var shippingCost=app.$data.shippingCost;
    
         response.data.data.map((item,index)=>{
           selectedProducts.push(item)
        
          
         })
        }).catch((error)=>{
          console.log("error")
        });
      
});


</script>

<script>


    let   app=new  Vue({
        el: '#app',
        data:{
            code:"<?php echo $code ?>",
            accountsId:'',
            supplierId:<?php echo $supplier_id ?>,
            payAmount:0,
            purchaseOrderId:"<?php echo $id ?>",
            note:'',
            transactions:[],
            payRemaining:"",
            selectedProducts:[],
            accounts:[],
            shippingCost:'<?php echo $shipping_cost ?>',
            discount:'<?php echo $discount ?>',
            purchaseOrderCode:"<?php echo $code ?>",
            purchaseOrderDate:'<?php echo $date ?>',
            date:"",
            loading:false

        },
        methods: {
            submitForm:function(){
                
              
            },
            sendData:function(){
              let vm=this;
              console.log(vm.id);
              console.log(vm.note);
                console.log(vm.supplierId)
                console.log(vm.accountsId);
                console.log('tes',vm.purchaseOrderId);
               
                console.log(vm.payAmount)
             
                axios.post(`${API_URL}/api/purchase-transaction`,{
                    code:vm.code,
                    date:vm.date,
                    pay_amount:vm.payAmount,
                    account_id:vm.accountsId,
                    note:vm.note,
                    purchase_order_id:vm.purchaseOrderId,
                    supplier_id:vm.supplierId              

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
        },
        computed: {
            netTotal: function() {
                const netTotal = this.selectedProducts.map(product => {
                        const amount = Number(product.quantity) * Number(product.price) - Number(product.discount) ;
                        

                        return amount;
                    })
                    .reduce((acc, cur) => {
                        return acc + cur;
                    }, 0);


                return netTotal;

            },
            totalDiscount: function() {
                // const totalDiscount = this.selectedProducts
                //     .reduce((acc, cur) => {
                //         return Number(acc) + Number(cur.discount);
                //     }, "");
                // return totalDiscount;

            },
            total: function() {
                const total = Number(this.clearCurrencyFormat(this.netTotal))+ Number(this.clearCurrencyFormat(this.shippingCost));
                return total;
            },
            remainingPay: function() {
                const remainingPay= Number(this.clearCurrencyFormat(this.total)) - Number(this.clearCurrencyFormat(this.paymentSubtotal));
                return remainingPay;
            },
            payment: function() {
                $("#accounts").select2()
                if (this.isPaid) {
                    return this.netTotal;
                  
                }

                return 0;
            },
            paymentSubtotal:function(){
                const paymentSubtotal=this.transactions.reduce((acc,cur)=>{
                    return acc+cur.amount

                },0)

                return paymentSubtotal;
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