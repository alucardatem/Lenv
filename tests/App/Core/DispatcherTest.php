<?php

namespace Lenv\Tests\App\Core;

use Lenv\App\Core\Dispatcher;

class DispatcherTest extends \PHPUnit_Framework_TestCase
{


    public function testIfGetControllerClassNameReturnsCorrectClassName()
    {

        $fakeGet = ["controller" => "inexistent"];
        $expectedResult = "\\Lenv\\App\\Controllers\\InexistentController";
        $dispatcher = new Dispatcher($fakeGet);
        $controllerClassName = $dispatcher->getControllerClassName();
        $this->assertEquals($expectedResult, $controllerClassName);
    }



    public function testIfGetActionReturnsCorrectActionName()
    {
        $fakeGet = ["action" => "test"];
        $expected = "TestAction";
        $dispatcher = new Dispatcher($fakeGet);
        $actionName = $dispatcher->getAction();
        $this->assertEquals($expected, $actionName);
    }


    /**
     * @expectedException \Exception
     * @expectedExceptionMessage There is no class \Lenv\App\Controllers\InexistentController
     */

    public function testThatDispatchThrowsExceptionforNonExistentController()
    {

            $fakeGet = ["controller" => "inexistent"];
            $dispatcher = new Dispatcher($fakeGet);
            $dispatcher->dispatch();

    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage There is no method: \Lenv\App\Controllers\HomeController::InexistentAction
     */
    public function testThatDispatchThrowsExceptionForMissingMethod()
    {

        $fakeGet = ["controller"=>"home","action"=>"inexistent"];
        $dispatched = new Dispatcher($fakeGet);
        $dispatched->dispatch();
    }

    public function testThatDispatcherReturnsTheCorrectMethodForTheHomeController()
    {
        $fakeGet = ["controller"=>"home","action"=>"index"];
        $dispatcher = new Dispatcher($fakeGet);
        $dispatchMethod = $dispatcher->dispatch();
        $this->assertEquals('IndexAction',$dispatchMethod);

    }


}
