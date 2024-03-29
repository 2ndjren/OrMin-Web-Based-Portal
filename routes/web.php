<?php

use App\Http\Controllers\Admin\Accounts;
use App\Http\Controllers\Admin\Announcements;
use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\Admin\Appointments;
use App\Http\Controllers\Admin\Chats;
use App\Http\Controllers\Admin\Donations;
use App\Http\Controllers\Admin\Feedback;
use App\Http\Controllers\Admin\Blood;
// use App\Http\Controllers\Admin\Feedbacks;
use App\Http\Controllers\Admin\Generate_Reports;
use App\Http\Controllers\Admin\Imports;
// use App\Http\Controllers\Admin\Insurance;
use App\Http\Controllers\Admin\Membership;
use App\Http\Controllers\Admin\Print_Report;
use App\Http\Controllers\Admin\Reports;
// use App\Http\Controllers\Admin\Users;
use App\Http\Controllers\Admin\Volunteers;
use App\Http\Controllers\User\User_Volunteers;
use App\Http\Controllers\Auth\Auth;
use App\Http\Controllers\RTC\RTC;
use App\Http\Controllers\User\User;
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
// AUTH 

Route::get('signup',[Auth::class,'SignUp']);
Route::get('lagout',[Auth::class,'Logout']);
Route::get('/signin', [Auth::class, 'SignIn']);
Route::post('login',[Auth::class,'Login']);
Route::get('logout',[Auth::class,'Logout']);
Route::post('register',[Auth::class,'Register']);
Route::get('verify/{token}',[Auth::class,'Verify_Account']);
Route::post('recover',[Auth::class,'Send_Email_Forgot_Password']);
Route::get('recover/verify/{token}',[Auth::class,'Password_Reset']);
Route::post('change-password',[Auth::class,'Change_Password']);
Route::get('email-reminder',[Auth::class,'Check_Reminder']);
Route::get('email-check',[Auth::class,'Email_Check']);
// USERBASE 
Route::get('/',[User::class,'Home']);
Route::get('donate',[User::class,'Donate']);
Route::get('profile',[User::class,'User_Profile']);
Route::post('send-message',[RTC::class,'Send_Message']);
Route::get('scheduled-appointments',[User::class,'AppointmentSchedules']);
Route::get('scheduled-appointment-time/{app_date}',[User::class,'ListofTimeinAscheduledDate']);
Route::get('user-appointment',[User::class,'Appointment']);
Route::get('user-appointment-history',[User::class,'MyAppointmentHistory']);
// Route::get('user-appointment',[User::class,'MySchedule']);
Route::get('user-appointment-details/{id}',[User::class,'ViewMyAppointmentDetails']);

// USER INSURANCE 
Route::post('create-user-appointment',[User::class,'Create_User_Appointment']);
Route::get('my-appointments',[User::class,'User_Appointments']);
Route::get('my-appointments-details/{id}',[User::class,'User_Appointment_Details']);
Route::get('my-existing-appointments',[User::class,'Existing_Appointment']);
Route::get('user-scheduled-appointments',[User::class,'Scheduled_Appointements']);
Route::get('user-exist-check',[User::class,'Check_User']);
Route::get('user-today-schedule',[User::class,'Today_Appointments']);
Route::get('cancel-appointment/{id}',[User::class,'Cancel_Appointments']);


Route::get('register-insurance',[User::class,'Register_Membership']);
Route::get('user-insurance',[User::class,'MyInsurance']);
Route::get('user-insurance-details/{id}',[User::class,'UserInsurance_Info']);





Route::get('my-inurance-history',[User::class,'MyInsuranceHistory']);
Route::get('my-blood-donation-history',[User::class,'blood_history']);
Route::post('create-user-membership',[User::class,'Create_Membership_Account']);
Route::get('volunteer-details-card',[User::class,'Volunteer_Details']);
Route::post('submit-volunteer-form',[User_Volunteers::class,'Submit_Volunteer']);


Route::get('register-volunteer',[User::class,'Register_Volunteer']);
Route::post('create-user-volunteer',[User::class,'Create_User_Volunteer']);
Route::get('registered-details-volunteer',[User::class,'User_Volunteer_Record']);
Route::get('my-voluntee-card/{id}',[User::class,'Show_My_Volunteer_Card']);




Route::get('user-edit/{id}',[User::class,'Edit_User_Profile']);
Route::post('update-user-profile',[User::class,'User_Update_Profile']);
Route::get('user/membership/',[User::class,'Membership']);
Route::get('user/training',[User::class,'Training']);
Route::get('user/volunteer',[User::class,'Volunteer']);






Route::get('dashboard',[Dashboard::class,'Dashboard']);
Route::get('user-accounts',[Dashboard::class,'User_Accounts']);
Route::get('membership-counts',[Dashboard::class,'Membeship_Program_Counts']);
Route::get('membership-per-municipalities-counts',[Dashboard::class,'Memberships_Count_Per_Municipalities']);
Route::get('membership-dashboard-main',[Dashboard::class,'Memberships_Dashboard_Main']);

Route::get('volunteers-per-municipalities',[Dashboard::class,'Volunteers_Per_Municipalities']);
Route::get('volunteers-per-roles',[Dashboard::class,'Volunteer_Roles_Count']);
Route::get('donation-info',[Dashboard::class,'Charity_Donations']);
Route::get('donation-details/{id}',[Dashboard::class,'Donation_Data']);




Route::get('membership',[Membership::class,'Insurance']);
Route::get('membership-account-profile/{id}',[Membership::class,'Membership_Profile']);
Route::get('delete-membership-account-profile/{id}',[Membership::class,'Delete_Membership_Profile']);
Route::get('all-membership-account',[Membership::class,'Membership_Accounts']);
Route::post('create-membership-account',[Membership::class,'Create_Membership_Account']);
Route::post('decline-membership',[Membership::class,'Decline_Membership']);
Route::get('approve-membership/{id}',[Membership::class,'Approve_Membership']);

Route::get('notify-member/{id}',[Membership::class,'To_Notif_Accounts']);
Route::get('members-accounts',[Membership::class,'Members_Accounts']);
Route::get('notify-expired-account/{id}',[Membership::class,'Notify_When_Expired']);


Route::get('volunteers',[Volunteers::class,'Volunteers']);
Route::get('volunteers_table',[Volunteers::class,'Volunteers_Table']);
Route::get('volunteer_profile/{id}',[Volunteers::class,'Volunteers_Profile']);
Route::get('delete-volunteer-profile/{id}',[Volunteers::class,'Delete_Profile']);
Route::post('approve-volunteer-request',[Volunteers::class,'Approve_Volunteer_Request']);
Route::post('decline-volunteer-request',[Volunteers::class,'Decline_Volunteer_Request']);
Route::post('create-volunteer-record',[Volunteers::class,'Create_Volunteer']);
Route::post('update-volunteer-record',[Volunteers::class,'Update_Volunteer_Profile']);


Route::post('post-membership',[Generate_Reports::class,'Membership_exportFilteredData']);
Route::get('export-membership',[Generate_Reports::class,'Export_Membership']);

Route::post('post-volunteer',[Generate_Reports::class,'Volunteer_exportFilteredData']);
Route::get('export-volunteer',[Generate_Reports::class,'Export_Volunteer']);



Route::post('annual-report-print',[Print_Report::class,'Annual_Print_Report']);
Route::post('monthly-report-print',[Print_Report::class,'Monthly_Print_Report']);
Route::post('program-report-print',[Print_Report::class,'Membership_per_Program_Print_Report']);
Route::post('municipality-report-print',[Print_Report::class,'Membership_per_Municipality_Print_Report']);
Route::post('barangay-report-print',[Print_Report::class,'Membership_per_Barangay_Print_Report']);
Route::get('print-view',[Print_Report::class,'Print_View']);



Route::post('send-chat',[Chats::class,'Send_Message']);

Route::get('user-messages',[Chats::class,'User_Messages']);
Route::get('user-chat-profile/{id}',[Chats::class,'User_Profile']);
Route::get('user-chat-conversation/{id}',[Chats::class,'Conversation']);


Route::get('donations',[Donations::class,'Donations']);
Route::post('add-donation-record',[Donations::class,'Create_Donation']);
Route::get('donation-records',[Donations::class,'Donated_Funds']);
Route::get('donation-details/{id}',[Donations::class,'Donation_Details']);
Route::post('change-donation-status',[Donations::class,'Change_Status_Donation']);
Route::get('delete-donation-data/{id}',[Donations::class,'Delete_Donation_Data']);





Route::get('accounts',[Accounts::class,'Accounts']);
Route::get('verified-accounts',[Accounts::class,'Verified_Accounts']);
Route::get('account-profile/{id}',[Accounts::class,'Account_Profile']);
Route::get('delete-account/{id}',[Accounts::class,'Delete_Profile']);
Route::post('create-account',[Accounts::class,'Create_Account']);

Route::get('chats',[Chats::class,'Chats']);
Route::get('messages',[Chats::class,'User_Messages']);
Route::get('user-profile/{id}',[Chats::class,'MatchUser']);
Route::get('/search-users/{search_user}',[Chats::class,'Search_User']);


Route::get('announcements',[Announcements::class,'Announcement']);
Route::post('post-announcement',[Announcements::class,'Create_Announcement']);
Route::get('display-announcements',[Announcements::class,'Display_Posted_Announcements']);
Route::get('posted-announcement',[Announcements::class,'Display_Posted_Announcements']);
Route::get('posted-by/{id}',[Announcements::class,'Find_Who_post']);
Route::get('post-announcements-history-details/{id}',[Announcements::class,'Find_Post']);

Route::get('view/announcement/{id}', [User::class, 'Announcement'])->name('view.announcement');










Route::get('delete-announcement/{id}',[Announcements::class,'deleteAnnouncement']);

Route::post('/mark-as-latest/{id}', [Announcements::class, 'repostAnnouncement'])->middleware('web');




Route::get('appointments',[Appointments::class,'Appointments']);
Route::get('search-user-appointment/{search}',[Appointments::class,'Search_User']);
Route::get('set-user-app-details/{id}',[Appointments::class,'SetAppointment_Details']);
Route::post('create-appointment',[Appointments::class,'Create_Appointment']);

Route::get('submitted-appointments',[Appointments::class,'Appointments_Submitted']);
Route::get('incoming-requrest-appointment',[Appointments::class,'Appointment_Request']);
Route::get('listed-scheduled-appointments',[Appointments::class,'Scheduled_Appointments']);
Route::get('user-appointment-details/{id}',[Appointments::class,'User_Appointment_Details']);
Route::post('approve-pending-appointment',[Appointments::class,'Approve_User_Appointment']);
Route::post('decline-pending-appointment',[Appointments::class,'Decline_User_Appointment']);
Route::get('next-user/{id}',[Appointments::class,'Next_Appointment']);
Route::get('end-appointment/{id}',[Appointments::class,'End_Appointment']);





Route::get('feedbacks',[Feedback::class,'Feedback']);
Route::get('feedback/all',[Feedback::class,'getAllFeedback']);
Route::get('feedback/details/{id}',[Feedback::class,'getSpecificFeedback']);
Route::get('feedback/delete/{id}',[Feedback::class,'deleteFeedback']);





Route::get('reports',[Reports::class,'Reports']);


// GENERATE REPORT 
Route::get('print-waiting-list',[Generate_Reports::class,'Export_Waiting_Appointments']);
Route::get('print-approved-list',[Generate_Reports::class,'Export_Approved_Appointments']);
Route::post('share-feedback',[Feedback::class,'Create_Feedback']);



Route::get('blood',[Blood::class,'Blood']);
Route::post('create-blood',[Blood::class,'Create_Blood']);
Route::get('blood-data',[Blood::class,'BloodData']);
Route::post('update-blood-record',[Blood::class,'Update_Blood']);
Route::get('delete-blood-record/{id}',[Blood::class,'DeleteData']);
Route::get('blood-table',[Blood::class,'BloodTable']);



// IMPORT
Route::post('/import_membership_excel_file', [Imports::class, 'import_membership_excel_file'])->name('import_membership_excel_file');

Route::post('/import_volunteers_excel_file', [Imports::class, 'import_volunteers_excel_file'])->name('import_volunteers_excel_file');



