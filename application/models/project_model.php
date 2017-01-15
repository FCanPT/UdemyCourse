<?php

class project_model extends CI_Model {

    function get_projects() {

        $result = $this->db->get('projects');

        return $result->result();
    }

    function get_project($project_id) {

        $result = $this->db->select('*')
                ->from('projects')
                ->where(array('id' => $project_id))
                ->get();

        return $result->row();
    }
    
    function get_allProjects($user_id) {
        $query = sprintf('SELECT * FROM projects WHERE project_user_id = %s', $user_id);

        $result = $this->db->query($query); 
        
        return $result->result();
    }

    function create_project($project) {

        $query = $this->db->insert('projects', $project);

        return $query;
    }

    function edit_project($project) {
        
        $query = sprintf("UPDATE projects SET project_name = '%s', project_body = '%s' WHERE id = %s",
                $project->project_name,
                $project->project_body,
                $project->id);
        
        $result = $this->db->query($query);

        return $result;
    }
    
    function delete_project($id) {
        
        $query = sprintf("DELETE FROM projects WHERE id = %s",
                $id);
        
        $result = $this->db->query($query);

        return $result;
    }

}
