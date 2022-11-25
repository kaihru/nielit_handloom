<?php
class Users
{
    /**
     *
     */
    public function __construct()
    {
        // Only super admin is allowed to access this page
        if ($_SESSION['user_type'] !== 'coordinator')
        {
            // Show permission denied message
            //header('HTTP/1.1 401 Unauthorized', true, 401);
            //exit('401 Unauthorized');
            //$_SESSION['failure'] = "You don't have permission to perform this action";
             echo '<script>alert( "You dont have permission to access this page");window.location.href = "index.php";</script>';
            //header('location: index.php');
            exit;
        }
    }

    /**
     *
     */
    public function __destruct()
    {
    }
    
    /**
     * Set friendly columns\' names to order tables\' entries
     */
    public function setOrderingValues()
    {
        $ordering = [
            'id' => 'ID',
            'user_name' => 'Username',
            'user_type' => 'User Type'
        ];

        return $ordering;
    }
}
?>
