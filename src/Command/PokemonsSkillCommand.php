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
 * PokemonsInsert command.
 */
class PokemonsInsertCommand extends Command
{
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
    
    /**
     * Pokemons InsertSQL
     * @param Arguments $args
     * @param ConsoleIo $io
     */
    public function execute(Arguments $args, ConsoleIo $io)
    {
        $pokemons = $this->Pokemons->collectBasicInfo();
        $sqlfile = new File(SQL . 'insert_pokemons.sql', true);
        
        $max = count($pokemons);
        $beforeNo = 0;
        $cnt = 1;
        
        for ($i = 0; $i < $max; $i++) {
            
            $zukan_no = intval($pokemons[$i][0]);
            $name = $pokemons[$i][1];
            $type_id1 = $this->Common->convertType($pokemons[$i][2]);
            
            if (isset($pokemons[$i][3])) {
                $type_id2 = $this->Common->convertType($pokemons[$i][3]);
            } else {
                $type_id2 = "''";
            }
            
            if ($zukan_no === $beforeNo) {
                $cnt++;
            } else {
                $cnt = 1;
            }
            
            $sub_no = $cnt;
            
            $values = "{$zukan_no}, {$sub_no}, '{$name}', {$type_id1}, {$type_id2}";
            $sql = "INSERT INTO Pokemons (zukan_no, sub_no, name, type_id1, type_id2) VALUES ({$values});\n";
            $sqlfile->write($sql);
            
            $beforeNo = $zukan_no;
        }
        
        $io->out("Pokemons Insert Successful");
    }
}
