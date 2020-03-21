<?php


namespace src\Modules\SysDB\Infrastructure\Service;


use src\Modules\Category\Infrastructure\Repository\CategoryRepository;
use src\Modules\SysDB\Infrastructure\Repository\DbTableNameRepository;

class SelectTablesAndCategoriesService
{
    /** @var DbTableNameRepository */
    private $dbTableNameRepository;

    /** @var CategoryRepository */
    private $categoryRepository;


    public function __construct(
        DbTableNameRepository $dbTableNameRepository,
        CategoryRepository $categoryRepository
    ) {
        $this->dbTableNameRepository = $dbTableNameRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function selectCategories(): array
    {
        try {
            $categories = $this->categoryRepository->selectAll();
        } catch (\Throwable $exception) {
            return null;
        }
        try {
            $tables = $this->dbTableNameRepository->findWithCategories();
        } catch (\Throwable $exception) {
            return null;
        }

        foreach ($categories as $category) {
            $category['tables'] = $this->selectTablesFromCategories($tables, $category['id']);

        }
        return $categories;
    }

    /**
     * @param array $tables
     * @param int $categoryId
     * @return array
     */
    private function selectTablesFromCategories(array $tables, int $categoryId): array
    {
        $result = [];
        foreach ($tables as $table) {
            if ($table->category_id === $categoryId) {
                $result[] = $table;
            }
        }
        return $result;
    }

    /**
     * @return array
     */
    public function selectTables(): array
    {
        try {
            return $this->dbTableNameRepository->findWithoutCategories();
        } catch (\Throwable $exception) {
            return null;
        }
    }
}
