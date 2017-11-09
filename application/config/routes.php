<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

// Admin routes

//Manage Agent
$route['admin/agent'] = 'admin/agent/index';
$route['admin/agent/invite'] = 'admin/agent/inviteAgent';
$route['admin/agent/invite/send'] = 'admin/agent/inviteAgentPost';
$route['admin/agent/new'] = 'admin/agent/newAgent';
$route['admin/agent/save'] = 'admin/agent/agentPost';
$route['admin/agent/edit/(:num)'] = 'admin/agent/editAgent/$1';
$route['admin/agent/save/(:num)'] = 'admin/agent/agentPost/$1';
$route['admin/agent/status/(:num)'] = 'admin/agent/toggleStatus/$1';
$route['admin/agent/delete/(:num)'] = 'admin/agent/delete/$1';
$route['admin/agent/detail/(:num)'] = 'admin/agent/detail/$1';
$route['admin/agent/(:any)'] = 'admin/agent/index';


//Mange Test
$route['admin/test'] = 'admin/test/index';
$route['admin/test/detail/(:num)'] = 'admin/test/detailTest/$1';
$route['admin/test/new'] = 'admin/test/newTest';
$route['admin/test/save'] = 'admin/test/postTest';
$route['admin/test/edit/(:num)'] = 'admin/test/editTest/$1';
$route['admin/test/save/(:num)'] = 'admin/test/postTest/$1';
$route['admin/test/choice/(:num)/(:any)'] = 'admin/test/testQuestionList/$1/$2';
$route['admin/test/delete/(:num)'] = 'admin/test/deleteTest/$1';
$route['admin/test/status/(:num)'] = 'admin/test/toggleStatusTest/$1';
//Mange Test Questions
$route['admin/test/question'] = 'admin/test/listQuestion';
$route['admin/test/question/detail/(:num)'] = 'admin/test/detailQuestion/$1';
$route['admin/test/question/new'] = 'admin/test/newQuestion';
$route['admin/test/question/save'] = 'admin/test/postQuestion';
$route['admin/test/question/edit/(:num)'] = 'admin/test/editQuestion/$1';
$route['admin/test/question/save/(:num)'] = 'admin/test/postQuestion/$1';
$route['admin/test/question/choice/(:num)/(:any)'] = 'admin/test/questionChoices/$1/$2';
$route['admin/test/question/delete/(:num)'] = 'admin/test/deleteQuestion/$1';
$route['admin/test/question/status/(:num)'] = 'admin/test/toggleStatusQuestion/$1';
$route['admin/test/question/(:any)'] = 'admin/test/listQuestion';
//Manage Test Answers
$route['admin/test/answer'] = 'admin/test/listAnswer';
$route['admin/test/answer/new'] = 'admin/test/newAnswer';
$route['admin/test/answer/save'] = 'admin/test/postAnswer';
$route['admin/test/answer/edit/(:num)'] = 'admin/test/editAnswer/$1';
$route['admin/test/answer/save/(:num)'] = 'admin/test/postAnswer/$1';
$route['admin/test/answer/delete/(:num)'] = 'admin/test/deleteAnswer/$1';
$route['admin/test/answer/status/(:num)'] = 'admin/test/toggleStatusAnswer/$1';
$route['admin/test/answer/(:any)'] = 'admin/test/';

$route['admin/test/(:any)'] = 'admin/test/index';

//Manage Admin Training
$route['admin/training'] = 'admin/training/index';
$route['admin/training/new'] = 'admin/training/newTraining';
$route['admin/training/save'] = 'admin/training/postTraining';
$route['admin/training/detail/(:num)'] = 'admin/training/detail/$1';
$route['admin/training/edit/(:num)'] = 'admin/training/edit/$1';
$route['admin/training/save/(:num)'] = 'admin/training/postTraining/$1';
$route['admin/training/delete/(:num)'] = 'admin/training/deleteTraining/$1';
$route['admin/training/status/(:num)'] = 'admin/training/toggleStatusTraining/$1';

//Manage Training Resources
$route['admin/training/(:num)/resource/(add)'] = 'admin/training/postTrainingResource/$1/$2';
$route['admin/training/(:num)/resource/(:any)/(:num)'] = 'admin/training/updateTrainingResource/$1/$2/$3';
$route['admin/training/(:num)/product/(:any)'] = 'admin/training/updateTrainingProduct/$1/$2';
$route['admin/training/(:num)/product/(:any)/(:num)'] = 'admin/training/updateTrainingProduct/$1/$2/$3';

$route['admin/training/(:any)'] = 'admin/training/index';

//Manage Product
$route['admin/product'] = 'admin/product/index';
$route['admin/product/new'] = 'admin/product/newProduct';
$route['admin/product/save'] = 'admin/product/postProduct';
$route['admin/product/edit/(:num)'] = 'admin/product/editProduct/$1';
$route['admin/product/save/(:num)'] = 'admin/product/postProduct/$1';
$route['admin/product/detail/(:num)'] = 'admin/product/detailProduct/$1';
$route['admin/product/delete/(:num)'] = 'admin/product/deleteProduct/$1';
$route['admin/product/status/(:num)'] = 'admin/product/toggleStatusProduct/$1';
$route['admin/product/(:num)/add_form/(:num)'] = 'admin/product/addProductForm/$1/$2';
$route['admin/product/(:num)/remove_form'] = 'admin/product/removeProductForm/$1';

// Product properties
//$route['admin/product/productid/acttion/propertyname/propertyid'] = 'admin/product/propertyAction/$1/$2/$3/$4';
$route['admin/product/(:num)/(:any)/(:any)/(:num)'] = 'admin/product/propertyAction/$1/$2/$3/$4';

$route['admin/product/(:any)'] = 'admin/product/index';


// Payment requests
$route['admin/payment'] = 'admin/payment/index';
$route['admin/payment/detail/(:num)'] = 'admin/payment/detailPR/$1';
$route['admin/payment/(:num)/inotes'] = 'admin/payment/postInternalNotes/$1';
$route['admin/payment/(:num)/cnotes'] = 'admin/payment/postCustomerNotes/$1';
$route['admin/payment/(:num)/hold'] = 'admin/payment/prOnHold/$1';
$route['admin/payment/(:num)/approve'] = 'admin/payment/approvePR/$1';
$route['admin/payment/(:num)/decline'] = 'admin/payment/declinePR/$1';

$route['admin/payment/(:any)'] = 'admin/payment/index';


// CMS pages
$route['admin/cms'] = 'admin/cms/index';
$route['admin/cms/new'] = 'admin/cms/newPage';
$route['admin/cms/save'] = 'admin/cms/postPage';
$route['admin/cms/edit/(:num)'] = 'admin/cms/editPage/$1';
$route['admin/cms/save/(:num)'] = 'admin/cms/postPage/$1';
//$route['admin/cms/detail/(:num)'] = 'admin/cms/detailPage/$1';
$route['admin/cms/delete/(:num)'] = 'admin/cms/deletePage/$1';
$route['admin/cms/status/(:num)'] = 'admin/cms/toggleStatusPage/$1';

$route['admin/cms/(:any)'] = 'admin/cms/index';

// Slider Home Page
$route['admin/slide'] = 'admin/slide/index';
$route['admin/slide/new'] = 'admin/slide/newSlide';
$route['admin/slide/save'] = 'admin/slide/postSlide';
$route['admin/slide/edit/(:num)'] = 'admin/slide/editSlide/$1';
$route['admin/slide/save/(:num)'] = 'admin/slide/postSlide/$1';
$route['admin/slide/sort'] = 'admin/slide/sortSlide';
$route['admin/slide/sort/save'] = 'admin/slide/updateSortSlide';
$route['admin/slide/delete/(:num)'] = 'admin/slide/deleteSlide/$1';
$route['admin/slide/status/(:num)'] = 'admin/slide/toggleStatusSlide/$1';

$route['admin/slide/(:any)'] = 'admin/slide/index';


//Form Builder;

$route['admin/form_builder/field/list'] = 'admin/formbuilder/fieldList';
$route['admin/form_builder/field/list/(:any)'] = 'admin/formbuilder/fieldList/$1';
$route['admin/form_builder/field/(:num)'] = 'admin/formbuilder/viewField/$1';
$route['admin/form_builder/field/new'] = 'admin/formbuilder/createNewField';
$route['admin/form_builder/field/save'] = 'admin/formbuilder/postField';
$route['admin/form_builder/field/edit/(:num)'] = 'admin/formbuilder/viewField/$1';
$route['admin/form_builder/field/save/(:num)'] = 'admin/formbuilder/postField/$1';
$route['admin/form_builder/field/delete/(:num)'] = 'admin/formbuilder/deleteField/$1';


$route['admin/form_builder/form/list'] = 'admin/formbuilder/index';
$route['admin/form_builder/form/new'] = 'admin/formbuilder/newForm';
$route['admin/form_builder/form/save'] = 'admin/formbuilder/saveForm';
$route['admin/form_builder/form/detail/(:num)'] = 'admin/formbuilder/detailForm';
$route['admin/form_builder/form/edit/(:num)'] = 'admin/Formbuilder/editForm/$1';
$route['admin/form_builder/form/save/(:num)'] = 'admin/formbuilder/saveForm/$1';
$route['admin/form_builder/form/delete/(:num)'] = 'admin/formbuilder/deleteForm/$1';

$route['admin/form_builder/form/(:num)/field/(:num)/(:any)'] = 'admin/formbuilder/updateFormFieldRel/$1/$2/$3';


$route['admin/form_builder/(:any)'] = 'admin/formbuilder/index';

//Lead
$route['admin/lead'] = 'admin/lead/index';
$route['admin/lead/detail/(:num)'] = 'admin/lead/detailLead/$1';
$route['admin/lead/(:num)/inotes'] = 'admin/lead/postInternalNotes/$1';
$route['admin/lead/(:num)/enotes'] = 'admin/lead/postExternalNotes/$1';
$route['admin/lead/(:num)/approve'] = 'admin/lead/approveLead/$1';
$route['admin/lead/(:num)/decline'] = 'admin/lead/declineLead/$1';


$route['admin/lead/(:any)'] = 'admin/lead/index';


// Admin Dashboard
$route['admin'] = 'admin/dashboard/index';
$route['admin/(:any)'] = 'admin/dashboard/index';



/*
 * Routes for open site
 */

$route['info/(:any)'] = 'index/staticPages/$1';

//Agent Login
$route['login'] = 'login/index';
$route['login/try'] = 'login/tryLogin';
$route['logout'] = 'login/logout';

//Agent Signup
$route['signup/(:any)'] = 'signup/index/$1';
$route['signup/save/(:any)'] = 'signup/signupPost/$1';

// Agent Dashboard

$route['dashboard'] = 'dashboard/dashboard/index';
$route['dashboard/profile'] = 'dashboard/dashboard/getProfile';
$route['dashboard/updateProfile'] = 'dashboard/dashboard/updateProfilePost';
$route['dashboard/updatepass'] = 'dashboard/dashboard/updatePassword';
$route['dashboard/ewallet'] = 'dashboard/dashboard/getEwalletInfo';
$route['dashboard/request_payment'] = 'dashboard/dashboard/processPaymentRequest';
$route['dashboard/ewallet/payment_requst/(:num)'] = 'dashboard/dashboard/paymentRequestDetails/$1';

// Agent Training
$route['training'] = 'dashboard/training/index';
$route['training/detail/(:num)'] = 'dashboard/training/detail/$1';

// Agent Test
$route['test'] = 'dashboard/test/index';
$route['test/detail/(:num)'] = 'dashboard/test/detail/$1';
$route['test/take_test/(:num)'] = 'dashboard/test/takeTest/$1';
$route['test/take_test_submit/(:num)'] = 'dashboard/test/testAttempt/$1';

// Agent Product
$route['product'] = 'dashboard/product/index';
$route['product/detail/(:num)'] = 'dashboard/product/detail/$1';
$route['product/(:num)/lead'] = 'dashboard/product/loadLeadForm/$1';
$route['product/(:num)/lead_capture'] = 'dashboard/product/leadPost/$1';
$route['lead/detail/(:num)'] = 'dashboard/product/detailLead/$1';

//Agent Expenses
$route['expense'] = 'dashboard/dashbaord/expenses';


$route['default_controller'] = 'index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;