<?php
class LicenceFileGenerator
{
    function generate(): string
    {
        ob_start();
        echo '<?php
        class Rv_Licence {
        public $url = "' . get_site_url() . '";
        ';
        echo (file_get_contents(PLUGIN_DIR . 'utils/licence-generator.php'));
        $var = ob_get_clean();
        ob_start();
        echo $var;
        $genrated_code = ob_get_clean();
        return $genrated_code;
    }
}
