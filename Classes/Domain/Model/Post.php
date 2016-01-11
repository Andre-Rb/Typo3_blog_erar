<?php
namespace Dawin\BlogErar\Domain\Model;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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
 * Post
 */
class Post extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * title
     *
     * @var string
     */
    protected $title = '';
    
    /**
     * publicationDate
     *
     * @var \DateTime
     */
    protected $publicationDate = null;
    
    /**
     * summary
     *
     * @var string
     */
    protected $summary = '';
    
    /**
     * content
     *
     * @var string
     */
    protected $content = '';
    
    /**
     * image
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $image = null;
    
    /**
     * tags
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dawin\BlogErar\Domain\Model\Tag>
     */
    protected $tags = null;
    
    /**
     * authors
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dawin\BlogErar\Domain\Model\Author>
     */
    protected $authors = null;
    
    /**
     * categories
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dawin\BlogErar\Domain\Model\Category>
     */
    protected $categories = null;
    
    /**
     * comments
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dawin\BlogErar\Domain\Model\Comment>
     * @cascade remove
     */
    protected $comments = null;
    
    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }
    
    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->tags = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->authors = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->categories = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->comments = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }
    
    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
    
    /**
     * Returns the publicationDate
     *
     * @return \DateTime $publicationDate
     */
    public function getPublicationDate()
    {
        return $this->publicationDate;
    }
    
    /**
     * Sets the publicationDate
     *
     * @param \DateTime $publicationDate
     * @return void
     */
    public function setPublicationDate(\DateTime $publicationDate)
    {
        $this->publicationDate = $publicationDate;
    }
    
    /**
     * Returns the summary
     *
     * @return string $summary
     */
    public function getSummary()
    {
        return $this->summary;
    }
    
    /**
     * Sets the summary
     *
     * @param string $summary
     * @return void
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
    }
    
    /**
     * Returns the content
     *
     * @return string $content
     */
    public function getContent()
    {
        return $this->content;
    }
    
    /**
     * Sets the content
     *
     * @param string $content
     * @return void
     */
    public function setContent($content)
    {
        $this->content = $content;
    }
    
    /**
     * Returns the image
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     */
    public function getImage()
    {
        return $this->image;
    }
    
    /**
     * Sets the image
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     * @return void
     */
    public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image)
    {
        $this->image = $image;
    }
    
    /**
     * Adds a Tag
     *
     * @param \Dawin\BlogErar\Domain\Model\Tag $tag
     * @return void
     */
    public function addTag(\Dawin\BlogErar\Domain\Model\Tag $tag)
    {
        $this->tags->attach($tag);
    }
    
    /**
     * Removes a Tag
     *
     * @param \Dawin\BlogErar\Domain\Model\Tag $tagToRemove The Tag to be removed
     * @return void
     */
    public function removeTag(\Dawin\BlogErar\Domain\Model\Tag $tagToRemove)
    {
        $this->tags->detach($tagToRemove);
    }
    
    /**
     * Returns the tags
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dawin\BlogErar\Domain\Model\Tag> $tags
     */
    public function getTags()
    {
        return $this->tags;
    }
    
    /**
     * Sets the tags
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dawin\BlogErar\Domain\Model\Tag> $tags
     * @return void
     */
    public function setTags(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $tags)
    {
        $this->tags = $tags;
    }
    
    /**
     * Adds a Author
     *
     * @param \Dawin\BlogErar\Domain\Model\Author $author
     * @return void
     */
    public function addAuthor(\Dawin\BlogErar\Domain\Model\Author $author)
    {
        $this->authors->attach($author);
    }
    
    /**
     * Removes a Author
     *
     * @param \Dawin\BlogErar\Domain\Model\Author $authorToRemove The Author to be removed
     * @return void
     */
    public function removeAuthor(\Dawin\BlogErar\Domain\Model\Author $authorToRemove)
    {
        $this->authors->detach($authorToRemove);
    }
    
    /**
     * Returns the authors
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dawin\BlogErar\Domain\Model\Author> $authors
     */
    public function getAuthors()
    {
        return $this->authors;
    }
    
    /**
     * Sets the authors
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dawin\BlogErar\Domain\Model\Author> $authors
     * @return void
     */
    public function setAuthors(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $authors)
    {
        $this->authors = $authors;
    }
    
    /**
     * Adds a Category
     *
     * @param \Dawin\BlogErar\Domain\Model\Category $category
     * @return void
     */
    public function addCategory(\Dawin\BlogErar\Domain\Model\Category $category)
    {
        $this->categories->attach($category);
    }
    
    /**
     * Removes a Category
     *
     * @param \Dawin\BlogErar\Domain\Model\Category $categoryToRemove The Category to be removed
     * @return void
     */
    public function removeCategory(\Dawin\BlogErar\Domain\Model\Category $categoryToRemove)
    {
        $this->categories->detach($categoryToRemove);
    }
    
    /**
     * Returns the categories
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dawin\BlogErar\Domain\Model\Category> $categories
     */
    public function getCategories()
    {
        return $this->categories;
    }
    
    /**
     * Sets the categories
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dawin\BlogErar\Domain\Model\Category> $categories
     * @return void
     */
    public function setCategories(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $categories)
    {
        $this->categories = $categories;
    }
    
    /**
     * Adds a Comment
     *
     * @param \Dawin\BlogErar\Domain\Model\Comment $comment
     * @return void
     */
    public function addComment(\Dawin\BlogErar\Domain\Model\Comment $comment)
    {
        $this->comments->attach($comment);
    }
    
    /**
     * Removes a Comment
     *
     * @param \Dawin\BlogErar\Domain\Model\Comment $commentToRemove The Comment to be removed
     * @return void
     */
    public function removeComment(\Dawin\BlogErar\Domain\Model\Comment $commentToRemove)
    {
        $this->comments->detach($commentToRemove);
    }
    
    /**
     * Returns the comments
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dawin\BlogErar\Domain\Model\Comment> $comments
     */
    public function getComments()
    {
        return $this->comments;
    }
    
    /**
     * Sets the comments
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dawin\BlogErar\Domain\Model\Comment> $comments
     * @return void
     */
    public function setComments(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $comments)
    {
        $this->comments = $comments;
    }

}