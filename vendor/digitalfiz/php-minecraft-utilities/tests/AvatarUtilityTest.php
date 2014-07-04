<?php

/**
 * Tests for \digitalfiz\phpMinecraftUtilities\AvatarUtility
 *
 * @covers digitalfiz\phpMinecraftUtilities
 *
 */
class ConfigurationTest extends \PHPUnit_Framework_TestCase {
    protected function setUp() {
        // Nothing Yet
    }

    /**
     * @covers digitalfiz\phpMinecraftUtilities\AvatarUtility::getAvatarFace
     */
    public function testGetAvatarFaceReturnsTrue() {
        $avatar = 'digitalfiz';
        $this->assertTrue(digitalfiz\phpMinecraftUtilities\AvatarUtility::getAvatarFace($avatar, 128, $avatar.".png"));
    }

    /**
     * @covers digitalfiz\phpMinecraftUtilities\AvatarUtility::getFullAvatar
     */
    public function testGetFullAvatarReturnsTrue() {
        $avatar = 'digitalfiz';
        $this->assertTrue(digitalfiz\phpMinecraftUtilities\AvatarUtility::getFullAvatar($avatar, 128, $avatar."_full.png"));
    }

    /**
     * @covers digitalfiz\phpMinecraftUtilities\AvatarUtility::getAvatarFace
     *
     * @expectedException Exception
     */
    public function testGetAvatarFaceReturnsExceptionOnFail() {
        $avatar = 'digitalfiz';
        digitalfiz\phpMinecraftUtilities\AvatarUtility::getAvatarFace($avatar, 128, "/path/should/not/exist/".$avatar.".png");
    }

    /**
     * @covers digitalfiz\phpMinecraftUtilities\AvatarUtility::getFullAvatar
     *
     * @expectedException Exception
     */
    public function testGetFullAvatarReturnsExceptionOnFail() {
        $avatar = 'digitalfiz';
        digitalfiz\phpMinecraftUtilities\AvatarUtility::getFullAvatar($avatar, 128, "/path/should/not/exist/".$avatar.".png");
    }


}
