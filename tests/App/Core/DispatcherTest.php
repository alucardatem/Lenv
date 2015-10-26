<?php

namespace Lenv\Tests\App\Core;

use Lenv\App\Core\Dispatcher;

class DispatcherTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @param $queryDataProvider
     * @param $expected
     * @dataProvider queryControllerDataProvider
     */

    public function testIfGetControllerClassNameReturnsCorrectClassName($queryDataProvider,$expected)
    {
        $dispatcher = new Dispatcher($queryDataProvider);
        $controllerClassName = $dispatcher->getControllerClassName();
        $this->assertEquals($expected, $controllerClassName);
    }


    /**
     * @param $queryDataProvider
     * @param $expected
     * @dataProvider queryActionDataProvider
     */
    public function testIfGetActionReturnsCorrectActionName($queryDataProvider,$expected)
    {
        $dispatcher = new Dispatcher($queryDataProvider);
        $actionName = $dispatcher->getAction();
        $this->assertEquals($expected, $actionName);
    }


    /**
     * @param $queryDataProvider
     * @dataProvider queryControllerDataProvider
     * @expectedException \Exception
     * @expectedExceptionMessage
     */

    public function testThatDispatchThrowsExceptionforNonExistentController($queryDataProvider,$expected){
//        try{
            $dispatcher = new Dispatcher($queryDataProvider);
            $controllerClassName = $dispatcher->getControllerClassName();
            $expectedException = "There is no class ".$controllerClassName;
            $dispatcher->dispatch();
//        }
//        catch(\Exception $e){
//
//            $message = $e->getMessage();
//            var_dump($message, $expectedException, '--------------');
//            $this->assertContains($message,$expectedException);
//        }
    }

    /**
     * @param $queryDataProvider
     * @dataProvider queryExceptionActionDataProvider
     */
    public function testThatDispatchThrowsExceptionforNonExistentMethod($queryDataProvider){
        $this->markTestIncomplete();
        try{
            $dispatcher = new Dispatcher($queryDataProvider);
            $controllerClassName = $dispatcher->getControllerClassName();
            $actionName = $dispatcher->getAction();
            $expectedException = "There is no method ".$controllerClassName . '::' . $actionName;
            $dispatcher->dispatch();
        }
        catch(\Exception $e){

            $message = $e->getMessage();
            $this->assertContains($message,$expectedException);
        }
    }



    public function queryControllerDataProvider()
    {
        return
            [
                [["controller" => "inexistent"],"\\Lenv\\App\\Controllers\\InexistentController"],
                [['controller' => 'homex'],"\\Lenv\\App\\Controllers\\HomexController"]
            ];
    }
    public function queryActionDataProvider()
    {
        return
            [
                [["action" => "test"],"TestAction"],
                [[],"IndexAction"]
            ];
    }
    public function queryExceptionActionDataProvider()
    {
        return
            [
                ['controller' => 'home',"action" => "test"],

            ];
    }



}
