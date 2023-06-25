<?php
class Recipesearch_model extends CI_Model
{   

    public function getrecipelist()
    {
         $sql = "SELECT * , (SELECT count(*)  FROM recipe_likes as rl where rl.recipe_id = rm.id AND likes = 1 ) as likes FROM recipes_master as rm";
         $query = $this->db->query($sql);
         return $query->result_object();
    }
    public function getrecipetags($rcId)
    {
         $sql = "SELECT *  
         FROM recipes_tags_mapping as rm 
         Join recipes_tags as rt
         ON rt.id = rm.tag_id 
         Where recipe_id = $rcId ";
         $query = $this->db->query($sql);
         return $query->result_object();
    }

    public function deletetagsfromRecipe($recipeid,$tagid)
    { #tagid is array
        $in ='('. implode(",",$tagid).')';
        $sql = "DELETE FROM recipes_tags_mapping WHERE recipe_id = $recipeid AND tag_id IN $in";
        $query = $this->db->query($sql);
        if($query){
            return 1;
        }else{
            return 0;
        }
    }
 
    #old developer ---
    function fetch_data($query,$food=''){
        $this->db->select("*");
        $this->db->from("food_master");
        if($food){
        $this->db->where('food_category',$food);
        }
        if($query != '')
        {
        $this->db->like('food_name', $query);
        $this->db->limit('20');	
        //$this->db->or_like('food_name', $query);
        }

        $this->db->order_by('id', 'RANDOM');
        $ret =  $this->db->get();
        // echo $this->db->last_query();die;
        return $ret;
    }


    public function record_count($pref,$query=''){
        $this->db->select('*')->where_in('food_category',$pref);
        if($query){
            $this->db->like('food_name', $query);
        }
        $data = $this->db->get('food_master')->result_array();

        return $data;

    }

    function get_receipe($limit, $start,$pref,$querys='')
    {
        $this->db->where_in('food_category',$pref);
        if($querys){
        $this->db->like('food_name', $querys);
        }	
        
        $this->db->limit($limit, $start);
            $query = $this->db->get("food_master");
        // echo $this->db->last_query();die;
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            }
            return false;
    }




}
