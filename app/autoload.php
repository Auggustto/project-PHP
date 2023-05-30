// Construindo um facilitador para require

spl_autoload_register(function($name_folder)
{
    if(file_exists('controller/'.$$name_folder.'.php'))
    {
        require 'controller/'.$$name_folder.'.php';
    }
    if(file_exists('models/'.$$name_folder.'.php'))
    {
        require 'models/'.$$name_folder.'.php';
    }
});
?>