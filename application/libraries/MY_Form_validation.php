<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation
{
    function alpha_dashg_space($str)
    {
        return ( ! preg_match("/^([-a-z_.])+$/i", $str)) ? FALSE : TRUE;
    }
}