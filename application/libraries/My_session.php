<?php defined('BASEPATH') OR exit('No direct script access allowed');

class my_session
{
    public function __construct()
    {
        session_start();
    }

    public function userdata($key = NULL)
    {
        if (isset($key))
		{
			return isset($_SESSION[$key]) ? $_SESSION[$key] : NULL;			
		}
		elseif (empty($_SESSION))
		{
			return array();
		}

		$userdata = array();

		foreach (array_keys($_SESSION) as $key)
		{
		   $userdata[$key] = $_SESSION[$key];
		}

		return $userdata;
    }

    public function set_userdata($data, $value = NULL)
    {
        if (is_array($data))
        {
            foreach ($data as $key => &$value)
            {
                $_SESSION[$key] = $value;
            }

            return;
        }

        $_SESSION[$data] = $value;
    }

    public function regenerateId( $delOld = false )
    {
        session_regenerate_id( $delOld );
    }

    public function unset_userdata($key)
    {
        if (is_array($key))
        {
            foreach ($key as $k)
            {
                unset($_SESSION[$k]);
            }

            return;
        }

        unset($_SESSION[$key]);
    }
}