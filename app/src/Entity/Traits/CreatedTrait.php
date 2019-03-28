<?php
namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Event\LifecycleEventArgs;

trait CreatedTrait
{
    /**
     * @ORM\Column(name="created", type="datetime", nullable=false, options={"default": "CURRENT_TIMESTAMP"})
     */
    private $created;

    public function getCreated(): ?\DateTime
    {
        return $this->created;
    }

    public function setCreated(\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }

    /**
     * @ORM\PrePersist
     */
    public function prePersistCreated(LifecycleEventArgs $event): void
    {
        $this->setCreated(new \DateTime());
    }
}
