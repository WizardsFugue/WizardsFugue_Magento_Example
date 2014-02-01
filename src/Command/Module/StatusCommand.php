<?php

namespace Command\Module;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\TableHelper;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\Finder\Finder;

class StatusCommand extends Command
{
    protected $basepath;
    
    
    protected function configure()
    {
        $this
            ->setName('module:status')
            ->setDescription('get state of modules and list installed, non installed, deactivated and so on')
        ;
    }
    
    public function setBasePath($path){
        $this->basepath = realpath($path);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $table = new TableHelper();
        $table->setHeaders(array('Module Name','active?','found in'));
        foreach($this->getModuleConfigStates() as $state){
            $table->addRow( 
                array(
                    $state[0], 
                    $this->formatActiveState($state[1]),
                    $this->formatFoundIn($state[2]),
                )
            );
        }
        $table->render($output);
    }
    
    protected function getModuleConfigStates(){
        $result = array();
        foreach( $this->getModuleConfigFiles() as $module => $file ){
            $finder = new Finder();
            $finder->contains($module);
            $finder->in( $this->basepath.'/mage/app/etc/modules' );
            foreach($finder as $f){
                $moduleEtcFile = $f;
                break;
            }
            $moduleState = 0;
            $color = "yellow";
            $xml = new \Varien_Simplexml_Element( file_get_contents($moduleEtcFile->getPathname()) );
            
            $moduleState = $xml
                ->modules
                ->{$module}
                ->active;
            $result[] = array( $module, $moduleState, $file );
        }
        return $result;
    }
    
    protected function getModuleRelatedFiles(){
        $finder = new Finder();
        $finder->path('#(Model/Observer|Helper/Data)\.php#');
        $finder->notPath('#not_used#');
        return $finder->in( $this->basepath );
    }
    
    protected function getModuleConfigFiles(){
        $files = $this->getModuleRelatedFiles();
        $moduleFiles = array();
        
        
        foreach( $files as $file ){
            $finder = new Finder();
            $finder->name('config.xml');
            $finder->in( dirname($file).'/..' );
            if( $finder->count() != 1 ){ continue;}
            foreach($finder as $f){
                $moduleFile = $f;
                break;
            }
            $crawler = new Crawler( file_get_contents($moduleFile->getPathname()) );
            $moduleName = $crawler->filter('modules > *')->getNode(0)->tagName;
            
            $moduleFiles[$moduleName] = realpath($moduleFile->getPathname());
        }
        ksort($moduleFiles);
        
        return $moduleFiles;
    }
    
    protected function formatActiveState($moduleState){
        if($moduleState === null){
            $moduleState = 'null';
            $color = "yellow";
        }elseif($moduleState == "true"){
            $color = "green";
        }elseif($moduleState == "false"){
            $color = "white";
        }
        $moduleState = "<fg={$color}>{$moduleState}</fg={$color}>";
        return $moduleState;
    }
    
    protected function formatFoundIn($path){

        $path = str_replace( $this->basepath, '', $path );
        $path = str_replace( 'connect20', '<fg=magenta>connect20</fg=magenta>', $path );
        $path = str_replace( 'wizards-fugue', '<fg=green>wizards-fugue</fg=green>', $path );
        return $path;
    }
}