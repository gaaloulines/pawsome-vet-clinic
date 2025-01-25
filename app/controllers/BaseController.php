
    <?php

    class BaseController {
        /**
         * Render a view file and pass data to it.
         *
         * @param string $view The view path relative to 'app/views'
         * @param array $data Associative array of data to be passed to the view
         */
        public function render($view, $data = []) {
            // Extract data array into individual variables
            extract($data);
    
            // Build the full path to the view file
            $viewPath = __DIR__ . '/../views/' . $view;
    
            // Check if the view file exists
            if (file_exists($viewPath)) {
                require_once $viewPath;
            } else {
                throw new Exception("View file not found: $viewPath");
            }
        }
    }
    

