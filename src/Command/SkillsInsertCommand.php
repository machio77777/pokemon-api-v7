<?php
namespace App\Command;

use Cake\Console\Arguments;
use Cake\Console\Command;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;

use Cake\Filesystem\File;
use Cake\Controller\ComponentRegistry;
use App\Controller\Component\SkillsComponent;
use App\Controller\Component\CommonComponent;

/**
 * SkillsInsert command.
 */
class SkillsInsertCommand extends Command
{
    private $Skills;
    private $Common;
    
    public function initialize()
    {
        parent::initialize();
        $registry = new ComponentRegistry();
        $this->Skills = new SkillsComponent($registry);
        $this->Common = new CommonComponent($registry);
    }
    
    public function buildOptionParser(ConsoleOptionParser $parser)
    {
        return parent::buildOptionParser($parser);
    }
    
    /**
     * Skills InsertSQL
     * @param Arguments $args
     * @param ConsoleIo $io
     */
    public function execute(Arguments $args, ConsoleIo $io)
    {
        $skills = $this->Skills->collectSkills();
        $sqlfile = new File(SQL . 'insert_skills.sql', true);
        
        $max = count($skills);
        for ($i = 0; $i < $max; $i++) {
            
            $skill_id = $i + 1;
            $name = $skills[$i][0];
            $type_id = $this->Common->convertType($skills[$i][1]);
            $classification = $skills[$i][2];
            $power = $skills[$i][3];
            $zpower = $skills[$i][4];
            $accuracy = $skills[$i][5];
            $pp = $skills[$i][6];
            $direct_attack = $skills[$i][7];
            $maoru = $skills[$i][8];
            $target = $skills[$i][9];
            $effect = $skills[$i][10];
            
            //$zeffect = "";
            //$magic_coat = "";
            //$omugaeshi = "";
            //$yokodori = "";
            //$migawarikantsu = "";
            
            $values = "{$skill_id}, '{$name}', {$type_id}, {$power}, {$zpower}, {$pp}, ";
            $values .= "'{$classification}', {$accuracy}, '{$target}', '{$effect}', '{$direct_attack}', '{$maoru}'";
            
            $sql = "INSERT INTO Skills (";
            $sql .= "skill_id, name, type_id, power, zpower, pp, ";
            $sql .= "classification, accuracy, target, effect, ";
            $sql .= "direct_attack, mamoru) VALUES ";
            $sql .= "({$values});\n";
            $sqlfile->write($sql);
        }
        $io->out("Skills Insert Successful");
    }
}
