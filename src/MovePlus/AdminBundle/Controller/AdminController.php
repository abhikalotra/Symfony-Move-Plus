<?php

namespace MovePlus\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

	use MovePlus\AdminBundle\Entity\Services;            //Services
	use MovePlus\AdminBundle\Entity\Services2;            //Services
	use MovePlus\AdminBundle\Entity\User;                 //User
	use MovePlus\AdminBundle\Entity\AllService;            //AllService
	
	use Symfony\Component\HttpFoundation\Request;   
	use Symfony\Component\HttpFoundation\Response;


	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\FormBuilderInterface;	
	use Symfony\Component\HttpFoundation\Session\Session;
	use Symfony\Component\HttpFoundation\RedirectResponse;	
	
	use Symfony\Component\HttpFoundation\File\UploadedFile;
	

class AdminController extends Controller
{
   
   
   public function dynamicscriptAction(Request $request){
   
    $hostname = $this->getRequest()->getHost();
    $conn = $this->get('database_connection');
    $countyQuery = 'SELECT * from county ';
    $county = $conn->fetchAll($countyQuery);
    
    
    $pQuery = 'SELECT * from services ORDER BY COALESCE(parent_id, id), parent_id IS NOT NULL, id';
	$services = $conn->fetchAll($pQuery);
		//echo "<pre>"; print_r($services); die;
		
		$sample = 'SELECT * from sampleservices limit 0,1';
		$samplepage = $conn->fetchAll($sample);
		$samplepage11 = $samplepage[0];
		$defaultImage = $samplepage[0]['banner_img'];
		//echo "<pre>"; print_r($samplepage11); die;
		if($request->getMethod() == 'POST')
			{				
					$service_slug_id = $request->get("service_slug_id");
					$service_slug_Detail = 'SELECT * from services where id='.$service_slug_id;
					$serviceFetch = $conn->fetchAll($service_slug_Detail);
				 	$service_slug = $serviceFetch[0]['slug'];

				$county_slug_id = $request->get("county_slug");
					$county_slug_Detail = 'SELECT * from county where id='.$county_slug_id;
				$countyFetch = $conn->fetchAll($county_slug_Detail);
				$county_slug = $countyFetch[0]['slug'];
				$county_Name = $countyFetch[0]['county_name'];
				$County_main_id = $countyFetch[0]['id']; 
					
				 $Slugmatch = 'SELECT * from county_pages where `service_slug` =  "'.$service_slug.'" and `county_slug` = "'.$county_slug.'" '  ;
				
				$SlugmatchDetails = $conn->fetchAll($Slugmatch);
				$slugMatchCase = $SlugmatchDetails[0]['county_slug'] ;
				$serviceMatchCase = $SlugmatchDetails[0]['service_slug'] ;

				 if($county_slug == $slugMatchCase  && $service_slug == $serviceMatchCase  ){					
				echo "try different service"	; die;

				}else{	
				
					$catagory = $serviceFetch[0]['catagory'];	
					$service_name = $serviceFetch[0]['title'];	
					
						
					$title_string = $request->get("title");  
						$title_stringReplaceLocation = str_replace("'", "&#39;", $title_string);	
						$title = str_replace("{LOCATION}", $county_Name, $title_stringReplaceLocation);
					
					$meta_title_string = $request->get("meta_title");
						$meta_title_stringReplaceLocation = str_replace("'", "&#39;", $meta_title_string);	
						$meta_title = str_replace("{LOCATION}", $county_Name, $meta_title_stringReplaceLocation);
					
					$meta_keywords_string = $request->get("meta_keywords");
						$meta_keywords_stringReplaceLocation = str_replace("'", "&#39;", $meta_keywords_string);	
						$meta_keywords = str_replace("{LOCATION}", $county_Name, $meta_keywords_stringReplaceLocation);
						
					$meta_description_string = $request->get("meta_description");
						$meta_descriptionReplaceLocation = str_replace("'", "&#39;", $meta_description_string);	
						$meta_description = str_replace("{LOCATION}", $county_Name, $meta_descriptionReplaceLocation);
									
					$Sort_desc_string = $request->get("short_description");
						$short_descriptionReplaceLocation = str_replace("'", "&#39;", $Sort_desc_string);	
						$short_description = str_replace("{LOCATION}", $county_Name, $short_descriptionReplaceLocation);
					
					$description_string = $request->get("description");
						$descriptionReplaceLocation = str_replace("'", "&#39;", $description_string);
						$description = str_replace("{LOCATION}", $county_Name, $descriptionReplaceLocation);
					
					$banner_string = $request->get("banner_text");
						$banner_stringReplaceLocation = str_replace("'", "&#39;", $banner_string);
						$banner_text = str_replace("{LOCATION}", $county_Name, $banner_stringReplaceLocation);
						
					$banner_sub_text_string = $request->get("banner_sub_text");
						$banner_ReplaceLocation = str_replace("'", "&#39;", $banner_sub_text_string);
						$banner_sub_text = str_replace("{LOCATION}", $county_Name, $banner_ReplaceLocation);
						
					$template = $request->get("template");
					
					 
					$leftsidebarstring = $request->get("leftsidebar");
						$leftsidebar = str_replace("'", "&#39;", $leftsidebarstring);
					$rightsidebarstring = $request->get("rightsidebar");
						$rightsidebar = str_replace("'", "&#39;", $rightsidebarstring);
					$howitswork_widgetSet = $request->get("howitswork_widget"); 
					$relatedservices_widgetSet = $request->get("relatedservices_widget"); 
					$readytobook_widgetSet = $request->get("readytobook_widget"); 
					$blog_widgetSet = $request->get("blog_widget"); 
					$customertestimonial_widgetSet = $request->get("customertestimonial_widget"); 
					
					if($howitswork_widgetSet == '' ){   $howitswork_widget = "0";	}else{	$howitswork_widget = "1";	}
					if($relatedservices_widgetSet == '' ){   $relatedservices_widget = "0";	}else{	$relatedservices_widget = "1";	}
					if($readytobook_widgetSet == '' ){   $readytobook_widget = "0";	}else{	$readytobook_widget = "1";	}
					if($blog_widgetSet == '' ){   $blog_widget = "0";	}else{	$blog_widget = "1";	}
					if($customertestimonial_widgetSet == '' ){   $customertestimonial_widget = "0";	}else{	$customertestimonial_widget = "1";	}
											
					 $basePath = '/var/www/html'; 		
					
					if($_FILES['banner_img']['name'] !='')
					{						
					$banner_img = $_FILES['banner_img']['name'];  
					$ranFeaturedImage = $id ; 
					
						$targetFileLogo = $basePath."/".$this->container->getParameter('gbl_uploadPath_allBanner').$banner_img;
						move_uploaded_file($_FILES['banner_img']['tmp_name'], $targetFileLogo);		
					}
					else{
							$banner_img = $defaultImage;						
						}
						
					$inserQuery = "INSERT INTO `county_pages` (`meta_title`, `meta_keywords`, `meta_description`, `service_slug`, `county_slug`, `title`, `short_description`, `description`, `banner_img`,`county`, `banner_text`, `banner_sub_text`,  `service_name`, `catagory`, `template`, `leftsidebar`, `rightsidebar`, `howitswork_widget`, `relatedservices_widget`, `readytobook_widget`, `blog_widget`, `customertestimonial_widget`) VALUES ( '$meta_title', '$meta_keywords', '$meta_description', '$service_slug','$county_slug', '$title', '$short_description', '$description', '$banner_img','$county_Name',  '$banner_text', '$banner_sub_text','$service_name','$catagory', '$template', '$leftsidebar', '$rightsidebar', '$howitswork_widget', '$relatedservices_widget', '$readytobook_widget', '$blog_widget', '$customertestimonial_widget')";
					
					$conn = $this->get('database_connection');	
					$addCounty = $conn->prepare($inserQuery);
					$addCounty->execute();

					
					
					$city_slug_Detail = 'SELECT * from city where county_id='.$County_main_id;
					$cityFetch = $conn->fetchAll($city_slug_Detail);
					
					
					
					$TotalCity = count($cityFetch);
					if($TotalCity){
					
					foreach ($cityFetch as $value) {
											
						$cityNN = $value['city_name']; 	
						
						$city_slug_string = str_replace(" ", "-", $cityNN);	
						$city_slug = strtolower($city_slug_string);
						 
					  $SlugmatchCity = 'SELECT * from city_pages where `service_slug` =  "'.$service_slug.'" and `county_slug` = "'.$county_slug.'" and `city_slug` = "'.$city_slug.'" '  ;
					$matchCity = $conn->fetchAll($SlugmatchCity);
					$slugMatchCase = $matchCity[0]['county_slug'] ;
					$serviceMatchCase = $matchCity[0]['service_slug'] ;
					$cityMatchCase = $matchCity[0]['city_slug'] ;
				
					
						 if(  $city_slug == $cityMatchCase  && $service_slug == $serviceMatchCase && $county_slug == $slugMatchCase ){					
						echo "try different City Slug service"	; die;

						}else{	
							$city_slug_name = ucwords($cityNN); 
							
							$title_string = $request->get("title");  
								$title_stringReplaceLocation = str_replace("'", "&#39;", $title_string);	
								$title_city  = str_replace("{LOCATION}", $city_slug_name, $title_stringReplaceLocation);
							
							$meta_title_string = $request->get("meta_title");
								$meta_title_stringReplaceLocation = str_replace("'", "&#39;", $meta_title_string);	
								$meta_title_city  = str_replace("{LOCATION}", $city_slug_name, $meta_title_stringReplaceLocation);
							
							$meta_keywords_string = $request->get("meta_keywords");
								$meta_keywords_stringReplaceLocation = str_replace("'", "&#39;", $meta_keywords_string);	
								$meta_keywords_city = str_replace("{LOCATION}", $city_slug_name, $meta_keywords_stringReplaceLocation);
								
							$meta_description_string = $request->get("meta_description");
								$meta_descriptionReplaceLocation = str_replace("'", "&#39;", $meta_description_string);	
								$meta_description_city  = str_replace("{LOCATION}", $city_slug_name, $meta_descriptionReplaceLocation);
											
							$Sort_desc_string = $request->get("short_description");
								$short_descriptionReplaceLocation = str_replace("'", "&#39;", $Sort_desc_string);	
								$short_description_city  = str_replace("{LOCATION}", $city_slug_name, $short_descriptionReplaceLocation);
							
							$description_string = $request->get("description");
								$descriptionReplaceLocation = str_replace("'", "&#39;", $description_string);
								$description_city  = str_replace("{LOCATION}", $city_slug_name, $descriptionReplaceLocation);
							
							$banner_string = $request->get("banner_text");
								$banner_stringReplaceLocation = str_replace("'", "&#39;", $banner_string);
								$banner_text_city = str_replace("{LOCATION}", $city_slug_name, $banner_stringReplaceLocation);
								
							$banner_sub_text_string = $request->get("banner_sub_text");
								$banner_ReplaceLocation = str_replace("'", "&#39;", $banner_sub_text_string);
								$banner_sub_text_city  = str_replace("{LOCATION}", $city_slug_name, $banner_ReplaceLocation);
								
								
							$inserQuerys = "INSERT INTO `city_pages` (`meta_title`, `meta_keywords`, `meta_description`, `service_slug`, `county_slug`,`city_slug`, `title`, `short_description`, `description`, `banner_img`,`county`,`city`,`service_name`, `banner_text`, `banner_sub_text`,  `catagory`, `template`, `leftsidebar`, `rightsidebar`, `howitswork_widget`, `relatedservices_widget`, `readytobook_widget`, `blog_widget`, `customertestimonial_widget`) VALUES ( '$meta_title_city', '$meta_keywords_city', '$meta_description_city', '$service_slug','$county_slug','$city_slug', '$title_city', '$short_description_city', '$description_city', '$banner_img','$county_Name','$cityNN','$service_name', '$banner_text_city', '$banner_sub_text_city','$catagory', '$template', '$leftsidebar', '$rightsidebar', '$howitswork_widget', '$relatedservices_widget', '$readytobook_widget', '$blog_widget', '$customertestimonial_widget')";
							//$conn = $this->get('database_connection');	
							//$addCity = $conn->prepare($inserQuerys);
							//$addCity->execute();
							}
						}
					 } 
				}
										
			}
		
   return $this->render('MovePlusAdministratorBundle:Page:dynamicscript.html.twig',array('samplepage'=>$samplepage[0],'county'=>$county,'services'=>$services));
   
   }
  

	/*public function dynamicscriptAction(Request $request){
   
    $hostname = $this->getRequest()->getHost();
    $conn = $this->get('database_connection');
    $countyQuery = 'SELECT * from county ';
    $county = $conn->fetchAll($countyQuery);
    
    
    $pQuery = 'SELECT * from services ORDER BY COALESCE(parent_id, id), parent_id IS NOT NULL, id';
	$services = $conn->fetchAll($pQuery);
		//echo "<pre>"; print_r($services); die;
		
		$sample = 'SELECT * from sampleservices limit 0,1';
		$samplepage = $conn->fetchAll($sample);
		$samplepage11 = $samplepage[0];
		$defaultImage = $samplepage[0]['banner_img'];
		//echo "<pre>"; print_r($samplepage11); die;
		if($request->getMethod() == 'POST')
			{				
					$service_slug_id = $request->get("service_slug_id");
					$service_slug_Detail = 'SELECT * from services where id='.$service_slug_id;
					$serviceFetch = $conn->fetchAll($service_slug_Detail);
				 	$service_slug = $serviceFetch[0]['slug'];

				$county_slug_id = $request->get("county_slug");
					$county_slug_Detail = 'SELECT * from county where id='.$county_slug_id;
				$countyFetch = $conn->fetchAll($county_slug_Detail);
				$county_slug = $countyFetch[0]['slug'];
				$county_Name = $countyFetch[0]['county_name'];
				$County_main_id = $countyFetch[0]['id']; 
					
				 $Slugmatch = 'SELECT * from county_pages where `service_slug` =  "'.$service_slug.'" and `county_slug` = "'.$county_slug.'" '  ;
				
				$SlugmatchDetails = $conn->fetchAll($Slugmatch);
				$slugMatchCase = $SlugmatchDetails[0]['county_slug'] ;
				$serviceMatchCase = $SlugmatchDetails[0]['service_slug'] ;

				 if($county_slug == $slugMatchCase  && $service_slug == $serviceMatchCase  ){					
				echo "try different service"	; die;

				}else{	
				
					$catagory = $serviceFetch[0]['catagory'];	
					$service_name = $serviceFetch[0]['title'];	
					
						
					$title_string = $request->get("title");  
						$title_stringReplaceLocation = str_replace("'", "&#39;", $title_string);	
						$title = str_replace("{LOCATION}", $county_Name, $title_stringReplaceLocation);
					
					$meta_title_string = $request->get("meta_title");
						$meta_title_stringReplaceLocation = str_replace("'", "&#39;", $meta_title_string);	
						$meta_title = str_replace("{LOCATION}", $county_Name, $meta_title_stringReplaceLocation);
					
					$meta_keywords_string = $request->get("meta_keywords");
						$meta_keywords_stringReplaceLocation = str_replace("'", "&#39;", $meta_keywords_string);	
						$meta_keywords = str_replace("{LOCATION}", $county_Name, $meta_keywords_stringReplaceLocation);
						
					$meta_description_string = $request->get("meta_description");
						$meta_descriptionReplaceLocation = str_replace("'", "&#39;", $meta_description_string);	
						$meta_description = str_replace("{LOCATION}", $county_Name, $meta_descriptionReplaceLocation);
									
					$Sort_desc_string = $request->get("short_description");
						$short_descriptionReplaceLocation = str_replace("'", "&#39;", $Sort_desc_string);	
						$short_description = str_replace("{LOCATION}", $county_Name, $short_descriptionReplaceLocation);
					
					$description_string = $request->get("description");
						$descriptionReplaceLocation = str_replace("'", "&#39;", $description_string);
						$description = str_replace("{LOCATION}", $county_Name, $descriptionReplaceLocation);
					
					$banner_string = $request->get("banner_text");
						$banner_stringReplaceLocation = str_replace("'", "&#39;", $banner_string);
						$banner_text = str_replace("{LOCATION}", $county_Name, $banner_stringReplaceLocation);
						
					$banner_sub_text_string = $request->get("banner_sub_text");
						$banner_ReplaceLocation = str_replace("'", "&#39;", $banner_sub_text_string);
						$banner_sub_text = str_replace("{LOCATION}", $county_Name, $banner_ReplaceLocation);
						
					$template = $request->get("template");
					
					 
					$leftsidebarstring = $request->get("leftsidebar");
						$leftsidebar = str_replace("'", "&#39;", $leftsidebarstring);
					$rightsidebarstring = $request->get("rightsidebar");
						$rightsidebar = str_replace("'", "&#39;", $rightsidebarstring);
					$howitswork_widgetSet = $request->get("howitswork_widget"); 
					$relatedservices_widgetSet = $request->get("relatedservices_widget"); 
					$readytobook_widgetSet = $request->get("readytobook_widget"); 
					$blog_widgetSet = $request->get("blog_widget"); 
					$customertestimonial_widgetSet = $request->get("customertestimonial_widget"); 
					
					if($howitswork_widgetSet == '' ){   $howitswork_widget = "0";	}else{	$howitswork_widget = "1";	}
					if($relatedservices_widgetSet == '' ){   $relatedservices_widget = "0";	}else{	$relatedservices_widget = "1";	}
					if($readytobook_widgetSet == '' ){   $readytobook_widget = "0";	}else{	$readytobook_widget = "1";	}
					if($blog_widgetSet == '' ){   $blog_widget = "0";	}else{	$blog_widget = "1";	}
					if($customertestimonial_widgetSet == '' ){   $customertestimonial_widget = "0";	}else{	$customertestimonial_widget = "1";	}
											
					 $basePath = '/var/www/html'; 		
					
					if($_FILES['banner_img']['name'] !='')
					{						
					$banner_img = $_FILES['banner_img']['name'];  
					$ranFeaturedImage = $id ; 
					
						$targetFileLogo = $basePath."/".$this->container->getParameter('gbl_uploadPath_allBanner').$banner_img;
						move_uploaded_file($_FILES['banner_img']['tmp_name'], $targetFileLogo);		
					}
					else{
							$banner_img = $defaultImage;						
						}
						
					$inserQuery = "INSERT INTO `county_pages` (`meta_title`, `meta_keywords`, `meta_description`, `service_slug`, `county_slug`, `title`, `short_description`, `description`, `banner_img`,`county`, `banner_text`, `banner_sub_text`,  `service_name`, `catagory`, `template`, `leftsidebar`, `rightsidebar`, `howitswork_widget`, `relatedservices_widget`, `readytobook_widget`, `blog_widget`, `customertestimonial_widget`) VALUES ( '$meta_title', '$meta_keywords', '$meta_description', '$service_slug','$county_slug', '$title', '$short_description', '$description', '$banner_img','$county_Name',  '$banner_text', '$banner_sub_text','$service_name','$catagory', '$template', '$leftsidebar', '$rightsidebar', '$howitswork_widget', '$relatedservices_widget', '$readytobook_widget', '$blog_widget', '$customertestimonial_widget')";
					
					$conn = $this->get('database_connection');	
					$addCounty = $conn->prepare($inserQuery);
					$addCounty->execute();

					
					
					$city_slug_Detail = 'SELECT * from city where county_id='.$County_main_id;
					$cityFetch = $conn->fetchAll($city_slug_Detail);
					
					
					
					$TotalCity = count($cityFetch);
					if($TotalCity){
					
					foreach ($cityFetch as $value) {
											
						$cityNN = $value['city_name']; 	
						
						$city_slug_string = str_replace(" ", "-", $cityNN);	
						$city_slug = strtolower($city_slug_string);
						 
					  $SlugmatchCity = 'SELECT * from city_pages where `service_slug` =  "'.$service_slug.'" and `county_slug` = "'.$county_slug.'" and `city_slug` = "'.$city_slug.'" '  ;
					$matchCity = $conn->fetchAll($SlugmatchCity);
					$slugMatchCase = $matchCity[0]['county_slug'] ;
					$serviceMatchCase = $matchCity[0]['service_slug'] ;
					$cityMatchCase = $matchCity[0]['city_slug'] ;
				
					
						 if(  $city_slug == $cityMatchCase  && $service_slug == $serviceMatchCase && $county_slug == $slugMatchCase ){					
						echo "try different City Slug service"	; die;

						}else{	
							$city_slug_name = ucwords($cityNN); 
							
							$title_string = $request->get("title");  
								$title_stringReplaceLocation = str_replace("'", "&#39;", $title_string);	
								$title_city  = str_replace("{LOCATION}", $city_slug_name, $title_stringReplaceLocation);
							
							$meta_title_string = $request->get("meta_title");
								$meta_title_stringReplaceLocation = str_replace("'", "&#39;", $meta_title_string);	
								$meta_title_city  = str_replace("{LOCATION}", $city_slug_name, $meta_title_stringReplaceLocation);
							
							$meta_keywords_string = $request->get("meta_keywords");
								$meta_keywords_stringReplaceLocation = str_replace("'", "&#39;", $meta_keywords_string);	
								$meta_keywords_city = str_replace("{LOCATION}", $city_slug_name, $meta_keywords_stringReplaceLocation);
								
							$meta_description_string = $request->get("meta_description");
								$meta_descriptionReplaceLocation = str_replace("'", "&#39;", $meta_description_string);	
								$meta_description_city  = str_replace("{LOCATION}", $city_slug_name, $meta_descriptionReplaceLocation);
											
							$Sort_desc_string = $request->get("short_description");
								$short_descriptionReplaceLocation = str_replace("'", "&#39;", $Sort_desc_string);	
								$short_description_city  = str_replace("{LOCATION}", $city_slug_name, $short_descriptionReplaceLocation);
							
							$description_string = $request->get("description");
								$descriptionReplaceLocation = str_replace("'", "&#39;", $description_string);
								$description_city  = str_replace("{LOCATION}", $city_slug_name, $descriptionReplaceLocation);
							
							$banner_string = $request->get("banner_text");
								$banner_stringReplaceLocation = str_replace("'", "&#39;", $banner_string);
								$banner_text_city = str_replace("{LOCATION}", $city_slug_name, $banner_stringReplaceLocation);
								
							$banner_sub_text_string = $request->get("banner_sub_text");
								$banner_ReplaceLocation = str_replace("'", "&#39;", $banner_sub_text_string);
								$banner_sub_text_city  = str_replace("{LOCATION}", $city_slug_name, $banner_ReplaceLocation);
								
								
							$inserQuerys = "INSERT INTO `city_pages` (`meta_title`, `meta_keywords`, `meta_description`, `service_slug`, `county_slug`,`city_slug`, `title`, `short_description`, `description`, `banner_img`,`county`,`city`,`service_name`, `banner_text`, `banner_sub_text`,  `catagory`, `template`, `leftsidebar`, `rightsidebar`, `howitswork_widget`, `relatedservices_widget`, `readytobook_widget`, `blog_widget`, `customertestimonial_widget`) VALUES ( '$meta_title_city', '$meta_keywords_city', '$meta_description_city', '$service_slug','$county_slug','$city_slug', '$title_city', '$short_description_city', '$description_city', '$banner_img','$county_Name','$cityNN','$service_name', '$banner_text_city', '$banner_sub_text_city','$catagory', '$template', '$leftsidebar', '$rightsidebar', '$howitswork_widget', '$relatedservices_widget', '$readytobook_widget', '$blog_widget', '$customertestimonial_widget')";
							//$conn = $this->get('database_connection');	
							//$addCity = $conn->prepare($inserQuerys);
							//$addCity->execute();
							}
						}
					 } 
				}
										
			}
		
   return $this->render('MovePlusAdministratorBundle:Page:dynamicscript.html.twig',array('samplepage'=>$samplepage[0],'county'=>$county,'services'=>$services));
   
   }*/
   
   
   public function countypageAction(Request $request){
   
    $hostname = $this->getRequest()->getHost();
    $conn = $this->get('database_connection');
    $slimit =0;
    $elimit =50;
    
     $countyQuery = 'SELECT * from county_pages LIMIT '.$slimit.', '. $elimit;
    
    $countyPages = $conn->fetchAll($countyQuery);
    $patetitle = "County Pages";  
    return $this->render('MovePlusAdminBundle:Page:countypages.html.twig',array('countyPages'=>$countyPages,'patetitle'=>$patetitle));
   }
   
   
   public function citypageAction(Request $request){
   
    $hostname = $this->getRequest()->getHost();
    $conn = $this->get('database_connection');
    $slimit =0;
    $elimit =50;
    
     $countyQuery = 'SELECT * from city_pages LIMIT '.$slimit.', '. $elimit;
    
    $countyPages = $conn->fetchAll($countyQuery);
    $patetitle = "City Pages";  
    return $this->render('MovePlusAdminBundle:Page:citypages.html.twig',array('countyPages'=>$countyPages,'patetitle'=>$patetitle));
   }
   
   
   public function editccpageAction($id, Request $request){
   
    $hostname = $this->getRequest()->getHost();
    $conn = $this->get('database_connection');
    
    $countyQuery = 'SELECT * from county_pages where id= '.$id;
   
     
    
    $countyPages = $conn->fetchAll($countyQuery);
    $patetitle = "Edit ".$countyPages['0']['title'];  
    return $this->render('MovePlusAdminBundle:Page:editccpage.html.twig',array('services'=>$countyPages['0'],'patetitle'=>$patetitle));
   }
   
   
   public function editcitypageAction($id, Request $request){
   
    $hostname = $this->getRequest()->getHost();
    $conn = $this->get('database_connection');
    
    $countyQuery = 'SELECT * from city_pages where id= '.$id;
    
    
    $countyPages = $conn->fetchAll($countyQuery);
    $patetitle = "Edit ".$countyPages['0']['title'];  
    return $this->render('MovePlusAdminBundle:Page:editcitypage.html.twig',array('services'=>$countyPages['0'],'patetitle'=>$patetitle));
   }
   
   
   
   
   
   public function settingsAction( Request $request){
   
    $patetitle = "Global Settings"; 
   
    $hostname = $this->getRequest()->getHost();
    $conn = $this->get('database_connection');
    
    if($request->getMethod() == 'POST')
    {				
    
    $contact_number = $request->get("contact_number");
    $contact_email = $request->get("contact_email");
    $socialicon = $request->get("socialicon"); 
    $copywrite = $request->get("copywrite"); 	
     $analytic_code = $request->get("analytic_code"); 	
    
    if($_FILES['logo']['name'] !='')
				{						
				$logo = $_FILES['logo']['name'];  
				
				$targetFileLogo = "/var/www/html/uploads/logo/".$logo;
				$logopath = "/uploads/logo/".$logo;
				move_uploaded_file($_FILES['logo']['tmp_name'], $targetFileLogo);
				}else{
        $logopath = $request->get("old_logo");
        }
				
				
    $inserQuery = "UPDATE `moveon`.`settings`
SET `analytic_code`='$analytic_code',contact_number` = '$contact_number', `contact_email` = '$contact_email', `socialicon` = '$socialicon',`copywrite` = '$copywrite',`logo`= '$logopath'
WHERE id =1";
    $stmt = $conn->prepare($inserQuery);
    $stmt->execute();
    
    }
    
    
    $settingsQuery = "SELECT * from settings WHERE id =1";
    $settings = $conn->fetchAll($settingsQuery);
    
       
   return $this->render('MovePlusAdminBundle:Page:settings.html.twig',array('setting'=>$settings['0'],'patetitle'=>$patetitle));
   }
   
   public function editmenuAction($id, Request $request){
   
   
   }
   
    public function deletemenuAction($id, Request $request){
    $hostname = $this->getRequest()->getHost();
    $conn = $this->get('database_connection');
    
    $hmenuQuery = "SELECT * from sitemenu where id=".$id;
    $menus = $conn->fetchAll($hmenuQuery);
   // print_r($menus);
     $menu_type  =  $menus['0']['menu_type'];
    
    
    $delQuery = "DELETE from `moveon`.`sitemenu` where id = ".$id;
    $stmt = $conn->prepare($delQuery);
    $stmt->execute();
    if($menu_type == 'header'){
    return $this->redirect( $this->generateUrl('admin_h_menu') );
    }
    if($menu_type == 'footer'){
    return $this->redirect( $this->generateUrl('admin_f_menu') );
    }
    
   }
   public function hmenuAction(Request $request){
	   
		$hostname = $this->getRequest()->getHost();
		$conn = $this->get('database_connection');
		
		if($request->getMethod() == 'POST')
		{				
		
		$order_no = $request->get("order_no");
		$title = $request->get("title");
		$link_url = $request->get("link_url"); 
		$parent_id = $request->get("parent_id"); 	
		if($parent_id == 'None'){
		$parent_id = 'null';
		}
		$inserQuery = "INSERT INTO `moveon`.`sitemenu` (`id`,`parent_id`, `order_no`, `menu_type`, `title`, `link_url`) VALUES (NULL,'$parent_id', '$order_no', 'header', '$title', '$link_url')";
		$stmt = $conn->prepare($inserQuery);
		$stmt->execute();
		
		}
		$hmenuQuery = 'SELECT * from sitemenu where menu_type="header" ORDER BY COALESCE(parent_id, id), parent_id IS NOT NULL, id';
		$menus = $conn->fetchAll($hmenuQuery);
		
		$patetitle = "Manage Header Menu";  
		
		$pQuery = 'SELECT * from services ORDER BY COALESCE(parent_id, id), parent_id IS NOT NULL, id';
		$ppages = $conn->fetchAll($pQuery);  
		return $this->render('MovePlusAdminBundle:Page:hmenu.html.twig',array('ppages'=>$ppages,'menus'=>$menus,'patetitle'=>$patetitle));
	   
   }
   
    public function fmenuAction(Request $request){
	   
		$hostname = $this->getRequest()->getHost();
		$conn = $this->get('database_connection');
		
		if($request->getMethod() == 'POST')
		{				
		
		$order_no = $request->get("order_no");
		$title = $request->get("title");
		$link_url = $request->get("link_url"); 
		$parent_id = $request->get("parent_id"); 	
		if($parent_id == 'None'){
		$parent_id = 'null';
		}
		$inserQuery = "INSERT INTO `moveon`.`sitemenu` (`id`,`parent_id`, `order_no`, `menu_type`, `title`, `link_url`) VALUES (NULL,'$parent_id', '$order_no', 'footer', '$title', '$link_url')";
		$stmt = $conn->prepare($inserQuery);
		$stmt->execute();
		
		}
		$hmenuQuery = 'SELECT * from sitemenu where menu_type="footer" ORDER BY COALESCE(parent_id, id), parent_id IS NOT NULL, id';
		$menus = $conn->fetchAll($hmenuQuery);
		
		$patetitle = "Manage Footer Menu";  
		
		$pQuery = 'SELECT * from services ORDER BY COALESCE(parent_id, id), parent_id IS NOT NULL, id';
		$ppages = $conn->fetchAll($pQuery);  
		return $this->render('MovePlusAdminBundle:Page:fmenu.html.twig',array('ppages'=>$ppages,'menus'=>$menus,'patetitle'=>$patetitle));
   }
   	/**************************** Begin : Function to Login the admin ********************************/	  
    public function sitemapAction( Request $request)
    {		
        $hostname = $this->getRequest()->getHost();
        $conn = $this->get('database_connection');
        $perpage = 9999;
        $urls[] = array('loc' =>  'sitemap-misc.xml','changefreq'=>'weekly', 'priority' => '0.5');
        
        $countyQuery = 'SELECT * from county_pages';
        $countypages = $conn->fetchAll($countyQuery);
        $tccounty = count($countypages);
       // echo "<br />";
         $tccountysitemap = intval($tccounty/$perpage)+1;
        
        for ($i=0;$i < $tccountysitemap;$i++) 
        {
        $urls[] = array('loc' =>  'sitemap-county-'.$i.'.xml','changefreq'=>'weekly', 'priority' => '0.5');  
        }
        
        
        $pagesQuery = 'SELECT * from city_pages';
        $pages = $conn->fetchAll($pagesQuery);
        $tcpages = count($pages);
        $tcpagessitemap = intval($tcpages/$perpage)+1;
        
        for ($i=0;$i < $tcpagessitemap;$i++) 
        {
         
        $urls[] = array('loc' =>  'sitemap-city-'.$i.'.xml','changefreq'=>'weekly', 'priority' => '0.5');
        }
     
			 return $this->render('MovePlusAdminBundle:Page:sitemap.xml.twig', array('urls' => $urls,'hostname' =>'http://moveplus.co.uk/'));
    }
    
    
    public function sitemapinnerAction( $slug)
    {		
        
        $hostname = $this->getRequest()->getHost();
        $conn = $this->get('database_connection');
        $perpage = 9999;
      $slugarra = explode('-',$slug);
     
      if(isset($slugarra['1'])){
      $slug = $slugarra['0'];
      $slimit = $slugarra['1']*$perpage;
      $elimit = $perpage;
      }else{
      $slug = $slug;
      $slimit = 0*$perpage;
      $elimit = $perpage;
      }
      
      
      if($slug == 'misc'){
      
        $pQuery = 'SELECT * from services LIMIT '.$slimit.', '. $elimit;
        $ppages = $conn->fetchAll($pQuery);
        foreach ($ppages as $pages) 
        {
            if($pages['slug'] !='')
            {
             $urls[] = array('loc' =>  $this->get('router')->generate('content_services',array('slug' => $pages['slug'])),'changefreq'=>'weekly', 'priority' => '0.5');
            
            }
            
        }
        
      }
      
       if($slug == 'city'){
      
        $cityQuery = 'SELECT * from city_pages LIMIT '.$slimit.', '. $elimit;
        
        $citypages = $conn->fetchAll($cityQuery);
        foreach ($citypages as $city) 
        {
            if($city['city_slug'] !='')
            {
             $urls[] = array('loc' =>  $this->get('router')->generate('move_plus_city_pages',array('service_slug' => $city['service_slug'],'county_slug' => $city['county_slug'],'city_slug' => $city['city_slug'])),'changefreq'=>'weekly', 'priority' => '1');
            }
            
        }
        
      }
       if($slug == 'county'){
       $countyQuery = 'SELECT * from county_pages LIMIT '.$slimit.', '. $elimit;
        $totalcounty = $conn->fetchAll($countyQuery);
        foreach ($totalcounty as $county) 
        {
            if($county['county_slug'] !='')
            {
             $urls[] = array('loc' =>  $this->get('router')->generate('move_plus_service_county',array('county_slug' => $county['county_slug'], 'service_slug' => $county['service_slug'])),'changefreq'=>'weekly', 'priority' => '1');
            
            }
            
        }
        
        }
       
      
			 return $this->render('MovePlusAdminBundle:Page:sitemapinner.xml.twig', array('urls' => $urls,'hostname' =>'http://moveplus.co.uk'));
    }
    
     /**************************** Begin : Function to Login the admin ********************************/	  
    public function loginAction( Request $request)
    {		
			$session = $this->getRequest()->getSession();		
			
			$userSession = $this->getLoggedInUserDetailAction();   
				if($userSession)
					return $this->redirect($this->generateUrl('move_plus_admin_adminDashboard'));   // check end
					
						
			$em = $this->getDoctrine()->getEntityManager();
			$repository = $em->getRepository('MovePlusAdminBundle:User');
			
				if ($request->getMethod() == 'POST')
				{					
					$username = $request->get('username');    
					$password = md5($request->get('password'));						
					 
						
					$userDetails = $repository->findOneBy(array('username' => $username, 'password' => $password, 'status' =>'1'));
								
					if($userDetails !='')
					{										 
						 $session->set('userId', $userDetails->getId());    	
						 $setUserId = $session->get('userId', $userDetails->getId());   
							
						 $session->set('userEmail', $userDetails->getEmail());    	
						 $setUserEmail = $session->get('userEmail', $userDetails->getEmail());   
						 
						 $session->set('userFirstName', $userDetails->getfirstName());
						 $setUserFirstName = $session->get('userFirstName', $userDetails->getfirstName());   
						
						 //echo "<pre>"; print_r($setUserEmail); die;
							return $this->redirect($this->generateUrl('move_plus_admin_adminDashboard'));
					}
					else
					{	
						$this->get('session')->getFlashBag()->set('error', 'Invalid Email or Password');
						
					}
				}
			
        return $this->render('MovePlusAdminBundle:Page:login.html.twig');
    }
    /*------------------------------- End : Function to Login the admin ------------------------------*/
    
    	
	/**************************** Begin : Function to Logout the admin ********************************/	  
		public function logoutAction()
		{			
			 $session = $this->getRequest()->getSession();
					$session->clear('foo');
					$session->remove('foo');
					unset($session);
						return $this->redirect($this->generateUrl('move_plus_admin_adminLogin'));
			
			return $this->render('MovePlusAdminBundle:Page:admin_logout.html.twig');
		}
		/*------------------------------- End : Function to Logout the admin ------------------------------*/
		
	
		/**************************** Begin : Function to admin Dashboard ********************************/			
		public function dashboardAction(Request $request)
		{
			
			$userSession = $this->getLoggedInUserDetailAction();         //function name given below 
			$session = $this->getRequest()->getSession(); 	
			
			if($session->get('userId') && $session->get('userId') != '')					
				$userId = $session->get('userId');	
			else
				return $this->redirect( $this->generateUrl('move_plus_admin_adminLogin') );
			
			
			
			
			return $this->render('MovePlusAdminBundle:Page:dashboard.html.twig');
		}
		/*------------------------------- End : Function to admin Dashboard ------------------------------*/
		
		
		/**************************** Begin : Function to All Service ********************************/			
		public function allServicesAction(Request $request)
		{
			
			$userSession = $this->getLoggedInUserDetailAction();         //function name given below 
			$session = $this->getRequest()->getSession(); 	
			
			if($session->get('userId') && $session->get('userId') != '')					
				$userId = $session->get('userId');	
			else
				return $this->redirect( $this->generateUrl('move_plus_admin_adminLogin') );
						
			
			
			
			$hostname = $this->getRequest()->getHost();
      $conn = $this->get('database_connection');
        
        $pQuery = 'SELECT * from services ORDER BY COALESCE(parent_id, id), parent_id IS NOT NULL, id';
        $ppages = $conn->fetchAll($pQuery);
      $patetitle = "All Service page";
			return $this->render('MovePlusAdminBundle:Page:all_services.html.twig', array('allServices'=> $ppages,'patetitle' =>$patetitle));
		}
		/*------------------------------- End : Function to All Service ------------------------------*/

		
		/**************************** Begin : Function to admin Dashboard ********************************/			
		public function editAllServiceAction($id, Request $request)
		{
			
			$userSession = $this->getLoggedInUserDetailAction();         //function name given below 
			$session = $this->getRequest()->getSession(); 	
			
			if($session->get('userId') && $session->get('userId') != '')					
				$userId = $session->get('userId');	
			else
				return $this->redirect( $this->generateUrl('move_plus_admin_adminLogin') );
				
			$repository = $this->getDoctrine()->getRepository('MovePlusAdminBundle:Services');
			$allServicesDetail = $repository->findBy(array('id'=> $id));
			
			$defaultImage = $allServicesDetail[0]->featuredImage ;
			// echo "<pre>"; print_r($defaultImage); die;
			
			if($request->getMethod() == 'POST')
			{				
			
				$title = $request->get("title");  	
				$metaTitle = $request->get("metaTitle");
				$metaKeyword = $request->get("metaKeyword");
				$metaDescription = $request->get("metaDescription");	
				$slug = $request->get("slug");						
				$shortDescription = $request->get("shortDescription");
				$description = $request->get("description");
								
				//echo $basePath = $this->getBasePathAction(); die;	 		
				 $basePath = '/var/www/html'; 		
				
				if($_FILES['featuredImage']['name'] !='')
				{						
				$featuredImage = $_FILES['featuredImage']['name'];  
				$ranFeaturedImage = $id ; 
				
					$targetFileLogo = $basePath."/".$this->container->getParameter('gbl_uploadPath_serviceImage').$ranFeaturedImage.$featuredImage;
					move_uploaded_file($_FILES['featuredImage']['tmp_name'], $targetFileLogo);		
				}
				else{
						$featuredImage = $defaultImage;						
					}	
				$pageType = $request->get("pageType");
				
		
				$em = $this->getDoctrine()->getEntityManager();
				$confirmedSubscribe = $em->createQueryBuilder() 
				->select('Services')
				->update('MovePlusAdminBundle:Services',  'Services')
				->set('Services.title', ':title')
				->setParameter('title', $title)
				->set('Services.metaTitle', ':metaTitle')
				->setParameter('metaTitle', $metaTitle)
				->set('Services.metaKeyword', ':metaKeyword')
				->setParameter('metaKeyword', $metaKeyword)
				->set('Services.metaDescription', ':metaDescription')
				->setParameter('metaDescription', $metaDescription)				
				->set('Services.slug', ':slug')
				->setParameter('slug', $slug)
				->set('Services.shortDescription', ':shortDescription')
				->setParameter('shortDescription', $shortDescription)
				->set('Services.description', ':description')
				->setParameter('description', $description)
				->set('Services.featuredImage', ':featuredImage')
				->setParameter('featuredImage', $ranFeaturedImage.$featuredImage)
				->set('Services.pageType', ':pageType')
				->setParameter('pageType', $pageType)
			
				->where('Services	.id = :id')
				->setParameter('id', $id)
				->getQuery()
				->getResult();
								
				return $this->redirect($this->generateUrl('admin_all_pages'));
			}
				
			
			return $this->render('MovePlusAdminBundle:Page:edit_all_services.html.twig', array('allServicesDetail'=> $allServicesDetail));
		}
		/*------------------------------- End : Function to admin Dashboard ------------------------------*/
		
		public function deletepageAction($id, Request $request){
    
    $userSession = $this->getLoggedInUserDetailAction();         //function name given below 
    $session = $this->getRequest()->getSession(); 	
    
    if($session->get('userId') && $session->get('userId') != '')					
    $userId = $session->get('userId');	
    else
    return $this->redirect( $this->generateUrl('move_plus_admin_adminLogin') );
        
      $repository = $this->getDoctrine()->getRepository('MovePlusAdminBundle:Services');
			$page = $repository->find($id);
      
      $em = $this->getDoctrine()->getEntityManager();
						$em->remove($page);
						$em->flush();
			
        
    return $this->redirect($this->generateUrl('admin_all_pages'));
    }
		/**************************** Begin : Function to admin Dashboard ********************************/			
		public function createpageAction( Request $request)
		{
			
			$userSession = $this->getLoggedInUserDetailAction();         //function name given below 
			$session = $this->getRequest()->getSession(); 	
			
			if($session->get('userId') && $session->get('userId') != '')					
				$userId = $session->get('userId');	
			else
				return $this->redirect( $this->generateUrl('move_plus_admin_adminLogin') );
				
			
			$defaultImage = $allServicesDetail[0]->featuredImage ;
			// echo "<pre>"; print_r($defaultImage); die;
			
			if($request->getMethod() == 'POST')
			{				
				$title = $request->get("title");  	
				$metaTitle = $request->get("metaTitle");
				$metaKeyword = $request->get("metaKeyword");
				$metaDescription = $request->get("metaDescription");	
				$slug = $request->get("slug");						
				$shortDescription = $request->get("shortDescription");
				$description = $request->get("description");
								
				//echo $basePath = $this->getBasePathAction(); die;	 		
				 $basePath = '/var/www/html'; 		
				
				if($_FILES['featuredImage']['name'] !='')
				{						
				$featuredImage = $_FILES['featuredImage']['name'];  
				$ranFeaturedImage = $id ; 
				
					$targetFileLogo = $basePath."/".$this->container->getParameter('gbl_uploadPath_serviceImage').$ranFeaturedImage.$featuredImage;
					move_uploaded_file($_FILES['featuredImage']['tmp_name'], $targetFileLogo);		
				}
				else{
						$featuredImage = $defaultImage;						
				}	
				$pageType = 'static';
				 
		    
			  $newServices = new Services();
						
							
						
						
						
		    
		    $newServices->setTitle($title);
		    $newServices->setMetaTitle($metaTitle);
		    $newServices->setMetaKeyword($metaKeyword);
		    $newServices->setMetaDescription($metaDescription);
		    $newServices->setSlug($slug);
		    $newServices->setShortDescription($shortDescription);
		    $newServices->setDescription($description);
		    $newServices->setFeaturedImage($ranFeaturedImage.$featuredImage);
		    
		    $em = $this->getDoctrine()->getEntityManager();
						$em->persist($newServices);
						$em->flush();
						
						
				return $this->redirect($this->generateUrl('admin_all_pages'));
			}else{
      
      }
				
			
			return $this->render('MovePlusAdminBundle:Page:createpage.html.twig', array('allServicesDetail'=> $allServicesDetail));
		}
		
		
		
		
		
		
		
		
		/**************************** Begin : Function to get the details of logged-in user ********************************/
		public function getLoggedInUserDetailAction()
		{
			 $session = $this->getRequest()->getSession();                     //check :- for enter dashoboard into the -
																				// path without  login then it will not show
			if( $session->get('userId') && $session->get('userId') != '' )
				return true;
			else
				return false;
		}
		/*------------------------------- End : Function to get the details of logged-in user ------------------------------*/
		
		
		public function getBasePathAction()   		
		{
			$basePath = $_SERVER['DOCUMENT_ROOT'].$this->get('request')->getBaseUrl();
			return $basePath;
		}
		
		public function getBaseUrlAction()
		{
			$baseUrl = "http://".$_SERVER['HTTP_HOST'].$this->get('request')->getBaseUrl();
			return $baseUrl;
		}
}



