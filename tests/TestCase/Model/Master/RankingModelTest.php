<?php

namespace App\Test\TestCase\Model\Master;

use Cake\TestSuite\TestCase;
use App\Model\Master\RankingModel;
use App\Common\ApiLogger;

/**
 * RankingModelクラス
 * 
 * [実行コマンド]
 * vendor/bin/phpunit tests/TestCase/Model/Master/RankingModelTest.php
 */
class PokemonsModelTest extends TestCase {
    
    private $rankingModel;
    
    public function setup()
    {
        parent::setUp();
        $this->rankingModel = new RankingModel(new ApiLogger());
    }

    /**
     * HP(ヒットポイント)種族値ランキング
     */
    public function testgetHpList()
    {
        $pokemons = $this->rankingModel->getHpList();
        $this->assertEquals("242", $pokemons[0]['zukanNo']);
        $this->assertEquals("1", $pokemons[0]['subNo']);
        $this->assertEquals("ハピナス", $pokemons[0]['name']);
        $this->assertEquals("255", $pokemons[0]['value']);
    }

    /**
     * AT(物理攻撃)種族値ランキング
     */
    public function testgetAtList()
    {
        $pokemons = $this->rankingModel->getAtList();
        $this->assertEquals("150", $pokemons[0]['zukanNo']);
        $this->assertEquals("2", $pokemons[0]['subNo']);
        $this->assertEquals("メガミュウツーX", $pokemons[0]['name']);
        $this->assertEquals("190", $pokemons[0]['value']);
    }

    /**
     * DF(物理防御)種族値ランキング
     */
    public function testgetDfList()
    {
        $pokemons = $this->rankingModel->getDfList();
        $this->assertEquals("208", $pokemons[0]['zukanNo']);
        $this->assertEquals("2", $pokemons[0]['subNo']);
        $this->assertEquals("メガハガネール", $pokemons[0]['name']);
        $this->assertEquals("230", $pokemons[0]['value']);
    }

    /**
     * SA(特殊攻撃)種族値ランキング
     */
    public function testgetSaList()
    {
        $pokemons = $this->rankingModel->getSaList();
        $this->assertEquals("150", $pokemons[0]['zukanNo']);
        $this->assertEquals("3", $pokemons[0]['subNo']);
        $this->assertEquals("メガミュウツーY", $pokemons[0]['name']);
        $this->assertEquals("194", $pokemons[0]['value']);
    }

    /**
     * SD(特殊防御)種族値ランキング
     */
    public function testgetSDList()
    {
        $pokemons = $this->rankingModel->getSdList();
        $this->assertEquals("213", $pokemons[0]['zukanNo']);
        $this->assertEquals("1", $pokemons[0]['subNo']);
        $this->assertEquals("ツボツボ", $pokemons[0]['name']);
        $this->assertEquals("230", $pokemons[0]['value']);
    }

    /**
     * SP(素早さ)種族値ランキング
     */
    public function testgetSpList()
    {
        $pokemons = $this->rankingModel->getSpList();
        $this->assertEquals("291", $pokemons[0]['zukanNo']);
        $this->assertEquals("1", $pokemons[0]['subNo']);
        $this->assertEquals("テッカニン", $pokemons[0]['name']);
        $this->assertEquals("160", $pokemons[0]['value']);
    }
    
}
