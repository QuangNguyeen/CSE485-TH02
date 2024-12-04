<?php
class News{
    private $id;
    private $title;
    private $content;
    private $image;
    private $createdAt;
    private $categoryId;
    // constructor
    public function __construct($title, $content, $image, $createAt, $categoryId){
        $this->title = $title;
        $this->content = $content;
        $this->image = $image;
        $this->createdAt = $createAt;
        $this->categoryId = $categoryId;
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
    public function getCreatedAt(){
        return $this->createdAt;
    }
    public function getCategoryId(){
        return $this->categoryId;
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
    public function setCreatedAt($createdAt){
        $this->createdAt = $createdAt;
    }
    public function setCategoryId($categoryId){
        $this->categoryId = $categoryId;
    }

    // Get all News in Database
    public function getAll()
    {
        $database = new Database();
        $connection = $database::getConnection();
        if($connection === null){
            throw new Exception('Failed to connect to the database.');
        }
        try{
            $sql = "SELECT * FROM NEWS";
            $statement = $connection->prepare($sql);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            throw new PDOException('Error ing query.', $e->getMessage());
        }
    }

    // Get New by ID
    // @param: $id of News
    public function getByID($id){
        $database = new Database();
        $connection = $database::getConnection();
        if($connection === null){
            throw new Exception('Failed to connect to the database.');
        }
        try{
            $sql = "SELECT * FROM NEWS WHERE id = :id";
            $statement = $connection->prepare($sql);
            $statement ->bindParam(':id', $id, PDO::PARAM_INT);
            $statement->execute();
            return $statement->fetch(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            throw new PDOException('Error ing query.', $e->getMessage());
        }
    }

    // Add News
    public function add()
    {
        $database = new Database();
        $connection = $database::getConnection();
        if($connection === null){
            throw new Exception('Failed to connect to the database.');
        }
        try{
            $sql = "INSERT INTO NEWS (title, content, image, createdAt, categoryId) 
                VALUES (:title, :content, :image, :createdAt, :categoryId)";
            $statement = $connection->prepare($sql);
            $statement->bindParam(':title', $this->title, PDO::PARAM_STR);
            $statement->bindParam(':content', $this->content, PDO::PARAM_STR);
            $statement->bindParam(':image', $this->image, PDO::PARAM_STR);
            $statement->bindParam(':createdAt', $this->createAt, PDO::PARAM_STR);
            $statement->bindParam(':categoryId', $this->categoryId, PDO::PARAM_INT);

            if($this->image === '') $statement->bindValue(':image', null, PDO::PARAM_NULL);
            if($this->createdAt === '') $statement->bindValue(':createdAt', null, PDO::PARAM_NULL);
            if($this->categoryId === null) $statement->bindValue(':categoryId', null, PDO::PARAM_NULL);

            $statement->execute();

            $this->id = $connection->lastInsertId();
        }catch (PDOException $e){
            throw new Exception('Error adding news: ' . $e->getMessage());
        }
    }

    // Edit News
    // @param: $id, $title, $content, $createdAt, $categoryId, $image

    public function edit($id, $title, $content, $createdAt, $categoryId, $image = null)
    {
        $database = new Database();
        $connection = $database::getConnection();
        if($connection === null){
            throw new Exception('Failed to connect to the database.');
        }
        try{
            $sql = "UPDATE NEWS 
                    SET title = :title, content = :content, image = :image, createdAt = :createdAt, categoryId = :categoryId
                    WHERE id = :id";
            $statement = $connection->prepare($sql);
            $statement->bindParam(':title', $title, PDO::PARAM_STR);
            $statement->bindParam(':content', $content, PDO::PARAM_STR);
            $statement->bindParam(':createdAt', $createdAt, PDO::PARAM_STR);
            $statement->bindParam(':image', $image, PDO::PARAM_STR);
            $statement->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $statement->execute();
            return $statement->fetch(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            throw new PDOException('Error in query.', $e->getMessage());
        }
    }
    // Delete news
    // @param: $id
    public function delete($id) {
        $database = new Database();
        $conn = $database->getConnection();

        if ($conn === null) {
            throw new Exception("Failed to connect in the database.");
        }

        try {
            $sql = "DELETE FROM news WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Error in delete: " . $e->getMessage());
        }
    }
}
