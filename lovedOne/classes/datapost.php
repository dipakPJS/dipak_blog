<?php

class DataPost extends DataConn
{
    /* method for registering users */

    public function registerUser($email, $password, $name, $address, $city, $gender, $zip)
    {
        $sql = 'INSERT INTO users (userEmail, userPassword, userName, userAddress,
        city, gender, zip) VALUES (:email, :passwords, :names, :addresss, :city, :gender, 
        :zip)';
        $stmt = $this->dataConnection()->prepare($sql);
        $stmt->execute([
            ':email' => $email,
            ':passwords' => $password,
            ':names' => $name,
            ':addresss' => $address,
            ':city' => $city,
            ':gender' => $gender,
            ':zip' => $zip,
        ]);

        header('location: http://localhost/lovedone/auth/login.php');
    }

    /* medthod for loging user */

    public function loginUser($email, $password)
    {
        $sql = 'SELECT * FROM users WHERE userEmail = :email';
        $stmt = $this->dataConnection()->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            if (password_verify($password, $result['userPassword'])) {
                $_SESSION['userId'] = $result['id'];
                $_SESSION['userName'] = $result['userName'];
                $_SESSION['userEmail'] = $result['userEmail'];
                $_SESSION['userAddress'] = $result['userAddress'];

                header('location: http://localhost/lovedone/index.php');
            } else {
                echo '
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div>
                    Incorrect email or password, please try again.
                </div>
            </div>';
            }
        } else {
            echo '
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>
                Incorrect email or password, please try again.
            </div>
        </div>';
        }
    }

/* ============== method for creating posts ============== */

public function createPost($title, $sub_title, $content, $category_id, $image, $user_id, $user_name)
{
    $sql = 'INSERT INTO posts (title, sub_title, content, category_id, img, user_id, user_name) VALUES
     (:title, :subtitle, :content, :category_id, :img, :user_id, :user_name)';
    $stmt = $this->dataConnection()->prepare($sql);
    $stmt->bindValue('title', $title);
    $stmt->bindValue('subtitle', $sub_title);
    $stmt->bindValue('content', $content);
    $stmt->bindValue('category_id', $category_id);
    $stmt->bindValue('img', $image);
    $stmt->bindValue('user_id', $user_id);
    $stmt->bindValue('user_name', $user_name);
    $stmt->execute();
}

/* =========== method for showing post =============== */

public function showPost()
{
    $sql = 'SELECT * FROM posts';
    $stmt = $this->dataConnection()->prepare($sql);
    $stmt->execute();

    while ($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
        return $result;
    }
}

/* ============ method for showing single post data ============== */

public function singlePost($id)
{
    $sql = 'SELECT * FROM posts WHERE id = :id';
    $stmt = $this->dataConnection()->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    while ($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
        return $result;
    }
}

/* ========== method for deleting the post ================== */

public function deletePost($id)
{
    $sql = 'DELETE FROM posts WHERE id = :id';
    $stmt = $this->dataConnection()->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
}

/* ========= method for deleting post image =============== */

public function deleteImage($id)
{
    $sql = 'SELECT * FROM posts WHERE id = :id';
    $stmt = $this->dataConnection()->prepare($sql);
    $stmt->bindValue('id', $id);
    $stmt->execute();

    while ($result = $stmt->fetchAll()) {
        return $result;
    }
}

/* ============ method for editing posts =========== */

public function editPost($id)
{
    $sql = 'SELECT * FROM posts WHERE id = :id';
    $stmt = $this->dataConnection()->prepare($sql);
    $stmt->bindValue('id', $id);
    $stmt->execute();

    while ($result = $stmt->fetchAll()) {
        return $result;
    }
}

/* ================== method for updating posts ================== */

public function updatePost($id, $title, $subtitle, $content, $img)
{
    $sql = 'UPDATE posts SET title = :title, sub_title = :subtitle, content = :content, img = :img WHERE id = :id';
    $stmt = $this->dataConnection()->prepare($sql);
    $stmt->bindValue('id', $id);
    $stmt->bindValue('title', $title);
    $stmt->bindValue('subtitle', $subtitle);
    $stmt->bindValue('content', $content);
    $stmt->bindValue('img', $img);
    $stmt->execute();

    header('location: http://localhost/lovedone/post/blog.php');
}

/* method for showing image */

public function showImage($id)
{
    $sql = 'SELECT img from posts WHERE id = :id';
    $stmt = $this->dataConnection()->prepare($sql);
    $stmt->bindValue('id', $id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}
}
