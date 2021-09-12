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
    public function append(string $path, string $name): self
    {
        $this->breadcrumbs[] = $this->formCrumb($path, $name);
        return $this;
    }

    /**
     * @param string $path
     * @param string $name
     * @return $this
     */
    public function prepend(string $path, string $name): self
    {
        array_unshift($this->breadcrumbs, $this->formCrumb($path, $name));
        return $this;
    }
	
	
	private function formCrumb(string $path, string $name): array
	{
		return [
			'path' => $path, 
			'label' => $name, 
			'uid' => md5($path . $name)
			];
	}
	

    /**
     * @return array
     */
    public function get(): array
    {
        return $this->breadcrumbs;
    }
}