<h1>Test create</h1>

<?php $attributes = array('id'=>'create_project_form', 
                        'class'=>'form_horizontal'); ?>

<?php echo validation_errors("<p class='bg-danger'>"); ?>

<?php echo form_open('projects/create', $attributes); ?>

<div class="form-group">

    <?php echo form_label('Project Name'); ?>
    <?php $data = array(
                    'class' => 'form-control',
                    'name' => 'project_name',
                    'placeholder' => 'Enter project Name'
                    ); 
    ?>
    <?php echo form_input($data); ?>

</div>
<div class="form-group">

    <?php echo form_label('Project Description'); ?>
    <?php $data = array(
                    'class' => 'form-control',
                    'name' => 'project_body',
                    'placeholder' => 'Enter project description'
                    ); 
    ?>
    <?php echo form_textarea($data); ?>

</div>

<?php echo form_hidden('aux', TRUE); ?>

<div class="form-group">

    <?php $data = array(
                    'class' => 'btn btn-primary',
                    'name' => 'submit',
                    'value' => 'Create'
                    ); 
    ?>
    <?php echo form_submit($data); ?>

</div>

<?php echo form_close(); ?>
