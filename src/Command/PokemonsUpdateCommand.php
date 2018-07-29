<?php
namespace App\Command;

use Cake\Console\Arguments;
use Cake\Console\Command;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;

use Cake\Filesystem\File;
use Cake\Controller\ComponentRegistry;
use App\Controller\Component\PokemonsComponent;
use App\Controller\Component\CommonComponent;

/**
 * PokemonsUpdate command.
 */
class PokemonsUpdateCommand extends Command
{
    CONST START_NO = 1;
    CONST LAST_NO = 808;
    
    private $Pokemons;
    private $Common;
    
    public function initialize()
    {
        parent::initialize();
        $registry = new ComponentRegistry();
        $this->Pokemons = new PokemonsComponent($registry);
        $this->Common = new CommonComponent($registry);
    }
    
    public function buildOptionParser(ConsoleOptionParser $parser)
    {
        return parent::buildOptionParser($parser);
    }
    
    public function execute(Arguments $args, ConsoleIo $io)
    {
        $pokemons = $this->Pokemons->collectTribals(self::START_NO, self::LAST_NO);
        $sqlfile = new File(SQL . 'update_pokemons.sql', true);
        
        $max = count($pokemons);
        for ($i = 0; $i < $max; $i++) {
            
            $zukan_no = $pokemons[$i]['no'];
            $hp = $pokemons[$i]['hp'];
            $at = $pokemons[$i]['at'];
            $df = $pokemons[$i]['df'];
            $sa = $pokemons[$i]['sa'];
            $sd = $pokemons[$i]['sd'];
            $sp = $pokemons[$i]['sp'];
            
            // todo 特性変換
            $quality_id1 = "";
            $quality_id2 = "";
            $dream_quality = "";
            
            $sql = "UPDATE Pokemons SET ";
            $sql .= "hp = {$hp}, ";
            $sql .= "at = {$at}, ";
            $sql .= "df = {$df}, ";
            $sql .= "sa = {$sa}, ";
            $sql .= "sd = {$sd}, ";
            $sql .= "sp = {$sp}, ";
            $sql .= "quality_id1 = {$quality_id1}, ";
            $sql .= "quality_id2 = {$quality_id2}, ";
            $sql .= "dream_quality = {$dream_quality} ";
            $sql .= "WHERE zukan_no = {$zukan_no};\n";
            $sqlfile->write($sql);
        }
        $io->out("Pokemons Update Successful");
    }
}
