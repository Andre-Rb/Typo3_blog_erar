<?php

namespace Dawin\BlogErar\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 André RABE <andre.k.rabe@gmail.com>, Dawin
 *           Evelyne RAUD <evelyne.raud@gmail.com>, Dawin
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Test case for class \Dawin\BlogErar\Domain\Model\Author.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author André RABE <andre.k.rabe@gmail.com>
 * @author Evelyne RAUD <evelyne.raud@gmail.com>
 */
class AuthorTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \Dawin\BlogErar\Domain\Model\Author
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \Dawin\BlogErar\Domain\Model\Author();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getFirstNaleReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getFirstNale()
		);
	}

	/**
	 * @test
	 */
	public function setFirstNaleForStringSetsFirstNale()
	{
		$this->subject->setFirstNale('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'firstNale',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getLastNameReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getLastName()
		);
	}

	/**
	 * @test
	 */
	public function setLastNameForStringSetsLastName()
	{
		$this->subject->setLastName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'lastName',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getUserNameReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getUserName()
		);
	}

	/**
	 * @test
	 */
	public function setUserNameForStringSetsUserName()
	{
		$this->subject->setUserName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'userName',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPresentationReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getPresentation()
		);
	}

	/**
	 * @test
	 */
	public function setPresentationForStringSetsPresentation()
	{
		$this->subject->setPresentation('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'presentation',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getImageReturnsInitialValueForFileReference()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getImage()
		);
	}

	/**
	 * @test
	 */
	public function setImageForFileReferenceSetsImage()
	{
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setImage($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'image',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTagsReturnsInitialValueForTag()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getTags()
		);
	}

	/**
	 * @test
	 */
	public function setTagsForObjectStorageContainingTagSetsTags()
	{
		$tag = new \Dawin\BlogErar\Domain\Model\Tag();
		$objectStorageHoldingExactlyOneTags = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneTags->attach($tag);
		$this->subject->setTags($objectStorageHoldingExactlyOneTags);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneTags,
			'tags',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addTagToObjectStorageHoldingTags()
	{
		$tag = new \Dawin\BlogErar\Domain\Model\Tag();
		$tagsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$tagsObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($tag));
		$this->inject($this->subject, 'tags', $tagsObjectStorageMock);

		$this->subject->addTag($tag);
	}

	/**
	 * @test
	 */
	public function removeTagFromObjectStorageHoldingTags()
	{
		$tag = new \Dawin\BlogErar\Domain\Model\Tag();
		$tagsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$tagsObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($tag));
		$this->inject($this->subject, 'tags', $tagsObjectStorageMock);

		$this->subject->removeTag($tag);

	}
}
