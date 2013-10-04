<?php
namespace Shop\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * A music album.
 *
 * @ORM\Entity
 * @ORM\Table(name="album")
 * @property string $artist
 * @property string $title
 * @property int $id
 */
class Album
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer");
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $artist;

    /**
     * @ORM\Column(type="string")
     */
    protected $title;


    /**
     * Convert the object to an array.
     *
     * @return array
    */
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set artist
     *
     * @param string $artist
     * @return Album
     */
    public function setArtist($artist)
    {
        $this->artist = $artist;

        return $this;
    }

    /**
     * Get artist
     *
     * @return string
     */
    public function getArtist()
    {
        return $this->artist;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Album
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
}
