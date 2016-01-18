<?php
namespace Home\Widget;
use Think\Controller;
class PageWidget extends Controller {

    public function headerTitle($name) {
        $this -> assign('name', $name);
        $this -> display('Widget:Page/headerTitle');
    }

    public function search($name) {
        $this -> assign('name', $name);
        $this -> display('Widget:PageHeader/search');
    }

    public function adv_search($name) {
        $this -> assign('name', $name);
        $this -> display('Widget:PageHeader/adv_search');
    }

    public function local_search($name) {
        $this -> assign('name', $name);
        $this -> display('Widget:PageHeader/local_search');
    }

    public function popup($name) {
        $this -> assign('name', $name);
        $this -> display('Widget:PageHeader/popup');
    }
}
?>