<?php
namespace App\Command;

use Cake\Console\Arguments;
use Cake\Console\Command;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;

use Cake\ORM\TableRegistry;

use Cake\Filesystem\File;
use Cake\Controller\ComponentRegistry;
use App\Controller\Component\PokemonsComponent;

/**
 * PokemonsSkillCommand command.
 * 
 * [実行コマンド]
 * bin/cake pokemons_skill
 */
class PokemonsSkillCommand extends Command
{
    private $Pokemons;
    private $skills;
    
    public function initialize()
    {
        parent::initialize();
        $registry = new ComponentRegistry();
        $this->Pokemons = new PokemonsComponent($registry);
        $this->skills = TableRegistry::get('Skills');
    }
    
    public function buildOptionParser(ConsoleOptionParser $parser)
    {
        return parent::buildOptionParser($parser);
    }
    
    /**
     * PokemonsSkill InsertSQL
     * @param Arguments $args
     * @param ConsoleIo $io
     */
    public function execute(Arguments $args, ConsoleIo $io)
    {
        $start = 1;
        $end   = 2;
        $skillNames = $this->initMaster($this->skills->find()->enableHydration(false)->toArray());
        
        $pokemons = $this->Pokemons->collectSkillsByPokemon($start, $end);
        $sqlfile = new File(SQL . 'insert_pokemonsskill.sql', true);
        
        foreach ($pokemons as $pokemonSkills) {
            foreach ($pokemonSkills as $pokemonSkill) {
                $skillId = $skillNames[$pokemonSkill];
                $values = "{$start}, 1, {$skillId}, 0";
                $sql = "INSERT INTO Pokemons (zukan_no, sub_no, skill_id, delete_flg) VALUES ({$values});\n";
                $sqlfile->write($sql);
            }
            $start++;
        }
        $io->out("Pokemons Insert Successful");
    }
    
    /**
     * 技名リスト化
     * @param  array $skills
     * @return array $skillNames
     */
    private function initMaster($skills)
    {
        $skillNames = [];
        foreach ($skills as $skill) {
            $skillNames[$skill['skill_name']] = $skill['skill_id'];
        }
        return $skillNames;
    }
}
