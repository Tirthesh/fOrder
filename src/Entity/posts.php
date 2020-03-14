<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

class Posts {
	private $id;
	private $title;
	private $url;
	private $comment_count;
	private $score;
	private $date;
	private $posted_by;
}