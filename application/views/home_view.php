<p class="bg-success">
    <?php if($this->session->flashdata('login_success')): ?>
    <?php echo $this->session->flashdata('login_success'); ?>    
    <?php endif;?>
</p>
<p class="bg-danger">
    <?php if($this->session->flashdata('login_failed')): ?>
    <?php echo $this->session->flashdata('login_failed'); ?>    
    <?php endif;?>
</p>
<p class="bg-danger">
    <?php if(isset($logout_success)): ?>
    <?php echo $logout_success; ?>    
    <?php endif;?>
</p>

<!--Informação de registo-->
<p class="bg-success">
    <?php if($this->session->flashdata('register_success')): ?>
    <?php echo $this->session->flashdata('register_success'); ?>    
    <?php endif;?>
</p>
<p class="bg-danger">
    <?php if($this->session->flashdata('register_failed')): ?>
    <?php echo $this->session->flashdata('register_failed'); ?>    
    <?php endif;?>
</p>

<!--Proibição-->
<p class="bg-danger">
    <?php if($this->session->flashdata('no_access')): ?>
    <?php echo $this->session->flashdata('no_access'); ?>    
    <?php endif;?>
</p>
<h1>HELLO this is a view</h1>