<?php

namespace MovePlus\ServiceBundle\Controller;

	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	
	use MovePlus\ServiceBundle\Entity\Services;            
	use MovePlus\ServiceBundle\Entity\User;           		 //User
	use MovePlus\ServiceBundle\Entity\Services2;            
	use MovePlus\ServiceBundle\Entity\AllService;            //AllService
	use MovePlus\ServiceBundle\Entity\SliderContent;           //SliderContent
	use MovePlus\ServiceBundle\Entity\CleaningMailform;           //CleaningMailform 
	use MovePlus\ServiceBundle\Entity\MailOption;           //MailOption 
	use MovePlus\ServiceBundle\Entity\Blog;          		 //blog 
	
	use Symfony\Component\HttpFoundation\Request;   
	use Symfony\Component\HttpFoundation\Response;


	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\FormBuilderInterface;	
	use Symfony\Component\HttpFoundation\Session\Session;
	use Symfony\Component\HttpFoundation\RedirectResponse;	
	
	use Symfony\Component\HttpFoundation\File\UploadedFile;


class ServiceController extends Controller
{
   
   
   public function searchAction(Request $request){
   
    $hostname = $this->getRequest()->getHost();
    $conn = $this->get('database_connection');
    $s = $_GET['s'];
    $perpage =50;
    
    if(isset($_GET['page']))
    {
    $cpage = $_GET['page'];
    $start =$perpage*$_GET['page'];
    $nextP= $cpage+1;
    $preP= $cpage-1;
    }else{
    $start =0;
    $nextP= 1;
    $preP= 0;
    }
    
    
    $squery1 = 'SELECT * FROM `services` WHERE title like "%'.$s.'%"' ;
    $spages1 = $conn->fetchAll($squery1);
    $stcount = $tcount+count($spages1);
    
    $countyquery1 = 'SELECT  * FROM `county_pages` WHERE title like "%'.$s.'%" or county like "%'.$s.'%"';
    $countypages1 = $conn->fetchAll($countyquery1);
    $countytcount = $tcount+count($countypages1);
  
    $cityquery1 = 'SELECT  * FROM `city_pages` WHERE title like "%'.$s.'%" or city like "%'.$s.'%"' ;
    $citypages1 = $conn->fetchAll($cityquery1);
    $citytcount = $tcount+count($citypages1);
   
    $tcount =  max($stcount, $countytcount, $citytcount);
    
    
    $squery = 'SELECT * FROM `services` WHERE title like "%'.$s.'%" LIMIT '.$start.' ,'.$perpage ;
    $spages = $conn->fetchAll($squery);
    
    $countyquery = 'SELECT  * FROM `county_pages` WHERE title like "%'.$s.'%" or county like "%'.$s.'%" LIMIT '.$start.' ,'.$perpage ;
    
    $countypages = $conn->fetchAll($countyquery);
    
    $cityquery = 'SELECT  * FROM `city_pages` WHERE title like "%'.$s.'%" or city like "%'.$s.'%" LIMIT '.$start.' ,'.$perpage ;
    $citypages = $conn->fetchAll($cityquery);
    //$testmonialDetail1 = $citypages[0];
	
	$servicepage = 'SELECT * FROM  `services` WHERE `slug` = "index" ' ; 
	$servicepages = $conn->fetchAll($servicepage);			
	$testmonialDetail = $servicepages[0];
			
			
    return $this->render('MovePlusServiceBundle:Page:searchresult.html.twig',array('testmonialDetail'=>$testmonialDetail,'pages'=>$spages,'countypages'=>$countypages,'citypages'=>$citypages,'tcount'=>$tcount,'perpage'=>$perpage,'nextP'=>$nextP,'preP'=>$preP,'s'=>$s));
   
   }
   
   public function getquoteform2Action($category, Request $request){
    $hostname = $this->getRequest()->getHost();
    $conn = $this->get('database_connection');
    $query = 'SELECT *  FROM `bform` WHERE '.$category;
    $quoteform = $conn->fetchAll($query);
    
    if (isset($_POST['submitform']))
		{
		
		$message = '<html><body>';
		
    foreach($_POST as $key => $value){
    if($key == 'email'){
    $fromemail = $value;
    }
    if(is_array($value)){
    $valuenew ='';
    foreach($value as $val){
    $valuenew .= $val.', ';
    }
    $value = $valuenew;
    }
       if($key != 'submitform'){
        $message .=  "<p><b>".ucwords(str_replace('_',' ',str_replace('-',' ',$key))).' : </b>'.$value.'</p>';
        }
    }
    $message .= '</body></html>';
    
    //$to = 'ramanb@browsewire.net'; //$quoteform['0']['email_to'];
    $to = $quoteform['0']['email_to'];
    $subject = $quoteform['0']['email_subject'];
    
    $headers = "From: " . strip_tags($fromemail) . "\r\n";
    $headers .= "Reply-To: ". strip_tags($fromemail) . "\r\n";
    $headers .= "CC: ".$quoteform['0']['email_cc']."\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    if(mail($to, $subject, $message, $headers)){
    return $this->render('MovePlusServiceBundle:Page:quoteform.html.twig',array('form'=>$quoteform[0],'sucessMessage'=>true));
    }else{
    return $this->render('MovePlusServiceBundle:Page:quoteform.html.twig',array('form'=>$quoteform[0]));
    }
    
		}else{
    return $this->render('MovePlusServiceBundle:Page:quoteform.html.twig',array('form'=>$quoteform[0]));
    }
    
    
      
   
   }
   
   
     /**************************** Begin : Function to Login the admin ********************************/	  
    public function loginAction( Request $request)
    {		
			$session = $this->getRequest()->getSession();		
			
			$userSession = $this->getLoggedInUserDetailAction();   
				if($userSession)
					return $this->redirect($this->generateUrl('service_index'));   // check end
					
						
			$em = $this->getDoctrine()->getEntityManager();
			$repository = $em->getRepository('MovePlusServiceBundle:User');
			
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
							return $this->redirect($this->generateUrl('service_index'));
					}
					else
					{	
						$this->get('session')->getFlashBag()->set('error', 'Invalid Email or Password');
						
					}
				}
				
			if($this->CleaningMailformss())	{
			$CleaningMailform =	$this->CleaningMailformss();
			}else{
			$CleaningMailform =	'';
			}
			
	$formdataMoving = '';	
	$formdataCleaning = '';	
	$formdataPacking ='';	
	
			
        return $this->render('MovePlusServiceBundle:Page:login.html.twig', array(	'formdataMoving'=>$formdataMoving,'formdataCleaning'=>$formdataCleaning,'formdataPacking'=>$formdataPacking, 'CleaningMailform' => $CleaningMailform));
    }
    /*------------------------------- End : Function to Login the admin ------------------------------*/
    
    	
    	
	/**************************** Begin : Function to Logout the admin ********************************/	  
		public function logoutAction()
		{			
			 $session = $this->getRequest()->getSession();
					$session->clear('foo');
					$session->remove('foo');
					unset($session);
						return $this->redirect($this->generateUrl('service_login'));
			
			return $this->render('MovePlusServiceBundle:Page:logout.html.twig');
		}
		/*------------------------------- End : Function to Logout the admin ------------------------------*/
		
   
   
   /**************************** Begin : Function to home page ********************************/		
    public function servicesAction(Request $request)
    {
		
		 		//$output = explode("/",$_SERVER['REDIRECT_URL']);
			//$last = end($output);
			
			$slug = 'empty';
		
			$userSession = $this->getLoggedInUserDetailAction();         //function name given below 
			$session = $this->getRequest()->getSession(); 	
			
			if($session->get('userId') && $session->get('userId') != '')					
				$userId = $session->get('userId');	
			//else
				//return $this->redirect( $this->generateUrl('service_login') );
			
						
			$repository = $this->getDoctrine()->getRepository('MovePlusServiceBundle:Services2');
			$allServices = $repository->findBy(array('parentId'=> NULL ));	
			
			
			$metaTitle = $allServices[0]->metaTitle ;  
			$metaKeyword = $allServices[0]->metaKeyword ;  	 	
			$metaDescription = $allServices[0]->metaDescription ; 
			
			 
			$repository = $this->getDoctrine()->getRepository('MovePlusServiceBundle:Services2');
			$allServiceDetails = $repository->findBy(array('parentId'=> NULL ));	
			
			//echo "<pre>"; print_r($allServiceDetails); die;
			
		 return $this->render('MovePlusServiceBundle:Page:all_services.html.twig' , array('allServices' => $allServices ,'metaTitle'=>$metaTitle,'metaKeyword' =>$metaKeyword,'metaDescription' =>$metaDescription,'allServiceDetails' =>$allServiceDetails,'slug'=>$slug));
   
    }
    /*------------------------------- End : Function to home page  ------------------------------*/
    
   
   /**************************** Begin : Function to index page ********************************/		
    public function homeAction(Request $request)
    {
	$slug = 'empty';
		
    return $this->render('MovePlusServiceBundle:Page:home.html.twig', array('slug' => $slug));
    
    }
    public function indexAction( Request $request)
    {
		
			$userSession = $this->getLoggedInUserDetailAction();         //function name given below 
			$session = $this->getRequest()->getSession(); 	
			
			if($session->get('userId') && $session->get('userId') != '')					
				$userId = $session->get('userId');	
			//else
				//return $this->redirect( $this->generateUrl('service_login') );
			
						
			$repository = $this->getDoctrine()->getRepository('MovePlusServiceBundle:Services2');
			$allServices = $repository->findBy(array('parentId'=> NULL ));	
			
					 
			$repository = $this->getDoctrine()->getRepository('MovePlusServiceBundle:Services2');
			$allServiceDetails = $repository->findBy(array('parentId'=> NULL ));	
			
			$em = $this->getDoctrine()->getEntityManager();
			$sliderBanner = $em->createQueryBuilder()
			->select('SliderContent')
			->from('MovePlusServiceBundle:SliderContent',  'SliderContent')
			->where('SliderContent.status =:status')
			->setParameter('status', 1)
			->addOrderBy('SliderContent.id', 'DESC')
			->setMaxResults(5)
			->getQuery()
			->getArrayResult(); 
			
			$em = $this->getDoctrine()->getEntityManager();
			$packingSliderBanner = $em->createQueryBuilder()
			->select('SliderContent')
			->from('MovePlusServiceBundle:SliderContent',  'SliderContent')
			->where('SliderContent.status =:status')
			->setParameter('status', 2)
			->addOrderBy('SliderContent.id', 'DESC')
			->setMaxResults(1)
			->getQuery()
			->getArrayResult(); 
				
			$CleaningMailform =	$this->CleaningMailformss();
			//echo "<pre>"; print_r($CleaningMailform); die;
			
			$conn = $this->get('database_connection');	
			$formdataMoving = $conn->fetchAll('SELECT * from bform where form_id = 1 ');	
			$formdataCleaning = $conn->fetchAll('SELECT * from bform where form_id = 2 ');	
			$formdataPacking = $conn->fetchAll('SELECT * from bform where form_id = 3 ');	
		
			$testmonial = $conn->fetchAll('SELECT * from testimonial where star_rating = 5 OR  star_rating = 4 ORDER BY id DESC ');
			
			$servicepage = 'SELECT * FROM  `services` WHERE `slug` = "index" ' ; 
			$servicepages = $conn->fetchAll($servicepage);			
			$testmonialDetail = $servicepages[0];
			$pageId = $servicepages[0]['id'];
		//echo "<pre>"; print_r($testmonialDetail);  die;
		
		$slug = 'empty';
		
		$session = $this->getRequest()->getSession(); 				
		if($session->get('userId') && $session->get('userId') != ''){
      $adminuserSession = $session->get('userId');
    }else{
    $adminuserSession = '';
    }
    
		return $this->render('MovePlusServiceBundle:Page:index.html.twig' , array('adminuserSession'=>$adminuserSession,'editslug'=>'edit-all-page/'.$pageId,'formdataMoving'=>$formdataMoving,'formdataCleaning'=>$formdataCleaning,'formdataPacking'=>$formdataPacking,'CleaningMailform'=>$CleaningMailform,'sliderBanner'=>$sliderBanner,'packingSliderBanner'=>$packingSliderBanner,'allServices' => $allServices ,'metaTitle'=>$metaTitle,'metaKeyword' =>$metaKeyword,'metaDescription' =>$metaDescription,'allServiceDetails' =>$allServiceDetails,'testmonial' =>$testmonial,'servicepages' =>$servicepages,'testmonialDetail' =>$testmonialDetail,'slug'=>$slug));
    }
    /*------------------------------- End : Function to index page  ------------------------------*/
    
    
     /**************************** Begin : Function to service ********************************/		
    public function contentAction($slug, Request $request)
    {	
	    
	     $conn = $this->get('database_connection');
  
       $contentbh = $conn->fetchAll('SELECT * from services where services.slug="'.$slug.'"');
		if(isset($contentbh[0])){
    $pageId = $contentbh[0]['id'];
			$em = $this->getDoctrine()->getEntityManager();
			$content = $em->createQueryBuilder()->select('Services')
				->from('MovePlusServiceBundle:Services', 'Services')
				->where('Services.slug = :slug')
				->setParameter('slug', $slug)
				->getQuery()
				->getSingleResult();	
			
			
			if($this->CleaningMailformss())	{
			$CleaningMailform =	$this->CleaningMailformss();
			}
			else{
			$CleaningMailform =	'';
			}
			$template = $content->template;
			if($content->catagory != '' || $content->catagory == $content->slug){
			  $catagory = $content->catagory;
			  }else{
			  if($content->slug == 'moving' || $content->slug == 'cleaning ' ||$content->slug == 'packing' ){
			  $catagory = $content->slug;
			  }else{
			  $catagory ='';
			  }
      }
			
			
			
			//echo "<pre>"; print_r($content->catagory); 
			//echo "<pre>"; print_r($content);  die; 
  	$conn = $this->get('database_connection');
    $countyQuery = 'SELECT * from county_pages where county_pages.service_slug="'.$slug.'" LIMIT 0, 36';
    $countyPages = $conn->fetchAll($countyQuery);
   		
		
    //$movingRelatedSerices = 'SELECT * from services where catagory = "'.$catagory.'" AND (parent_id = 6 OR parent_id = 7 OR parent_id = 8 )'; 
    $movingRelatedSerices = 'SELECT * from services where catagory = "'.$catagory.'" '; 
    $movingSericesRecords = $conn->fetchAll($movingRelatedSerices);
	
	  $session = $this->getRequest()->getSession(); 				
		if($session->get('userId') && $session->get('userId') != ''){
      $adminuserSession = $session->get('userId');
    }else{
    $adminuserSession = '';
    }
    return $this->render('MovePlusServiceBundle:Service:'.$template.'.html.twig' , array('adminuserSession'=>$adminuserSession,'editslug'=>'edit-all-page/'.$pageId,'catagory'=>$catagory,'content'=>$content,'slug'=>$slug,'CleaningMailform'=>$CleaningMailform,'countyPages'=>$countyPages,'movingSericesRecords'=> $movingSericesRecords));
    
	 
	  
	 }else{
   return $this->render('MovePlusServiceBundle:Page:404.html.twig' ,  array('formdata'=>$formdata[0],'slug'=>$slug,'CleaningMailform'=>$CleaningMailform,'countyPages'=>$countyPages,'movingSericesRecords'=> $movingSericesRecords));  
	
   }
    }
  
     /*------------------------------- End : Function to service page  ------------------------------*/
    
	
    /**************************** Begin : Function to city ********************************/		
    public function countycitypageAction($service_slug, $county_slug,$city_slug,  Request $request)
    {		
	
    $conn = $this->get('database_connection');
    $pageQuery = 'SELECT * from city_pages where city_pages.county_slug="'.$county_slug.'" and  city_pages.city_slug="'.$city_slug.'" and city_pages.service_slug="'.$service_slug.'"';
    $content = $conn->fetchAll($pageQuery);
    $template = $content[0]['template'];
    $pageId = $content[0]['id'];
    //print_r($content);die;
	
	  $catagory = 	$content[0]['catagory'];	
	  $movingRelatedSerices = 'SELECT * from services where catagory= "'.$catagory.'"';
    $movingSericesRecords = $conn->fetchAll($movingRelatedSerices);
	
	 $formdata = $conn->fetchAll('SELECT * from bform where bform.catagory= "'.$catagory.'"');			
	
   	$session = $this->getRequest()->getSession(); 				
		if($session->get('userId') && $session->get('userId') != ''){
      $adminuserSession = $session->get('userId');
    }else{
    $adminuserSession = '';
    }
    			
   if(isset($content[0])){
   return $this->render('MovePlusServiceBundle:City:'.$template.'-citypages.html.twig' , array('adminuserSession'=>$adminuserSession,'editslug'=>'edit-city-page/'.$pageId,'formdataMoving'=>$formdataMoving,'formdataCleaning'=>$formdataCleaning,'formdataPacking'=>$formdataPacking, 'formdata'=>$formdata[0],'content' =>$content[0],'movingSericesRecords'=> $movingSericesRecords));  
	
   }else{
   return $this->render('MovePlusServiceBundle:Page:404.html.twig' , array('formdataMoving'=>$formdataMoving,'formdataCleaning'=>$formdataCleaning,'formdataPacking'=>$formdataPacking, 'formdata'=>$formdata[0],'movingSericesRecords'=> $movingSericesRecords));  
	
   }
		
	}
		
		
	/**************************** Begin : Function to county ********************************/		
    public function countypageAction($county_slug,$service_slug, Request $request)
    {	
	
	 
	  //print_r($service_slug);;
			
    $conn = $this->get('database_connection');
  
    $content = $conn->fetchAll('SELECT * from county_pages where county_pages.county_slug="'.$county_slug.'" and county_pages.service_slug="'.$service_slug.'"');
    $template = $content[0]['template'];
	  $pageId = $content[0]['id'];
	  $catagory = 	$content[0]['catagory'];	
	  $movingRelatedSerices = 'SELECT * from services where catagory= "'.$catagory.'"';
    $movingSericesRecords = $conn->fetchAll($movingRelatedSerices);
	
	
	  $formdata = $conn->fetchAll('SELECT * from bform where bform.catagory= "'.$catagory.'"');			
				
	
			$limit = 20; #item per page
			$start = 0;	
			 
			 $totalFetch = 'SELECT * from city_pages where city_pages.county_slug="'.$county_slug.'" and city_pages.service_slug="'.$service_slug.'"';
		    $cityPagesCount = $conn->prepare($totalFetch);
						$cityPagesCount->execute();
						$cityPagesCount->fetchAll();
			$total= 	$cityPagesCount->rowCount();
			$cityQuery = "SELECT * from city_pages where city_pages.county_slug= '$county_slug' and city_pages.service_slug= '$service_slug' LIMIT ".$start." ,".$limit;
				
		  $cityPages = $conn->fetchAll($cityQuery);
		$session = $this->getRequest()->getSession(); 				
		if($session->get('userId') && $session->get('userId') != ''){
      $adminuserSession = $session->get('userId');
    }else{
    $adminuserSession = '';
    }
    	
		if(isset($content[0])){
	   return $this->render('MovePlusServiceBundle:County:'.$template.'-countypages.html.twig' , array('adminuserSession'=>$adminuserSession,'editslug'=>'edit-county-page/'.$pageId,'limit'=>$limit,'start'=>$start,'formdataMoving'=>$formdataMoving,'formdataCleaning'=>$formdataCleaning,'formdataPacking'=>$formdataPacking,'formdata'=>$formdata[0],'content' =>$content[0],'cityPages'=>$cityPages,'movingSericesRecords'=> $movingSericesRecords));  
     }else{
     return $this->render('MovePlusServiceBundle:Page:404.html.twig' ,  array('formdataMoving'=>$formdataMoving,'formdataCleaning'=>$formdataCleaning,'formdataPacking'=>$formdataPacking,'formdata'=>$formdata[0],'cityPages'=>$cityPages,'next'=>$next,'movingSericesRecords'=> $movingSericesRecords));  
	
   }
   
     //return $this->render('MovePlusServiceBundle:Page:countypages.html.twig' , array('formdata'=>$formdata[0],'content' =>$content[0],'cityPages'=>$cityPages,'next'=>$next,'movingSericesRecords'=> $movingSericesRecords));  
		
    }
     /*------------------------------- End : Function to county  ------------------------------*/
    
	public function loadcityAction($county_slug,$service_slug,$start, Request $request){
  
  $conn = $this->get('database_connection');
  $limit = 20; #item per page
	$cityQuery = "SELECT * from city_pages where city_pages.county_slug= '$county_slug' and city_pages.service_slug= '$service_slug' LIMIT ".$start." ,".$limit;
	$cityPages = $conn->fetchAll($cityQuery);
   
   return $this->render('MovePlusServiceBundle:Page:loadcitypages.html.twig' ,  array('cityPages'=>$cityPages));		
  
  }
	/**************************** Begin : Function to county ********************************/		
    public function regionAreaAction($regionArea,$county,$slug, Request $request)
    {	
	
	/* 	$output = explode("/",$_SERVER['REDIRECT_URL']);		
		$SecondLast = $output[2]; 
		$last = $output[3];  //echo "<pre>"; print_r($last1);
	 */

	
			$em = $this->getDoctrine()->getEntityManager();
			$regionAreaDetails = $em->createQueryBuilder()->select('Services2')
				->from('MovePlusServiceBundle:Services2', 'Services2')
				->where('Services2.slug = :slug')
				->setParameter('slug', $slug)		
				->andWhere('Services2.county = :county')
				->setParameter('county', $county)		
				->andWhere('Services2.regionArea = :regionArea')
				->setParameter('regionArea', $regionArea)
				->getQuery()
				->getArrayResult();
				
				
			$regionAreaId = $regionAreaDetails[0]['id'] ; 
			
			$em = $this->getDoctrine()->getEntityManager();
			$cityListByRegionParentId = $em->createQueryBuilder()->select('Services2')
				->from('MovePlusServiceBundle:Services2', 'Services2')
				->where('Services2.parentId = :parentId')
				->setParameter('parentId', $regionAreaId)
				->getQuery()
				->getArrayResult();
				
			$title = $regionAreaDetails[0]['title'] ; 	
			$slug = $regionAreaDetails[0]['slug'] ; 	
			$county = $regionAreaDetails[0]['county'] ; 	
			$regionArea = $regionAreaDetails[0]['regionArea'] ; 	
			
			$metaTitle = $regionAreaDetails[0]['metaTitle'] ;  	
			$metaKeyword = $regionAreaDetails[0]['metaKeyword'] ;  	
			$metaDescription = $regionAreaDetails[0]['metaDescription'] ;  	
			$shortDescription = $regionAreaDetails[0]['shortDescription'] ;  
			
			$repository = $this->getDoctrine()->getRepository('MovePlusServiceBundle:Services2');
			$allServiceDetails = $repository->findBy(array('parentId'=> NULL ));
			
			//echo "<pre>"; print_r($cityListByRegionParentId); die();	
			
        return $this->render('MovePlusServiceBundle:Page:region_area.html.twig' , array('title' =>$title, 'metaTitle' =>$metaTitle, 'metaDescription' =>$metaDescription, 'shortDescription' =>$shortDescription, 'metaKeyword' =>$metaKeyword, 'county' => $county, 'regionArea' => $regionArea,'regionAreaDetails'=>$regionAreaDetails,'allServiceDetails' =>$allServiceDetails,'cityListByRegionParentId' =>$cityListByRegionParentId,'slug' =>$slug ));
    }
     /*------------------------------- End : Function to county  ------------------------------*/
    
	
	  /**************************** Begin : Function to city ********************************/		
    public function cityAction($title,$county,$regionArea,$city, Request $request)
    {		
		/* $output = explode("/",$_SERVER['REDIRECT_URL']);		
		$SecondLast = $output[2]; 
		$last = $output[3];  //echo "<pre>"; print_r($last1);
	 */
	
			$em = $this->getDoctrine()->getEntityManager();
			$cities = $em->createQueryBuilder()->select('Services2')
				->from('MovePlusServiceBundle:Services2', 'Services2')
				->where('Services2.title = :title')
				->setParameter('title', $title)		
				->andWhere('Services2.county = :county')
				->setParameter('county', $county)		
				->andWhere('Services2.regionArea = :regionArea')
				->setParameter('regionArea', $regionArea)	
				->andWhere('Services2.city = :city')
				->setParameter('city', $city)
				->getQuery()
				->getArrayResult();
				
			$citiesId = $cities[0]['id'] ; 
			 	
			$em = $this->getDoctrine()->getEntityManager();
			 $postcodeListBycityParentId = $em->createQueryBuilder()->select('Services2')
				->from('MovePlusServiceBundle:Services2', 'Services2')
				->where('Services2.parentId = :parentId')
				->setParameter('parentId', $citiesId)
				->getQuery()
				->getArrayResult(); 
				
			$title = $cities[0]['title'] ; 	   //echo "<pre>"; print_r($title); die();	
			$county = $cities[0]['county'] ; 	
			$regionArea = $cities[0]['regionArea'] ; 	
			$city = $cities[0]['city'] ; 	
			
			$metaTitle = $cities[0]['metaTitle'] ;  	
			$metaKeyword = $cities[0]['metaKeyword'] ;  	
			$metaDescription = $cities[0]['metaDescription'] ;  	
			$shortDescription = $cities[0]['shortDescription'] ;  
			
			$repository = $this->getDoctrine()->getRepository('MovePlusServiceBundle:Services2');
			$allServiceDetails = $repository->findBy(array('parentId'=> NULL ));
			
        return $this->render('MovePlusServiceBundle:Page:city.html.twig' , array('title' =>$title, 'metaTitle' =>$metaTitle, 'metaDescription' =>$metaDescription, 'shortDescription' =>$shortDescription, 'metaKeyword' =>$metaKeyword, 'county' => $county, 'cities' => $cities,'city'=>$city,'allServiceDetails' =>$allServiceDetails,'postcodeListBycityParentId' =>$postcodeListBycityParentId,));
    } 
    /*------------------------------- End : Function to city  ------------------------------*/
    
    
     /**************************** Begin : Function to service Edit Slug ********************************/	
    public function serviceEditSlugAction($slug, Request $request)
    { 
		
		// echo "<pre>"; print_r($slug); die;
		  
			$repository = $this->getDoctrine()->getRepository('MovePlusServiceBundle:Services');
			$allServicesDetail = $repository->findBy(array('slug'=> $slug));
			//echo "<pre>"; print_r($allServicesDetail); die;
			
			if($request->getMethod() == 'POST')
			{				
				$title = $request->get("title");  	
				$metaTitle = $request->get("metaTitle");
				$metaKeyword = $request->get("metaKeyword");
				$metaDescription = $request->get("metaDescription");	
				$bannerTitle = $request->get("bannerTitle");						
				$bannerSortDesc = $request->get("bannerSortDesc");
					
				$em = $this->getDoctrine()->getEntityManager();
				$confirmedSubscribe = $em->createQueryBuilder() 
				->select('Services')
				->update('MovePlusServiceBundle:Services',  'Services')
				->set('Services.title', ':title')
				->setParameter('title', $title)
				->set('Services.metaTitle', ':metaTitle')
				->setParameter('metaTitle', $metaTitle)
				->set('Services.metaKeyword', ':metaKeyword')
				->setParameter('metaKeyword', $metaKeyword)
				->set('Services.metaDescription', ':metaDescription')
				->setParameter('metaDescription', $metaDescription)				
				->set('Services.bannerTitle', ':bannerTitle')
				->setParameter('bannerTitle', $bannerTitle)
				->set('Services.bannerSortDesc', ':bannerSortDesc')
				->setParameter('bannerSortDesc', $bannerSortDesc)
				
				->where('Services	.slug = :slug')
				->setParameter('slug', $slug)
				->getQuery()
				->getResult();				 
				return $this->redirect($this->generateUrl('service_serviceEditSlug' , array('slug'=>$slug)));
				
		}
		if($this->CleaningMailformss())	{
		$CleaningMailform =	$this->CleaningMailformss();
		}else{
		$CleaningMailform =	'';
		}

		$formdataMoving = '';	
		$formdataCleaning = '';	
		$formdataPacking ='';	

		
        return $this->render('MovePlusServiceBundle:Page:services_edit_slug.html.twig' , array(	'formdataMoving'=>$formdataMoving,'formdataCleaning'=>$formdataCleaning,'formdataPacking'=>$formdataPacking, 'CleaningMailform' => $CleaningMailform ,'allServicesDetail' => $allServicesDetail ,'slug'=>$slug));
    }
     /*------------------------------- End : Function to service Edit Slug   ------------------------------*/
      

    
    
     /**************************** Begin : Function to city Page ********************************/	
    public function cityPageAction(Request $request)
    {
		
		return $this->render('MovePlusServiceBundle:Page:city_page.html.twig');
    }
     /*------------------------------- End : Function to city Page  ------------------------------*/
   
    
     /**************************** Begin : Function to cityCleaningManAndVan Page ********************************/	
    public function cityCleaningManAndVanAction(Request $request)
    {
		$slug = 'empty';
		//Man and Van hire/city
		return $this->render('MovePlusServiceBundle:Page:city_cleaning_manAndVanHire.html.twig', array('slug'=>$slug));
    }
     /*------------------------------- End : Function to cityCleaningManAndVan Page  ------------------------------*/
         
     /**************************** Begin : Function to serviceManAndVan Page ********************************/	
    public function serviceManAndVanAction(Request $request)
    {
		$slug = 'empty';
		//Man and Van hire/city
		return $this->render('MovePlusServiceBundle:Page:service_Man_And_Van.html.twig', array('slug'=>$slug));
    }
     /*------------------------------- End : Function to serviceManAndVan Page  ------------------------------*/
     
   
     /**************************** Begin : Function to packing Page ********************************/	
    public function packingAction(Request $request)
    {
		$slug = 'empty';
		
		$em = $this->getDoctrine()->getEntityManager();
		$packingSliderBanner = $em->createQueryBuilder()
		->select('SliderContent')
		->from('MovePlusServiceBundle:SliderContent',  'SliderContent')
		->where('SliderContent.status =:status')
		->setParameter('status', 2)
		->addOrderBy('SliderContent.id', 'DESC')
		->setMaxResults(3)
		->getQuery()
		->getArrayResult(); 
		
			//echo "<pre>"; print_r($sliderBanner); die();
			
		return $this->render('MovePlusServiceBundle:Page:packing.html.twig', array('packingSliderBanner'=>$packingSliderBanner, 'slug'=>$slug));
    }
     /*------------------------------- End : Function to packing Page  ------------------------------*/
   
 
     /**************************** Begin : Function to moving Page ********************************/	
    public function staticAction(Request $request)
		{
			
			$session = $this->getRequest()->getSession(); 				
			if($session->get('userId') && $session->get('userId') != '')					
				$userId = $session->get('userId');	
			else
				return $this->redirect( $this->generateUrl('service_login') );
				
				if ($request->getMethod() == 'POST')
					{						
						$title = $request->get("title");  	
						$sortDesc = $request->get("sortDesc");
						$serviceLink = $request->get("serviceLink");
											
						 $basePath = $this->getBaseUrlAction(); 	
						
						$sliderImage = $_FILES['sliderImage']['name'];  
						$ranFeaturedImage = rand(1,10000);  

						   $targetFileLogo = $basePath."/".$this->container->getParameter('gbl_uploadPath_serviceHomeBannerImage').$ranFeaturedImage.$sliderImage;  
						
						move_uploaded_file($_FILES['sliderImage']['tmp_name'], $targetFileLogo);		
								
			
						$homeSliderBanner = new SliderContent();
						
						$homeSliderBanner->setTitle($title);   
						$homeSliderBanner->setSortDesc($sortDesc);
						$homeSliderBanner->setSliderImage($ranFeaturedImage.$sliderImage);
						$homeSliderBanner->setServiceLink($serviceLink);	
						$homeSliderBanner->setStatus('1');	
							
						$em = $this->getDoctrine()->getEntityManager();
						$em->persist($homeSliderBanner);
						$em->flush();
					
						return $this->redirect($this->generateUrl('move_plus_service_static'));  // redirect the page
				
					} 			  	
		
		$slug = 'empty';
		
		return $this->render('MovePlusServiceBundle:Page:static.html.twig', array('slug'=>$slug));
    }
     /*------------------------------- End : Function to moving Page  ------------------------------*/
   
   
    
     /**************************** Begin : Function to packing Slider Page ********************************/	
    public function packingBannerAction(Request $request)
		{
			
			$session = $this->getRequest()->getSession(); 				
			if($session->get('userId') && $session->get('userId') != '')					
				$userId = $session->get('userId');	
			else
				return $this->redirect( $this->generateUrl('service_login') );
				
				if ($request->getMethod() == 'POST')
					{						
						$title = $request->get("title");  	
						$sortDesc = $request->get("sortDesc");
											
						$basePath = $this->getBaseUrlAction(); 	
						$sliderImage = $_FILES['sliderImage']['name'];  
						$ranFeaturedImage = rand(1,10000);  

						$targetFileLogo = $basePath."/".$this->container->getParameter('gbl_uploadPath_servicePackingBannerImage').$ranFeaturedImage.$sliderImage;
						move_uploaded_file($_FILES['sliderImage']['tmp_name'], $targetFileLogo);		
								
			
						$packingSliderBanner = new SliderContent();
						
						$packingSliderBanner->setTitle($title);   
						$packingSliderBanner->setSortDesc($sortDesc);
						$packingSliderBanner->setSliderImage($ranFeaturedImage.$sliderImage);
						$packingSliderBanner->setStatus('2');	
							
						$em = $this->getDoctrine()->getEntityManager();
						$em->persist($packingSliderBanner);
						$em->flush();
					
						return $this->redirect($this->generateUrl('move_plus_service_static'));  // redirect the page
							
					} 
		
		$slug = 'empty';
		
		return $this->render('MovePlusServiceBundle:Page:packing_banner.html.twig', array('slug'=>$slug));
    }
     /*------------------------------- End : Function to packing Slider  Page  ------------------------------*/
   
       
     /**************************** Begin : Function to moving Slider Page ********************************/	
    public function movingBannerAction(Request $request)
		{
			
			$session = $this->getRequest()->getSession(); 				
			if($session->get('userId') && $session->get('userId') != '')					
				$userId = $session->get('userId');	
			else
				return $this->redirect( $this->generateUrl('service_login') );
				
				if ($request->getMethod() == 'POST')
					{						
						$title = $request->get("title");  	
						$sortDesc = $request->get("sortDesc");
											
						$basePath = $this->getBaseUrlAction(); 	
						$sliderImage = $_FILES['sliderImage']['name'];  
						$ranFeaturedImage = rand(1,10000);  

						$targetFileLogo = $basePath."/".$this->container->getParameter('gbl_uploadPath_serviceMovingBannerImage').$ranFeaturedImage.$sliderImage;
						move_uploaded_file($_FILES['sliderImage']['tmp_name'], $targetFileLogo);		
								
			
						$movingSliderBanner = new SliderContent();
						
						$movingSliderBanner->setTitle($title);   
						$movingSliderBanner->setSortDesc($sortDesc);
						$movingSliderBanner->setSliderImage($ranFeaturedImage.$sliderImage);
						$movingSliderBanner->setStatus('3');	
							
						$em = $this->getDoctrine()->getEntityManager();
						$em->persist($movingSliderBanner);
						$em->flush();
					
						return $this->redirect($this->generateUrl('move_plus_service_static'));  // redirect the page
							
					} 
		
		$slug = 'empty';
		
		return $this->render('MovePlusServiceBundle:Page:moving_banner.html.twig', array('slug'=>$slug));
    }
     /*------------------------------- End : Function to moving Slider  Page  ------------------------------*/
   
   
        /**************************** Begin : Function to moving Slider Page *******************************	
    public function serviceCityCleaningManAction(Request $request)
		{
			
		
						
			
		$slug = 'empty';
		
		return $this->render('MovePlusServiceBundle:Page:service_city_cleaning_manandvan.html.twig', array('slug'=>$slug));
    } 
     /*------------------------------- End : Function to moving Slider  Page  ------------------------------*/
   
   
   
          
     /**************************** Begin : Function to Book Cleaning Page ********************************/	
    public function emailCleaningFormAction(Request $request)
	{
			$slug = 'empty';
			
			if ($request->getMethod() == 'POST')
				{
				 	$fieldTitle = $request->get("fieldTitle");  
				 	$attrType = $request->get("attrType");  
				 	$textbox = $request->get("textbox");  
				 	$tags = $request->get("tags");  
			
					
					$addCleaningForm = new CleaningMailform();
						
						$addCleaningForm->setTitle($fieldTitle);   
						$addCleaningForm->setAttrType($attrType);   
						$addCleaningForm->setFieldName($textbox);   
						$addCleaningForm->setAttrOption($tags);   
					
						$em = $this->getDoctrine()->getEntityManager();
						$em->persist($addCleaningForm);
						$em->flush();
						
					 $addCleaningFormId = $addCleaningForm->getId();
					
							$em = $this->getDoctrine()->getEntityManager();
							$SelectCleaningMailform = $em->createQueryBuilder()
							->select('SelectCleaningMailform')
							->from('MovePlusServiceBundle:CleaningMailform',  'SelectCleaningMailform')
							->where('SelectCleaningMailform.id =:id')
							->setParameter('id', $addCleaningFormId)
							->getQuery()
							->getSingleResult();
								
							
					$id = $SelectCleaningMailform->id;
					$fieldName = $SelectCleaningMailform->fieldName;
					$attrOption = $SelectCleaningMailform->attrOption;
					
						if($fieldName != ''){
						
							$titleSel = $SelectCleaningMailform->title;
							$fieldTitleAppend ='<label>'.$titleSel.' :</label>';
						
							$fieldNameAppend	='<input type="text" name="'.$titleSel.'Cleaning'.$id.'" id="'.$titleSel.'Cleaning'.$id.'" class="inputFields">';	
							$em = $this->getDoctrine()->getEntityManager();
							$updateCleaningMailform = $em->createQueryBuilder() 
							->select('updateCleaningMailform')
							->update('MovePlusServiceBundle:CleaningMailform',  'updateCleaningMailform')
							->set('updateCleaningMailform.title', ':title')
							->setParameter('title', $fieldTitleAppend)
							->set('updateCleaningMailform.fieldName', ':fieldName')
							->setParameter('fieldName', $fieldNameAppend)
						
							->where('updateCleaningMailform	.id = :id')
							->setParameter('id', $addCleaningFormId)
							->getQuery()
							->getResult();	
						
							return $this->redirect($this->generateUrl('service_email_cleaningForm')); 								
						}
						elseif($attrOption != ''){
						 	
							$split =	$attrOption; 	
							$myArray = explode(',', $split);
							$firstValue = 	$myArray[0];
							//echo "<pre>" ; print_r($myArray);						
							
							$strevalue = array();
 
						  foreach ($myArray as $value) {

							$fieldNameAppend    .='<input type="radio" name="'.$firstValue.'Cleaning'.$id.'"  value="'.$value.'Cleaning'.$id.'" id="'.$value.'Cleaning'.$id.'" class="inputFieldsRadio">'.$value.'<br>'; 

						  }
						//echo "<pre>" ;   print_r($fieldNameAppend);
						
							
							$titleSel = $SelectCleaningMailform->title;
							$fieldTitleAppend ='<label>'.$titleSel.' :</label>';
						
							//$fieldNameAppend	='<input type="text" name="'.$titleSel.'Cleaning'.$id.'" id="'.$titleSel.'Cleaning'.$id.'" class="inputFields">';	
							
							
							$em = $this->getDoctrine()->getEntityManager();							
							$updateCleaningMailform = $em->createQueryBuilder() 
							->select('updateCleaningMailform')
							->update('MovePlusServiceBundle:CleaningMailform',  'updateCleaningMailform')
							->set('updateCleaningMailform.title', ':title')
							->setParameter('title', $fieldTitleAppend)
							->set('updateCleaningMailform.fieldName', ':fieldName')
							->setParameter('fieldName', $fieldNameAppend)
						
							->where('updateCleaningMailform	.id = :id')
							->setParameter('id', $addCleaningFormId)
							->getQuery()
							->getResult();	 
						
						}	
				}
			$em = $this->getDoctrine()->getEntityManager();
			$CleaningMailformsPreview = $em->createQueryBuilder()
			->select('CleaningMailform')
			->from('MovePlusServiceBundle:CleaningMailform',  'CleaningMailform')
			->getQuery()
			->getArrayResult(); 	
				
				
			
			return $this->render('MovePlusServiceBundle:Page:email_cleaning_form.html.twig', array('slug'=>$slug,'CleaningMailformsPreview'=>$CleaningMailformsPreview));
  
    }
     /*------------------------------- End : Function to Book Cleaning  Page  ------------------------------*/
   
             
     /**************************** Begin : Function to Book Cleaning Page ********************************/	
    public function bookCleaningAction(Request $request)
		{
			
			$allVAlues = $_POST['allVAlues']; 
			$email_to = $_POST['email_to']; 
			$email_cc = $_POST['email_cc']; 
			$catagory = $_POST['catagory']; 
			//print_r($_POST); die;
			//echo $allVAlues ;
			 				   
						   
						$to = $email_to;
						//$to = 'abhinandank@ocodewire.com';
						$subject = 'Quate Request For '.$catagory.'';
						$txt=   '<div style="background:white;">
									<h1 style="color: #FC5F04;border: 2px solid;text-align: center;padding: 10px;"> Move Plus :- Book For '.$catagory.'  </h1>
									<table style="width:720px" cellpadding="40">
    <tbody>
	<tr style="background:white" bgcolor="white">
      <td style="padding: 0px 2px 2px 49px;" >
        <p style="color:grey;font-size:26px;font-weight:600;margin:0px 15px 15px 0;width:522px"><h2  style="color:grey;">Thanks for booking our Services </h2></p>
        <table style="border-collapse:collapse">
            <tbody><tr>             
              <td style="padding:10px 0 0">              
                <p style="color:#494848;font-size: 18px;font-weight:400;margin:10px 0 0;width:522px">
				By
                  <a href="#" style="color:#06c;text-decoration:none">'.$allVAlues.' </a>
                </p>
                  <p style="color:#494848;font-size:13px;font-style:italic;font-weight:400;line-height:20px;margin:20px 15px 15px 0;width:522px">                     
					Move Plus is dedicated to the safe packing of its customers assets, no matter how small or big the move is.
                  </p> 
				 <h4  style="color:grey;font-size:19px;font-weight:600;"> Comments:: </h4>
				  <p style="color:#494848;font-size:15px;font-style:italic;font-weight:bold;line-height:20px;margin:20px 15px 15px 0;width:522px"> '.$allVAlues.'
                  </p>
              </td>
            </tr>      
		<tr style="border-bottom-color:#e9e9e9;border-bottom-style:solid;border-bottom-width:1px">
              <td style="padding:0 0 20px"> Our Contact no.'.$allVAlues.' </td>
              <td style="padding:0 0 20px">
				<td style="padding:0 0 20px">	
				</td>
              </td>
            </tr>
        </tbody></table>
        <div style="margin-top:0px;padding-top:3px;text-align:center" align="center">
          <a href="#" style="background: #FC5F04;  border-radius: 2px; color: white; display: block; margin: 15px auto;
    padding: 10px 0;  text-decoration: none; width: 230px; font-size: 17px;" >I hope you will enjoy it !!!</a>
        </div>        
      </td>
    </tr>
  </tbody></table>
  </div>'; 
						
						//$headers = "From: webmaster@example.com" . "\r\n" ."CC: somebodyelse@example.com";
						//$headers = "From: webmaster@example.com" . "\r\n" ;
						$headers = 'MIME-Version: 1.0' . "\r\n";
						$headers .= 'Content-type:text/html;charset=UTF-8' . "\r\n";
						$headers .= 'From: <abhikalotra4075@gmail.com>' . "\r\n".
						'CC: '.$email_cc.'';
						$retval = mail($to,$subject,$txt,$headers);    					 
						if( $retval == true )
						{
						echo "mail sent" ;
						}else{
						echo "mail not sent" ;
						}		
	
		return new response('SUCCESS'); 
    }
     /*------------------------------- End : Function to Book Cleaning  Page  ------------------------------*/
   
   
   
   
   
   
     /**************************** Begin : Function to Book Moving Page ********************************/	
    public function bookMovingAction(Request $request) 
		{
			
			$firstNameMoving = $_POST['firstNameMoving']; 
			$lastNameMoving = $_POST['lastNameMoving']; 
			$emailMoving = $_POST['emailMoving']; 
			$commentMoving = $_POST['commentMoving']; 
			$mobileMoving = $_POST['mobileMoving']; 
			
			 
				/* $to = 'abhinandank@ocodewire.com';
						$subject = "Book For Cleaning";
						$txt=   'xzcxzcxz'; 
						$headers = "MIME-Version: 1.0" . "\r\n";
						$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
						$headers .= "From: <movePlus@help.com>" . "\r\n";
						 $retval = mail($to,$subject,$txt,$headers); //send mail      	
						if( $retval == true )
						   {
								echo "mail sent";
							}
						   else
						   {
							   echo "Message could not be sent...";
						   }	
					*/						   
						   
						$to = 'abhinandank@ocodewire.com';
						//$to = 'abhikalotra4075@gmail.com';
						$subject = "Book For Moving";
						$txt=   '<div style="background:white;">
									<h1 style="color: #FC5F04;border: 2px solid;text-align: center;padding: 10px;"> Move Plus :- Book For Moving </h1>
									<table style="width:720px" cellpadding="40">
    <tbody>
	<tr style="background:white" bgcolor="white">
      <td style="padding: 0px 2px 2px 49px;" >
        <p style="color:grey;font-size:26px;font-weight:600;margin:0px 15px 15px 0;width:522px"><h2  style="color:grey;">Thanks for booking our Services </h2></p>
        <table style="border-collapse:collapse">
            <tbody><tr>             
              <td style="padding:10px 0 0">              
                <p style="color:#494848;font-size: 18px;font-weight:400;margin:10px 0 0;width:522px">
				By
                  <a href="#" style="color:#06c;text-decoration:none">'.$firstNameMoving.'   '.$lastNameMoving.'</a>
                </p>
                  <p style="color:#494848;font-size:13px;font-style:italic;font-weight:400;line-height:20px;margin:20px 15px 15px 0;width:522px">                     
					Move Plus is dedicated to the safe Moving of its customers assets, no matter how small or big the move is.
                  </p> 
				 <h4  style="color:grey;font-size:19px;font-weight:600;"> Comments:: </h4>
				  <p style="color:#494848;font-size:15px;font-style:italic;font-weight:bold;line-height:20px;margin:20px 15px 15px 0;width:522px"> '.$commentMoving.'
                  </p>
              </td>
            </tr>      
		<tr style="border-bottom-color:#e9e9e9;border-bottom-style:solid;border-bottom-width:1px">
              <td style="padding:0 0 20px"> Our Contact no.'.$mobileMoving.' </td>
              <td style="padding:0 0 20px">
				<td style="padding:0 0 20px">	
				</td>
              </td>
            </tr>
        </tbody></table>
        <div style="margin-top:0px;padding-top:3px;text-align:center" align="center">
          <a href="#" style="background: #FC5F04;  border-radius: 2px; color: white; display: block; margin: 15px auto;
    padding: 10px 0;  text-decoration: none; width: 230px; font-size: 17px;" >I hope you will enjoy it !!!</a>
        </div>        
      </td>
    </tr>
  </tbody></table>
  </div>'; 
						
						//$headers = "From: webmaster@example.com" . "\r\n" ;
						$headers = 'MIME-Version: 1.0' . "\r\n";
						$headers .= 'Content-type:text/html;charset=UTF-8' . "\r\n";
						$headers .= 'From: <movePlus.support@gmail.com>' . "\r\n".
						'CC: '.$emailMoving.'';
						$retval = mail($to,$subject,$txt,$headers);    					 
						if( $retval == true )
						{
						echo "mail sent" ;
						}else{
						echo "mail not sent" ;
						}		
		
		return new response('SUCCESS');
    }
     /*------------------------------- End : Function to Book Moving  Page  ------------------------------*/
   
   
   
     /**************************** Begin : Function to Book Packing Page ********************************/	
    public function bookPackingAction(Request $request) 
		{
			
			 $firstNamePack = $_POST['firstNamePack'];  
			$lastNamePack = $_POST['lastNamePack']; 
			$emailPack = $_POST['emailPack']; 
			$commentPack = $_POST['commentPack']; 
			$mobilePack = $_POST['mobilePack']; 
			
			 
				/* $to = 'abhinandank@ocodewire.com';
						$subject = "Book For Cleaning";
						$txt=   'xzcxzcxz'; 
						$headers = "MIME-Version: 1.0" . "\r\n";
						$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
						$headers .= "From: <movePlus@help.com>" . "\r\n";
						 $retval = mail($to,$subject,$txt,$headers); //send mail      	
						if( $retval == true )
						   {
								echo "mail sent";
							}
						   else
						   {
							   echo "Message could not be sent...";
						   }	
					*/						   
						   
						$to = 'abhinandank@ocodewire.com';
						//$to = 'abhikalotra4075@gmail.com';
						$subject = "Book For Packing";
						$txt=   '<div style="background:white;">
									<h1 style="color: #FC5F04;border: 2px solid;text-align: center;padding: 10px;"> Move Plus :- Book For Packing  </h1>
									<table style="width:720px" cellpadding="40">
    <tbody>
	<tr style="background:white" bgcolor="white">
      <td style="padding: 0px 2px 2px 49px;" >
        <p style="color:grey;font-size:26px;font-weight:600;margin:0px 15px 15px 0;width:522px"><h2  style="color:grey;">Thanks for booking our Services </h2></p>
        <table style="border-collapse:collapse">
            <tbody><tr>             
              <td style="padding:10px 0 0">              
                <p style="color:#494848;font-size: 18px;font-weight:400;margin:10px 0 0;width:522px">
				By
                  <a href="#" style="color:#06c;text-decoration:none">'.$firstNamePack.'   '.$lastNamePack.'</a>
                </p>
                  <p style="color:#494848;font-size:13px;font-style:italic;font-weight:400;line-height:20px;margin:20px 15px 15px 0;width:522px">                     
					Move Plus is dedicated to the safe packing of its customers assets, no matter how small or big the move is.
                  </p> 
				 <h4  style="color:grey;font-size:19px;font-weight:600;"> Comments:: </h4>
				  <p style="color:#494848;font-size:15px;font-style:italic;font-weight:bold;line-height:20px;margin:20px 15px 15px 0;width:522px"> '.$commentPack.'
                  </p>
              </td>
            </tr>      
		<tr style="border-bottom-color:#e9e9e9;border-bottom-style:solid;border-bottom-width:1px">
              <td style="padding:0 0 20px"> Our Contact no.'.$mobilePack.' </td>
              <td style="padding:0 0 20px">
				<td style="padding:0 0 20px">	
				</td>
              </td>
            </tr>
        </tbody></table>
        <div style="margin-top:0px;padding-top:3px;text-align:center" align="center">
          <a href="#" style="background: #FC5F04;  border-radius: 2px; color: white; display: block; margin: 15px auto;
    padding: 10px 0;  text-decoration: none; width: 230px; font-size: 17px;" >I hope you will enjoy it !!!</a>
        </div>        
      </td>
    </tr>
  </tbody></table>
  </div>'; 
						
						//$headers = "From: webmaster@example.com" . "\r\n" ;
						$headers = 'MIME-Version: 1.0' . "\r\n";
						$headers .= 'Content-type:text/html;charset=UTF-8' . "\r\n";
						$headers .= 'From: <movePlus.support@gmail.com>' . "\r\n".
						'CC: '.$emailPack.'';
						$retval = mail($to,$subject,$txt,$headers);    					 
						if( $retval == true )
						{
						echo "mail sent" ;
						}else{
						echo "mail not sent" ;
						}		
		
		return new response('SUCCESS');
    }
     /*------------------------------- End : Function to Book Packing  Page  ------------------------------*/
   
   
      
   /**************************** Begin : Function to Add Blog Post ********************************/	
    public function addBlogPostAction( Request $request)
    { 
		
		$slug = 'empty';
		
		if ($request->getMethod() == 'POST')
			{						
				 $title = $request->get("title");  	
				 $sortDesc = $request->get("sortDesc");
				 $description = $request->get("area1"); 
				
				$basePath = $this->getBaseUrlAction(); 	
				$blogImage = $_FILES['blogImage']['name'];  
				$ranFeaturedImage = rand(1,10000);  

				$targetFileBlogImage = $basePath."/".$this->container->getParameter('gbl_uploadPath_serviceBlogImages').$ranFeaturedImage.$blogImage;
				move_uploaded_file($_FILES['blogImage']['tmp_name'], $targetFileBlogImage);		
				
				//gbl_uploadPath_serviceBlogImages
				
				$addBlogPost = new Blog();
				
				$addBlogPost->setTitle($title);   
				$addBlogPost->setSortDesc($sortDesc);
				$addBlogPost->setDescription($description);
				$addBlogPost->setImage($ranFeaturedImage.$blogImage);
				$addBlogPost->setStatus('1');	
					
				$em = $this->getDoctrine()->getEntityManager();
				$em->persist($addBlogPost);
				$em->flush();
				
				return $this->redirect($this->generateUrl('service_addBlogPost')); 		
			} 	
			
		if($this->CleaningMailformss())	{
			$CleaningMailform =	$this->CleaningMailformss();
			}else{
			$CleaningMailform =	'';
			}
		
        return $this->render('MovePlusServiceBundle:Page:add_blog_post.html.twig' , array('CleaningMailform' => $CleaningMailform ,'slug'=>$slug));
    }
     /*------------------------------- End : Function to Add Blog Post  ------------------------------*/
    
    
	/**************************** Begin : Function to Price Page ********************************/		
    public function pricePageAction($priceCatagory, Request $request)
    {		 
		$slug = 'empty';
			
		$conn = $this->get('database_connection');	
		$priceContent = $conn->fetchAll('SELECT * from pricepage where price_catagory = "'.$priceCatagory.'" ');	
		
		$formdataMoving = $conn->fetchAll('SELECT * from bform where form_id = 1 ');	
		$formdataCleaning = $conn->fetchAll('SELECT * from bform where form_id = 2 ');	
		$formdataPacking = $conn->fetchAll('SELECT * from bform where form_id = 3 ');	
				
		 return $this->render('MovePlusServiceBundle:Page:price_page.html.twig' , array('formdataMoving'=>$formdataMoving,'formdataCleaning'=>$formdataCleaning,'formdataPacking'=>$formdataPacking,'priceContent'=>$priceContent,  'slug'=>$slug));
   
    }
    /*------------------------------- End : Function to moving Price  ------------------------------*/
 

 /**************************** Begin : Function to moving Price ********************************/		
    public function movingPriceAction(Request $request)
    {
		$slug = 'empty';
		
		$conn = $this->get('database_connection');	
		$formdataMoving = $conn->fetchAll('SELECT * from bform where form_id = 1 ');	
		$formdataCleaning = $conn->fetchAll('SELECT * from bform where form_id = 2 ');	
		$formdataPacking = $conn->fetchAll('SELECT * from bform where form_id = 3 ');	
		
		$advsMoving = $conn->fetchAll('SELECT * from advertisement where status = 1 and catagory_id = 1 ORDER BY id DESC LIMIT 3');
		
		$advsMovingLeft[0] = $conn->fetchAll('SELECT * from advertisement where status = 1 and catagory_id = 1 ORDER BY id DESC LIMIT 1');
		$advsMovingRight[0] = $conn->fetchAll('SELECT * from advertisement where status = 1 and catagory_id = 1 ORDER BY id ASC LIMIT 1');
		
		
		 return $this->render('MovePlusServiceBundle:Page:price_moving.html.twig' , array('formdataMoving'=>$formdataMoving,'formdataCleaning'=>$formdataCleaning,'formdataPacking'=>$formdataPacking, 'advsMoving'=>$advsMoving,'advsMovingLeft'=>$advsMovingLeft[0], 'advsMovingRight'=>$advsMovingRight[0], 'slug'=>$slug));
   
    }
    /*------------------------------- End : Function to moving Price  ------------------------------*/
    
    
	/**************************** Begin : Function to cleaning Price ********************************/		
    public function cleaningPriceAction(Request $request)
    {
		$slug = 'empty';
		
		$conn = $this->get('database_connection');	
		$formdataMoving = $conn->fetchAll('SELECT * from bform where form_id = 1 ');	
		$formdataCleaning = $conn->fetchAll('SELECT * from bform where form_id = 2 ');	
		$formdataPacking = $conn->fetchAll('SELECT * from bform where form_id = 3 ');	
		
		$advsCleaning = $conn->fetchAll('SELECT * from advertisement where status = 1 and catagory_id = 2 ORDER BY id DESC LIMIT 3');
		
		$advsCleaningLeft[0] = $conn->fetchAll('SELECT * from advertisement where status = 1 and catagory_id = 2 ORDER BY id DESC LIMIT 1');
		$advsCleaningRight[0] = $conn->fetchAll('SELECT * from advertisement where status = 1 and catagory_id = 2 ORDER BY id ASC LIMIT 1');
		
		 return $this->render('MovePlusServiceBundle:Page:price_cleaning.html.twig' , array('formdataMoving'=>$formdataMoving,'formdataCleaning'=>$formdataCleaning,'formdataPacking'=>$formdataPacking,'advsCleaning'=>$advsCleaning,'advsCleaningLeft'=>$advsCleaningLeft[0], 'advsCleaningRight'=>$advsCleaningRight[0], 'slug'=>$slug));
   
    }
    /*------------------------------- End : Function to cleaning Price  ------------------------------*/
     
	 
	/**************************** Begin : Function to packing Price ********************************/		
    public function packingPriceAction(Request $request)
    {
		$slug = 'empty';
		
		$conn = $this->get('database_connection');	
		$formdataMoving = $conn->fetchAll('SELECT * from bform where form_id = 1 ');	
		$formdataCleaning = $conn->fetchAll('SELECT * from bform where form_id = 2 ');	
		$formdataPacking = $conn->fetchAll('SELECT * from bform where form_id = 3 ');	
		
		$advsPacking = $conn->fetchAll('SELECT * from advertisement where status = 1 and catagory_id = 3 ORDER BY id DESC LIMIT 3');
		
		$advsPackingLeft[0] = $conn->fetchAll('SELECT * from advertisement where status = 1 and catagory_id = 3 ORDER BY id DESC LIMIT 1');
		$advsPackingRight[0] = $conn->fetchAll('SELECT * from advertisement where status = 1 and catagory_id = 3 ORDER BY id ASC LIMIT 1');
		
		 return $this->render('MovePlusServiceBundle:Page:price_packing.html.twig' , array('formdataMoving'=>$formdataMoving,'formdataCleaning'=>$formdataCleaning,'formdataPacking'=>$formdataPacking,'advsPacking'=>$advsPacking,'advsPackingLeft'=>$advsPackingLeft[0], 'advsPackingRight'=>$advsPackingRight[0], 'slug'=>$slug));
   
    }
    /*------------------------------- End : Function to packing Price  ------------------------------*/
    
    
	/**************************** Begin : Function to packing Price ********************************/		
    public function termsAndConditionsAction(Request $request)
    {
			$conn = $this->get('database_connection');	
			$formdataMoving = $conn->fetchAll('SELECT * from bform where form_id = 1 ');	
			$formdataCleaning = $conn->fetchAll('SELECT * from bform where form_id = 2 ');	
			$formdataPacking = $conn->fetchAll('SELECT * from bform where form_id = 3 ');	
			$slug = 'empty';
			$movingSericesRecords = '';
			
				
		return $this->render('MovePlusServiceBundle:Page:terms_and_conditions.html.twig' , array('formdataMoving'=>$formdataMoving,'formdataCleaning'=>$formdataCleaning,'formdataPacking'=>$formdataPacking, 'movingSericesRecords'=> $movingSericesRecords,'slug'=>$slug)); 
   
    }
    /*------------------------------- End : Function to packing Price  ------------------------------*/
     
	 
	/**************************** Begin : Function to aboutus  ********************************/		
    public function aboutusAction(Request $request)
    {
			$conn = $this->get('database_connection');	
			$formdataMoving = $conn->fetchAll('SELECT * from bform where form_id = 1 ');	
			$formdataCleaning = $conn->fetchAll('SELECT * from bform where form_id = 2 ');	
			$formdataPacking = $conn->fetchAll('SELECT * from bform where form_id = 3 ');	
			$slug = 'empty';
			$movingSericesRecords = '';
			
				
		return $this->render('MovePlusServiceBundle:Page:about_us.html.twig' , array('formdataMoving'=>$formdataMoving,'formdataCleaning'=>$formdataCleaning,'formdataPacking'=>$formdataPacking, 'movingSericesRecords'=> $movingSericesRecords,'slug'=>$slug)); 
   
    }
    /*------------------------------- End : Function to aboutus   ------------------------------*/
    
	/**************************** Begin : Function to aboutus  ********************************/		
    public function contactusAction(Request $request)
    {
			$conn = $this->get('database_connection');	
			$formdataMoving = $conn->fetchAll('SELECT * from bform where form_id = 1 ');	
			$formdataCleaning = $conn->fetchAll('SELECT * from bform where form_id = 2 ');	
			$formdataPacking = $conn->fetchAll('SELECT * from bform where form_id = 3 ');	
			$slug = 'empty';
			$movingSericesRecords = '';
			
				
		return $this->render('MovePlusServiceBundle:Page:contact_us.html.twig' , array('formdataMoving'=>$formdataMoving,'formdataCleaning'=>$formdataCleaning,'formdataPacking'=>$formdataPacking, 'movingSericesRecords'=> $movingSericesRecords,'slug'=>$slug)); 
   
    }
    /*------------------------------- End : Function to aboutus   ------------------------------*/
       
	   
	/**************************** Begin : Function to  testmonialView  ********************************/		
    public function testmonialViewAction(Request $request)
    {
	
			$conn = $this->get('database_connection');	
			$testmonialView = $conn->fetchAll('SELECT * from testimonial where star_rating = 5 OR  star_rating = 4 ORDER BY id DESC ');
			$testmonialTitleName = 'Testmonial';
			
			$servicepage = 'SELECT * FROM  `services` WHERE `slug` = "index" ' ; 
			$servicepages = $conn->fetchAll($servicepage);			
			$testmonialDetail = $servicepages[0];
			
				//echo "<pre>";print_r($testmonialDetail); die;
				
		return $this->render('MovePlusServiceBundle:Page:testmonial_view.html.twig' , array('testmonialTitleName'=>$testmonialTitleName,'testmonialView'=>$testmonialView,'testmonialDetail'=>$testmonialDetail)); 
		
   
    }
    /*------------------------------- End : Function to  testmonialView   ------------------------------*/
    
      
	/**************************** Begin : Function to 404 Error  ********************************/		
    public function Error404Action(Request $request)
    {
		//echo "<pre>";print_r("ffgfdg"); die;	
		return $this->render('MovePlusServiceBundle:Page:error_404.html.twig' ); 
   
    }
    /*------------------------------- End : Function to aboutus   ------------------------------*/
    
   
    
    
     /**************************** Begin : Function to service Edit Slug ********************************/	
    public function searchCityNameAction( Request $request)
    {
		$statusHtml = '';
		
		 $cityName = $_POST['cityName'];
			
			//echo $cityName; die;
	
			$em = $this->getDoctrine()->getEntityManager();				
			$arrServiceCity= $em->createQueryBuilder()
				->select('Services2')
				->from('MovePlusServiceBundle:Services2',  'Services2')		
				->where('Services2.city LIKE :city')
				->setParameter('city', $cityName['city'].'%')		 
				->getQuery()
				->getArrayResult();
			
			
				foreach($arrServiceCity as $serviceCity)
					{
						$statusHtml.='<span class="getCityResult"  id="'.$serviceCity['id'].'" onclick="javascript:selectCityInput('.$serviceCity['id'].', \''.$serviceCity['city'].'\');">'.$serviceCity['id'].'  '.$serviceCity['city'].'</span></br>';
						
				//	$statusHtml.='<span class="getCityResult">'.$arrServiceCity['city'].'</span>'; 
					}
			 
		return new response($statusHtml);
    }
     /*------------------------------- End : Function to service Edit Slug   ------------------------------*/
   
   
   
   
    
 
    
    
    
    
    	
		/***************** Begin : Function to get the details of logged-in user ********************************/
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
			//$baseUrl = "http://".$_SERVER['HTTP_HOST'].$this->get('request')->getBaseUrl();
			$baseUrl  = $_SERVER["DOCUMENT_ROOT"];
			return $baseUrl;
		}
    
		
		public function CleaningMailformss()
		{
			$em = $this->getDoctrine()->getEntityManager();
			$CleaningMailforms = $em->createQueryBuilder()
			->select('CleaningMailform')
			->from('MovePlusServiceBundle:CleaningMailform',  'CleaningMailform')
			->getQuery()
			->getArrayResult(); 
			
			//echo "<pre>";print_r($CleaningMailform); die;
			return $CleaningMailforms;
		}
    
    
	
}
