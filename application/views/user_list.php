<?php $this->load->view('inc/header');?>
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">User List</h1>
  <?php
    if($this->session->flashdata("message"))
      {
        echo '<div class = "alert alert-success msg">'.
        $this->session->flashdata("message").'</div>';
      }
  ?>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">User List</h6>
    </div>
    <div class="card-body">
      <div class="">
        <table class=" table dt-responsive" id="dataTable" >
          <thead>
            <tr>
              <th>Sr.</th>
              <th>Name</th>
              <th>Mobile</th>
              <th>Emali</th>
              <th>Created_at</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
          <tr>
            <th>Sr.</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>Emali</th>
            <th>Created_at</th>
            <th>Action</th>
          </tr>
          </tfoot>
          <tbody>
            <?php $i=1; foreach ($users as $value) {
            if($this->session->userdata('id')==$value['id']){
            continue;}
            ?>
            <tr>
              <td><?php echo $i;?></td>
              <td><?php echo $value['f_name'].$value['l_name'];?></td>
              <td><?php echo $value['mobile'];?></td>
              <td><?php echo $value['email'];?></td>
              <td><?php echo $value['created_at'];?></td>
              <td>
                <a href="<?php echo base_url('/profile/'.$value['id']); ?>" class="btn btn-info"><i class="fas fa-eye"></i></a>
                <!-- <button class="btn btn-info" > View</button> -->
                <a href="<?php echo base_url('HomeController/delete_user/'.$value['id']); ?>" class="btn btn-danger" onclick="if (confirm('Are you sure to delete ?')) return true; else return false;"> <i class="far fa-trash-alt"></i></a>
                
              </td>
              
            </tr>
            <?php $i++; } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
<?php $this->load->view('inc/footer');?>
<script type="text/javascript">
  $(document).ready(function(){
    $(".msg").click(function(){
      $(".msg").hide(1000);
    });
  });
</script>