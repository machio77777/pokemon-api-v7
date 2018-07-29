<?php
namespace App\Command;

use Cake\Console\Arguments;
use Cake\Console\Command;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;

use Cake\Filesystem\File;
use Cake\Controller\ComponentRegistry;
use App\Controller\Component\QualitiesComponent;
use App\Controller\Component\CommonComponent;

/**
 * QualitiesInsert command.
 */
class QualitiesInsertCommand extends Command
{
    private $Qualities;
    private $Common;
    
    public function initialize()
    {
        parent::initialize();
        $registry = new ComponentRegistry();
        $this->Qualities = new QualitiesComponent($registry);
        $this->Common = new CommonComponent($registry);
    }
    
    public function buildOptionParser(ConsoleOptionParser $parser)
    {
        return parent::buildOptionParser($parser);
    }
    
    /**
     * Qualities InsertSQL
     * @param Arguments $args
     * @param ConsoleIo $io
     */
    public function execute(Arguments $args, ConsoleIo $io)
    {
        $qualities = $this->Qualities->collectQualities();
        $sqlfile = new File(SQL . 'insert_qualities.sql', true);
        
        $max = count($qualities);
        
        for ($i = 0; $i < $max; $i++) {
            
            $quality_id = $qualities[$i][0];
            $quality_name = $qualities[$i][1];
            $effect = $qualities[$i][2];
            
            $values = "{$quality_id}, '{$quality_name}', '{$effect}'";
            $sql = "INSERT INTO Qualities (quality_id, quality_name, effect) VALUES ({$values});\n";
            $sqlfile->write($sql);
        }
        $io->out("Skills Insert Successful");
    }
}
