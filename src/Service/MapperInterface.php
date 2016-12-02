<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Azet\Service;

/**
 * Description of MapperInterface
 *
 * @author Henric Nylund <henric.nylund@mediaresearch.se>
 * @package Azet\Service
 * @copyright (c) year, Media Research i Östersund AB
 */
interface MapperInterface
{
    /**
     * @param array|\Traversable|\stdClass $data
     * @return Entity
     */
    public function create($data);

    /**
     * @param string $id
     * @return Entity
     */
    public function fetch($id);

    /**
     * @return Collection
     */
    public function fetchAll();

    /**
     * @param string $id
     * @param array|\Traversable|\stdClass $data
     * @return Entity
     */
    public function update($id, $data);

    /**
     * @param string $id
     * @return bool
     */
    public function delete($id);
}
