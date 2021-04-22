<?php

namespace flexycms\BreadcrumbsBundle\Utils;

class Breadcrumbs
{
    private $breadcrumbs;

    public function __construct()
    {
        $this->breadcrumbs = array();
    }

    /**
     * @param string $path строка адреса
     * @param string $name название страницы
     * @return $this
     */
    public function append(string $route, string $name): self
    {
        $this->breadcrumbs[] = ['path' => $route, 'label' => $name];
        return $this;
    }

    /**
     * @param string $path
     * @param string $name
     * @return $this
     */
    public function prepend(string $path, string $name): self
    {
        array_unshift($this->breadcrumbs, ['path' => $path, 'label' => $name]);
        return $this;
    }

    /**
     * @return array
     */
    public function get(): array
    {
        return $this->breadcrumbs;
    }
}