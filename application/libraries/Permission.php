<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
Note: This library is updated by Hameedullah Pardess <hameedullah.pardess@gmail.com>. Following changes are implemented:
**/

class Permission {

    // init vars
    var $CI;   // CI instance
    var $where = array();
    var $set = array();
    var $required = array();

    public function __construct(){
        
        // init vars
        $this->CI =& get_instance();

        // set roleID from session (if set)
        //$this->roleID = ($this->CI->session->userdata('roleID')) ? $this->CI->session->userdata('roleID') : 0;
    }

    // get roles from user
    function get_user_roles($userID, $details = false)
    {
        $this->CI->db->select('role.id, role.name');
        $this->CI->db->from('role');
        $this->CI->db->join('user_has_role', 'user_has_role.role_id = role.id');
        $this->CI->db->where('user_has_role.user_id', $userID);
        // get groups
        $query = $this->CI->db->get();
        log_message('DEBUG', 'Permission>get_user_roles(): ' . $this->CI->db->last_query());
        // set roles array and return
        if ($query->num_rows())
        {
            if ($details)
            {
                return $query->result_array();
            }

            foreach ($query->result_array() as $row)
            {
                $roles[] = $row['id'];
            }
            return $roles;
        }
        else
        {
            return false;
        }
    }

    function get_role_permissions($roleID, $details = false)
    {
        $this->CI->db->select('name');
        $this->CI->db->from('permission');
        $this->CI->db->join('role_has_permission', 'role_has_permission.permission_id = permission.id');
        $this->CI->db->where('role_has_permission.role_id', $roleIDArray);
        // get permissions
        $query = $this->CI->db->get();
        log_message('DEBUG', 'Permission>get_roles_permissions(): ' . $this->CI->db->last_query());
        
        if ($query->num_rows())
        {
            if ($details)
            {
                return $query->result_array();
            }

            $permissions = array();
            foreach ($query->result_array() as $row)
            {
                $permissions[] = $row['name'];
            }
            return $permissions;
        }
        else
        {
            return false;
        }
    }

    function get_roles_permissions($roleIDArray = array())
    {
        $this->CI->db->select('name');
        $this->CI->db->from('permission');
        $this->CI->db->join('role_has_permission', 'role_has_permission.permission_id = permission.id');
        $this->CI->db->where_in('role_has_permission.role_id', $roleIDArray);
        // get permissions
        $query = $this->CI->db->get();
        log_message('DEBUG', 'Permission>get_roles_permissions(): ' . $this->CI->db->last_query());
        
        if ($query->num_rows())
        {
            foreach ($query->result_array() as $row)
            {
                $permissions[] = $row['name'];
            }

            return $permissions;
        }
        else
        {
            return false;
        }
    }

    function get_all_roles($details = false)
    {
        $this->CI->db->where('id', $this->siteID);
        
        // return
        $query = $this->CI->db->get('role');

        if ($query->num_rows())
        {
            $roles = array();

            if ($details)
            {
                foreach ($query->result_array() as $row)
                {
                    $roles[] = array('id' => $row['id'], 'name' => $row['name']);
                }
            } else {
                foreach ($query->result_array() as $row)
                {
                    $roles[] = $row['name'];
                }
            }
            
            return $roles;
        }
        else
        {
            return false;
        }
    }

    function get_all_permissions($details = false)
    {
        $this->CI->db->select('id, name');
        $query = $this->CI->db->get('permission');

        if ($query->num_rows())
        {
            $permissions = array();

            if ($details)
            {
                foreach ($query->result_array() as $row)
                {
                    $permissions[] = array('id' => $row['id'], 'name' => $row['name']);
                }
            } else {
                foreach ($query->result_array() as $row)
                {
                    $permissions[] = $row['name'];
                }
            }
            
            return $permissions;
        }
        else
        {
            return false;
        }
    }

    function add_permissions_to_role($roleID, $permissions = array())
    {
        // delete all permissions on this roleID first
        $this->CI->db->where('role_id', $roleID);
        $this->CI->db->delete('role_has_permission');

        foreach ($permissions as $key => $value)
        {
            $this->CI->db->set('role_id', $roleID);
            $this->CI->db->set('permission_id', $value);
            $this->CI->db->insert('role_has_permission');
        }

        return true;
    }
}