        <?php $this->load->view('inc/header');?>


        <!-- Begin Page Content -->
        <body class="bg-gradient-primary">

  <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">View Profile</h1>
              </div>
              <?php
                if($this->session->flashdata('message'))
                {
                    echo '<div class="alert alert-success msg">
                        '.$this->session->flashdata("message").'
                    </div>
                    ';
                }
                if(isset($this->session->userdata['is_admin'])){
                ?> 

                    <div style="margin-top: -54px; float: right;">
              <a href="<?php echo base_url('/users-list');?>" class="btn btn-primary pull-right">Back</a>
              </div>
                  <?php
                   } else{
                  ?>
                                 <div style="margin-top: -54px; float: right;">
              <a href="<?php echo base_url('/dashboard');?>" class="btn btn-primary pull-right">Back</a>
              </div>
                 <?php } ?>
               <form class="user" >
                <div class="form-group ">
                
                    <input type="text" name="f_name" value="<?php echo $data['f_name'];?>" class="form-control form-control-user" required placeholder="First Name" readonly>
                
                </div>
                <div class="form-group ">
                
                    <input type="text" name="l_name" value="<?php echo $data['l_name'];?>" class="form-control form-control-user" required placeholder="Last Name" readonly>

                
                </div>
               <div class="form-group ">
                
                    <input type="number" name="mobile" value="<?php echo $data['mobile'];?>" class="form-control form-control-user" required placeholder="Mobile " readonly>
                
                </div>

    
              </form>
                          <a href="<?php echo base_url('/edit/').$data['id'];?>"  > <button class="  btn btn-primary btn-user btn-block" id='mbtn' > Edit </button></a>
      
            
        <!-- /.container-fluid -->
        <?php $this->load->view('inc/footer');?>
           <script type="text/javascript">
             $(document).ready(function(){
               $(".msg").click(function(){
                $(".msg").hide(1000);

               });

             });
          </script>
