<?php
	/*
	 *	PHP Image Uploader Class 
	 */

	class Uploader {
		
		public $image;
		
		// Upload Method
		public function upload($images){
			
			// check if images exist
			
			if(count($images) <= 0) { return false; }
			
			$photos = [];
			
			for($i = 0; $i < count($images["name"]); $i++)
			{
				$image = $this->createMainImage($images, $i);

				$imageThumbnail = $this->createImageThumbnail($images, $i);				
				
			}
			
			return $photos;
		}
		
		private function createMainImage($images, $i)
		{
			$image = $images['name'][$i];
			$image_tmp = $images['tmp_name'][$i];
				
			move_uploaded_file($image_tmp, "images/$image");
				
			return $image;	
												
		}
		
		private function createImageThumbnail($images, $i)
		{	
			$image = $images['name'][$i];
			$image_tmp = $images['tmp_name'][$i];
			$final_width_of_image = 100;
			$final_height_of_image = 100;
		
			$path_to_image_directory = "images/";
			$path_to_thumbs_directory = "images/thumbnails/";

			// Check Whether the File is JPG
			if(preg_match('/[.]jpg$/', $image)){
				$im = imagecreatefromjpeg($path_to_image_directory . $image);
			}
			else if(preg_match('/[.]gif$/', $image)){
				$im = imagecreatefromgif($path_to_image_directory . $image);
			} else{
				$im = imagecreatefrompng($path_to_image_directory . $image);
			}

			// Get the Height and Width of the original Image
			$ox = imagesx($im);
			$oy = imagesy($im);
			// Your desire width and Height for thumbnail
			$nx = $final_width_of_image;
			$ny = $final_height_of_image; //floor($oy * ($final_width_of_image / $ox));

			$nm = imagecreatetruecolor($nx, $ny);
			imagecopyresized($nm, $im, 0, 0, 0, 0, $nx, $ny, $ox, $oy);

			// Check if the folder to save the thumbnail doesn't exist
			if(!file_exists($path_to_thumbs_directory)){
				if(mkdir($path_to_thumbs_directory)){
					imagejpeg($nm, $path_to_thumbs_directory . $image);
					return $image;
				} else{
					die("There was a problem");
				}
			} else{
				imagejpeg($nm, $path_to_thumbs_directory . $image);
				return $image;
			}
													
		}
	}