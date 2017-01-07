<?php 

    // Url For Articles
    function createSlug($string, $chars= 150) {
        $string = substr($string, 0, $chars);

        $table = array(
                'Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
                'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
                'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
                'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
                'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
                'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
                'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r', '/' => '-', ' ' => '-', ':' => '-', '\'' => '', ',' => '', '.' => ''
        );

        // -- Remove duplicated spaces
        $stripped = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $string);

        // -- Returns the slug
        return strtolower(strtr($string, $table));
    }

    // Login Error
    function loginStatement($string){
        $string = str_replace("-", " ", $string);
        $string = ucwords($string);
        return $string;
    }

    // Time Format
    function time_format($date){
    /*
     * Format Date
     */
     
         return date("F d, Y h:i:sa", strtotime($date));
    
    }

    // User Birthday
    function birthday($date){
        return date("F d, Y", strtotime($date));
    }

    // Shorten Text
    function shorten($text, $chars= 150){
        $text = $text." ";
        $text = substr($text, 0, $chars);
        $text = substr($text, 0, strrpos($text, " "));
        $text = $text . "<b> . . .</b>";
        return $text;
    }

    // Sanitize data
    function test_input($data) {
       $data = trim($data);
       $data = stripslashes($data);
       return $data;
    }

    // Function to get Ip Address of our customers
    function getIp(){
        $ip = $_SERVER['REMOTE_ADDR'];
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        return $ip;
    }

    // Copyright Function
    function copyYear($startYear){
        $currentYear = date("Y");
        if($startYear == $currentYear){
            return $startYear;
        }else{
            return $startYear . " - " . $currentYear;
        }
    }

    //  Separate an array into list of items
    function convertToCommaSeparatedString($fieldNames)
    {
        return trim(implode(", ", $fieldNames));
    }

    // Create Thumbnail Function
    function createThumbnail($filename, $path_to_image_directory, $path_to_thumbs_directory)
    {
        $final_width_of_image = 100;
        $final_height_of_image = 100;

        // Check Whether the File is JPG
        if(preg_match('/[.]jpg$/', $filename)){
            $im = imagecreatefromjpeg($path_to_image_directory . $filename);
        }
        else if(preg_match('/[.]gif$/', $filename)){
            $im = imagecreatefromgif($path_to_image_directory . $filename);
        } else{
            $im = imagecreatefrompng($path_to_image_directory . $filename);
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
                imagejpeg($nm, $path_to_thumbs_directory . $filename);
            } else{
                die("There was a problem");
            }
        } else{
            imagejpeg($nm, $path_to_thumbs_directory . $filename);
        }
    }

    // Get Random Color 
    function randColor()
    {
        return '#' . dechex(rand(0x000000, 0xFFFFFF));
    }

    // Url Asset Function
    function asset($url,$string){
        return 'http://' . $_SERVER['HTTP_HOST'] .dirname($url)."/" . $string;
    }


// Get Browser
    function getBrowser() 
{ 
    $u_agent = $_SERVER['HTTP_USER_AGENT']; 
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";

    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    }
    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    }
    elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }

    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) 
    { 
        $bname = 'Internet Explorer'; 
        $ub = "MSIE"; 
    } 
    elseif(preg_match('/Trident/i',$u_agent)) 
    { // this condition is for IE11
        $bname = 'Internet Explorer'; 
        $ub = "rv"; 
    } 
    elseif(preg_match('/Firefox/i',$u_agent)) 
    { 
        $bname = 'Mozilla Firefox'; 
        $ub = "Firefox"; 
    } 
    elseif(preg_match('/Chrome/i',$u_agent)) 
    { 
        $bname = 'Google Chrome'; 
        $ub = "Chrome"; 
    } 
    elseif(preg_match('/Safari/i',$u_agent)) 
    { 
        $bname = 'Apple Safari'; 
        $ub = "Safari"; 
    } 
    elseif(preg_match('/Opera/i',$u_agent)) 
    { 
        $bname = 'Opera'; 
        $ub = "Opera"; 
    } 
    elseif(preg_match('/Netscape/i',$u_agent)) 
    { 
        $bname = 'Netscape'; 
        $ub = "Netscape"; 
    } 
    
    // finally get the correct version number
    // Added "|:"
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
     ')[/|: ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }

    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        }
        else {
            $version= $matches['version'][1];
        }
    }
    else {
        $version= $matches['version'][0];
    }

    // check if we have a number
    if ($version==null || $version=="") {$version="?";}

    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'    => $pattern
    );
} 

?>