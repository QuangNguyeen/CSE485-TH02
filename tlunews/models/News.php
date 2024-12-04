<?php
class News{
    private $id;
    private $title;
    private $content;
    private $image;
    private $create_at;
    private $category_id;
    // constructor
    public function __construct($id, $title, $content, $image, $create_at, $category_id){
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->image = $image;
        $this->create_at = $create_at;
        $this->category_id = $category_id;
    }
    // getter and setter
    public function getId(){
        return $this->id;
    }
    public function getTitle(){
        return $this->title;
    }
    public function getContent(){
        return $this->content;
    }
    public function getImage(){
        return $this->image;
    }
    public function getCreate_at(){
        return $this->create_at;
    }
    public function getCategoryId(){
        return $this->category_id;
    }
    public function setTitle($title){
        $this->title = $title;
    }
    public function setContent($content){
        $this->content = $content;
    }
    public function setImage($image){
        $this->image = $image;
    }
    public function setCreate_at($create_at){
        $this->create_at = $create_at;
    }
    public function setCategoryId($category_id){
        $this->category_id = $category_id;
    }
}
