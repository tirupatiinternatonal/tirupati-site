<?php
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Admin', 'as' => 'admin.'], function () {
    Route::get('/', function () {
        return view('admin.auth.login');
    })->name('admin.auth.login');    

    //Auth::routes(['verify' => true]);
	Auth::routes();
});



Route::group(['namespace' => 'Admin', 'as' => 'admin.','middleware'=>['auth:admin-web','preventBackHistory']], function () {
	Route::any('/change_password/', [ 'as' => 'users.change_password', 'uses' => 'UserController@change_password']);
	Route::get('/home', 'HomeController@index')->name('admin.home');

   	Route::resource('settings', SettingsController::class);	
   	
  
  
    Route::match(['get', 'post'], 'countryData/{id}', 'HomeController@countryData');
    Route::match(['get', 'post'], 'stateData/{id}', 'HomeController@stateData');
   
    
    //NotificationController
	Route::resource('notification', NotificationController::class);
    Route::match(['get','post'],'notification/status','NotificationController@change_status')->name('notification.status');
    Route::match(['get','post'],'notification/destroy','NotificationController@destroy')->name('notification.destroy');
    
    //UserController
    Route::resource('users', UserController::class);
    Route::match(['get','post'],'users/status','UserController@change_status')->name('users.status');
    Route::match(['get','post'],'users/destroy','UserController@destroy')->name('users.destroy');
   
    //Attendance
   // Route::resource('attendance', AttendanceController::class);
    
    //SliderController
    Route::resource('slider', SliderController::class);
    Route::match(['get','post'],'slider/status','SliderController@change_status')->name('slider.status');
    Route::match(['get','post'],'slider/destroy','SliderController@destroy')->name('slider.destroy');
    
    Route::resource('team', TeamController::class);
    Route::match(['get','post'],'team/destroy','TeamController@destroy')->name('team.destroy');
    Route::match(['get', 'post'], 'teamStatus', 'TeamController@teamStatus');

    
    // Profile
    Route::get('/profile','UserController@profile')->name('admin-profile');
    Route::post('/profile-update/{id}','UserController@profileUpdate');
    
    //RoleController
    Route::resource('roles', RoleController::class);
    Route::match(['get','post'],'roles/destroy','RoleController@destroy')->name('roles.destroy');
    
    
    // OfferController
    Route::resource('offer', OfferController::class);
    Route::match(['get','post'],'offer/status','OfferController@change_status')->name('offer.status');
    Route::match(['get','post'],'offer/destroy/{id}','OfferController@destroy')->name('offer.destroy');
    
     // EnquiryController
    Route::resource('enquiry', EnquiryController::class);
    Route::post('enquiry/status', 'EnquiryController@enquiryStatus')->name('enquiry.status');
    Route::Patch('enquiry/updates/{id}', 'EnquiryController@enquiryUpdates')->name('enquiry.updates');
    Route::match(['get','post'],'enquiry/destroy','EnquiryController@destroy')->name('enquiry.destroy');

   
     // SalaryController
       Route::resource('salary', SalaryController::class);

    Route::match(['get','post'],'salary','SalaryController@index')->name('salary');
    Route::match(['get','post'],'salaryCreate','SalaryController@salary_create')->name('salaryCreate');
    Route::match(['get','post'],'generate/salary','SalaryController@generateSalary')->name('generate.salary');
    Route::match(['get','post'],'findStaff', 'SalaryController@find_staff')->name('findStaff');
    Route::match(['get','post'],'print/{id}','SalaryController@printFile')->name('salary.print');
    Route::match(['get','post'],'salary/pay','SalaryController@user_pay')->name('salary.pay');

   
    // ClintsController
    Route::resource('clints', ClintsController::class);
    Route::match(['get','post'],'clints/status','ClintsController@change_status')->name('clints.status');
    Route::match(['get','post'],'clints/destroy','ClintsController@destroy')->name('clints.destroy');
    
   
    // WebMetaController
    Route::resource('web_meta', WebMetaController::class);
    Route::match(['get','post'],'web_meta/status','WebMetaController@change_status')->name('web_meta.status');
    Route::match(['get','post'],'web_meta/destroy','WebMetaController@destroy')->name('web_meta.destroy');
    
    // NewsLettersController
    Route::resource('news_letters', NewsLettersController::class);
    Route::match(['get','post'],'news_letters/status','NewsLettersController@change_status')->name('news_letters.status');
    
  
    // RewardController
    Route::resource('reward', RewardController::class);
    Route::match(['get','post'],'reward/status','RewardController@change_status')->name('reward.status');
    
    // PrivacyPolicyController
    Route::resource('privacy_policy', PrivacyPolicyController::class);
    
    // RefundPolicyController
    Route::resource('refund_policy', RefundPolicyController::class);
    
    // ShippingPolicyController
    Route::resource('shipping_policy', ShippingPolicyController::class);
    
    // OverviewController
    Route::resource('overview', OverviewController::class);
    
    // TermsConditionController
    Route::resource('terms_condition', TermsConditionController::class);
  
    // QuotationController
    Route::resource('quotation', QuotationController::class);
   Route::match(['get','post'],'quotation/destroy/{id}','QuotationController@destroy')->name('quotation.destroy');
    Route::match(['get','post'],'quotation/destroy','QuotationController@destroy')->name('quotation.destroy');
    Route::match(['get','post'],'featuresDeleteSingle', 'QuotationController@featuresDeleteSingle');
    //Controller
    Route::resource('plan_quotation', QuotationController::class);
   Route::match(['get','post'],'plan_quotation/destroy/{id}','QuotationController@destroy')->name('plan_quotation.destroy');
    Route::match(['get','post'],'plan_quotation/destroy','QuotationController@destroy')->name('plan_quotation.destroy');
    
    
    // ProductController
    Route::resource('product', ProductController::class);
   Route::match(['get','post'],'product/destroy/{id}','ProductController@destroy')->name('product.destroy');
    Route::match(['get','post'],'product/destroy','ProductController@destroy')->name('product.destroy');
    Route::match(['get','post'],'productDeleteSingle', 'ProductController@productDeleteSingle');
    
    
    // Career JD
    Route::resource('career_jd', CarrerJdController::class);
   Route::match(['get','post'],'career_jd/destroy/{id}','CarrerJdController@destroy')->name('career_jd.destroy');
    Route::match(['get','post'],'career_jd/destroy','CarrerJdController@destroy')->name('career_jd.destroy');
    
    // Integrations
    Route::resource('integration', IntegrationController::class);
    Route::match(['get','post'],'integration/destroy/{id}','IntegrationController@destroy')->name('integration.destroy');
    Route::match(['get','post'],'integration/destroy','IntegrationController@destroy')->name('integration.destroy');
   
    // News And Update
    Route::resource('newsUpdate', NewsUpdateController::class);
    Route::match(['get','post'],'newsUpdate/destroy/{id}','NewsUpdateController@destroy')->name('newsUpdate.destroy');
    Route::match(['get','post'],'newsUpdate/destroy','NewsUpdateController@destroy')->name('newsUpdate.destroy');
    
    // Software Updates
Route::resource('software_updates', SoftwareUpdatesController::class);
Route::post('software_updates/status/{id}', 'SoftwareUpdatesController@status')->name('software_updates.status');

  // PageController
   Route::resource('page', PageController::class);
   Route::match(['get','post'],'page/destroy/{id}','PageController@destroy')->name('page.destroy');
    Route::match(['get','post'],'page/destroy','PageController@destroy')->name('page.destroy');
    Route::match(['get','post'],'pageimgDeleteSingle', 'PageController@pageDeleteSingle');
    
   
  
    // FaqController
    Route::resource('faq', FaqController::class);
    Route::match(['get','post'],'faq/status','FaqController@change_status')->name('faq.status');
    Route::match(['get','post'],'faq/destroy','FaqController@destroy')->name('faq.destroy');
     Route::match(['get','post'],'descreptionDeleteSingle', 'FaqController@descreptionDeleteSingle');
    // Route::match(['get','post'],'faq/destroy/{id}','FaqController@destroy')->name('faq.destroy');
    // Route::delete('/admin/admin/faq/destroy/{id}', [FaqController::class, 'destroy']);
    
    // download center
    Route::resource('download_center', DownloadController::class);
    // Route::match(['get','post'],'faq/status','FaqController@change_status')->name('faq.status');
    Route::match(['get','post'],'download_center/destroy/{id}','DownloadController@destroy')->name('faq.destroy');
    Route::match(['get','post'],'download_center/destroy','DownloadController@destroy')->name('faq.destroy');
    // Route::delete('/admin/admin/faq/destroy/{id}', [FaqController::class, 'destroy']);
    
    
    // testimonila
    Route::resource('testimonila', TestimonilaController::class);
    Route::match(['get','post'],'testimonila/destroy/{id}','TestimonilaController@destroy')->name('testimonila.destroy');
    Route::match(['get','post'],'testimonila/destroy','TestimonilaController@destroy')->name('testimonila.destroy');
   

    // AboutController
    Route::resource('about', AboutController::class);
  
    // ReferEarnController
    Route::resource('refer_earn', ReferEarnController::class);
    
    // MassageController
    Route::resource('massage', MassageController::class);
  
    // contactController
    Route::resource('contacts', ContactContainer::class);
    
    // expenseController
    Route::resource('expense', ExpenseController::class);
    Route::match(['get','post'],'expense/status','ExpenseController@change_status')->name('expense.status');
    Route::match(['get','post'],'expense/destroy/{id}','ExpenseController@destroy')->name('expense.destroy');

    Route::resource('paid', PaidController::class);
    Route::get('/changeStatus',[PaidController::class,'changePaidStatus'])->name('changeStatus');

    //BranchController
    Route::resource('branch', BranchController::class);
    Route::match(['get','post'],'branch/status','BranchController@change_status')->name('branch.status');
    Route::match(['get','post'],'branch/destroy','BranchController@destroy')->name('branch.destroy');
    
    //DepartmentController
        Route::resource('department', DepartmentController::class);
         Route::match(['get','post'],'department/destroy','DepartmentController@destroy')->name('department.destroy');


   //StudentController
    Route::resource('student', StudentController::class);
	Route::resource('student/add', StudentController::class);
	Route::match(['get','post'],'student/destroy','StudentController@destroy')->name('student.destroy');
	Route::match(['get','post'],'student/status','StudentController@change_status')->name('student.status');
	
    Route::resource('career', CareerController::class);

    
    //WebsiteAmcController
    Route::resource('website_amc', WebsiteAmcController::class);
    Route::match(['get','post'],'AmcDetails','WebsiteAmcController@amc_details')->name('AmcDetails');
    Route::match(['get','post'],'webamc/status','WebsiteAmcController@change_status')->name('webamc.status');
    Route::match(['get','post'],'webamc/destroy','WebsiteAmcController@destroy')->name('webamc.destroy');
	Route::match(['get','post'],'AmcDetailsEdit','WebsiteAmcController@amc_details_edit')->name('AmcDetailsEdit'); 
	Route::match(['get','post'],'AmcReminder','WebsiteAmcController@amc_reminder')->name('AmcReminder'); 

	//InvoiceController
    Route::match(['get','post'],'invoice/{id}','InvoiceController@invoice')->name('invoice');
    Route::match(['get','post'],'index/{id}','InvoiceController@index')->name('invoice.index');
    Route::match(['get','post'],'invoice_details/{id}','InvoiceController@invo_detail')->name('invoice.invoice_details');


	
	
	
	//image gallery
	Route::resource('event_gallery', EventGalleryController::class);
	Route::match(['get','post'],'event_gallery/status','EventGalleryController@change_status')->name('event_gallery.status');
	Route::match(['get','post'],'event_gallery/destroy','EventGalleryController@destroy')->name('event_gallery.destroy');
	
	//Document Controller 
	Route::resource('document', DocumentController::class);
	Route::match(['get','post'],'document/status','DocumentController@change_status')->name('document.status');
	Route::match(['get','post'],'document/destroy','DocumentController@destroy')->name('document.destroy');
	
	
	Route::resource('task', TaskController::class);
    Route::post('task', 'TaskController@index')->name('task');
    Route::get('task/status', 'TaskController@taskStatus')->name('task.status');
    
    
    
    
  	Route::match(['get','post'],'attendance', 'AttendanceController@index')->name('attendance');
   	Route::match(['get','post'],'attendance/create', 'AttendanceController@attendance_search')->name('attendance.create');
   	Route::match(['get','post'],'attendance_store', 'AttendanceController@attendance_store')->name('attendance_store');
    
    Route::post('task/assignUpdate', 'TaskController@taskAssignUpdate')->name('task.assignUpdate');
    Route::get('task_by_assign', 'TaskController@taskByAssign')->name('task_by_assign');
    Route::POST('task_status_submit', 'TaskController@taskStatusSubmit')->name('task_status_submit');
    Route::POST('task_reassigned', 'TaskController@taskReassigned')->name('task_reassigned');
    Route::get('task_by_assign_detail/{id}', 'TaskController@taskByAssignDetail')->name('task_by_assign_detail');
    Route::get('show_detail/{id}/{dete}', 'TaskController@show_detail')->name('show_detail');
	
	
	//Response Status
	Route::resource('responce_status', ResponceStatusController::class);
    Route::post('responce_status/status', 'ResponceStatusController@ResStatus')->name('responce_status.status');
    Route::match(['get','post'],'responce_status/destroy','ResponceStatusController@destroy')->name('responce_status.destroy');


    //inventery
	Route::resource('inventery', InventeryController::class);
    Route::match(['get','post'],'inventery/destroy','InventeryController@destroy')->name('inventery.destroy');
    
    // Events/Expo
    Route::match(['get','post'],'eventExpo', 'EventExpoController@index')->name('eventExpo');
    Route::match(['get','post'],'eventExpo/create', 'EventExpoController@create')->name('eventExpo.create');
    Route::match(['get','post'],'eventExpo/store', 'EventExpoController@store')->name('eventExpo.store');
    Route::match(['get','post'],'eventExpo/edit/{id}', 'EventExpoController@edit')->name('eventExpo.edit');
    Route::match(['get','post'],'eventExpo/update/{id}', 'EventExpoController@update')->name('eventExpo.update');
    Route::match(['get','post'],'eventExpo/destroy', 'EventExpoController@destroy')->name('eventExpo.destroy');
    Route::post('eventExpo/status/{id}','EventExpoController@status')->name('eventExpo.status');
    });
    
