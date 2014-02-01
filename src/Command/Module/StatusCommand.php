<?php

namespace Command\Module;

use Symfony\Component\Console\Command\Command;
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
        $this->basepath = $path;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        foreach( $this->getModuleConfigFiles() as $module => $file ){
            $output->writeln( $module .'=>'.$file );
        }
        $output->writeln("end");
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
        
        return $moduleFiles;
    }
}