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
	
	use Symfony\Component\HttpFoundation\Request;   
	use Symfony\Component\HttpFoundation\Response;


	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\FormBuilderInterface;	
	use Symfony\Component\HttpFoundation\Session\Session;
	use Symfony\Component\HttpFoundation\RedirectResponse;	
	
	use Symfony\Component\HttpFoundation\File\UploadedFile;

class DefaultController extends Controller
{
    
    public function gettestimonialAction(Request $request){
    $hostname = $this->getRequest()->getHost();
		$conn = $this->get('database_connection');
		
    $testmonial = $conn->fetchAll('SELECT * from testimonial where star_rating = 5 OR  star_rating = 4 ORDER BY id DESC ');
    
    return $this->render('MovePlusServiceBundle:Default:testimonial.html.twig',array('testimonial'=>$testmonial));
    
    }
    
    public function headersectionAction(Request $request){
    
    $hostname = $this->getRequest()->getHost();
		$conn = $this->get('database_connection');
			
		         //function name given below 
						
				
				
    $settingsQuery = "SELECT * from settings WHERE id =1";
		$settings = $conn->fetchAll($settingsQuery);
		
		$hmenuQuery = "SELECT * from sitemenu WHERE menu_type ='header' and parent_id =0 or parent_id  IS NULL  ORDER BY order_no ASC";
		$hmenu = $conn->fetchAll($hmenuQuery);
		
		return $this->render('MovePlusServiceBundle:Default:headersection.html.twig',array('adminuserSession'=>$adminuserSession,'settings'=>$settings[0],'hmenu'=>$hmenu));
		  
    }
    
    public function childmenuAction($parentid , Request $request){
    $hostname = $this->getRequest()->getHost();
		$conn = $this->get('database_connection');
    
    $cmenuQuery = "SELECT * from sitemenu WHERE menu_type ='header' and parent_id =".$parentid." ORDER BY order_no ASC";
		$cmenu = $conn->fetchAll($cmenuQuery);
    
    return $this->render('MovePlusServiceBundle:Default:childmenu.html.twig',array('cmenu'=>$cmenu));
    }
    
    public function footersectionAction(Request $request){
    
    $hostname = $this->getRequest()->getHost();
		$conn = $this->get('database_connection');
			
    $settingsQuery = "SELECT * from settings WHERE id =1";
		$settings = $conn->fetchAll($settingsQuery);
		
		$fmenuQuery = "SELECT * from sitemenu WHERE menu_type ='footer' ORDER BY order_no ASC";
		$fmenu = $conn->fetchAll($fmenuQuery);
		return $this->render('MovePlusServiceBundle:Default:footersection.html.twig',array('settings'=>$settings[0],'fmenu'=>$fmenu));
		  
    }
    
    public function analyticcodeAction(Request $request){
    
    $hostname = $this->getRequest()->getHost();
		$conn = $this->get('database_connection');
			
    $settingsQuery = "SELECT * from settings WHERE id =1";
		$settings = $conn->fetchAll($settingsQuery);
		return $this->render('MovePlusServiceBundle:Default:analyticcode.html.twig',array('settings'=>$settings[0]));
		  
    }
    
    public function socialiconAction(Request $request){
    
    $hostname = $this->getRequest()->getHost();
		$conn = $this->get('database_connection');
			
    $settingsQuery = "SELECT * from settings WHERE id =1";
		$settings = $conn->fetchAll($settingsQuery);
		return $this->render('MovePlusServiceBundle:Default:socialicon.html.twig',array('settings'=>$settings[0]));
		  
    }
    
    
    
    public function indexAction($name)
    {
        return $this->render('MovePlusServiceBundle:Default:index.html.twig', array('name' => $name));
    }
    
    
    function the_excerpt_max_charlength($excerpt,$charlength) {
	
    	$charlength++;
      $return = '';
    	if ( mb_strlen( $excerpt ) > $charlength ) {
    		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
    		$exwords = explode( ' ', $subex );
    		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
    		if ( $excut < 0 ) {
    			$return =  mb_substr( $subex, 0, $excut );
    		} else {
    			$return  = $subex;
    		}
    		
    	} else {
    		$return = $excerpt;
    	}
    	
    	return $return;
    }

    	
    public function recentpostCombinedAction($catagory, Request $request){

    require_once('blog/wp-blog-header.php');
    require_once('blog/wp-includes/link-template.php');
    
	if($catagory !='')
	{
		$args = array(  'posts_per_page' => 3, 'category_name' => $catagory );
	}
	else
	{
		
		$args = array(  'posts_per_page' => 3);
	}	
	
    $mypostsMov = get_posts( $args );  
	//echo "<pre>"; print_r($mypostsMov); die;
	
    $mypostsarrayMov = array();
    $i=0;
    foreach ( $mypostsMov as $post ) : 
      $excerpt = preg_replace("/<img[^>]+\>/i", "", $post->post_content);
      $mypostsarrayMov[$i]['title'] = $post->ID;
      $mypostsarrayMov[$i]['post_title'] = strip_tags($post->post_title);
      $mypostsarrayMov[$i]['excerpt'] = strip_tags($this->the_excerpt_max_charlength($excerpt, 250));
      $mypostsarrayMov[$i]['permalink'] = get_permalink($post->ID);
      $mypostsarrayMov[$i]['thumbnail'] =get_the_post_thumbnail($post->ID,array( 300, 200));
      $i++;
    endforeach; 
    wp_reset_postdata();
	
	//echo "<pre>"; print_r($mypostsarrayMov); die;
	
    return $this->render('MovePlusServiceBundle:Default:recentpostCombined.html.twig',array('mypostsMov'=>$mypostsarrayMov, ));  
    }

	
    public function footerSide1MovingAction( Request $request){
	
	$conn = $this->get('database_connection');   
	$footerSide1Moving = 'SELECT * from services where parent_id = 6 limit 0,6'; 
	$footerSide1MovingRecords = $conn->fetchAll($footerSide1Moving);	
	
	$footerSide2Moving = 'SELECT * from services where parent_id = 6 limit 6,15'; 
	$footerSide2MovingRecords = $conn->fetchAll($footerSide2Moving);
	
	$footerSide3Cleaning = 'SELECT * from services where parent_id = 8 '; 
	$footerSide3CleaningRecords = $conn->fetchAll($footerSide3Cleaning);
	
		//echo "<pre>"; print_r($footerSide1MovingRecords); die;
		
		return $this->render('MovePlusServiceBundle:Default:footerSide1Moving.html.twig',array('footerSide1MovingRecords'=>$footerSide1MovingRecords,'footerSide2MovingRecords'=>$footerSide2MovingRecords,'footerSide3CleaningRecords'=>$footerSide3CleaningRecords, ));  
    }
	
    	
    public function recentServicePopUpBottomAction($catagory, Request $request){

		
		
		$conn = $this->get('database_connection');
		if($catagory !='')
		{
		 $formdata = $conn->fetchAll('SELECT * from bform where bform.catagory= "'.$catagory.'"');
		 return $this->render('MovePlusServiceBundle:Default:recentServicePopUpBottom.html.twig',array('formdata'=>$formdata[0]['catagory'] ));
		}else{
    return $this->render('MovePlusServiceBundle:Default:recentServicePopUpBottom.html.twig');
    }
		/* else
		{
		 $formdata = $conn->fetchAll('SELECT * from bform ');
		}  */
		//$formdata = $conn->fetchAll('SELECT * from bform where bform.form_id=1');
		
		//echo "<pre>"; print_r($formdata[0]['catagory']); 	
	
		  
    }
    
    
    public function howitworksAction(Request $request){

		return $this->render('MovePlusServiceBundle:Default:howitworks.html.twig');
		  
    }
	
	
    
    public function sampleviewAction($pageID, Request $request)
    {		
    $conn = $this->get('database_connection');
    $content = $conn->fetchAll('SELECT * from sampleservices where sampleservices.id='.$pageID);
	//echo "<pre>"; print_r($content); die;	
	
    return $this->render('MovePlusServiceBundle:Page:sampleview.html.twig' , array('content' =>$content[0]));  
		
		
	}
		
		
		public function bformAction($formID, Request $request)
    {		
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
    $delQuery="delete from `moveon`.`bform` where form_id=".$formID;
    $delstatement = $conn->prepare($delQuery);
    $delstatement->execute();
    $insertQuery = "INSERT INTO `moveon`.`bform` (`form_id`, `title`, `email_subject`, `email_to`, `email_cc`, `content`, `sucess_message`, `catagory`, `number_steps`) VALUES ('$formID', '$title', '$email_subject', '$email_to', '$email_cc', '$content', '$sucess_message', '$catagory', '$number_steps')";
    $statement = $conn->prepare($insertQuery);
    $statement->execute();
    }
	
    $content = $conn->fetchAll('SELECT * from bform where bform.form_id='.$formID);
    return $this->render('MovePlusServiceBundle:Page:bform.html.twig' , array('content' =>$content[0]));  
		
		
		}
}
