<?php
/**
 * Created by PhpStorm.
 * User: vin
 * Date: 24/10/2016
 * Time: 01:19
 */

namespace AppBundle\Form\DataTransformer;


use AppBundle\Entity\Board;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

/**
 * Class BoardTransformer
 * @package AppBundle\Form\DataTransformer
 * @author Vincent DIJOUX <dijoux.vin@gmail.com>
 */
class BoardTransformer implements DataTransformerInterface
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @inheritDoc
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }


    /**
     * Transform board to id
     *
     * @param Board|null $board
     * @return string
     */
    public function transform($board)
    {
        if (null === $board) {
            return '';
        }

        return $board->getId();
    }

    /**
     * @param string $boardId
     * @return Board
     */
    public function reverseTransform($boardId)
    {
        $board = $this->em->getRepository('AppBundle:Board')
            ->find($boardId);

        if (null === $board) {
            throw new TransformationFailedException(sprintf(
                'The board %d not found',
                $boardId
            ));
        }

        return $board;
    }
}