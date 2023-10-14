<?php

declare(strict_types=1);

namespace Solutions\S47;

use SolutionInterfaces\SolutionInterface;

class Solution implements SolutionInterface
{
    private array $result = [];
    private array $uniqueValuesArr = [];

    public function run(): void
    {
        $this->permuteUnique();
    }

    /**
     * @return array
     */
    function permuteUnique(): array
    {
        $nums = [1, 1, 2];
        $this->getCollection($nums);
        return $this->result;
    }

    private function getCollection(array $arr): void
    {
        if (empty($arr) || count($arr) < 2) {
            return;
        }

        $this->result[] = $arr;
        foreach ($arr as $k => $item) {
            if (!array_key_exists($item, $this->uniqueValuesArr)) {
                for ($i = $k; $i < count($arr); $i++) {
                    if ($item !== $arr[$i]) {
                        $tmp = $arr;
                        $tmp[$i] = $item;
                        $tmp[$k] = $arr[$i];
                        $this->result[] = $tmp;
                    }
                }
                $this->uniqueValuesArr[$item] = null;
            }
        }
    }

}