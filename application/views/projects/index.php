<p class="bg-success">
<?php if($this->session->flashdata('project_created')): ?>
<?php echo $this->session->flashdata('project_created'); ?>
<?php endif; ?>
</p>
<p class="bg-success">
<?php if($this->session->flashdata('project_edited')): ?>
<?php echo $this->session->flashdata('project_edited'); ?>
<?php endif; ?>
</p>

<h2>Projects</h2>



<table class="table table-hover">
    <thead>
        <tr>
            <td></td><td></td><td></td><td><a class="btn btn-primary pull-right" href="<?= base_url()?>projects/create">Create Project</a>
            </td>
        </tr>
        <tr>
            <th>Project Name</th>
            <th>Project Body</th>
            <th>Project User_id</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($projects as $project): ?>
        <tr>    
            <?php echo '<td><a href="' . base_url() . 'projects/display/' . $project->id . '">' . $project->project_name . '</a></td>'; ?>
            <?php echo '<td>' . $project->project_body . '</td>'; ?>
            <?php echo '<td>' . $project->project_user_id . '</td>'; ?>
            <td>
            <?php echo form_open('projects/delete', array('id' => 'delete_project', 'class' => 'form_horizontal', 'onsubmit' => "if(!confirm('Do you really want to delete the project?')){return false;}")); ?>
            <?php echo form_hidden('id', $project->id); ?>
            <?php echo form_submit('submit', 'Delete Project', array('class' => 'btn btn-default btn-block')); ?>
            <?php echo form_close(); ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>