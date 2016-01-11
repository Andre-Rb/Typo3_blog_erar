<?php
namespace Dawin\BlogErar\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 André RABE <andre.k.rabe@gmail.com>, Dawin
 *  			Evelyne RAUD <evelyne.raud@gmail.com>, Dawin
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
 * Test case for class Dawin\BlogErar\Controller\AuthorController.
 *
 * @author André RABE <andre.k.rabe@gmail.com>
 * @author Evelyne RAUD <evelyne.raud@gmail.com>
 */
class AuthorControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \Dawin\BlogErar\Controller\AuthorController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('Dawin\\BlogErar\\Controller\\AuthorController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllAuthorsFromRepositoryAndAssignsThemToView()
	{

		$allAuthors = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$authorRepository = $this->getMock('', array('findAll'), array(), '', FALSE);
		$authorRepository->expects($this->once())->method('findAll')->will($this->returnValue($allAuthors));
		$this->inject($this->subject, 'authorRepository', $authorRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('authors', $allAuthors);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenAuthorToView()
	{
		$author = new \Dawin\BlogErar\Domain\Model\Author();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('author', $author);

		$this->subject->showAction($author);
	}
}
