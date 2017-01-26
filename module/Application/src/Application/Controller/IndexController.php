<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\View\Model\ViewModel;
use Zend\Paginator\Paginator;
use Doctrine\ORM\Tools\Pagination\Paginator as docPaginator;
use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as Adapter;

class IndexController extends AbstractController
{
    const NUMBER_OF_BLOG_ITEMS_PER_PAGE = 2;

    public function indexAction()
    {
        $this->layout('layout/layout');
        $em = $this->getEntityManager();

        $products = $em->createQueryBuilder()
            ->select('bc')
            ->from('Application\Entity\Products', 'bc');

        $docPaginator = new docPaginator($products);
        $docAdapter = new Adapter($docPaginator);
        $count = $docAdapter->count();
        $paginator = new Paginator($docAdapter);

        $page = 1;

        if ($this->params()->fromRoute('page')) {
            $page = $this->params()->fromRoute('page');
        }
        $paginator->setCurrentPageNumber((int) $page)
            ->setItemCountPerPage(self::NUMBER_OF_BLOG_ITEMS_PER_PAGE);

        $next = ($count / self::NUMBER_OF_BLOG_ITEMS_PER_PAGE - $page) > 0 ? ($page+1) : false;
        $prev = ($page > 1) ? ($page-1) : false;
        $pages = ceil($count / self::NUMBER_OF_BLOG_ITEMS_PER_PAGE);

        return new ViewModel(array(
            'products' => $paginator,
            'current_page' => $page,
            'pages' => $pages,
            'next' => $next,
            'prev' => $prev));
    }


}
