<?
/** charge des classes automatiquement **/
class MP_ClassLoader{

  private $subpaths = array("",'include','library','classes');
  private $extensions = array('.inc','.php');
  private $dir ;
  function __construct($dir,array $subpaths=null,array $extensions=null){
    $this->dir = $dir;
    isset($subpaths) AND $this->subpaths = array_merge($this->subpaths,$subpaths);
    isset($extensions) AND $this->extensions = array_merge($this->extensions,$extensions);
  }

  public function Autoload($class){
    /**fields**/
    $ds = DIRECTORY_SEPARATOR;
    foreach($this->subpaths as $subpath){
      foreach($this->extensions as $extension){
        $path = $this->dir.$ds.$subpath.$ds.$class.$extension;
        if(file_exists($path)){
          require_once $path;
          return;
        }
      }
    }
  }
  /** enregistre l'autoloader **/
  public function RegisterAutoLoad(){
    spl_autoload_register(array($this,"Autoload"));
  }
  /** méthode Factory **/
  public static function Create($dir,array $subpaths=null,$extensions=null){
    $loader = new MP_ClassLoader($dir,$subpaths,$extensions);
    $loader->RegisterAutoLoad();
    return $loader;
  }
}

