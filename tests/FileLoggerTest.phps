<?php

    /**
     * Created by PhpStorm.
     * User: danr
     * Date: 10/15/15
     * Time: 3:29 PM
     */
    namespace Lenv;

    use Lenv\app\Core\Logger\FileLogger;
    use Lenv\App\Core\Logger\LogLevel;


    class FileLoggerTest extends \PHPUnit_Framework_TestCase
    {

        /**
         * @dataProvider logProvider
         */
        public function testLoggerWithAllLogLevels($logMessage, $logLevel)
        {
            $this->markTestIncomplete("DO NOT TEST THIS YET");

            $filePath = "./logs/infoTestLogger.log";
            $fileLogger = new FileLogger($filePath);

            $fileLogger->log($logMessage,$logLevel);
            $readFile = file_get_contents($filePath);

            $this->assertContains($logMessage,$readFile);
            $this->assertContains($logLevel,$readFile);


        }

        public function logProvider()
        {

            return [
                'NORMAL TEST'=> ["TEST INFO LOG",''],
                'INFO TEST'=> ["TEST INFO LOG",Log::INFO],
                'EXCEPTION TEST' => ["TEST EXCEPTION LOG",LogLevel::EXCEPTION],
                'WARNING TEST'=> ["TEST WARNING LOG",LogLevel::WARNING],
                'ERROR TEST'=> ["TEST ERROR LOG",LogLevel::ERROR],
                'DEBUG TEST'=> ["TEST DEBUG LOG",LogLevel::DEBUG],
                'NOTICE TEST'=> ["TEST NOTICE LOG",LogLevel::NOTICE]
            ];
        }

    }