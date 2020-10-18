<?php
    require "../framework/autoloader.php";
    use PHPUnit\Framework\TestCase;

    class SessionManagerTest extends TestCase{

        public function testSessionIsValid(){
            $tmpSession = new SessionManager();
            $this->assertInstanceOf('SessionManager', $tmpSession);
        }

        public function testCreate(){
            SessionManager::create();
            $this->assertEquals(PHP_SESSION_ACTIVE, true);
        }

        public function testDestroy(){
            SessionManager::destroy();
            $this->assertEquals(PHP_SESSION_NONE, true);
        }

        public function testAdd(){
            SessionManager::create();
            SessionManager::add("name","John Doe");
            $this->assertEquals($_SESSION["name"], "John Doe");
        }

        public function testRemove(){
            SessionManager::remove("name");
            $this->assertEquals(isset($_SESSION["name"]), false);
        }

        public function testAccessible(){
            SessionManager::add("user","John Doe");
            $this->assertEquals(SessionManager::accessible("John Doe","login"), false);
            $this->assertEquals(SessionManager::accessible("John Doe","signup"), false);
            $this->assertEquals(SessionManager::accessible("John Doe","courses"), true);
            $this->assertEquals(SessionManager::accessible("John Doe","profile"), true);
            SessionManager::remove("user");
            $this->assertEquals(SessionManager::accessible(null,"login"), true);
            $this->assertEquals(SessionManager::accessible(null,"signup"), true);
            $this->assertEquals(SessionManager::accessible(null,"courses"), false);
            $this->assertEquals(SessionManager::accessible(null,"profile"), false);
        }
    }
?>