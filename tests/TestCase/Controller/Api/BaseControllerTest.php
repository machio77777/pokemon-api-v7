<?php
namespace App\Test\TestCase\Controller\Api;

use Cake\TestSuite\IntegrationTestCase;

/**
 * BaseControllerTestクラス
 */
class BaseControllerTest extends IntegrationTestCase
{
    CONST API_REVISION_V1 = '/api/v1';
    
    CONST HTTP_CODE_OK = 200;
    CONST HTTP_CODE_VALIDATION_ERROR = 400;
    CONST HTTP_CODE_SERVICE_UNAVALIABLE = 503;
}
