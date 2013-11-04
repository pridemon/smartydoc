<?php defined('SYSPATH') OR die('No direct script access.');

class Smarty_View extends Smarty_Kohana_View {

    public function render($file = null)
    {
        if ($file !== null) {
            $this->set_filename($file);
        }

        if (empty($this->_file)) {
            throw new Kohana_View_Exception('You must set the file to use within your view before rendering');
        }

        $token = Kohana::$profiling ? Profiler::start('smarty', 'rendering ' . basename($this->_file)) : false;

        $output = $this->_smarty->fetchDoc($this->_file);

        $token ? Profiler::stop($token) : null;
        return $output;
    }

}