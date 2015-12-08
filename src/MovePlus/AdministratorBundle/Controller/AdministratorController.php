<?php

namespace MovePlus\AdministratorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


	use MovePlus\ServiceBundle\Entity\User;                 //User
	use MovePlus\ServiceBundle\Entity\Services;                    //Services
	
	
	use Symfony\Component\HttpFoundation\Request;   
	use Symfony\Component\HttpFoundation\Response;

	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\FormBuilderInterface;	
	use Symfony\Component\HttpFoundation\Session\Session;
	use Symfony\Component\HttpFoundation\RedirectResponse;	
	
	use Symfony\Component\HttpFoundation\File\UploadedFile;

	
	
class AdministratorController extends Controller
{

	/* ************************* Login Start Administrator ************************ */
    public function loginAction(Request $request)
    {
		$session = $this->getRequest()->getSession();	
			$userSession = $this->getLoggedInUserDetailAction();   
				if($userSession)
					return $this->redirect($this->generateUrl('move_plus_administrator_dashboard'));   // check end
					
			$em = $this->getDoctrine()->getEntityManager();
			$repository = $em->getRepository('MovePlusAdministratorBundle:User');
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
							return $this->redirect($this->generateUrl('move_plus_administrator_dashboard'));
					}
					else
					{	
						$this->get('session')->getFlashBag()->set('error', 'Invalid Email or Password');
					}
				}
			
        return $this->render('MovePlusAdministratorBundle:Page:login.html.twig');
    }
	/* ---------------------------Login End  -------------------------------- */
	
	
	/**************************** Begin : Function to Logout the Administrator ********************************/	  
		public function logoutAction(Request $request)
		{			
			 $session = $this->getRequest()->getSession();
					$session->clear('foo');
					$session->remove('foo');
					unset($session);
						return $this->redirect($this->generateUrl('move_plus_administrator_login'));
			
			return $this->render('MovePlusAdministratorBundle:Page:logout.html.twig');
		}
		/*------------------------------- End : Function to Logout the Administrator ------------------------------*/
		
		
		
	/**************************** Begin : Function to Media listing the Administrator ********************************/	  
		public function mediaAction(Request $request)
		{			
			$userSession = $this->getLoggedInUserDetailAction();         //function name given below 
			$session = $this->getRequest()->getSession(); 				
			if($session->get('userId') && $session->get('userId') != '')					
				$userId = $session->get('userId');	
			else
				return $this->redirect( $this->generateUrl('move_plus_administrator_login') );
		
    
    if ($request->getMethod() == 'POST'){
    if($_FILES['media']['name'] !='')
					{						
						$filename = $_FILES['media']['name'];  
						$targetFileLogo = "/var/www/html/theme/frontend/images/".$filename;
						$latesUploded = "/theme/frontend/images/".$filename;
						move_uploaded_file($_FILES['media']['tmp_name'], $targetFileLogo);
					}
          
    }      	
    $files = glob("/var/www/html/theme/frontend/images/*.*");
    $imageArray=array();
    for ($i=1; $i<count($files); $i++)
    {
    $image = $files[$i];
    $supported_file = array(
    'gif',
    'jpg',
    'jpeg',
    'png'
    );
    
    $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
    if (in_array($ext, $supported_file)) {
    //echo filemtime($image)."<br />";
    $imagepath = str_replace('/var/www/html/','../../',$image);
    $imageArray[$imagepath] = filemtime($image);
    
    
   // $imageArray
    //print $image ."<br />";
    //echo '<img src="'.$image .'" alt="Random image" />'."<br /><br />";
    } else {
    continue;
    }
    
    }
    arsort($imageArray);
    $imageArray = array_keys($imageArray);
    

			return $this->render('MovePlusAdministratorBundle:Page:media.html.twig',array('imageArray'=>$imageArray));
		}
		/*------------------------------- End : Function to Media listing the Administrator ------------------------------*/
	
	/* ************************* Dashboard Start ************************ */
    public function dashboardAction(Request $request)
    {
			$userSession = $this->getLoggedInUserDetailAction();         //function name given below 
			$session = $this->getRequest()->getSession(); 				
			if($session->get('userId') && $session->get('userId') != '')					
				$userId = $session->get('userId');	
			else
				return $this->redirect( $this->generateUrl('move_plus_administrator_login') );
			
		$conn = $this->get('database_connection');
		$query = 'SELECT * from services ';
		$staticPages = $conn->fetchAll($query);
		$staticPage = count($staticPages); 
		
		$queryCounty = 'SELECT * from county_pages ';
		$countyPages = $conn->fetchAll($queryCounty);
		$countyPage = count($countyPages); 
		
		$queryCity = 'SELECT * from city_pages ';
		$cityPages = $conn->fetchAll($queryCity);
		$cityPage = count($cityPages); 
		
		$queryTestimonial = 'SELECT * from testimonial ';
		$testimonialPages = $conn->fetchAll($queryTestimonial);
		$testimonial = count($testimonialPages); 
			
        return $this->render('MovePlusAdministratorBundle:Page:dashboard.html.twig',array('staticPage'=>$staticPage,'countyPage'=>$countyPage,'cityPage'=>$cityPage,'testimonial'=>$testimonial,));
    }
	/* ---------------------------Dashboard End  -------------------------------- */
			
	
	/* ************************* Profile / Change Password  Start ************************ */
    public function myProfileAction(Request $request)
    {
			$userSession = $this->getLoggedInUserDetailAction();         //function name given below 
			$session = $this->getRequest()->getSession(); 				
			if($session->get('userId') && $session->get('userId') != '')					
				$userId = $session->get('userId');	
			else
				return $this->redirect( $this->generateUrl('move_plus_administrator_login') );
			
		$conn = $this->get('database_connection');
		$query = 'SELECT * from user ';
		$userDetail = $conn->fetchAll($query);
		
		$currentPassword = $userDetail[0]['password'];
		
		
			   if ($request->getMethod() == 'POST') 
					 {					
						 $oldPassword = $request->get("oldPassword");  	
						 $newPassword = $request->get("newPassword");
						 $repeatPassword = $request->get("repeatPassword"); 
						
							if( ($currentPassword == md5($oldPassword)) && ($newPassword == $repeatPassword) && ($newPassword != '') && ($repeatPassword != '') )
								{
							
							
									$newPass =	md5($newPassword);
									$inserQuery = "UPDATE `user` SET `password`='$newPass'  WHERE id ='$userId'";
									$conn = $this->get('database_connection');
									$stmt = $conn->prepare($inserQuery);
									$stmt->execute();		
							
									$this->get('session')->getFlashBag()->set('success', 'Your Password has been changed Successfully');
									
								}	  
								elseif( ($currentPassword != md5($oldPassword) ) && ($newPass == '') && ($repeatPassword == '') )
								{
								$this->get('session')->getFlashBag()->set('error', 'Please Enter Your Correct Old Password');				
								}
								elseif( ($currentPassword == md5($oldPassword)) && ($newPass != $repeatPassword) )
								{
								$this->get('session')->getFlashBag()->set('newpasswordmessage', 'New Password Does not Match');	
								} 
								else
								{
								
								$this->get('session')->getFlashBag()->set('error', 'Invalid Password Details');		
								}								
					} 
			
        return $this->render('MovePlusAdministratorBundle:Page:profile_page.html.twig',array('userDetail'=>$userDetail,));
    }
	/* --------------------------- Profile / Change Password End   -------------------------------- */
		

	
	/* ************************* setting Start ************************ */
    public function settingsAction(Request $request)
    {
		// $userSession = $this->getLoggedInUserDetailAction();         //function name given below 
		$session = $this->getRequest()->getSession(); 				
		if($session->get('userId') && $session->get('userId') != '')
		{					
			 $userId = $session->get('userId');	

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
					}
					else{
						$logopath = $request->get("old_logo");
					}
				$inserQuery = "UPDATE `moveon`.`settings`
				SET `analytic_code`='$analytic_code',`contact_number` = '$contact_number', `contact_email` = '$contact_email', `socialicon` = '$socialicon',`copywrite` = '$copywrite',`logo`= '$logopath'
				WHERE id =1";
				$stmt = $conn->prepare($inserQuery);
				$stmt->execute();
			}
			$settingsQuery = "SELECT * from settings WHERE id =1";
			$settings = $conn->fetchAll($settingsQuery);
				
		 }
		else
		{
			return $this->redirect( $this->generateUrl('move_plus_administrator_login') );
		} 
		
        return $this->render('MovePlusAdministratorBundle:Page:settings.html.twig',array('setting'=>$settings['0'],'patetitle'=>$patetitle));
    }
	/* ---------------------------setting End  -------------------------------- */
	
	
	/* ************************* allServices Start ************************ */
    public function allServicesAction(Request $request)
    {
		$session = $this->getRequest()->getSession(); 	

		if($session->get('userId') && $session->get('userId') != '')					
			$userId = $session->get('userId');	
		else
			return $this->redirect( $this->generateUrl('move_plus_administrator_login') );

		$hostname = $this->getRequest()->getHost();
		$conn = $this->get('database_connection');

		$pQuery = 'SELECT * from services ORDER BY COALESCE(parent_id, id), parent_id IS NOT NULL, id';
		$ppages = $conn->fetchAll($pQuery);
		 //echo "<pre>"; print_r($ppages); die;
		$patetitle = "All Pages";
		
        return $this->render('MovePlusAdministratorBundle:Page:all_services.html.twig', array('allServices'=> $ppages,'patetitle' =>$patetitle));
    }
	/* ---------------------------allServices End  -------------------------------- */
		
	/* ************************* addService Start ************************ */
    public function addServiceAction(Request $request)
    {
		$session = $this->getRequest()->getSession(); 	

		if($session->get('userId') && $session->get('userId') != '')					
			$userId = $session->get('userId');	
		else
			return $this->redirect( $this->generateUrl('move_plus_administrator_login') );

			
		$hostname = $this->getRequest()->getHost();
		$conn = $this->get('database_connection');
	

		$serviceQuery = 'SELECT * from sitemenu where menu_type="header" ORDER BY COALESCE(parent_id, id), parent_id IS NOT NULL, id';
		$serviceAllDeatil = $conn->fetchAll($serviceQuery);
			
				
		$pQuery = 'SELECT * from services ORDER BY COALESCE(parent_id, id), parent_id IS NOT NULL, id';
		//$pQuery = 'SELECT * from services where parent_id IS NULL or parent_id =0';
		$ppages = $conn->fetchAll($pQuery);  
		// echo "<pre>"; print_r($ppages); die;
		 
		 if($request->getMethod() == 'POST')
			{	
				$slug = $request->get("slug");
				$Slugmatch = 'SELECT * from services where slug like "%'.$slug.'%" ' ;				
				$SlugmatchDetails = $conn->fetchAll($Slugmatch);
				 $slugMatchCase = $SlugmatchDetails[0]['slug'] ;
				 
				if($slug == $slugMatchCase){					
					$this->get('session')->getFlashBag()->set('slugerror', 'Try Different Slug Name');		
						
				}else{				
					$titlestring = $request->get("title");  	
						$title = str_replace("'", "&#39;", $titlestring);
					$meta_titlestring = $request->get("meta_title");
						$meta_title = str_replace("'", "&#39;", $meta_titlestring);
					$meta_keywordstring  = $request->get("meta_keyword");
						$meta_keyword = str_replace("'", "&#39;", $meta_keywordstring );
					$meta_descriptionstring = $request->get("meta_description");	
						$meta_description = str_replace("'", "&#39;", $meta_descriptionstring );
					$slug = $request->get("slug");	
					$stringSort = $request->get("short_description");
						$short_description = str_replace("'", "&#39;", $stringSort);	
					$string = $request->get("description");
						$description = str_replace("'", "&#39;", $string);			
					$county = $request->get("county");
					$banner_titlestring = $request->get("banner_title");
						$banner_title = str_replace("'", "&#39;", $banner_titlestring);	
					$banner_sort_descstring = $request->get("banner_sort_desc");
						$banner_sort_desc = str_replace("'", "&#39;", $banner_sort_descstring);	
					$template = $request->get("template");
					 $catagory = $request->get("catagory");
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
					
					if($_FILES['featured_image']['name'] !='')
					{						
					$featured_image = $_FILES['featured_image']['name'];  
					$ranFeaturedImage = $id ; 
					
						$targetFileLogo = $basePath."/".$this->container->getParameter('gbl_uploadPath_allBanner').$featured_image;
						move_uploaded_file($_FILES['featured_image']['tmp_name'], $targetFileLogo);		
					}
					else{
							$featured_image = $defaultImage;						
						}	
					
					$parent_id_value = $request->get("parent_id"); 
						if($parent_id_value == ''){
						$parent_id = "NULL"; 
							}else{  
							$parent_id = $parent_id_value;
						}
					$inserQuery = "INSERT INTO `services` (`parent_id`,`meta_title`, `meta_keyword`, `meta_description`, `slug`, `title`, `short_description`, `description`, `featured_image`, `country`, `county`, `city`, `region_area`, `zip_code`, `banner_title`, `banner_sort_desc`, `page_type`, `catagory`, `template`, `leftsidebar`, `rightsidebar`, `howitswork_widget`, `relatedservices_widget`, `readytobook_widget`, `blog_widget`, `customertestimonial_widget`) VALUES ( $parent_id,'$meta_title', '$meta_keyword', '$meta_description', '$slug', '$title', '$short_description', '$description', '$featured_image', '$country', '$county', '$city', '$region_area', '$zip_code', '$banner_title', '$banner_sort_desc', '$page_type', '$catagory', '$template', '$leftsidebar', '$rightsidebar', '$howitswork_widget', '$relatedservices_widget', '$readytobook_widget', '$blog_widget', '$customertestimonial_widget')";
					
					$conn = $this->get('database_connection');	
					$stmt = $conn->prepare($inserQuery);
					$stmt->execute();	
					
					$this->get('session')->getFlashBag()->set('addSucessFull', 'Page has been sucessfully Added');	
					
					return $this->redirect($this->generateUrl('move_plus_administrator_staticPages'));
				}
			}  

        return $this->render('MovePlusAdministratorBundle:Page:add_new_service.html.twig',array('serviceAllDeatil'=>$serviceAllDeatil,'ppages'=>$ppages,));
    }
	/* ---------------------------addService End  -------------------------------- */
	
	
	/* ************************* editAllService Start ************************ */
    public function editAllServiceAction($id, Request $request)
    {
		//$userSession = $this->getLoggedInUserDetailAction();         //function name given below 
			$session = $this->getRequest()->getSession(); 	
			
			if($session->get('userId') && $session->get('userId') != '')					
				$userId = $session->get('userId');	
			else
				return $this->redirect( $this->generateUrl('move_plus_administrator_login') );
			
		
				 
				 
			$conn = $this->get('database_connection');
			$ServicesQuery = 'SELECT * from services where id= '.$id;
			$allServicesDetail = $conn->fetchAll($ServicesQuery);
			$defaultImage = $allServicesDetail[0]['featured_image'];
			$mainid = $allServicesDetail[0]['id'] ;
			 //echo "<pre>"; print_r($ServicesDetail); die;
			
			$pQueryselected = 'SELECT * from services where id= '.$mainid;
			$ppageselcted = $conn->fetchAll($pQueryselected);	
			
		//	$pQuery = 'SELECT * from services where parent_id IS NULL or parent_id =0';
			$pQuery = 'SELECT * from services ORDER BY COALESCE(parent_id, id), parent_id IS NOT NULL, id';
			$ppages = $conn->fetchAll($pQuery);  
			//echo "<pre>"; print_r($ppages); die;
			
			
			if($request->getMethod() == 'POST')
			{				
				 $pagemeta = $request->get("pagemeta"); 
				if($pagemeta == 'pagemeta'){
					
					$meta_titlestring = $request->get("meta_title");
						$meta_title = str_replace("'", "&#39;", $meta_titlestring);
					$meta_keywordstring  = $request->get("meta_keyword");
						$meta_keyword = str_replace("'", "&#39;", $meta_keywordstring );
					$meta_descriptionstring = $request->get("meta_description");	
						$meta_description = str_replace("'", "&#39;", $meta_descriptionstring );
					
					$inserQuery = "UPDATE `moveon`.`services`
					SET `meta_title` = '$meta_title', `meta_keyword` = '$meta_keyword', `meta_description` = '$meta_description' WHERE `id` ='$id'"; 
					$stmt = $conn->prepare($inserQuery);
					$stmt->execute();
									
					return $this->redirect($this->generateUrl('move_plus_administrator_staticPages'));
					
				}
				elseif($pagemeta == 'pagetitle'){
				
					$parent_id_value = $request->get("parent_id"); 
						if($parent_id_value == ''){
						$parent_id = "NULL"; 
							}else{  
							$parent_id = $parent_id_value;
						} 
					$titlestring = $request->get("title");  	
						$title = str_replace("'", "&#39;", $titlestring);
					$slug = $request->get("slug");	
					$stringSort = $request->get("short_description");
					$short_description = str_replace("'", "&#39;", $stringSort);	
					$string = $request->get("description");
					$description = str_replace("'", "&#39;", $string);			
					 $basePath = '/var/www/html'; 	
						if($_FILES['featured_image']['name'] !='')
						{						
						$featured_image = $_FILES['featured_image']['name'];  
						$ranFeaturedImage = $id ; 
						$targetFileLogo = $basePath."/".$this->container->getParameter('gbl_uploadPath_allBanner').$featured_image;
							move_uploaded_file($_FILES['featured_image']['tmp_name'], $targetFileLogo);		
						}else{
								$featured_image = $defaultImage;						
							}	
					$banner_titlestring = $request->get("banner_title");
						$banner_title = str_replace("'", "&#39;", $banner_titlestring);	
					$banner_sort_descstring = $request->get("banner_sort_desc");
						$banner_sort_desc = str_replace("'", "&#39;", $banner_sort_descstring);	
					$county = $request->get("county");					
					$catagorys = $request->get("catagory");
					 if($catagorys){
					 $catagory = $catagorys;
					 }
					$inserQuery = "UPDATE `moveon`.`services`
					SET `parent_id` = '$parent_id',`slug` = '$slug',`title`='$title',`short_description`= '$short_description',`description`= '$description',`county`= '$county',`banner_title`= '$banner_title',`banner_sort_desc`= '$banner_sort_desc',`featured_image`= '$featured_image',`catagory`= '$catagory' WHERE `id` ='$id'"; 
					$stmt = $conn->prepare($inserQuery);
					$stmt->execute();
									
					return $this->redirect($this->generateUrl('move_plus_administrator_staticPages'));
					
				}elseif($pagemeta == 'pagedesign'){
				
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
					
					$pageType = $request->get("pageType");
					
					$inserQuery = "UPDATE `moveon`.`services`
					SET `template`= '$template',`leftsidebar`= '$leftsidebar',`rightsidebar`= '$rightsidebar',`howitswork_widget`= '$howitswork_widget',`relatedservices_widget`= '$relatedservices_widget',`readytobook_widget`= '$readytobook_widget',`blog_widget`= '$blog_widget',`customertestimonial_widget`= '$customertestimonial_widget' WHERE `id` ='$id'"; 
					$stmt = $conn->prepare($inserQuery);
					$stmt->execute();
									
					return $this->redirect($this->generateUrl('move_plus_administrator_staticPages'));
				}
				
				
			}
		
        return $this->render('MovePlusAdministratorBundle:Page:edit_all_service_page.html.twig', array('allServicesDetail'=> $allServicesDetail,'ppages'=> $ppages,'ppageselcted'=> $ppageselcted,));
    }
	/* ---------------------------editAllService End  -------------------------------- */
	
	
	/* *************************   view Service Start ************************ */
    public function viewAllServiceAction($id,Request $request)
    {
			$session = $this->getRequest()->getSession(); 	
			
			if($session->get('userId') && $session->get('userId') != '')					
				$userId = $session->get('userId');	
			else
				return $this->redirect( $this->generateUrl('move_plus_administrator_login') );
			
			$conn = $this->get('database_connection');				
			$viewQuery="SELECT * from services where id=".$id;
			$viewServices = $conn->fetchAll($viewQuery);
		 
		 return $this->render('MovePlusAdministratorBundle:Page:view_service_page.html.twig', array('viewServices'=> $viewServices));	
			
    }
	/* ---------------------------  view Service End  -------------------------------- */
	
	/* ************************* delete  AllService Start ************************ */
    public function deleteAllServiceAction(Request $request)
    {
			$session = $this->getRequest()->getSession(); 	
			
			if($session->get('userId') && $session->get('userId') != '')					
				$userId = $session->get('userId');	
			else
				return $this->redirect( $this->generateUrl('move_plus_administrator_login') );
			
			$conn = $this->get('database_connection');	
			$id = $_POST["id"];     	
			 
			$delQuery="delete from `moveon`.`services` where id=".$id;
			$delstatement = $conn->prepare($delQuery);
			$delstatement->execute();
			
			return new response("SUCCESS");
    }
	/* ---------------------------delete  AllService End  -------------------------------- */
	
	
	/* ************************* county Pages Start ************************ */
    public function countyPagesAction(Request $request)
    {
		$session = $this->getRequest()->getSession(); 	

		if($session->get('userId') && $session->get('userId') != '')					
			$userId = $session->get('userId');	
		else
			return $this->redirect( $this->generateUrl('move_plus_administrator_login') );
				
		$hostname = $this->getRequest()->getHost();
		$conn = $this->get('database_connection');

     $countyQuery = 'SELECT * from county_pages ';
    
    $countyPages = $conn->fetchAll($countyQuery);
    $patetitle = "County Pages";  
	
	
			
        return $this->render('MovePlusAdministratorBundle:Page:county_pages.html.twig', array('countyPages'=>$countyPages,'patetitle'=>$patetitle));
    }
	/* ---------------------------county Pages End  -------------------------------- */
	
	
	/* ************************* edit county Start ************************ */
    public function editCountyPageAction($id, Request $request)
    {
		$session = $this->getRequest()->getSession(); 	
		
		if($session->get('userId') && $session->get('userId') != '')					
			$userId = $session->get('userId');	
		else
			return $this->redirect( $this->generateUrl('move_plus_administrator_login') );

		$hostname = $this->getRequest()->getHost();
		$conn = $this->get('database_connection');    
		$countyQuery = 'SELECT * from county_pages where id= '.$id;	   		
		$countyPages = $conn->fetchAll($countyQuery);
		$patetitle = "Edit ".$countyPages['0']['title'];
		
		$defaultImage = $countyPages[0]['banner_img'];
		
			if($request->getMethod() == 'POST')
			{				
				 $pagemeta = $request->get("pagemeta"); 
				if($pagemeta == 'pagemeta'){
					
					$meta_titlestring = $request->get("meta_title");
						$meta_title = str_replace("'", "&#39;", $meta_titlestring);
					$meta_keywordsstring = $request->get("meta_keywords");
						$meta_keywords = str_replace("'", "&#39;", $meta_keywordsstring);
					$meta_descriptionstring = $request->get("meta_description");	
						$meta_description = str_replace("'", "&#39;", $meta_descriptionstring);
					
					 $inserQuery = "UPDATE `moveon`.`county_pages` SET `meta_title` = '$meta_title', `meta_keywords` = '$meta_keywords', `meta_description` = '$meta_description' WHERE `id` ='$id'"; 
					$stmt = $conn->prepare($inserQuery);
					$stmt->execute();
									
					return $this->redirect($this->generateUrl('move_plus_administrator_countyPages'));
					
				}
				elseif($pagemeta == 'pagetitle'){
				
					$titlestring = $request->get("title"); 
						$title = str_replace("'", "&#39;", $titlestring);					
					$service_slug = $request->get("service_slug");  	
					$county_slug = $request->get("county_slug");
					$stringSort = $request->get("short_description");
					$short_description = str_replace("'", "&#39;", $stringSort);	
					$string = $request->get("description");
					$description = str_replace("'", "&#39;", $string);			
					 $basePath = '/var/www/html'; 	
						if($_FILES['banner_img']['name'] !='')
						{						
						$banner_img = $_FILES['banner_img']['name'];  
						$ranFeaturedImage = $id ; 
						$targetFileLogo = $basePath."/".$this->container->getParameter('gbl_uploadPath_allBanner').$banner_img;
							move_uploaded_file($_FILES['banner_img']['tmp_name'], $targetFileLogo);		
						}else{
								$banner_img = $defaultImage;						
							}	
					$banner_textstring = $request->get("banner_text");
						$banner_text = str_replace("'", "&#39;", $banner_textstring);	
					$banner_sub_textstring = $request->get("banner_sub_text");
						$banner_sub_text = str_replace("'", "&#39;", $banner_sub_textstring);						
					$county = $request->get("county");
					$catagorys = $request->get("catagory");
					$service_name = $request->get("service_name");
					 if($catagorys){
					 $catagory = $catagorys;
					 }
					$inserQuery = "UPDATE `moveon`.`county_pages`
					SET `service_slug` = '$service_slug',`county_slug` = '$county_slug',`title`='$title',`short_description`= '$short_description',`description`= '$description',`county`= '$county',`banner_text`= '$banner_text',`banner_sub_text`= '$banner_sub_text',`service_name`= '$service_name',`banner_img`= '$banner_img',`catagory`= '$catagory' WHERE `id` ='$id'"; 
					$stmt = $conn->prepare($inserQuery);
					$stmt->execute();
									
					return $this->redirect($this->generateUrl('move_plus_administrator_countyPages'));
					
				}elseif($pagemeta == 'pagedesign'){
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
					
					$pageType = $request->get("pageType");
					
					$inserQuery = "UPDATE `moveon`.`county_pages`
					SET `template`= '$template',`leftsidebar`= '$leftsidebar',`rightsidebar`= '$rightsidebar',`howitswork_widget`= '$howitswork_widget',`relatedservices_widget`= '$relatedservices_widget',`readytobook_widget`= '$readytobook_widget',`blog_widget`= '$blog_widget',`customertestimonial_widget`= '$customertestimonial_widget' WHERE `id` ='$id'"; 
					$stmt = $conn->prepare($inserQuery);
					$stmt->execute();
									
					return $this->redirect($this->generateUrl('move_plus_administrator_countyPages'));
				}
			
		}
		
        return $this->render('MovePlusAdministratorBundle:Page:edit_county_page.html.twig', array('services'=>$countyPages['0'],'patetitle'=>$patetitle));
    }
	/* ---------------------------edit county End  -------------------------------- */
	
	
	
	/* *************************   view county Start ************************ */
    public function viewCountyPageAction($id,Request $request)
    {
			$session = $this->getRequest()->getSession(); 	
			
			if($session->get('userId') && $session->get('userId') != '')					
				$userId = $session->get('userId');	
			else
				return $this->redirect( $this->generateUrl('move_plus_administrator_login') );
			
			$conn = $this->get('database_connection');				
			$viewQuery="SELECT * from county_pages where id=".$id;
			$viewCounty = $conn->fetchAll($viewQuery);
		 
		 return $this->render('MovePlusAdministratorBundle:Page:view_county_page.html.twig', array('viewCounty'=> $viewCounty));	
			
    }
	/* ---------------------------  view county End  -------------------------------- */
	
	
		/* ************************* delete  county Start ************************ */
    public function deleteCountyPageAction(Request $request)
    {
			$session = $this->getRequest()->getSession(); 	
			
			if($session->get('userId') && $session->get('userId') != '')					
				$userId = $session->get('userId');	
			else
				return $this->redirect( $this->generateUrl('move_plus_administrator_login') );
			
			$conn = $this->get('database_connection');	
			$id = $_POST["id"];     	
			 
			$delQuery="delete from `moveon`.`county_pages` where id=".$id;
			$delstatement = $conn->prepare($delQuery);
			$delstatement->execute();
			
			return new response("SUCCESS");
    }
	/* ---------------------------delete  county End  -------------------------------- */
	
	
	/* ************************* City Pages Start ************************ */
    public function cityPagesAction(Request $request)
    {
		$session = $this->getRequest()->getSession(); 	

		if($session->get('userId') && $session->get('userId') != '')					
			$userId = $session->get('userId');	
		else
			return $this->redirect( $this->generateUrl('move_plus_administrator_login') );
				
		$hostname = $this->getRequest()->getHost();
		$conn = $this->get('database_connection');
    
    $pageNo = 0;
    $perpage= 20;
    
    if(isset($_GET['page']) && $_GET['page']!='')
    {
    $pageNo = $_GET['page'];
    }
    
    if(isset($_GET['s']) && $_GET['s']!='')
    {
    $serchquery  = ' where service_name like "%'.$_GET['s'].'%" or title like "%'.$_GET['s'].'%" or county like "%'.$_GET['s'].'%" or city like "%'.$_GET['s'].'%"';
    $pageNo = 0;
    $serachkey = $_GET['s'];
    }else{
    $serchquery ='';
    $serachkey = '';
    }
    
    
    if(isset($_GET['perpage']) && $_GET['perpage']!='')
    {
    $perpage = $_GET['perpage'];
    }
    $start = $pageNo*$perpage;
    
    
    
    $totalRec ='SELECT * from city_pages'.$serchquery;
    $totalRecCount = count($conn->fetchAll($totalRec));
    
    $pagesbh = intval($totalRecCount/$perpage);
    
		$countyQuery = 'SELECT * from city_pages '.$serchquery.' LIMIT '.$start.','.$perpage;
		
		
		$countyPages = $conn->fetchAll($countyQuery);
		$patetitle = "City Pages";  
		
        return $this->render('MovePlusAdministratorBundle:Page:city_pages.html.twig', array('serachkey'=>$serachkey,'pagesbh'=>$pagesbh,'perpage'=>$perpage,'pageno'=>$pageNo,'totalRecCount'=>$totalRecCount,'countyPages'=>$countyPages,'patetitle'=>$patetitle));
    }
	/* ---------------------------City Pages End  -------------------------------- */
	
	
	/* ************************* edit City Start ************************ */
    public function editCityPageAction($id, Request $request)
    {
		$session = $this->getRequest()->getSession(); 	
		
		if($session->get('userId') && $session->get('userId') != '')					
			$userId = $session->get('userId');	
		else
			return $this->redirect( $this->generateUrl('move_plus_administrator_login') );

		 $conn = $this->get('database_connection');
    
		$countyQuery = 'SELECT * from city_pages where id= '.$id;
    
		$countyPages = $conn->fetchAll($countyQuery);
		$patetitle = "Edit ".$countyPages['0']['title'];  
		$defaultImage = $countyPages[0]['banner_img'];
		
		if($request->getMethod() == 'POST')
			{				
				 $pagemeta = $request->get("pagemeta"); 
				if($pagemeta == 'pagemeta'){
					
					$meta_titlestring = $request->get("meta_title");
						$meta_title = str_replace("'", "&#39;", $meta_titlestring);
					$meta_keywordsstring = $request->get("meta_keywords");
						$meta_keywords = str_replace("'", "&#39;", $meta_keywordsstring);
					$meta_descriptionstring = $request->get("meta_description");	
						$meta_description = str_replace("'", "&#39;", $meta_descriptionstring);
					
					 $inserQuery = "UPDATE `moveon`.`city_pages` SET `meta_title` = '$meta_title', `meta_keywords` = '$meta_keywords', `meta_description` = '$meta_description' WHERE `id` ='$id'"; 
					$stmt = $conn->prepare($inserQuery);
					$stmt->execute();
									
					return $this->redirect($this->generateUrl('move_plus_administrator_cityPages'));
					
				}
				elseif($pagemeta == 'pagetitle'){
				
					$titlestring = $request->get("title");  	
						$title = str_replace("'", "&#39;", $titlestring);
					$service_slug = $request->get("service_slug");  	
					$county_slug = $request->get("county_slug");
					$city_slug = $request->get("city_slug");
					$stringSort = $request->get("short_description");
						$short_description = str_replace("'", "&#39;", $stringSort);	
					$string = $request->get("description");
						$description = str_replace("'", "&#39;", $string);			
					 $basePath = '/var/www/html'; 	
						if($_FILES['banner_img']['name'] !='')
						{						
						$banner_img = $_FILES['banner_img']['name'];  
						$ranFeaturedImage = $id ; 
						$targetFileLogo = $basePath."/".$this->container->getParameter('gbl_uploadPath_allBanner').$banner_img;
							move_uploaded_file($_FILES['banner_img']['tmp_name'], $targetFileLogo);		
						}else{
								$banner_img = $defaultImage;						
							}	
					$banner_textstring = $request->get("banner_text");
						$banner_text = str_replace("'", "&#39;", $banner_textstring);
					$banner_sub_textstring = $request->get("banner_sub_text");
						$banner_sub_text = str_replace("'", "&#39;", $banner_sub_textstring);					
					$county = $request->get("county");
					$catagorys = $request->get("catagory");
					$service_name = $request->get("service_name");
					 if($catagorys){
					 $catagory = $catagorys;
					 }
					$inserQuery = "UPDATE `moveon`.`city_pages`
					SET `service_slug` = '$service_slug',`county_slug` = '$county_slug',`city_slug` = '$city_slug',`title`='$title',`short_description`= '$short_description',`description`= '$description',`county`= '$county',`banner_text`= '$banner_text',`banner_sub_text`= '$banner_sub_text',`service_name`= '$service_name',`banner_img`= '$banner_img',`catagory`= '$catagory' WHERE `id` ='$id'"; 
					$stmt = $conn->prepare($inserQuery);
					$stmt->execute();
									
					return $this->redirect($this->generateUrl('move_plus_administrator_cityPages'));
					
				}elseif($pagemeta == 'pagedesign'){
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
					
					$pageType = $request->get("pageType");
					
					$inserQuery = "UPDATE `moveon`.`city_pages`
					SET `template`= '$template',`leftsidebar`= '$leftsidebar',`rightsidebar`= '$rightsidebar',`howitswork_widget`= '$howitswork_widget',`relatedservices_widget`= '$relatedservices_widget',`readytobook_widget`= '$readytobook_widget',`blog_widget`= '$blog_widget',`customertestimonial_widget`= '$customertestimonial_widget' WHERE `id` ='$id'"; 
					$stmt = $conn->prepare($inserQuery);
					$stmt->execute();
									
					return $this->redirect($this->generateUrl('move_plus_administrator_cityPages'));
				}
			
		}
			
			
        return $this->render('MovePlusAdministratorBundle:Page:edit_city_page.html.twig', array('services'=>$countyPages['0'],'patetitle'=>$patetitle));
    }
	/* ---------------------------edit City End  -------------------------------- */
	
	
	/* *************************   view city Start ************************ */
    public function viewCityPageAction($id,Request $request)
    {
			$session = $this->getRequest()->getSession(); 	
			
			if($session->get('userId') && $session->get('userId') != '')					
				$userId = $session->get('userId');	
			else
				return $this->redirect( $this->generateUrl('move_plus_administrator_login') );
			
			$conn = $this->get('database_connection');				
			$viewQuery="SELECT * from city_pages where id=".$id;
			$viewCity = $conn->fetchAll($viewQuery);
		 
		 return $this->render('MovePlusAdministratorBundle:Page:view_city_page.html.twig', array('viewCity'=> $viewCity));	
			
    }
	/* ---------------------------  view city End  -------------------------------- */
	
	
	/* ************************* delete  City Start ************************ */
    public function deleteCityPageAction(Request $request)
    {
			$session = $this->getRequest()->getSession(); 	
			
			if($session->get('userId') && $session->get('userId') != '')					
				$userId = $session->get('userId');	
			else
				return $this->redirect( $this->generateUrl('move_plus_administrator_login') );
			
			$conn = $this->get('database_connection');	
			$id = $_POST["id"];     	
			 
			$delQuery="delete from `moveon`.`city_pages` where id=".$id;
			$delstatement = $conn->prepare($delQuery);
			$delstatement->execute();
			
			return new response("SUCCESS");
    }
	/* ---------------------------delete  City End  -------------------------------- */
	
	
	
	/* ************************* header Menu Start ************************ */
    public function headerMenuAction(Request $request)
    {
		$session = $this->getRequest()->getSession(); 	
		
		if($session->get('userId') && $session->get('userId') != '')					
			$userId = $session->get('userId');	
		else
			return $this->redirect( $this->generateUrl('move_plus_administrator_login') );

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
		//echo "<pre>"; print_r($menus); 
		
		$patetitle = "Manage Header Menu";  
		
		$pQuery = 'SELECT * from services ORDER BY COALESCE(parent_id, id), parent_id IS NOT NULL, id';
		$ppages = $conn->fetchAll($pQuery);  
		
        return $this->render('MovePlusAdministratorBundle:Page:header_menu.html.twig', array('ppages'=>$ppages,'menus'=>$menus,'patetitle'=>$patetitle));
    }
	/* ---------------------------header Menu End  -------------------------------- */
	
	
	/* ************************* delete header Menu  Start ************************ */
    public function deleteHeaderMenuAction(Request $request)
    {
			$session = $this->getRequest()->getSession(); 	
			
			if($session->get('userId') && $session->get('userId') != '')					
				$userId = $session->get('userId');	
			else
				return $this->redirect( $this->generateUrl('move_plus_administrator_login') );
			
			$conn = $this->get('database_connection');	
			$id = $_POST["id"];     	
			 
			$delQuery="delete from `moveon`.`sitemenu` where id=".$id;
			$delstatement = $conn->prepare($delQuery);
			$delstatement->execute();
			
			return new response("SUCCESS");
    }
	/* ---------------------------delete header Menu End  -------------------------------- */
	
	
	/* ************************* Footer Menu Start ************************ */
    public function footerMenuAction(Request $request)
    {
		$session = $this->getRequest()->getSession(); 	
		
		if($session->get('userId') && $session->get('userId') != '')					
			$userId = $session->get('userId');	
		else
			return $this->redirect( $this->generateUrl('move_plus_administrator_login') );

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
		
        return $this->render('MovePlusAdministratorBundle:Page:footer_menu.html.twig', array('ppages'=>$ppages,'menus'=>$menus,'patetitle'=>$patetitle));
    }
	/* ---------------------------footer Menu End  -------------------------------- */
	
	
	/* ************************* delete footer Menu  Start ************************ */
    public function deleteFooterMenuAction(Request $request)
    {
			$session = $this->getRequest()->getSession(); 	
			
			if($session->get('userId') && $session->get('userId') != '')					
				$userId = $session->get('userId');	
			else
				return $this->redirect( $this->generateUrl('move_plus_administrator_login') );
			
			$conn = $this->get('database_connection');	
			$id = $_POST["id"];     	
			 
			$delQuery="delete from `moveon`.`sitemenu` where id=".$id;
			$delstatement = $conn->prepare($delQuery);
			$delstatement->execute();
			
			return new response("SUCCESS");
    }
	/* ---------------------------delete footer Menu End  -------------------------------- */
	
	
	
	/* ************************* testimonial Menu Start ************************ */
    public function testimonialAction(Request $request)
    {
		$session = $this->getRequest()->getSession(); 	
		
		if($session->get('userId') && $session->get('userId') != '')					
			$userId = $session->get('userId');	
		else
			return $this->redirect( $this->generateUrl('move_plus_administrator_login') );
		
		$patetitle = "Testimonial";  
			
		$hostname = $this->getRequest()->getHost();
		$conn = $this->get('database_connection');		
		//$testmonial = $conn->fetchAll('SELECT * from testimonial where star_rating = 5 OR  star_rating = 4  ORDER BY  `id` DESC ');
		$testmonial = $conn->fetchAll('SELECT * from testimonial  ORDER BY  `id` DESC ');
				
        return $this->render('MovePlusAdministratorBundle:Page:testimonial.html.twig', array('testmonial'=>$testmonial,'patetitle'=>$patetitle,));
    }
	/* ---------------------------testimonial Menu End  -------------------------------- */
	
		
	
	/* ************************* Add Testimonial Start ************************ */
    public function addTestimonialAction(Request $request)
    {
			$session = $this->getRequest()->getSession(); 	
			
			if($session->get('userId') && $session->get('userId') != '')					
				$userId = $session->get('userId');	
			else
				return $this->redirect( $this->generateUrl('move_plus_administrator_login') );
			 
			/*  $string = 'I love Bob/s Pizza!';
			 $stringd = str_replace("/", "&#39;", $string);
			 echo $stringd; die; */
				
			 if($request->getMethod() == 'POST')
			{	
				$title = $request->get("title");  	
				$string = $request->get("description");
				$description = str_replace("'", "&#39;", $string);				
				$writer_name = $request->get("writer_name");
				$star_rating = $request->get("star_rating");
				$date = $request->get("date");
				$status = $request->get("status");
								
				//echo $basePath = $this->getBasePathAction(); die;	 		
				 $basePath = '/var/www/html'; 		
				
				if($_FILES['image']['name'] !='')
				{						
				$image = $_FILES['image']['name'];  
				$ranFeaturedImage = $id ; 
				
					$targetFileLogo = $basePath."/".$this->container->getParameter('gbl_uploadPath_serviceTestimonial').$image;
					move_uploaded_file($_FILES['image']['tmp_name'], $targetFileLogo);		
				}
				else{
						$image = '/ana.png';						
					}	
				
				$inserQuery = "INSERT INTO `testimonial` (`title`, `description`, `writer_name`, `star_rating`, `image`, `date`, `status`) VALUES ('$title', '$description', '$writer_name', '$star_rating', '$image', '$date', 1)";
				
				
				
				$conn = $this->get('database_connection');	
				$stmt = $conn->prepare($inserQuery);
				$stmt->execute();							
				return $this->redirect($this->generateUrl('move_plus_administrator_testimonial'));
			}  
		
        return $this->render('MovePlusAdministratorBundle:Page:add_testmonial.html.twig');
    }
	/* ---------------------------Add Testimonial End  -------------------------------- */
	
	
	/* ************************* editTestimonial Start ************************ */
    public function editTestimonialAction($id, Request $request)
    {
			$session = $this->getRequest()->getSession(); 	
			
			if($session->get('userId') && $session->get('userId') != '')					
				$userId = $session->get('userId');	
			else
				return $this->redirect( $this->generateUrl('move_plus_administrator_login') );
			
		$conn = $this->get('database_connection');		
		$testmonial = $conn->fetchAll('SELECT * from testimonial where id = '.$id);
		$testmonialDetail = $testmonial['0']; 
			 
			if($request->getMethod() == 'POST')
			{				
			
				$title = $request->get("title");  	
				$string = $request->get("description");
				$description = str_replace("'", "&#39;", $string);			
				$writer_name = $request->get("writer_name");
				$star_rating = $request->get("star_rating");
				$date = $request->get("date");
						
				 $basePath = '/var/www/html'; 		
				
				if($_FILES['image']['name'] !='')
				{						
				$image = $_FILES['image']['name'];  
				$ranFeaturedImage = $id ; 
				
					$targetFileLogo = $basePath."/".$this->container->getParameter('gbl_uploadPath_serviceTestimonial').$image;
					move_uploaded_file($_FILES['image']['tmp_name'], $targetFileLogo);	
				
				$inserQuery = "UPDATE `moveon`.`testimonial` SET `title`='$title',`description` = '$description', `writer_name` = '$writer_name', `star_rating` = '$star_rating',`image` = '$image',`date` = '$date', `status`= 1  WHERE id = ".$id; 
				$stmt = $conn->prepare($inserQuery);
				$stmt->execute();	
						
				}
				else{						
						$inserQuery = "UPDATE `moveon`.`testimonial` SET `title`='$title',`description` = '$description', `writer_name` = '$writer_name', `star_rating` = '$star_rating',`date` = '$date', `status`= 1  WHERE id = ".$id; 
						$stmt = $conn->prepare($inserQuery);
						$stmt->execute();	
					}	
								
				return $this->redirect($this->generateUrl('move_plus_administrator_testimonial'));
			} 
		
        return $this->render('MovePlusAdministratorBundle:Page:edit_testmonial.html.twig', array('testmonialDetail'=> $testmonialDetail,'testmonial'=> $testmonial,));
    }
	/* ---------------------------editTestimonial End  -------------------------------- */
	
	
	/* *************************   view Testimonial Start ************************ */
    public function viewTestimonialAction($id,Request $request)
    {
			$session = $this->getRequest()->getSession(); 	
			
			if($session->get('userId') && $session->get('userId') != '')					
				$userId = $session->get('userId');	
			else
				return $this->redirect( $this->generateUrl('move_plus_administrator_login') );
			
			$conn = $this->get('database_connection');				
			$viewQuery="SELECT * from testimonial where id=".$id;
			$viewTestmonial = $conn->fetchAll($viewQuery);
		 
		 return $this->render('MovePlusAdministratorBundle:Page:view_testmonial.html.twig', array('viewTestmonial'=> $viewTestmonial));	
			
    }
	/* ---------------------------  view Testimonial End  -------------------------------- */
	
		
	/* ************************* getparentcatagortPages  Start ************************ */
    public function getparentcatagortPagesAction(Request $request)
    {
			$session = $this->getRequest()->getSession(); 	
			
			if($session->get('userId') && $session->get('userId') != '')					
				$userId = $session->get('userId');	
			else
				return $this->redirect( $this->generateUrl('move_plus_administrator_login') );
			
			$conn = $this->get('database_connection');	
			$id = $_POST["mainId"];     	
			 
			$getQuery="select * from services where parent_id IS NULL and id=".$id;
			$getparentcatagort = $conn->fetchAll($getQuery);
			$getcatagory = $getparentcatagort[0]['catagory'];
			
			return new response($getcatagory);
    }
	/* ---------------------------getparentcatagortPages End  -------------------------------- */
	
	
	
	
	
	
	/* ************************* deleteTestimonial Start ************************ */
    public function deleteTestimonialAction(Request $request)
    {
			$session = $this->getRequest()->getSession(); 	
			
			if($session->get('userId') && $session->get('userId') != '')					
				$userId = $session->get('userId');	
			else
				return $this->redirect( $this->generateUrl('move_plus_administrator_login') );
			
			$conn = $this->get('database_connection');	
			$id = $_POST["id"];     	
			 
			$delQuery="delete from `moveon`.`testimonial` where id=".$id;
			$delstatement = $conn->prepare($delQuery);
			$delstatement->execute();
			
			return new response("SUCCESS");
    }
	/* ---------------------------deleteTestimonial End  -------------------------------- */
	
	
	
	
	/* ************************* sampleserviceDynamicscript Menu Start ************************ */
    public function sampleserviceDynamicscriptAction(Request $request)
    {
	
		$session = $this->getRequest()->getSession(); 	
		
		if($session->get('userId') && $session->get('userId') != '')					
			$userId = $session->get('userId');	
		else
			return $this->redirect( $this->generateUrl('move_plus_administrator_login') );
		
		$patetitle = "Sample Service Dynamic Script";  
			
		$hostname = $this->getRequest()->getHost();
		$conn = $this->get('database_connection');		
		
		$sampleservices = $conn->fetchAll('SELECT * from sampleservices   ');
				
        return $this->render('MovePlusAdministratorBundle:Page:sample_service_dynamic.html.twig', array('sampleservices'=>$sampleservices,'patetitle'=>$patetitle,));
    }
	/* ---------------------------sampleserviceDynamicscript Menu End  -------------------------------- */
	
	
	/* ************************* editsampleserviceDynamicscript Menu Start ************************ */
    public function editsampleserviceDynamicscriptAction($id , Request $request)
    {
	
		$session = $this->getRequest()->getSession(); 	
		
		if($session->get('userId') && $session->get('userId') != '')					
			$userId = $session->get('userId');	
		else
			return $this->redirect( $this->generateUrl('move_plus_administrator_login') );
		
		$patetitle = "Edit Sample Service Dynamic Script";  
		
		$hostname = $this->getRequest()->getHost();
		$conn = $this->get('database_connection');		
		
		$countyQuery = 'SELECT * from county ';
		$county = $conn->fetchAll($countyQuery);
		$pQuery = 'SELECT * from services ORDER BY COALESCE(parent_id, id), parent_id IS NOT NULL, id';
		$services = $conn->fetchAll($pQuery);
	
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
						
						$inserQuery = "UPDATE `sampleservices` SET `meta_title`='$meta_title',`meta_keywords`='$meta_keywords',`meta_description`='$meta_description',`title`='$title',`service_name`='$service_name',`county_name`='$county_Name',`short_description`='$short_description',`description`='$description',`banner_img`='$banner_img',`banner_text`='$banner_text',`banner_sub_text`='$banner_sub_text',`catagory`='$catagory'  WHERE id ='$id'";
						$conn = $this->get('database_connection');
						$stmt = $conn->prepare($inserQuery);
						$stmt->execute();		

					
			
			}
		$editsampleservices = $conn->fetchAll('SELECT * from sampleservices where id='.$id);
		$defaultImage = $editsampleservices[0]['banner_img'];

		
        return $this->render('MovePlusAdministratorBundle:Page:edit_sample_service_dynamic.html.twig', array('editsampleservices'=>$editsampleservices,'patetitle'=>$patetitle,'county'=>$county,'services'=>$services));
		
    }
	/* ---------------------------editsampleserviceDynamicscript Menu End  -------------------------------- */
	
	
	/* ************************* deletesampleserviceDynamicscript Menu Start ************************ */
    public function deletesampleserviceDynamicscriptAction(Request $request)
    {
	
		$session = $this->getRequest()->getSession(); 	
			
			if($session->get('userId') && $session->get('userId') != '')					
				$userId = $session->get('userId');	
			else
				return $this->redirect( $this->generateUrl('move_plus_administrator_login') );
			
			$conn = $this->get('database_connection');	
			$id = $_POST["id"];     	
			 
			$delQuery="delete from `sampleservices` where id=".$id;
			$delstatement = $conn->prepare($delQuery);
			$delstatement->execute();
			
			return new response("SUCCESS");
    }
	/* ---------------------------deletesampleserviceDynamicscript Menu End  -------------------------------- */
	
	
	
	
	/* ************************* manageForm Start ************************ */
    public function manageFormAction(Request $request)
    {
		$session = $this->getRequest()->getSession(); 	
		
		if($session->get('userId') && $session->get('userId') != '')					
			$userId = $session->get('userId');	
		else
			return $this->redirect( $this->generateUrl('move_plus_administrator_login') );
		
		$patetitle = "Manage Form";  
			
		$hostname = $this->getRequest()->getHost();
		$conn = $this->get('database_connection');		
		$manageForm = $conn->fetchAll('SELECT * from bform where `form_id` = 1 OR `form_id` = 2 OR `form_id` = 3 ');
				
        return $this->render('MovePlusAdministratorBundle:Page:manage_form.html.twig', array('manageForm'=>$manageForm,'patetitle'=>$patetitle,));
    }
	/* ---------------------------manageForm End  -------------------------------- */
	
	/* ************************* edit Manage Form Start ************************ */
    public function editManageFormAction($id, Request $request)
    {
    
    $hostname = $this->getRequest()->getHost();
		$conn = $this->get('database_connection');
		
		$session = $this->getRequest()->getSession(); 	
		
		if($session->get('userId') && $session->get('userId') != '')					
			$userId = $session->get('userId');	
		else
			return $this->redirect( $this->generateUrl('move_plus_administrator_login') );
		
			$patetitle = "Edit Manage Form";  			
			$conn = $this->get('database_connection');
    
			$title = $_POST['title'];
			$email_subject = $_POST['email_subject'];
			$email_to = $_POST['email_to'];
			$email_cc = $_POST['email_cc'];
			$content = $_POST['content']; 	
			$sucess_message = $_POST['sucess_message'];
			$catagory = $_POST['catagory'];
			$number_steps = $_POST['number_steps'];
			
			if($content!=''){
			$delQuery="delete from `moveon`.`bform` where form_id=".$id;
			$delstatement = $conn->prepare($delQuery);
			$delstatement->execute();
			$insertQuery = "INSERT INTO `moveon`.`bform` (`form_id`, `title`, `email_subject`, `email_to`, `email_cc`, `content`, `sucess_message`, `catagory`, `number_steps`) VALUES ('$id', '$title', '$email_subject', '$email_to', '$email_cc', '$content', '$sucess_message', '$catagory', '$number_steps')";
			$statement = $conn->prepare($insertQuery);
			$statement->execute();
			}	
			
		 $content = $conn->fetchAll('SELECT * from bform where bform.form_id='.$id);
		 
    return $this->render('MovePlusAdministratorBundle:Page:edit_manage_form.html.twig', array('content' =>$content[0],'patetitle'=>$patetitle,));
    }
	/* --------------------------- edit Manage Form End  -------------------------------- */
	
	
		
	/* ************************* bannerPages Start ************************ */
    public function bannerPagesAction(Request $request)
    {
		$session = $this->getRequest()->getSession(); 	

		if($session->get('userId') && $session->get('userId') != '')					
			$userId = $session->get('userId');	
		else
			return $this->redirect( $this->generateUrl('move_plus_administrator_login') );

		$hostname = $this->getRequest()->getHost();
		$conn = $this->get('database_connection');

		$bQuery = 'SELECT * from slider_content ORDER BY id desc';
		$bannerdetails = $conn->fetchAll($bQuery);
		$patetitle = "Home Page Banner Slider Images";
		
        return $this->render('MovePlusAdministratorBundle:Page:banner_page.html.twig', array('bannerdetails'=> $bannerdetails,'patetitle' =>$patetitle));
    }
	/* ---------------------------bannerPages End  -------------------------------- */
		
		
	
	/* ************************* Add Banner Start ************************ */
    public function addBannerAction(Request $request)
    {
			$session = $this->getRequest()->getSession(); 	
			
			if($session->get('userId') && $session->get('userId') != '')					
				$userId = $session->get('userId');	
			else
				return $this->redirect( $this->generateUrl('move_plus_administrator_login') );
				
			 if($request->getMethod() == 'POST')
			{	
				$title = $request->get("title");  	
				$string = $request->get("sort_desc");
				$sort_desc = str_replace("'", "&#39;", $string);		
								
				 $basePath = '/var/www/html'; 		
				
				if($_FILES['slider_image']['name'] !='')
				{						
				$slider_image = $_FILES['slider_image']['name'];  
				$ranFeaturedImage = $id ; 
				
					$targetFileLogo = $basePath."/".$this->container->getParameter('gbl_uploadPath_serviceHomeBannerImage').$slider_image;
					move_uploaded_file($_FILES['slider_image']['tmp_name'], $targetFileLogo);		
				}
				else{
						$slider_image = 'banner.jpg';						
					}	
				
				$inserQuery = "INSERT INTO `slider_content` (`title`, `sort_desc`, `slider_image`,`status`) VALUES ('$title', '$sort_desc', '$slider_image', 1)";
				
				$conn = $this->get('database_connection');	
				$stmt = $conn->prepare($inserQuery);
				$stmt->execute();							
				return $this->redirect($this->generateUrl('move_plus_administrator_bannerPages'));
			}  
		
        return $this->render('MovePlusAdministratorBundle:Page:add_new_banner.html.twig');
    }
	/* ---------------------------Add Banner End  -------------------------------- */
	
	/* ************************* edit Banner Start ************************ */
    public function editBannerAction($id, Request $request)
    {
			$session = $this->getRequest()->getSession(); 	
			
			if($session->get('userId') && $session->get('userId') != '')					
				$userId = $session->get('userId');	
			else
				return $this->redirect( $this->generateUrl('move_plus_administrator_login') );
			
		$conn = $this->get('database_connection');		
		$banner_images = $conn->fetchAll('SELECT * from slider_content where id = '.$id);		
		$SliderContent = $banner_images[0];
		$defaultImage = $banner_images[0]['slider_image'];
			 
			if($request->getMethod() == 'POST')
			{				
			
				$title = $request->get("title");  	
				$string = $request->get("sort_desc");
				$sort_desc = str_replace("'", "&#39;", $string);			
						
				 $basePath = '/var/www/html'; 		
				
				if($_FILES['slider_image']['name'] !='')
				{						
				$slider_image = $_FILES['slider_image']['name'];  
				$ranFeaturedImage = $id ; 
				
					$targetFileLogo = $basePath."/".$this->container->getParameter('gbl_uploadPath_serviceHomeBannerImage').$slider_image;
					move_uploaded_file($_FILES['slider_image']['tmp_name'], $targetFileLogo);	
				
				}
				else{
					$slider_image = $defaultImage;
					}

				$inserQuery = "UPDATE `moveon`.`slider_content` SET `title`='$title',`sort_desc` = '$sort_desc',`slider_image` = '$slider_image'  WHERE id = ".$id; 
				$stmt = $conn->prepare($inserQuery);
				$stmt->execute();						
								
				return $this->redirect($this->generateUrl('move_plus_administrator_bannerPages'));
			} 
		
        return $this->render('MovePlusAdministratorBundle:Page:edit_banner_slider_image.html.twig', array('SliderContent'=> $SliderContent,));
    }
	/* ---------------------------edit  Banner End  -------------------------------- */
	
		
		
	/* ************************* deleteBanner Start ************************ */
    public function deleteBannerAction(Request $request)
    {
			$session = $this->getRequest()->getSession(); 	
			
			if($session->get('userId') && $session->get('userId') != '')					
				$userId = $session->get('userId');	
			else
				return $this->redirect( $this->generateUrl('move_plus_administrator_login') );
			
			$conn = $this->get('database_connection');	
			$id = $_POST["id"];     	
			 
			$delQuery="delete from `moveon`.`slider_content` where id=".$id;
			$delstatement = $conn->prepare($delQuery);
			$delstatement->execute();
			
			return new response("SUCCESS");
    }
	/* ---------------------------deleteBanner End  -------------------------------- */
	
	
	
	/* ************************* howItsWorkContent Start ************************ */
    public function howItsWorkContentAction(Request $request)
    {
		$conn = $this->get('database_connection');

		$howQuery = 'SELECT * from how_its_work_content';
		$howItsContent = $conn->fetchAll($howQuery);
		$patetitle = 'How Its Work';
		
		return $this->render('MovePlusAdministratorBundle:Page:how_its_content.html.twig', array('howItsContent'=> $howItsContent,'patetitle'=> $patetitle,));	
    }
	/* --------------------------- howItsWorkContent End  -------------------------------- */
	
	
	
	
	/* ************************* edit  editHowItsWorkContent Start ************************ */
    public function editHowItsWorkContentAction($id, Request $request)
    {
		$session = $this->getRequest()->getSession(); 	
		
		if($session->get('userId') && $session->get('userId') != '')					
			$userId = $session->get('userId');	
		else
			return $this->redirect( $this->generateUrl('move_plus_administrator_login') );

		$hostname = $this->getRequest()->getHost();
		$conn = $this->get('database_connection');    
		$contentQuery = 'SELECT * from how_its_work_content where id= '.$id;
	   		
		$contentQueryPages = $conn->fetchAll($contentQuery);
		$patetitle = "Edit Content";
		
		if($request->getMethod() == 'POST')
			{				
			
				$title = $request->get("title");  	
				$string = $request->get("content");
				$content = str_replace("'", "&#39;", $string);			
						
				$inserQuery = "UPDATE `how_its_work_content` SET `title` = '$title', `content` = '$content' WHERE `id` ='$id'"; 
				$stmt = $conn->prepare($inserQuery);
				$stmt->execute();
							
				return $this->redirect($this->generateUrl('move_plus_administrator_howItsWorkContent'));
			}
		
		
        return $this->render('MovePlusAdministratorBundle:Page:edit_how_its_content.html.twig', array('contentQueryPages'=>$contentQueryPages,'patetitle'=>$patetitle));
    }
	/* ---------------------------edit  editHowItsWorkConten End  -------------------------------- */
	
	
	/* ************************* Price page Start ************************ */
    public function pricePageAction(Request $request)
    {
		$session = $this->getRequest()->getSession(); 	

		if($session->get('userId') && $session->get('userId') != '')					
			$userId = $session->get('userId');	
		else
			return $this->redirect( $this->generateUrl('move_plus_administrator_login') );

		$hostname = $this->getRequest()->getHost();
		$conn = $this->get('database_connection');

		$pQuery = 'SELECT * from pricepage ';
		$pricePage = $conn->fetchAll($pQuery);
		 //echo "<pre>"; print_r($pricePage); die;
		$patetitle = "Price Page";
		
        return $this->render('MovePlusAdministratorBundle:Page:price_page.html.twig', array('pricePage'=> $pricePage,'patetitle'=> $patetitle,));
    }
	/* ---------------------------Price page  End  -------------------------------- */
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/********************* Begin : Function to get the details of logged-in user **************************/
	
		public function getLoggedInUserDetailAction()
		{
			 $session = $this->getRequest()->getSession();    //check :- for enter dashoboard into the -// path without  login then it will not show
			if( $session->get('userId') && $session->get('userId') != '' )
				return true;
			else
				return false;
		}
	/*---------------- End : Function to get the details of logged-in user -----------------*/
		
		
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
