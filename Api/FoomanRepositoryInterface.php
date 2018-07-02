<?php
namespace Jeff\AttributeExample\Api;

use Jeff\AttributeExample\Api\Data\FoomanInterface;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Api\SearchCriteriaInterface;

interface FoomanRepositoryInterface 
{
    public function save(FoomanInterface $page);

    public function getById($id);

    public function getList(SearchCriteriaInterface $criteria);

    public function delete(FoomanInterface $page);

    public function deleteById($id);
}
