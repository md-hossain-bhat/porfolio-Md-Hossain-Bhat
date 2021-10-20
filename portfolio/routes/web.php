<?php

use Illuminate\Support\Facades\Route;





Route::get('/', [App\Http\Controllers\Front\FrontEndController::class, 'index']);
Route::match(['get','post'],'/send', [App\Http\Controllers\Front\FrontEndController::class, 'sendEmail']);


Route::prefix('/admin')->namespace('Admin')->group(function(){
    Route::group(['middleware' => ['auth']],function(){
        //profile
        Route::match(['get','post'],'/profile/{id?}', [App\Http\Controllers\Admin\UserController::class, 'profile']);
        Route::get('/delete-profile-image/{id}', [App\Http\Controllers\Admin\UserController::class, 'deleteProfileImage']);
        Route::post('/check-pwd', [App\Http\Controllers\Admin\UserController::class, 'chkPassword']);
        Route::post('/update-pwd', [App\Http\Controllers\Admin\UserController::class, 'updatePassword']);
        //portfolio
        Route::get('/portfolios', [App\Http\Controllers\Admin\PortfolioController::class, 'portfolio'])->name('admin.portfolio');
        Route::match(['get','post'],'/add-edit-portfolio/{id?}', [App\Http\Controllers\Admin\PortfolioController::class, 'addEditPortfolio']);
        Route::post('/update-portfolio-status', [App\Http\Controllers\Admin\PortfolioController::class, 'updatePortfolioStatus']);
        Route::get('delete-portfolio/{id}', [App\Http\Controllers\Admin\PortfolioController::class, 'deletePortfolio']);
        Route::get('/delete-portfolio-image/{id}', [App\Http\Controllers\Admin\PortfolioController::class, 'deletePortfolioImage']);
        //about
        Route::get('/about', [App\Http\Controllers\Admin\AboutController::class, 'abouts']);
        Route::match(['get','post'],'/add-edit-about/{id?}', [App\Http\Controllers\Admin\AboutController::class, 'addEditAbout']);
        Route::get('/delete-about-image/{id}', [App\Http\Controllers\Admin\AboutController::class, 'deleteAboutImage']);
        //service
        Route::get('/service', [App\Http\Controllers\Admin\ServiceController::class, 'service']);
        Route::match(['get','post'],'/add-edit-service/{id?}', [App\Http\Controllers\Admin\ServiceController::class, 'addEditService']);
        Route::get('/delete-service/{id}', [App\Http\Controllers\Admin\ServiceController::class, 'deleteService']);
        Route::post('/update-service-status', [App\Http\Controllers\Admin\ServiceController::class, 'updateServiceStatus']);
        //testimonial
        Route::get('/testimonial', [App\Http\Controllers\Admin\TestimonialController::class, 'testimonial']);
        Route::match(['get','post'],'/add-edit-testimonial/{id?}', [App\Http\Controllers\Admin\TestimonialController::class, 'addEdittesTestimonial']);
        Route::get('/delete-testimonial/{id}', [App\Http\Controllers\Admin\TestimonialController::class, 'deleteTestimonial']);
        Route::get('/delete-testimonial-image/{id}', [App\Http\Controllers\Admin\TestimonialController::class, 'deleteTestimonialImage']);
        Route::post('/update-testimonial-status', [App\Http\Controllers\Admin\TestimonialController::class, 'updateTestimonialStatus']);
        //logo
        Route::get('/logo', [App\Http\Controllers\Admin\LogoController::class, 'logo']);
        Route::match(['get','post'],'add-edit-logo/{id?}', [App\Http\Controllers\Admin\LogoController::class, 'addEdittesLogo']);
        Route::get('delete-logo/{id}', [App\Http\Controllers\Admin\LogoController::class, 'deleteLogo']);
        Route::get('delete-logo-image/{id}', [App\Http\Controllers\Admin\LogoController::class, 'deleteLogoImage']);
        Route::post('/update-logo-status', [App\Http\Controllers\Admin\LogoController::class, 'updateLogoStatus']);
        //contact
        Route::get('/contact', [App\Http\Controllers\Admin\ContactController::class, 'contact']);
        Route::match(['get','post'],'add-edit-contact/{id?}', [App\Http\Controllers\Admin\ContactController::class, 'addEditContact']);
        //email
        Route::get('/email', [App\Http\Controllers\Admin\EmailController::class, 'email']);
        Route::get('/email-view/{id}', [App\Http\Controllers\Admin\EmailController::class, 'emailView']);
        Route::get('/delete-email/{id}', [App\Http\Controllers\Admin\EmailController::class, 'deleteEmail']);
  
        //skill
        Route::get('/skill', [App\Http\Controllers\Admin\SkillController::class, 'skill']);
        Route::match(['get','post'],'/add-edit-skill/{id?}', [App\Http\Controllers\Admin\SkillController::class, 'addEditSkill']);
        Route::get('/delete-skill/{id}', [App\Http\Controllers\Admin\SkillController::class, 'deleteSkill']);
        Route::post('/update-skill-status', [App\Http\Controllers\Admin\SkillController::class, 'updateSkillStatus']);
        
    });
});

Auth::routes(['register' => false]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
