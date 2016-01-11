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
 * Test case for class \Dawin\BlogErar\Domain\Model\Post.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author André RABE <andre.k.rabe@gmail.com>
 * @author Evelyne RAUD <evelyne.raud@gmail.com>
 */
class PostTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \Dawin\BlogErar\Domain\Model\Post
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \Dawin\BlogErar\Domain\Model\Post();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getTitleReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getTitle()
		);
	}

	/**
	 * @test
	 */
	public function setTitleForStringSetsTitle()
	{
		$this->subject->setTitle('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'title',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPublicationDateReturnsInitialValueForDateTime()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getPublicationDate()
		);
	}

	/**
	 * @test
	 */
	public function setPublicationDateForDateTimeSetsPublicationDate()
	{
		$dateTimeFixture = new \DateTime();
		$this->subject->setPublicationDate($dateTimeFixture);

		$this->assertAttributeEquals(
			$dateTimeFixture,
			'publicationDate',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getSummaryReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getSummary()
		);
	}

	/**
	 * @test
	 */
	public function setSummaryForStringSetsSummary()
	{
		$this->subject->setSummary('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'summary',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getContentReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getContent()
		);
	}

	/**
	 * @test
	 */
	public function setContentForStringSetsContent()
	{
		$this->subject->setContent('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'content',
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

	/**
	 * @test
	 */
	public function getAuthorsReturnsInitialValueForAuthor()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getAuthors()
		);
	}

	/**
	 * @test
	 */
	public function setAuthorsForObjectStorageContainingAuthorSetsAuthors()
	{
		$author = new \Dawin\BlogErar\Domain\Model\Author();
		$objectStorageHoldingExactlyOneAuthors = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneAuthors->attach($author);
		$this->subject->setAuthors($objectStorageHoldingExactlyOneAuthors);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneAuthors,
			'authors',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addAuthorToObjectStorageHoldingAuthors()
	{
		$author = new \Dawin\BlogErar\Domain\Model\Author();
		$authorsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$authorsObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($author));
		$this->inject($this->subject, 'authors', $authorsObjectStorageMock);

		$this->subject->addAuthor($author);
	}

	/**
	 * @test
	 */
	public function removeAuthorFromObjectStorageHoldingAuthors()
	{
		$author = new \Dawin\BlogErar\Domain\Model\Author();
		$authorsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$authorsObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($author));
		$this->inject($this->subject, 'authors', $authorsObjectStorageMock);

		$this->subject->removeAuthor($author);

	}

	/**
	 * @test
	 */
	public function getCategoriesReturnsInitialValueForCategory()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getCategories()
		);
	}

	/**
	 * @test
	 */
	public function setCategoriesForObjectStorageContainingCategorySetsCategories()
	{
		$category = new \Dawin\BlogErar\Domain\Model\Category();
		$objectStorageHoldingExactlyOneCategories = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneCategories->attach($category);
		$this->subject->setCategories($objectStorageHoldingExactlyOneCategories);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneCategories,
			'categories',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addCategoryToObjectStorageHoldingCategories()
	{
		$category = new \Dawin\BlogErar\Domain\Model\Category();
		$categoriesObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$categoriesObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($category));
		$this->inject($this->subject, 'categories', $categoriesObjectStorageMock);

		$this->subject->addCategory($category);
	}

	/**
	 * @test
	 */
	public function removeCategoryFromObjectStorageHoldingCategories()
	{
		$category = new \Dawin\BlogErar\Domain\Model\Category();
		$categoriesObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$categoriesObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($category));
		$this->inject($this->subject, 'categories', $categoriesObjectStorageMock);

		$this->subject->removeCategory($category);

	}

	/**
	 * @test
	 */
	public function getCommentsReturnsInitialValueForComment()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getComments()
		);
	}

	/**
	 * @test
	 */
	public function setCommentsForObjectStorageContainingCommentSetsComments()
	{
		$comment = new \Dawin\BlogErar\Domain\Model\Comment();
		$objectStorageHoldingExactlyOneComments = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneComments->attach($comment);
		$this->subject->setComments($objectStorageHoldingExactlyOneComments);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneComments,
			'comments',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addCommentToObjectStorageHoldingComments()
	{
		$comment = new \Dawin\BlogErar\Domain\Model\Comment();
		$commentsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$commentsObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($comment));
		$this->inject($this->subject, 'comments', $commentsObjectStorageMock);

		$this->subject->addComment($comment);
	}

	/**
	 * @test
	 */
	public function removeCommentFromObjectStorageHoldingComments()
	{
		$comment = new \Dawin\BlogErar\Domain\Model\Comment();
		$commentsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$commentsObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($comment));
		$this->inject($this->subject, 'comments', $commentsObjectStorageMock);

		$this->subject->removeComment($comment);

	}
}
