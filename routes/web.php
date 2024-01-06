<?php

use App\Http\Controllers\admin\AdminDashboard;
use App\Http\Controllers\admin\AdminLogin;
use App\Http\Controllers\admin\JobApplicationAc;
use App\Http\Controllers\common\UserProfileCc;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\user\ApplicationProfileC;
use App\Http\Controllers\user\UserApplyJobApplicationC;
use App\Http\Controllers\user\UserDashboardC;
use App\Http\Controllers\user\UserLogin;
use App\Http\Controllers\user\UserSignup;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Clear Cache facade value:
Route::get('/clear-cache', function () {
  $exitCode = Artisan::call('cache:clear');
  return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function () {
  $exitCode = Artisan::call('optimize');
  return '<h1>Reoptimized class loader</h1>';
});
Route::get('/f/optimize', function () {
  $exitCode = Artisan::call('optimize');
  return true;
});

//Route cache:
Route::get('/route-cache', function () {
  $exitCode = Artisan::call('route:cache');
  return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function () {
  $exitCode = Artisan::call('route:clear');
  return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function () {
  $exitCode = Artisan::call('view:clear');
  return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function () {
  $exitCode = Artisan::call('config:cache');
  return '<h1>Clear Config cleared</h1>';
});

//For MIgrate:
Route::get('/migrate', function () {
  $exitCode = Artisan::call('migrate');
  return '<h1>Migrated</h1>';
});
Route::get('/f/migrate', function () {
  $exitCode = Artisan::call('migrate');
  return true;
});

Route::get('/', function () {
  return view('startpage');
});
/* ADMIN ROUTES BEFORE LOGIN */
Route::middleware(['adminLoggedOut'])->group(function () {
  Route::get('/admin/login/', [AdminLogin::class, 'index']);
  Route::post('/admin/login/', [AdminLogin::class, 'login']);
});
/* ADMIN ROUTES AFTER LOGIN */
Route::middleware(['adminLoggedIn'])->group(function () {
  Route::prefix('/admin')->group(function () {
    Route::get('/logout/', function () {
      session()->forget('adminLoggedIn');
      return redirect('admin/login');
    });
    Route::get('/', [AdminDashboard::class, 'index']);
    Route::get('/dashboard', [AdminDashboard::class, 'index']);
    Route::get('/profile', [AdminDashboard::class, 'profile']);
    Route::post('/update-profile', [AdminDashboard::class, 'updateProfile']);

    Route::get('/job-applications', [JobApplicationAc::class, 'index']);
  });
});

/* USER ROUTES BEFORE LOGIN */
Route::middleware(['userLoggedOut'])->group(function () {
  Route::prefix('/user')->group(function () {
    Route::get('/sign-in', [UserLogin::class, 'login']);
    Route::get('/login', [UserLogin::class, 'login']);
    Route::post('/login', [UserLogin::class, 'signin']);

    Route::get('/job-application/', [UserSignup::class, 'jobApplication']);

    //Route::get('/sign-up', [UserSignup::class, 'signup']);
    Route::post('/sign-up', [UserSignup::class, 'register']);
    Route::get('/confirmed-email', [UserSignup::class, 'confirmedEmail']);
    Route::post('/submit-email-otp', [UserSignup::class, 'submitOtp']);

    Route::get('/account/password/reset', [UserSignup::class, 'viewForgetPassword']);
    Route::post('/forget-password', [UserSignup::class, 'forgetPassword']);
    Route::get('/forget-password/email-sent', [UserSignup::class, 'emailSent']);
    Route::get('/email-login', [UserSignup::class, 'emailLogin']);
    Route::get('/password/reset', [UserSignup::class, 'viewResetPassword']);
    Route::post('/reset-password', [UserSignup::class, 'resetPassword']);
    Route::get('/account/invalid_link', [UserSignup::class, 'invalidLink']);
  });
});
/* USER ROUTES AFTER LOGIN */
Route::middleware(['userLoggedIn'])->group(function () {
  Route::prefix('/user')->group(function () {
    Route::get('/logout/', function () {
      session()->forget('userLoggedIn');
      return redirect('user/login');
    });
    Route::get('/', [UserDashboardC::class, 'index']);
    Route::get('/dashboard', [UserDashboardC::class, 'index']);
    Route::get('/profile', [UserDashboardC::class, 'profile']);
    Route::post('/update-profile', [UserDashboardC::class, 'updateProfile']);

    Route::prefix('/job-application')->group(function () {
      Route::get('/personal-details', [UserApplyJobApplicationC::class, 'pd']);
      Route::post('/personal-details', [UserApplyJobApplicationC::class, 'pds']);
      Route::get('/identification-details', [UserApplyJobApplicationC::class, 'id']);
      Route::post('/identification-details', [UserApplyJobApplicationC::class, 'ids']);
      Route::get('/educational-background', [UserApplyJobApplicationC::class, 'eb']);
      Route::post('/educational-background', [UserApplyJobApplicationC::class, 'ebs']);
      Route::get('/professional-experience', [UserApplyJobApplicationC::class, 'pe']);
      Route::post('/professional-experience', [UserApplyJobApplicationC::class, 'pes']);
      Route::get('/previous-employer', [UserApplyJobApplicationC::class, 'preemp']);
      Route::post('/previous-employer', [UserApplyJobApplicationC::class, 'preemps']);
      Route::get('/emergency-contact', [UserApplyJobApplicationC::class, 'ec']);
      Route::post('/emergency-contact', [UserApplyJobApplicationC::class, 'ecs']);
      Route::get('/motivation', [UserApplyJobApplicationC::class, 'mot']);
      Route::post('/motivation', [UserApplyJobApplicationC::class, 'mots']);
      Route::get('/declaration', [UserApplyJobApplicationC::class, 'dec']);
      Route::post('/declaration', [UserApplyJobApplicationC::class, 'decs']);

      Route::get('/thank-you', [UserApplyJobApplicationC::class, 'thankYou']);
    });

    Route::get('/application-details', [ApplicationProfileC::class, 'index']);
  });
});


Route::prefix('common')->group(function () {
  Route::get('/change-status', [CommonController::class, 'changeStatus']);
  Route::get('/update-field', [CommonController::class, 'updateFieldById']);
  Route::get('/update-bulk-field', [CommonController::class, 'updateBulkField']);
  Route::get('/slugify', [CommonController::class, 'slugify']);
  Route::get('/update-token', [CommonController::class, 'updateToken']);

  Route::get('/get-job-app-detail', [UserProfileCc::class, 'getJobAppDetail']);
});
