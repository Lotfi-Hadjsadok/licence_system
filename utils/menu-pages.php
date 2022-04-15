<?php
class Menu_Pages
{
    public $page_title;
    public $menu_title;
    public $capability;
    public $menu_slug;
    public $callback;
    public $icon_url;
    public $position;
    function __construct($page_title, $menu_title, $capability, $menu_slug, $callback, $icon_url = null, $position = null)
    {
        $this->page_title = $page_title;
        $this->menu_title = $menu_title;
        $this->capability = $capability;
        $this->menu_slug = $menu_slug;
        $this->callback = $callback;
        $this->icon_url = $icon_url;
        $this->position = $position;
    }
    function create_menu_page()
    {
        add_menu_page($this->page_title, $this->menu_title, $this->capability, $this->menu_slug, $this->callback, $this->icon_url, $this->position);
        return $this;
    }
    function create_submenu_page($page_title, $menu_title, $capability, $menu_slug, $callback, $position = null)
    {
        add_submenu_page($this->menu_slug, $page_title, $menu_title, $capability, $menu_slug, $callback, $position);
        return $this;
    }
}
