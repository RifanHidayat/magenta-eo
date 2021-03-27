const flashData=$('.flash-data').data('flashdata');
const flashDataa=$('.flash-dataa').data('flashdata');

if (flashData){
  Swal.fire({
  title: 'registrasi Berhasil',
  text: 'Silakan login',
  icon: 'success',
  confirmButtonText: 'Ok'
});
}
if (flashDataa){
	 Swal.fire({
  title: 'registrasi Berhasil',
  text: '',
  icon: 'success',
  confirmButtonText: 'Ok'
});

}
