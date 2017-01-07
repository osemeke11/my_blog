<?php 

class DB extends DBInteractor {

	// Get all Data
	public function getAllData($tableName)
    {
        $sql = "SELECT * from " . $tableName;

        return $this->executeQuery($sql);
    }

    // Get 10 Most Viewed Articles in Admin/Index.php
	public function getMostView()
	{
		$sql = "SELECT * FROM articles 
				INNER JOIN category ON 
				article_category = catID
				ORDER BY article_counter DESC LIMIT 10";
		return $this->executeQuery($sql);
	}

	// Get Total 10 Most Viewed Articles in Admin/Index.php
	public function getTotalMostView()
	{
		$sql = "SELECT FOUND_ROWS() FROM articles ORDER BY article_counter DESC LIMIT 10";
		return $this->executeQuery($sql);
	}
	
	// Get Last 10 Articles in Admin/Index.php
	public function getLatestArticles()
	{
		$sql = "SELECT * FROM articles 
				INNER JOIN category ON 
				article_category = catID 
				ORDER BY article_date DESC LIMIT 10";
		return $this->executeQuery($sql);
	}

	// Get the Total Last 10 Articles in Admin/Index.php
	public function getTotalLastestArticles()
	{
		$sql = "SELECT FOUND_ROWS() as total FROM articles 
				INNER JOIN category ON 
				article_category = catID 
				ORDER BY article_date DESC LIMIT 10";
		return $this->executeQuery($sql)[0]['total'];
	}

	// Get the Total Article in the Uploaded in Admin/Index.php
	public function getTotalArticles()
	{
		$sql = "SELECT FOUND_ROWS() as total FROM articles";
		return $this->executeQuery($sql)[0]['total'];
	}

	// Get the Last 10 comments in Admin/Index.php
	public function getLastestComments()
	{
			$sql = "SELECT *, COUNT(comment_url) as total_comment FROM comments 
					INNER JOIN articles ON 
					comment_url = article_url
					GROUP BY comment_url 
					ORDER BY total_comment DESC LIMIT 10";
			return $this->executeQuery($sql);
	}

	// Get the Total Last 10 Comments in Admin/Index.php
	public function getTotalLastestComments()
	{
			$sql = "SELECT FOUND_ROWS() as total FROM comments ORDER BY comment_date DESC LIMIT 10";
			return $this->executeQuery($sql)[0]['total'];
	}

	// Get the Total Comments in Admin /Index.php
	public function getTotalComments()
	{
			$sql = "SELECT COUNT(*) as total FROM comments";
			return $this->executeQuery($sql)[0]['total'];
	}

	// Check Maybe Title has been used in insert_article.php
	public function checkTitleCount($art_title)
	{					
		$sql = "SELECT COUNT(*) as total FROM articles WHERE article_title = '$art_title'";
		return $this->executeQuery($sql)[0]['total'];
	}

	// Get List of Categories for Form That Categories are needed
	public function getCategoryForForm()
	{
		$sql = "SELECT * FROM category";
		return $this->executeQuery($sql);
	}

	// Get The Articles From The Articles Table in View_articles.php
	public function getAllArticles($start, $perPage)
	{
		$sql ="SELECT SQL_CALC_FOUND_ROWS * FROM articles 
				INNER JOIN category ON 
				article_category = catID
				ORDER BY article_date DESC
				LIMIT {$start}, {$perPage};";
		return $this->executeQuery($sql);
	}

	// Get The Article from Article Table
	public function getArticles($artID)
	{
		$sql = "SELECT * FROM articles INNER JOIN category ON article_category = catID WHERE articleID = '$artID'";
		return $this->executeQuery($sql);
	}

	// Get Single Category For Category Table  
	public function getSingleCategory($artID)
	{
		$sql = "SELECT * FROM category WHERE catID = '$artID'";
		return $this->executeQuery($sql);
	}

	// Get Admin List For View_admin.php
	public function getAdminMember()
	{
		$sql = "SELECT * FROM admin";
		return $this->executeQuery($sql);
	}

	// Get Total Admin For View_admin.php
	public function getTotalAdmin()
	{
		$sql = "SELECT COUNT(*) as total FROM admin";
		return $this->executeQuery($sql)[0]['total'];
	}

	// Check Maybe Admin Email has been used 
	public function checkAdminEmail($admin_email)
	{
		$sql = "SELECT COUNT(admin_email) as total FROM admin WHERE admin_email = '$admin_email'";
		return $this->executeQuery($sql)[0]['total'];
	}

	// Check Availability of Password in Change_password.php
	public function checkPassword($email, $cur_pass)
	{
		$sql = "SELECT COUNT(*) as total FROM admin WHERE admin_email = '$email' AND admin_pass = '$cur_pass'";
		return $this->executeQuery($sql)[0]['total'];
	}

	// Admin Login 
	public function checkAdminLogin($username, $password)
	{
		$sql = "SELECT * FROM admin WHERE admin_email = '$username' AND admin_pass = '$password'";
		return $this->executeQuery($sql);
	}

	// Count Admin Login 
	public function checkAdminLoginTotal($username, $password)
	{
		$sql = "SELECT COUNT(*) as total FROM admin WHERE admin_email = '$username' AND admin_pass = '$password'";
		return $this->executeQuery($sql)[0]['total'];
	}

	// Get admin Details
	public function getAdminDetails($email)
	{
		$sql = "SELECT * FROM admin WHERE admin_email = '$email'";
		return $this->executeQuery($sql);
	}

	/*****************************UPDATE INSERT AND DELETE *********************/
	// Insert Data Into Database
	public function addData($tableName, $data)
	{
		$fieldNames = array_keys($data);

        $fields = convertToCommaSeparatedString($fieldNames);

        $boundNames = array_map(function($name){
            return ":" . $name;
        }, $fieldNames);

        $fieldsValue = convertToCommaSeparatedString($boundNames);

        $sql = "INSERT INTO $tableName ($fields) value ($fieldsValue)";

        return $this->executeAction($sql, $data);
	}


    // Delete Data From Database
    public function deleteData($tableName, $key, $value)
    {
    	$sql = "DELETE FROM $tableName WHERE $key = $value";
    	return $this->executeAction($sql);
    }

    // Edit or Update Category Items INTO DATABASE
	public function updateCatData($id, $cat_name, $cat_url)
    {

        $sql = "UPDATE category SET category = '$cat_name', category_url = '$cat_url'  WHERE  catID = '$id'";

        return $this->executeAction($sql);
    }

    public function updateArticlesData($id, $art_title, $art_category, $art_body, $art_music, $art_video, $art_source, $art_url )
    {
    	$sql = "UPDATE articles SET article_title = '$art_title', article_category = '$art_category',
				article_body = '$art_body', article_music = '$art_music', article_video = '$art_video',
				article_source = '$art_source', article_url = '$art_url' WHERE articleID = '$id'";

		return $this->executeAction($sql);
    }

    public function updateAdminDate($admin_name, $admin_email, $email)
    {
    	$sql = "UPDATE admin SET admin_name = '$admin_name', admin_email = '$admin_email' WHERE admin_email = '$email'";

		return $this->executeAction($sql);

    }

     public function change_admin_pass($new_pass, $real_pass, $email)
    {
    	$sql = "UPDATE admin SET admin_pass = '$new_pass', real_pass = '$real_pass' WHERE admin_email = '$email'";

		return $this->executeAction($sql);

    }

    public function changeArticleImage($id, $art_image)
    {
    	$sql = "UPDATE articles SET article_image = '$art_image' WHERE articleID = '$id'";

		return $this->executeAction($sql);
    }
}

?>