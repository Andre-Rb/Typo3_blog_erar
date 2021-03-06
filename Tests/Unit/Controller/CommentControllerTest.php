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
 * Test case for class Dawin\BlogErar\Controller\CommentController.
 *
 * @author André RABE <andre.k.rabe@gmail.com>
 * @author Evelyne RAUD <evelyne.raud@gmail.com>
 */
class CommentControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \Dawin\BlogErar\Controller\CommentController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('Dawin\\BlogErar\\Controller\\CommentController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllCommentsFromRepositoryAndAssignsThemToView()
	{

		$allComments = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$commentRepository = $this->getMock('', array('findAll'), array(), '', FALSE);
		$commentRepository->expects($this->once())->method('findAll')->will($this->returnValue($allComments));
		$this->inject($this->subject, 'commentRepository', $commentRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('comments', $allComments);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenCommentToView()
	{
		$comment = new \Dawin\BlogErar\Domain\Model\Comment();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('comment', $comment);

		$this->subject->showAction($comment);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenCommentToCommentRepository()
	{
		$comment = new \Dawin\BlogErar\Domain\Model\Comment();

		$commentRepository = $this->getMock('', array('add'), array(), '', FALSE);
		$commentRepository->expects($this->once())->method('add')->with($comment);
		$this->inject($this->subject, 'commentRepository', $commentRepository);

		$this->subject->createAction($comment);
	}
}
