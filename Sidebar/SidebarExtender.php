<?php namespace Modules\Gallery\Sidebar;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\User\Contracts\Authentication;

class SidebarExtender implements \Maatwebsite\Sidebar\SidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    /**
     * @param Menu $menu
     *
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item(trans('gallery::galleries.title.galleries'), function (Item $item) {
                $item->icon('fa fa-camera');
                $item->weight(5);
                $item->route('admin.gallery.gallery.index');
                $item->authorize(
                     $this->auth->hasAccess('gallery.galleries.index')
                );

            });
        });

        return $menu;
    }
}
