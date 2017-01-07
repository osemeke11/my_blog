<?php

class DB extends DBInteractor {

	// Get all Data
	public function getAllData($tableName)
    {
        $sql = "SELECT * from " . $tableName;

        return $this->executeQuery($sql);
    }

	// Get Last 5 Editorials Items in sidebar.php
	public function getDataList($tableName, $column)
	{
		$sql = "SELECT * FROM $tableName
		 		INNER JOIN category ON
		 		article_category = catID
		 		WHERE category = '$column'
		 		ORDER BY article_date DESC LIMIT 5";

		return $this->executeQuery($sql);
	}

	// Get The Editorial Total in sidebar.php
	public function getDataTotal($tableName, $column)
	{
		$sql = "SELECT FOUND_ROWS() as total FROM $tableName
		 		INNER JOIN category ON
		 		article_category = catID
		 		WHERE category = '$column'";

		return $this->executeQuery($sql)[0]['total'];
	}

	// Get Most View Articles List in sidebar.php
	public function getMostView()
	{
		$sql = "SELECT * FROM articles ORDER BY article_counter DESC LIMIT 5";

		return $this->executeQuery($sql);
	}

	// Get the total Articles in sidebar.php
	public function getMostViewTotal()
	{
		$sql = "SELECT FOUND_ROWS() as total FROM articles ORDER BY article_counter DESC LIMIT 5";

		return $this->executeQuery($sql)[0]['total'];
	}

	// Get The Recent Articles in Sidebar.php
	public function getRecent()
	 {
	 	$sql = "SELECT * FROM articles ORDER BY article_date DESC LIMIT 5";

	 	return $this->executeQuery($sql);
	 }

	 // Get The Total Recent Articles in sidebar.php
	 public function getRecentTotal()
	 {
	 	$sql = "SELECT FOUND_ROWS() as total FROM articles ORDER BY article_date DESC LIMIT 5";

	 	return $this->executeQuery($sql)[0]['total'];
	 }

	// Get Articles into Index.php
	public function getPaginatedArticles($start=1, $perPage=5)
	{
	
		$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM `articles`
		ORDER BY `article_date` DESC
		LIMIT {$start}, {$perPage};";

		return $this->executeQuery($sql);

	}

	// Get the total value of the Articles Index.php
	public function getTotalArticles()
	{
		$sql = "SELECT FOUND_ROWS() as total FROM articles";

		return $this->executeQuery($sql)[0]['total'];
	}


	// Get Categorize Article into Category.php
	public function getCategoryArticles($catId, $start=1, $perPage=5)
	{
		// Query
		$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM articles
				WHERE article_category = '$catId'
				ORDER BY `article_date` DESC
				LIMIT {$start}, {$perPage};";

		 return $this->executeQuery($sql);
	}

	// Get Total Category Articles into Category.php
	public function getTotalCategoryArticles($catId)
	{
		$sql = "SELECT COUNT(*) as total FROM articles
				WHERE article_category = '$catId'";
		return $this->executeQuery($sql)[0]['total'];
	}

	// Get Single Article Called in Article.php
	public function getArticleOne($title)
	{
		$sql = "SELECT * FROM articles WHERE article_url = '$title'";

		return $this->executeQuery($sql);
	}

	// Get Last three Article in Article.php

	public function getLastThreePosts()
	{
		$sql = "SELECT * FROM articles ORDER BY article_date DESC LIMIT 3";

		return $this->executeQuery($sql);
	}

	// Get Comments in Article.php
	public function getComments($title)
	{
		$sql = "SELECT * FROM comments WHERE  comment_url = '$title' ORDER BY comment_date DESC";

		return $this->executeQuery($sql);
	}
	// Get Total Comments article.php
	public function getTotalComments($title)
	{
		$sql = "SELECT COUNT(*) as total FROM comments WHERE  comment_url = '$title' ORDER BY comment_date DESC";

		return $this->executeQuery($sql)[0]['total'];
	}

	// Get Search Content in Search.php
	public function getSearchContent($search)
	{
		$sql = "SELECT * FROM articles 
				WHERE article_title LIKE '%$search%' 
				ORDER BY article_date DESC";

		return $this->executeQuery($sql);
	}

	// Get the total Search Content Found
	public function getTotalSearch($search)
	{
		$sql = "SELECT COUNT(*) as total FROM articles 
				WHERE article_title LIKE '%$search%' 
				ORDER BY article_date DESC";

		return $this->executeQuery($sql)[0]['total'];		
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

	// Edit or Update SQL INTO DATABASE
	 public function updateArticleCounter($condition, $title)
    {
   
        $sql = "UPDATE articles SET article_counter = '$condition' WHERE article_url = '$title'";

        return $this->executeAction($sql);
    }

    // Delete Data From Database
    public function deleteData($tableName, $key, $value)
    {
    	$sql = "DELETE FROM $tableName WHERE $key = $value";
    	return $this->executeAction($sql);
    }

}