<div class="col-xs-9">  
    <h3>Project Name: <?= $project_data->project_name ?></h3>  
    <p>Date created: <?= $project_data->date_created ?></p>

    <h3>Description</h3>
    <p><?= $project_data->project_body ?></p>
</div>
<div class="col-xs-3 pull-right">

    <h3>Actions</h3>

    <?php echo form_open('projects/create', array('id' => 'create_project', 'class' => 'form_horizontal')); ?>
    <?php echo form_hidden('id', $project_data->id); ?>
    <?php echo form_submit('submit', 'Create Project', array('class' => 'btn btn-default btn-block')); ?>
    <?php echo form_close(); ?>
    <br/>
    <?php echo form_open('projects/edit', array('id' => 'delete_project', 'class' => 'form_horizontal')); ?>
    <?php echo form_hidden('id', $project_data->id); ?>
    <?php echo form_submit('submit', 'Edit Project', array('class' => 'btn btn-default btn-block')); ?>
    <?php echo form_close(); ?>
    <br/>
    <?php echo form_open('projects/delete', array('id' => 'delete_project', 'class' => 'form_horizontal', 'onsubmit' => "if(!confirm('Do you really want to delete the project?')){return false;}")); ?>
    <?php echo form_hidden('id', $project_data->id); ?>
    <?php echo form_submit('submit', 'Delete Project', array('class' => 'btn btn-default btn-block')); ?>
    <?php echo form_close(); ?>
</div>