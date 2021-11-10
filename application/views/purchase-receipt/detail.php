
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
    <span class="text-black ml-3 text-xl  " >Detail Penerimaan</span><br>
    <span class="text-secondary ml-3 text-lg  " >No. Order : <span class="text-primary">{{purchaseOrderCode}}</span></span>
    <span class="text-secondary ml-3 text-lg  " >No. Penerimaan : <span class="text-primary">{{purchaseReceiptCode}}<span></span>
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
                <Span >Total</span>
                <Span>{{currencyFormat(total)}}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
                <Span >Jumlah Bayar</span>
                <Span>{{currencyFormat(paymentSubtotal)}}</span>
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
            <h3 class="card-title">Riwayat Pembelian</h3>
           
        </div>
       
        <div class="card-body">
        <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Kode Transaksi</th>
                                    
                                        <th class="text-right">Jumlah Pembayaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                    <tr  v-for="(transaction, index) in transactions">
                                        <td>{{transaction.date}}</td>
                                        <td>{{transaction.code}}</td>
                                      
                                        <td class="text-right">{{currencyFormat(transaction.amount)}}</td>
                                    </tr>
                                   
                                
                                 
                                </tbody>
                                <tfooter>
                                <tr >
                                <th colspan="2">Sub Total</th>
                                <th class="text-right" >{{currencyFormat(paymentSubtotal)}}</th>
                                <tr>
                                
                                <tr >
                                <th colspan="2">Sisa hutang</th>
                                <th class="text-right" >{{currencyFormat(remainingPay)}}</th>
                                <tr>
                                <tfooter>
                              
                            </table>
       
      
        </div>
        </div>
          <div class="card" style="width: 100%;">

          
       
        <div class="card-header" style="width: 100%;">
            <h3 class="card-title">Riwayat Penerimaan</h3>
           
        </div>
       
        <div class="card-body">
        
                        <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Kode Produk</th>
                                            <th>Nama Produk</th>

                                            <th class="text-right">Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                        <tr  v-for="(receipt, index) in historyReceiptProducts">
                                            <td>{{receipt.code}}</td>
                                            <td><span >{{receipt.name}}</span></td>
                                
                                            <td class="text-right">{{receipt.quantity}}</td>
                                        </tr> 

                                    </tbody>
                                
                                </table> 

      

       
      
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
    $("#purchaseReceiptNav").addClass('active');
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
                data['amount'] = data['purchase_price']*data['quantity'];
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
         axios.get(`${API_URL}/api/purchase-transaction/<?php echo $purchaseOrderId ?>`).then((response)=>{
          const transactions=app.$data.transactions;
        
          console.log(response.data.data)
         response.data.data.map((item)=>{
           transactions.push(item)
         })
        }).catch((error)=>{
          console.log("error")
        });

           axios.get(`${API_URL}/api/purchase-receipt/<?php echo $purchaseOrderId ?>/history`).then((response)=>{
            const  historyReceiptProducts=app.$data.historyReceiptProducts;
            const purchaseReceiptId=app.$data.purchaseReceiptId;
            let purchaseReceipt=response.data.data.filter((item)=>item.id==purchaseReceiptId)
            console.log("Purchase receipt ",purchaseReceipt)
            purchaseReceipt.map((item)=>{
                historyReceiptProducts.push(item.purchase_receipt_product[0])
                console.log("item",item.purchase_receipt_product[0])
                
            })
            }).catch((error)=>{

          
            });

        //get products
        axios.get(`${API_URL}/api/purchase-receipt/<?php echo $id ?>/product`).then((response)=>{
          const selectedProducts=app.$data.selectedProducts;
          //var shippingCost=app.$data.shippingCost;
    
         response.data.data.map((item,index)=>{
           selectedProducts.push(item)
        
          
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
             purchaseOrderCode:"<?php echo $code ?>",
                purchaseOrderDate:'<?php echo $date ?>',
            loading:false,
            discount:'<?php echo $discount ?>',
            purchaseReceiptCode:'<?php echo $codePurchaseReceipt?>',
            netTotal:'<?php echo $net_total ?>',
            purchaseReceiptId:'<?php echo $purchaseReceiptId ?>',
            historyReceiptProducts:[],
            


        },
        methods: {
            submitForm:function(){
                console.log('tes',vm.purchaseOrderId);
                console.log(vm.supplierId)
                console.log(vm.accountsId);
                console.log(vm.purchaseOrderId)
                console.log(vm.payAmount)
              //  this.sendData();

              //console.log(this.date);
              
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
            // netTotal: function() {
            //     const netTotal = this.selectedProducts.map(product => {
            //             const amount = Number(product.quantity) * product.purchase_price;
                        

            //             return amount;
            //         })
            //         .reduce((acc, cur) => {
            //             return acc + cur;
            //         }, 0);


            //     return netTotal;

            // },
            totalDiscount: function() {
                const totalDiscount = this.selectedProducts
                    .reduce((acc, cur) => {
                        return Number(acc) + Number(cur.discount);
                    }, "");
                return totalDiscount;

            },
            total: function() {
                const total = Number(this.clearCurrencyFormat(this.netTotal))+ Number(this.clearCurrencyFormat(this.shippingCost))-Number(this.discount);
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