<?php

class Template{
    private $DATA = array();
    public function assign($key, $value)
    {
        $this->DATA[$key] = $value;
    }

    public function render($pageName)
    {
        $path = "./public/{$pageName}.html";
        if(file_exists($path)){
            $contents = file_get_contents($path);
            foreach($this->DATA as $key => $value){
                $contents = preg_replace('/\[' . $key . '\]/', $value, $contents);
            }
            eval(' ?>' . $contents . '<?php');
        } else {
            exit('<h1>Tmplate Error</h1>');
        }
    }


    function image($image)
    {
        $path = './public/assets/img/' . $image;
        if (file_exists($path)) {
            return $path;
        }
    }

    public function css(...$assets)
    {
        $link = '';
        foreach ($assets as $value) {
            $csspath = "./public/assets/css/{$value}.css";
            if (file_exists($csspath)) {
                $link .= '<link rel="stylesheet" href="' . $csspath . '">';
            }
        }
        return $link;
    }
    public function js(...$assets)
    {
        $script = '';
        foreach ($assets as $value) {
            $jspath = "./public/assets/js/{$value}.js";
            if (file_exists($jspath)) {
                $script .= '<script src="' . $jspath . '"></script>';
            }
        }
        return $script;
    }


}
?>