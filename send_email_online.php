   public function send_email(){
    $quotation_number=$this->input->post('quotation_number');
    $email=$this->input->post('email');
    $subject=$this->input->post('subject');
    $message=$this->input->post('message');
                   
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
       // $mail->isSMTP();
        $mail->Host = 'magentaeo.my.id';
        $mail->SMTPAuth = true;
        $mail->Username = 'magentae@magentaeo.my.id';//email pengirim
        $mail->Password = 'Sutransah5';//password pengirim
    
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';
        
        //email pengirim
        $mail->setFrom('magentae@magentaeo.my.id', 'Magenta EO');
        $mail->addReplyTo('magentae@magentaeo.my.id', 'MagentaEO');
        
        // Add a recipient
        $mail->addAddress($email);//email penerima
        
        // Add cc or bcc 
        $mail->addCC('magentae@magentaeo.my.id');
        $mail->addBCC('magentae@magentaeo.my.id');
        
        // Email subject
        $mail->Subject = $subject;
        
        // Set email format to HTML
        $mail->isHTML(true);
        
        // Email body content
          $idd= substr($quotation_number,0,2);
        if ($idd=="QE"){
        $mailContent = '<p>'.$message.'</p>
            <p>Click to download  :<a href="'.base_url().'Quotation/DownlodEvent?quotation_number='.$quotation_number.'">Download</a></p><br><br>

            </p>';

        $mail->Body = $mailContent;
      }else{
         $mailContent = '<p>'.$message.'</p>
            <p>Click to download  :<a href="'.base_url().'Quotation/DownlodOther?quotation_number='.$quotation_number.'">Download</a></p><br><br>

            </p>';

        $mail->Body = $mailContent;

      }
        
        // Send email
        if(!$mail->send()){
           $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Failed
      
          </div>');
          redirect('Quotation/manage_quotation');
         

        }else{
          $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
          
          Successfully
          </div>');
        

           redirect('Quotation/manage_quotation');
        }

     
    
}