<?php

namespace Lenv\Tests\App\Core;

use Lenv\App\Core\Dispatcher;

class DispatcherTest extends \PHPUnit_Framework_TestCase
{


    public function testIfGetControllerClassNameReturnsCorrectClassName()
    {
        // controller => myController MycontrollerController
        $fakeGet = ["controller" => "inexistent"];
        $expectedResult = "\\Lenv\\App\\Controllers\\Inexistent";
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
     * @expectedExceptionMessage There is no class \Lenv\App\Controllers\Inexistent
     */

    public function testThatDispatchThrowsExceptionforNonExistentController()
    {
        $fakeGet = ["controller" => "inexistent"];
        $dispatcher = new Dispatcher($fakeGet);
        $dispatcher->dispatch();
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage There is no method: \Lenv\App\Controllers\Home::InexistentAction
     */
    public function testThatDispatchThrowsExceptionForMissingMethod()
    {
        $fakeGet = ["controller"=>"home","action"=>"inexistent"];
        $dispatched = new Dispatcher($fakeGet);
        $dispatched->dispatch();
    }

    public function testThatDispatcherReturnsActionOutput()
    {
        $className = "\\Lenv\\App\\Controllers\\Home";
        $methodName = "IndexAction";

        $dispatcher = new Dispatcher();

        $dispatcher->setControllerClassName($className);
        $dispatcher->setMethodName($methodName);

        $dispatchMethod = $dispatcher->dispatch();
        $this->assertEquals($methodName,$dispatchMethod);
    }

}

