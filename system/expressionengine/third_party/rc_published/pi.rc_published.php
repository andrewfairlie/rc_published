<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * RC Published
 *
 * @package     ExpressionEngine
 * @category        Plugin
 * @author      Red Carrot
 * @copyright       Copyright (c) 2014, Andrew Fairlie
 * @link        http://redcarrot.co.uk/
 */

$plugin_info = array(
  'pi_name'         => 'RC Published',
  'pi_version'      => '1.0',
  'pi_author'       => 'Red Carrot',
  'pi_author_url'   => 'http://redcarrot.co.uk/',
  'pi_description'  => 'Checks to see if the current user has published an entry in a given channel'
);

class Rc_published
{

    public $return_data = "";


    public function __construct()
    {
        
        $this->EE =& get_instance();

        // Grab the parameter for the channels we're checking against
        $channel_id = ee()->TMPL->fetch_param('channel_id');
        
        // Grab the current member ID
        $current_user = $this->EE->session->userdata('member_id');
        

        $results = ee()->db->select('*')
                            ->from('channel_titles c')
                            ->where(array(
                              'c.author_id' => $current_user,
                              'c.channel_id' => $channel_id
                            ))
                            ->get();

        if ($results->num_rows() > 0)
        {
          $this->return_data = "true";
        } else {
          $this->return_data = "false";
        }
        
    }

}
