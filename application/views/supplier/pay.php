
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
    <span class="text-black ml-3 text-xl  " >Pembayaran Supplier</span><br>
    <span class="text-secondary ml-3 text-lg  " >Supplier : <span class="text-primary">{{supplier[0].name}}</span></span>

    <a  href="<?php echo base_url("supplier") ?>" class="btn btn-outline-light bg-white d-none d-sm-inline-flex float-right mr-3"><span> <em class="fas fa-arrow-left"></em>  Back</span></a>
    
        
        
    </div> 
        <div class="float-left w-50 p-3" >
        <div class="card bg-white" style="width: 100%;">
       
        <div class="card-header">
    <h1 class="card-title">Info Supplier</h1>
            
        </div>
           
      
        <div class="card-body" >
        <div class="content left-10 text-secondary">
        <ul class="list-group">
         <li class="list-group-item d-flex justify-content-between">
                <Span > Pembayaran Lunas</span>
                <Span>{{supplier[0].finished_payment}}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
                <Span >Pembayaran Belum Lunas</span>
                <Span>{{supplier[0].unfinished_payment}}</span>
               
            </li>
            <li class="list-group-item d-flex justify-content-between">
                <Span >Total Hutang</span>
                <Span>{{currencyFormat(supplier[0].hutang)}}</span>
            </li>
           
          
          
        </ul>  
        </div>
        
           
        </div>
        </div>
             
 
        </div>
        <div class="float-right w-50 p-3">
            <div class="card card-bordered mb-4">
                <div class="card-inner">
                    <div class="card-title-group align-start mb-3">
                        <div class="card-header">
                            <h6 class="title">Info Pembayaran</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center ml-4 text-secondary">
                                <em class="fa fa-list mr-2" style="font-size: 2em;"></em>
                                <div class="info">
                                    <span class="title">Nominal Bayar</span>
                                    <p class="text-lg"><strong>{{currencyFormat(total)}}</strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center text-secondary">
                                <em class="fa fa-credit-card mr-2" style="font-size: 2em;"></em>
                                <div class="info">
                                    <span class="title">Jumlah Bayar</span>
                                    <p class="text-lg"><strong>{{currencyFormat(payAmount)}}</strong></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                       
                        
                    </div>
                </div>
            </div>
        <div class="card" style="width: 100%;">
       
        <div class="card-header" style="width: 100%;">
            <h3 class="card-title">pembayaran</h3>
           
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
                    <input required="" type="text" class="form-control" id="payAmount"  v-model="payAmount" required="">
                    <?= form_error('code', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>

                    <div class="form-group" >
                    <label for="code">Akun</label>
                    <select v-model="accountId" class="form-control" id="accounts">
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
            <div class="float-left">
        Pembelian
            </div>
            <div class="float-right">
         
            </div>
           
           
        </div>

            
        <div class="card-body">
            <div class="content">
           
            <div>
            <!-- <div v-if="selectedProducts.length === 0" class="text-center text-secondary">
                            <em class="fas fa-dolly fa-4x"></em>
                            <p class="mt-3">Belum ada product yang dipilih</p>
                        </div> -->
        <div>
        <form>
        <table class="table table-striped" id="datatableProducts">
            <thead>
                <tr>
                <th scope="col" style="width: 15%;">No. PO</th>
                <th scope="col" style="width: 10%;">Tangal</th>
                <th scope="col"style="width: 10%;" >Subtotal</th>
                <th scope="col"style="width: 10%;" >Biaya Kirim</th>
  
                 <th scope="col"style="width: 10%;">Dikon</th>
                  <th scope="col"style="width: 10%;" >Total</th>
                    <th scope="col"style="width: 15%;" >Jumlah Bayar</th>
                    <th scope="col"style="width: 12%;">Sisa Bayar</th>
               
              
                 <th scope="col" style="width: 10%;" class="text-right">Action</th>
                
                </tr>
            </thead>
            <tbody>
              
            </tbody>
            </table>
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


</script>

<script>
// let API_URL="http://localhost:3000";

    let   app=new  Vue({
        el: '#app',
        data:{
            code:"",
            accountId:'',
            supplierId:'',
            payAmount:0,
            purchaseOrderId:"",
            note:'',
            transactions:[],
            payRemaining:'',
            selectedProducts:[],
            historyReceiptProducts:[],
            products:[],
            accounts:[],
            selectedPurchases:[],
            supplier:[],
            loading:false

        },
        methods: {      
            submitForm:function(){
              //  this.sendData();
              
            },
            sendData:function(){
               let vm=this;
               var data={
                 date:vm.date,
                 note:vm.note,
                 account_id:vm.accountId,
                 selected_purchases:vm.selectedPurchases,
                 pay_amount:vm.payAmount

               }

               axios.post(`${API_URL}/api/supplier/pay`,data).then((response)=>{
                   Swal.fire({
                    title: "success!",
                    text: "Data berhasil disimpan",
                    icon: "success",
                    timer: 2000,
                    showCancelButton: false,
                    showConfirmButton: false

                });
                 

               })
               .catch((error)=>{
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
                product.amount=(product.return_quantity * product.price);
 
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
        computed:{
          total:function(){
            let total=this.selectedPurchases.map((purchase)=>{
              const amount=+purchase.remaining_amount;
              return amount;
            })
           .reduce((acc, cur) => {
                        return acc + cur;
                    }, 0);

                    return total;
          }
        }
        

    });
</script>

<script>

$( document ).ready(function() {
    $(document).ready(function() {

      setTimeout(function(){ 
        
          var dataTable = $('#datatableProducts').DataTable({
           "processing": true,
            
            "responsive": true,
            
        "autoWidth": false,
    
      
        "ajax": {
          url: `${API_URL}/api/supplier/pay/11`,
          type: "GET",
          dataType:'json',
        },
        columns: [
            { 'data': 'code' },
            { 'data': 'date' },
            { 'data': 'net_total' },
            { 'data': 'shipping_cost' },
            { 'data': 'discount' },
            { 'data': 'total' },
                { 'data': 'pay_amount' },
                  { 'data': 'remaining_amount' },
            { 'data': 'id',render: function (data, type, row) {
                return '<div class="form-check"><input type="checkbox" class="form-check-input btn-choose"></div>'
            } } ,
         
           
     
        ], 
      });

           $('#datatableProducts tbody').on('change', '.btn-choose', function() {
             const checked=($(this).is(':checked'));
              const rowData = $('#datatableProducts').DataTable().row($(this).parents('tr')).data();
                  const data = {
                ...rowData
            };
           

              const selectedPurchases=app.$data.selectedPurchases;
              if (checked){
                selectedPurchases.push(data)
              }else{
              //const drinks =  ['Cola', 'Lemonade', 'Coffee', 'Water'];
              const id = selectedPurchases.indexOf(rowData['id']); // 2
              selectedPurchases.splice(id,  1);
              }

          

     
        
            
            });

      
      }, 300);
    
      
    
   

    });
 
         //get payment History
         axios.get(`${API_URL}/api/supplier/<?php echo $id ?>`).then((response)=>{
       
          const supplier=app.$data.supplier;
          // let finishedpayment=app.$data.finishedPayment;
          // let unfinishedPayment=app.$data.unfinishedPayment;
          // let hutang=app.$data.hutang;

          
           response.data.data.map((item)=>{
             supplier.push(item)
           })
          // hutang="1"


          console.log(response.data.data)
        
          
        }).catch((error)=>{
          console.log(error)
        });
         //get account
         axios.get(`${FINANCE_API}/api/account`).then((response)=>{    
          const accounts=app.$data.accounts;
         // suppliers.push(data)
         response.data.data.map((item)=>{
           accounts.push(item)
         })
        }).catch((error)=>{
         
        });
          
});

</script>