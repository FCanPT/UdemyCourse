<h1>Edit Project - <?=$project_data->project_name;?></h1>

<?php $attributes = array('id'=>'edit_project_form', 
                        'class'=>'form_horizontal'); ?>

<?php echo validation_errors("<p class='bg-danger'>"); ?>

<?php echo form_open('projects/edit', $attributes); ?>

<div class="form-group">
    <?php echo form_label('Project Name'); ?>
    <?php $data = array(
                    'class' => 'form-control',
                    'name' => 'project_name',
                    'placeholder' => 'Enter project Name',
                    'value'=>$project_data->project_name
                    ); 
    ?>
    <?php echo form_input($data); ?>

</div>
<div class="form-group">

    <?php echo form_label('Project Description'); ?>
    <?php $data = array(
                    'class' => 'form-control',
                    'name' => 'project_body',
                    'placeholder' => 'Enter project description',
                    'value'=>$project_data->project_body
                    ); 
    ?>
    <?php echo form_textarea($data); ?>

</div>

<?php echo form_hidden('id', $project_data->id); ?>
<?php echo form_hidden('aux', TRUE); ?>

<div class="form-group">

    <?php $data = array(
                    'class' => 'btn btn-primary',
                    'name' => 'submit',
                    'value' => 'Edit'
                    ); 
    ?>
    <?php echo form_submit($data); ?>

</div>

<?php echo form_close(); ?>
