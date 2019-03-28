<?php
namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Event\LifecycleEventArgs;

trait RemovedAtTrait
{
    /**
     * @ORM\Column(name="removed_at", type="datetime", nullable=true)
     */
    private $removedAt;

    public function getRemovedAt(): ?\DateTimeInterface
    {
        return $this->removedAt;
    }

    public function setRemovedAt(?\DateTimeInterface $removedAt): void
    {
        $this->removedAt = $removedAt;
    }
}
