<?php 
    
    
    function get_header(string $title, string $layouts = 'public'): void
     {
        global $router;
        require_once '../src/views/layouts/' . $layouts. '/header.php';
    } 
    
    function get_footer(string $layouts = 'public'): void {
        require_once '../src/views/layouts/' . $layouts. '/footer.php';
    }


    /**
     * Create alert
     * @param string $message The message to save in alert
     * @param string $type    The type of alert
     * @return void
     */

    function alert(string $message, string $type = 'danger'): void {
        $_SESSION['alert'] = [
            'message' => $message,
            'type' => $type
        ];
        
    }

    /**
     * Display alert session
     * @return void
     */
    function displayAlert(): void {
        if (!empty($_SESSION['alert'])) {
            echo '<div class="alert alert-' . $_SESSION['alert']['type'] . '" role="alert" style="margin-top: 50px;">' . $_SESSION['alert']['message'] . '</div>';

            unset($_SESSION['alert']);
        };
        
    }

    /**
     * Check if user is logged in
     * @param array $match The match array from Altorouter
     * @param Altorouter $router The router
     */
    function checkAdmin(array $match, Altorouter $router) {
        $existsAdmin = strpos($match['target'], 'admin_');

        if ($existsAdmin !== false && empty($_SESSION['user']['id'])) {
            header('Location: ' . $router->generate('login'));
            die;
        }
    }

    function logoutTimer() {
        global $router; 

        if (!empty($_SESSION['user']['last_login'])) {
           $expireHour = 1;

           $now = new DateTime();
           $now->setTimezone(new DateTimeZone('Europe/Paris'));

           $last_login = new DateTime($_SESSION['user']['last_login']);

           if ($now->diff($last_login)->i >= $expireHour) {
                unset($_SESSION['user']);
                alert('Vous avez été déconnecté pour inactivité', 'danger');
                header('Location: ' . $router->generate('login'));
                die;
           };
        }
    }
     
    

?>