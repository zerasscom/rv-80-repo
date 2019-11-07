<?php

/**
 * Based in http://svn.symfony-project.com/branches/1.4/data/bin/check_configuration.php
 */
$get_loaded_extensions = get_loaded_extensions();

function is_cli() {
    return !isset($_SERVER['HTTP_HOST']);
}

/**
 * Checks a configuration.
 */
function check($boolean, $message, $help = '', $fatal = false) {
    echo $boolean ? "  OK        " : sprintf("[[%s]] ", $fatal ? ' ERROR ' : 'WARNING');
    echo sprintf("$message%s\n", $boolean ? '' : ': FAILED');

    if (!$boolean) {
        if ($fatal) {
            echo ("<span class='important'> *** $help ***</span>\n");
        } else {
            echo "<span class='danger'>            *** $help ***</span>\n";
        }
    }
}

/**
 * Gets the php.ini path used by the current PHP interpretor.
 *
 * @return string the php.ini path
 */
function get_ini_path() {
    if ($path = get_cfg_var('cfg_file_path')) {
        return $path;
    }

    return 'WARNING: not using a php.ini file';
}

if (!is_cli()) {
    echo '<html><body>
<style>
.important{
    color:red;
    font-weight:bold;
    font-size:140%;
}
.danger{
    color:orangered;
    font-weight:bold;
    font-size:110%;
}
</style>
<pre>';
}

echo "************************************\n";
echo "*                                  *\n";
if(isset($_GET['57']))
    echo "*  Laravel 5.7 requirements check  *\n";
else
    echo "*  Laravel 5.6 requirements check  *\n";
echo "*                                  *\n";
echo "************************************\n\n";

echo "** Website: <b>" . $_SERVER['SERVER_NAME'] . "</b> **\n\n";

echo sprintf("php.ini used by PHP: %s\n\n", get_ini_path());

echo "** PHP settings **\n\n";
echo sprintf("  max_execution_time:  %s\n", ini_get('max_execution_time'));
echo sprintf("  upload_max_filesize: %s\n", ini_get('upload_max_filesize'));
echo sprintf("  post_max_size:       %s\n\n", ini_get('post_max_size'));

if (is_cli()) {
    echo "** WARNING **\n";
    echo "*  The PHP CLI can use a different php.ini file\n";
    echo "*  than the one used with your web server.\n";
    if ('\\' == DIRECTORY_SEPARATOR) {
        echo "*  (especially on the Windows platform)\n";
    }
    echo "*  If this is the case, please launch this\n";
    echo "*  utility from your web server.\n";
    echo "** WARNING **\n";
}

// mandatory
echo "\n<h2>** Mandatory requirements **</h2> \n\n";

$server = $_SERVER['SERVER_SOFTWARE'];
$server_is_ok = ( (stripos($server, 'Apache') === 0) || (stripos($server, 'nginx') === 0) );
check($server_is_ok, sprintf('Web server is suitable (%s)', $server), 'You should change the server to Apache or Nginx', true);
if(isset($_GET['57']))
    check(version_compare(phpversion(), '7.2.2', '>='), sprintf('PHP version is at least 7.2.2 (%s)', phpversion()), 'Current version is '.phpversion(), true);
else
    check(version_compare(phpversion(), '7.1.3', '>='), sprintf('PHP version is at least 7.1.3 (%s)', phpversion()), 'Current version is '.phpversion(), true);


check(in_array('pdo_mysql', $get_loaded_extensions), 'PDO Mysql PHP extension loaded', 'Install and enable PDO Mysql extension', true);

check(in_array('mbstring', $get_loaded_extensions), 'mbstring PHP extension loaded', 'Install and enable mbstring extension', true);
check(in_array('tokenizer', $get_loaded_extensions), 'tokenizer PHP extension loaded', 'Install and enable tokenizer extension', true);
check(in_array('xml', $get_loaded_extensions), 'xml PHP extension loaded', 'Install and enable xml extension', true);
check(in_array('xml', $get_loaded_extensions), 'xml PHP extension loaded', 'Install and enable xml extension', true);
check(in_array('ctype', $get_loaded_extensions), 'ctype PHP extension loaded', 'Install and enable ctype extension', true);
check(in_array('json', $get_loaded_extensions), 'json PHP extension loaded', 'Install and enable json extension', true);


// warnings
echo "\n<h2>** Optional checks **</h2>\n\n";

check(class_exists('PDO'), 'PDO is installed', 'Install PDO (mandatory for Eloquent)', false);
if (class_exists('PDO')) {
    $drivers = PDO::getAvailableDrivers();
    check(count($drivers), 'PDO has some drivers installed: '.implode(', ', $drivers), 'Install some PDO drivers (mandatory for Eloquent)');
}
check(class_exists('DomDocument'), 'PHP-XML module is installed', 'Install and enable the php-xml module (required by Eloquent)', false);
check(class_exists('XSLTProcessor'), 'XSL module is installed', 'Install and enable the XSL module (recommended for Eloquent)', false);
check(function_exists('token_get_all'), 'The token_get_all() function is available', 'Install and enable the Tokenizer extension (highly recommended)', false);
check(function_exists('mb_strlen'), 'The mb_strlen() function is available', 'Install and enable the mbstring extension', false);
check(function_exists('iconv'), 'The iconv() function is available', 'Install and enable the iconv extension', false);
check(function_exists('utf8_decode'), 'The utf8_decode() is available', 'Install and enable the XML extension', false);
check(function_exists('json_encode'), 'The json_encode() is available', 'Install and enable the JSON extension', false);
check(function_exists('posix_isatty'), 'The posix_isatty() is available', 'Install and enable the php_posix extension (used to colorized the CLI output)', false);

check(in_array('fileinfo', $get_loaded_extensions), 'Fileinfo PHP extension loaded', 'Install and enable Fileinfo extension', false);
check(in_array('mcrypt', $get_loaded_extensions), 'Mcrypt PHP extension loaded', 'Install and enable Mcrypt extension', false);

$accelerator =
    (function_exists('apc_store') && ini_get('apc.enabled'))
    ||
    function_exists('eaccelerator_put') && ini_get('eaccelerator.enable')
    ||
    function_exists('xcache_set')
;
check($accelerator, 'A PHP accelerator is installed', 'Install a PHP accelerator like APC (highly recommended)', false);

check(!ini_get('short_open_tag'), 'php.ini has short_open_tag set to off', 'Set it to off in php.ini', false);
check(!ini_get('magic_quotes_gpc'), 'php.ini has magic_quotes_gpc set to off', 'Set it to off in php.ini', false);
check(!ini_get('register_globals'), 'php.ini has register_globals set to off', 'Set it to off in php.ini', false);
check(!ini_get('session.auto_start'), 'php.ini has session.auto_start set to off', 'Set it to off in php.ini', false);

if (!is_cli()) {
    echo '</pre></body></html>';
}
