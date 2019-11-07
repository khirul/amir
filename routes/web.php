<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index');
// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@logout')->name('logout')->middleware('auth');

// datatable example
Route::get('my-datatables', 'MyDatatablesController@index');
Route::get('get-data-my-datatables', ['as'=>'get.data','uses'=>'MyDatatablesController@getData']);
// ************
// Journal
Route::get('/journal','JournalController@index')->middleware('auth');
// Route::get('/journal_pengarah','JournalController@indexPengarah')->middleware('auth');
Route::get('/journal/add','JournalController@add')->middleware('auth');
Route::post('/journal/add','JournalController@store');
Route::get('/journal/test_method','JournalController@test_method')->name('tm');
Route::get('/journal/edit/{journal}','JournalController@edit');
Route::post('/journal/edit/{journal}','JournalController@updateEdit');
Route::post('/journal/update/{journal}','JournalController@update');
Route::get('/journal/delete/{journal}','JournalController@delete');
// guna row Journal
Route::get('/journal/action/{journal}','JournalController@action')->name('action');
Route::post('/journal/action/{journal}','JournalController@tindakan');
// Route::post('/journal/action/{journal}','JournalController@updateAction');
// *********
Route::get('/view/{journal}', 'JournalController@view')->name('view')->middleware('auth');
// guna row Comment
Route::post('articles/comment/{id}','CommentController@add')->name('articles.comment')->middleware(['auth']);
// **********
// Laporan kerosakan
// Route::get('/laporan_kerosakan','DamageReportController@index');
// Route::get('/laporan_kerosakan/add','DamageReportController@add');
// dependent dropdown
// Route::get('/laporan_kerosakan/subcategory/{id}', 'DamageReportController@getSubcategory');
// 
// Route::post('/laporan_kerosakan/add','DamageReportController@store');
// Route::get('/laporan_kerosakan/edit/{laporan}','DamageReportController@edit');
// Route::post('/laporan_kerosakan/edit/{laporan}','DamageReportController@update');
// Route::get('/laporan/tindakan/{laporan}','DamageReportController@action');
// Route::post('/laporan/tindakan/{laporan}','DamageReportController@updateAction');
// Route::get('/laporan/maklumat_penerima/{laporan}','DamageReportController@detailPenerima');
// Route::get('/laporan_kerosakan/delete/{laporan}','DamageReportController@delete');

// Pangkat
Route::get('/rank','RankController@index');
Route::get('/rank/add','RankController@add');
Route::post('/rank/add','RankController@store');
Route::get('/rank/edit/{rank}','RankController@edit');
Route::post('/rank/edit/{rank}','RankController@update');
Route::get('/rank/delete/{rank}','RankController@delete');

Route::get('/category','CategoryController@index');
Route::get('/category/add','CategoryController@add');
Route::post('/category/add','CategoryController@store');
Route::get('/category/edit/{category}','CategoryController@edit');
Route::post('/category/edit/{category}','CategoryController@update');
Route::get('/category/delete/{category}','CategoryController@delete');

Route::get('/subcategory','SubCategoryController@index');
Route::get('/subcategory/add','SubCategoryController@add');
Route::post('/subcategory/add','SubCategoryController@store');
Route::get('/subcategory/edit/{subcategory}','SubCategoryController@edit');
Route::post('/subcategory/edit/{subcategory}','SubCategoryController@update');
Route::get('/subcategory/delete/{subcategory}','SubCategoryController@delete');

// tambah_seksyen_kontinjen
Route::get('/category_kontinjen','CategoryController@indexSeksyenKontinjen');
Route::get('/category_kontinjen/add','CategoryController@addSeksyenKontinjen');
Route::post('/category_kontinjen/add','CategoryController@storeSeksyenKontinjen');
Route::get('/category_kontinjen/edit/{category}','CategoryController@editSeksyenKontinjen');
Route::post('/category_kontinjen/edit/{category}','CategoryController@updateSeksyenKontinjen');
Route::get('/category_kontinjen/delete/{category}','CategoryController@deleteSeksyenKontinjen');

Route::get('/subcategory_kontinjen','SubCategoryController@indexSubSeksyenKontinjen');
Route::get('/subcategory_kontinjen/add','SubCategoryController@addSubSeksyenKontinjen');
Route::post('/subcategory_kontinjen/add','SubCategoryController@storeSubSeksyenKontinjen');
Route::get('/subcategory_kontinjen/edit/{subcategory}','SubCategoryController@editSubSeksyenKontinjen');
Route::post('/subcategory_kontinjen/edit/{subcategory}','SubCategoryController@updateSubSeksyenKontinjen');
Route::get('/subcategory_kontinjen/delete/{subcategory}','SubCategoryController@deleteSubSeksyenKontinjen');

// tambah negeri
Route::get('/state','StateController@index');
Route::get('/state/add','StateController@add');
Route::post('/state/add','StateController@store');
Route::get('/state/edit/{state}','StateController@edit');
Route::post('/state/edit/{state}','StateController@update');
Route::get('/state/delete/{state}','StateController@delete');

// tambah daerah
Route::get('/district','DistrictController@index');
Route::get('/district/add','DistrictController@add');
Route::post('/district/add','DistrictController@store');
Route::get('/district/edit/{district}','DistrictController@edit');
Route::post('/district/edit/{district}','DistrictController@update');
Route::get('/district/delete/{district}','DistrictController@delete');

// tambah_kontinjen
Route::get('/senarai_kontinjen','CategoryController@indexKontinjenlist');
Route::get('/kontinjen/add','CategoryController@addKontinjenlist');
Route::post('/kontinjen/add','CategoryController@storeKontinjenlist');
Route::get('/kontinjen/edit/{contingent}','CategoryController@editKontinjenlist');
Route::post('/kontinjen/edit/{contingent}','CategoryController@updateKontinjenlist');
Route::get('/kontinjen/delete/{contingent}','CategoryController@deleteKontinjenlist');

// Semak kerosakan
Route::get('/semakan', 'SearchController@index')->name('semakan.semak');
Route::post('/semakan/hasil_semakan', 'SearchController@search')->name('semakan.hasilSemak');
Route::get('/semakan/hasil_semakan/{course}', 'SearchController@print')->name('semakan.printResult');

// Statistik
Route::get('/laporan_statistik/carian','StatistikController@index');
Route::post('/laporan_statistik/carian','StatistikController@search');
// Route::get('/laporan_statistik','StatistikController@show');
Route::get('/laporan_statistik/carianSelesai','StatistikController@indexSelesai')->name('statistik.searchSelesai');
Route::post('/laporan_statistik/carianSelesai','StatistikController@searchSelesai');

// Petugas-ba
Route::get('anggota/tugasan/{staff}','StaffController@tugasan');
Route::get('senarai_anggota','StaffController@index');
Route::get('anggota/add','StaffController@add');
Route::get('/anggota/subcategory/{id}', 'StaffController@getSubcategory');
Route::post('anggota/add','StaffController@store');
Route::get('anggota/edit/{petugas}','StaffController@edit');
Route::post('anggota/edit/{petugas}','StaffController@update');
Route::get('anggota/delete/{petugas}','StaffController@delete');

// Penyelia-ba
Route::get('senarai_penyelia','SupervisorController@index');
Route::get('penyelia/add','SupervisorController@add');
Route::get('/penyelia/subcategory/{id}', 'SupervisorController@getSubcategory');
Route::post('penyelia/add','SupervisorController@store');
Route::get('penyelia/edit/{petugas}','SupervisorController@edit');
Route::post('penyelia/edit/{petugas}','SupervisorController@update');
Route::get('penyelia/delete/{petugas}','SupervisorController@delete');

// Penyelia2-ba
Route::get('senarai_penyelia_2','Supervisor2Controller@index');
Route::get('penyelia_2/add','Supervisor2Controller@add');
Route::get('/penyelia_2/subcategory/{id}', 'Supervisor2Controller@getSubcategoryPenyelia');
Route::post('penyelia_2/add','Supervisor2Controller@store');
Route::get('penyelia_2/edit/{petugas}','Supervisor2Controller@edit');
Route::post('penyelia_2/edit/{petugas}','Supervisor2Controller@update');
Route::get('penyelia_2/delete/{petugas}','Supervisor2Controller@delete');

// PegawaiTinggi-ba
Route::get('senarai_pegawai_tinggi','Supervisor2Controller@indexPegawaiTinggi');
Route::get('pegawai_tinggi/add','Supervisor2Controller@addPegawaiTinggi');
Route::get('/pegawai_tinggi/subcategory/{id}', 'Supervisor2Controller@getSubcategoryPegawaiTinggi');
Route::post('pegawai_tinggi/add','Supervisor2Controller@storePegawaiTinggi');
Route::get('pegawai_tinggi/edit/{pegawai}','Supervisor2Controller@editPegawaiTinggi');
Route::post('pegawai_tinggi/edit/{pegawai}','Supervisor2Controller@updatePegawaiTinggi');
Route::get('pegawai_tinggi/delete/{pegawai}','Supervisor2Controller@deletePegawaiTinggi');

//Petugas-kontinjen
Route::get('senarai_anggota_kontinjen','StaffController@indexKontinjen');
Route::get('anggota_kontinjen/add','StaffController@addKontinjen');
Route::get('/kontinjen/subcategory/{id}', 'StaffController@getSubcategoryKontinjen');
Route::post('anggota_kontinjen/add','StaffController@storeKontinjen');
Route::get('anggota_kontinjen/edit/{petugas}','StaffController@editKontinjen');
Route::post('anggota_kontinjen/edit/{petugas}','StaffController@updateKontinjen');
Route::get('anggota_kontinjen/delete/{petugas}','StaffController@deleteKontinjen');

// Penyelia-kontinjen
Route::get('senarai_penyelia_kontinjen','SupervisorController@indexKontinjen');
Route::get('penyelia_kontinjen/add','SupervisorController@addKontinjen');
Route::get('/kontinjen/subcategory/{id}', 'SupervisorController@getSubcategoryKontinjen');
Route::post('penyelia_kontinjen/add','SupervisorController@storeKontinjen');
Route::get('penyelia_kontinjen/edit/{petugas}','SupervisorController@editKontinjen');
Route::post('penyelia_kontinjen/edit/{petugas}','SupervisorController@updateKontinjen');
Route::get('penyelia_kontinjen/delete/{petugas}','SupervisorController@deleteKontinjen');

// Penyelia 2-kontinjen
Route::get('senarai_penyelia_2_kontinjen','Supervisor2Controller@indexKontinjen');
Route::get('penyelia_2_kontinjen/add','Supervisor2Controller@addKontinjen');
Route::get('/kontinjen/subcategory/{id}', 'Supervisor2Controller@getSubcategoryKontinjen');
Route::post('penyelia_2_kontinjen/add','Supervisor2Controller@storeKontinjen');
Route::get('penyelia_2_kontinjen/edit/{petugas}','Supervisor2Controller@editKontinjen');
Route::post('penyelia_2_kontinjen/edit/{petugas}','Supervisor2Controller@updateKontinjen');
Route::get('penyelia_2_kontinjen/delete/{petugas}','Supervisor2Controller@deleteKontinjen');

// Pegawai Tinggi-kontinjen
Route::get('senarai_pegawai_tinggi_kontinjen','Supervisor2Controller@indexPegawaiTinggiKontinjen');
Route::get('pegawai_tinggi_kontinjen/add','Supervisor2Controller@addPegawaiTinggiKontinjen');
Route::post('pegawai_tinggi_kontinjen/add','Supervisor2Controller@storePegawaiTinggiKontinjen');
Route::get('pegawai_tinggi_kontinjen/edit/{petugas}','Supervisor2Controller@editPegawaiTinggiKontinjen');
Route::post('pegawai_tinggi_kontinjen/edit/{petugas}','Supervisor2Controller@updatePegawaiTinggiKontinjen');
Route::get('pegawai_tinggi_kontinjen/delete/{petugas}','Supervisor2Controller@deletePegawaiTinggiKontinjen');

// Petugas-daerah
Route::get('senarai_anggota_daerah','StaffController@indexDaerah');
Route::get('anggota_daerah/add','StaffController@addDaerah');
Route::get('/anggota_daerah/subcategory/{id}', 'StaffController@getSubcategoryDaerah');
Route::post('anggota_daerah/add','StaffController@storeDaerah');
Route::get('anggota_daerah/edit/{petugas}','StaffController@editDaerah');
Route::post('anggota_daerah/edit/{petugas}','StaffController@updateDaerah');
Route::get('anggota_daerah/delete/{petugas}','StaffController@deleteDaerah');

// Penyelia-daerah
Route::get('senarai_penyelia_daerah','SupervisorController@indexDaerah');
Route::get('penyelia_daerah/add','SupervisorController@addDaerah');
Route::get('/penyelia_daerah/subcategory/{id}', 'SupervisorController@getSubcategoryDaerah');
Route::post('penyelia_daerah/add','SupervisorController@storeDaerah');
Route::get('penyelia_daerah/edit/{petugas}','SupervisorController@editDaerah');
Route::post('penyelia_daerah/edit/{petugas}','SupervisorController@updateDaerah');
Route::get('penyelia_daerah/delete/{petugas}','SupervisorController@deleteDaerah');

// Penyelia 2-daerah
Route::get('senarai_penyelia_2_daerah','Supervisor2Controller@indexDaerah');
Route::get('penyelia_2_daerah/add','Supervisor2Controller@addDaerah');
Route::get('/penyelia_2_daerah/subcategory/{id}', 'Supervisor2Controller@getSubcategoryDaerah');
Route::post('penyelia_2_daerah/add','Supervisor2Controller@storeDaerah');
Route::get('penyelia_2_daerah/edit/{petugas}','Supervisor2Controller@editDaerah');
Route::post('penyelia_2_daerah/edit/{petugas}','Supervisor2Controller@updateDaerah');
Route::get('penyelia_2_daerah/delete/{petugas}','Supervisor2Controller@deleteDaerah');

// Pegawai Tinggi-daerah
Route::get('senarai_pegawai_tinggi_daerah','Supervisor2Controller@indexPegawaiTinggiDaerah');
Route::get('pegawai_tinggi_daerah/add','Supervisor2Controller@addPegawaiTinggiDaerah');
Route::get('/pegawai_tinggi_daerah/subcategory/{id}', 'Supervisor2Controller@getSubcategoryPegawaiTinggiDaerah');
Route::post('pegawai_tinggi_daerah/add','Supervisor2Controller@storePegawaiTinggiDaerah');
Route::get('pegawai_tinggi_daerah/edit/{petugas}','Supervisor2Controller@editPegawaiTinggiDaerah');
Route::post('pegawai_tinggi_daerah/edit/{petugas}','Supervisor2Controller@updatePegawaiTinggiDaerah');
Route::get('pegawai_tinggi_daerah/delete/{petugas}','Supervisor2Controller@deletePegawaiTinggiDaerah');

// Observer
Route::post('/observers/add','ObserverController@addObs')->name('obs');