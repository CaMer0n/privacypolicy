<?php

// Generated e107 Plugin Admin Area 

require_once('../../class2.php');
if (!getperms('P')) 
{
	header('location:'.e_BASE.'index.php');
	exit;
}



class privacypolicy_adminArea extends e_admin_dispatcher
{

	protected $modes = array(	
	
		'main'	=> array(
			'controller' 	=> 'privacypolicy_ui',
			'path' 			=> null,
			'ui' 			=> 'privacypolicy_form_ui',
			'uipath' 		=> null
		),
		

	);	
	
	
	protected $adminMenu = array(
			
		'main/prefs' 		=> array('caption'=> LAN_PREFS, 'perm' => 'P'),	

		// 'main/custom'		=> array('caption'=> 'Custom Page', 'perm' => 'P')
	);

	protected $adminMenuAliases = array(
		'main/edit'	=> 'main/list'				
	);	
	
	protected $menuTitle = 'Privacy Policy';
}




				
class privacypolicy_ui extends e_admin_ui
{
			
		protected $pluginTitle		= 'Privacy Policy';
		protected $pluginName		= 'privacypolicy';
	//	protected $eventName		= 'privacypolicy-'; // remove comment to enable event triggers in admin. 		
		protected $table			= '';
		protected $pid				= '';
		protected $perPage			= 10; 
		protected $batchDelete		= true;
	//	protected $batchCopy		= true;		
	//	protected $sortField		= 'somefield_order';
	//	protected $orderStep		= 10;
	//	protected $tabs				= array('Tabl 1','Tab 2'); // Use 'tab'=>0  OR 'tab'=>1 in the $fields below to enable. 
		
	//	protected $listQry      	= "SELECT * FROM `#tableName` WHERE field != '' "; // Example Custom Query. LEFT JOINS allowed. Should be without any Order or Limit.
	
		protected $listOrder		= ' DESC';
	
		protected $fields 		= NULL;		
		
		protected $fieldpref = array();
		

	//	protected $preftabs        = array('General', 'Other' );
		protected $prefs = array(
			'company'		=> array('title'=> 'Company', 'tab'=>0, 'type'=>'text', 'data' => 'str', 'writeParms'=>array('size'=>'xxlarge'), 'help'=>''),
			'modified'		=> array('title'=> 'Last Modified', 'tab'=>0, 'type'=>'method', 'data' => 'int', 'help'=>''),
			'contactus'		=> array('title'=> 'Contact Us URL', 'tab'=>0, 'type'=>'text', 'data' => 'str', 'help'=>'url of contact us page'),

		);

	
		public function init()
		{
			// Set drop-down values (if any). 
	
		}

		

		
			
	/*	
		// optional - a custom page.  
		public function customPage()
		{
			$text = 'Hello World!';
			return $text;
			
		}
	*/
			
}
				


class privacypolicy_form_ui extends e_admin_form_ui
{
	public function modified($curVal,$mode)
	{

		// TODO - catlist combo without current cat ID in write mode, parents only for batch/filter
		// Get UI instance
		$controller = $this->getController();
		switch($mode)
		{
			case 'read':
				// return e107::getParser()->toDate($curVal,'long'); // $this->selectbox('faq_info_parent', $controller->getFaqCategoryTree(), $curVal);
				break;

			case 'write':
				$text = (empty($curVal)) ? "Never" : e107::getParser()->toDate($curVal,'long');
				$text .= $this->hidden('modified', time());
				return $text;
				break;

			case 'filter':
			case 'batch':

				break;
		}
	}
}		
		
		
new privacypolicy_adminArea();

require_once(e_ADMIN."auth.php");
e107::getAdminUI()->runPage();

require_once(e_ADMIN."footer.php");
exit;

?>