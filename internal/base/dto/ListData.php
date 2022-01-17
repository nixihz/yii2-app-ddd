<?php

namespace internal\base\dto;

class ListData implements DataInterface
{
    public array $tableHeader;

    public array $items;

    public Pagination $pagination;

}

class Pagination
{
    public int $pageIndex;

    public int $totalPages;

    public int $itemsPerPage;

    public int $totalItems;

    public int $currentItemCount;
}
