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
// edit_profile user ba
Route::get('/edit/{petugas}', 'HomeController@edit_profile')->name('edit.profile')->middleware('auth');
Route::get('/edit_penyelia1/{petugas}', 'HomeController@edit_profile_pemproses')->name('edit.pemproses')->middleware('auth');
Route::get('/edit_penyelia2/{petugas}', 'HomeController@edit_profile_penyelia')->name('edit.penyelia')->middleware('auth');
Route::get('/edit_pegawai_tinggi/{pegawai}', 'HomeController@edit_profile_pegTinggi')->name('edit.pegawai_tinggi')->middleware('auth');
// *************
// edit_profile user kontinjen
Route::get('/edit_profile/anggota/kontinjen/{petugas}', 'HomeController@edit_profile_anggotaKnjen')->name('edit.anggotaKnjen')->middleware('auth');
Route::get('/edit_profile/penyelia1/kontinjen/{petugas}', 'HomeController@edit_profile_pprosesKnjen')->name('edit.pprosesKnjen')->middleware('auth');
Route::get('/edit_profile/penyelia2/kontinjen/{petugas}', 'HomeController@edit_profile_pnyeliaKnjen')->name('edit.pnyeliaKnjen')->middleware('auth');
Route::get('/edit_profile/pegawai_tinggi/kontinjen/{petugas}', 'HomeController@edit_profile_pegTinggiKnjen')->name('edit.pegTinggiKnjen')->middleware('auth');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@logout')->name('logout')->middleware('auth');
// edit_profile user daerah
Route::get('/edit_profile/anggota/daerah/{petugas}', 'HomeController@edit_profile_anggotaDaerah')->name('edit.anggotaDaerah')->middleware('auth');
Route::get('/edit_profile/penyelia1/daerah/{petugas}', 'HomeController@edit_profile_pprosesDaerah')->name('edit.pprosesDaerah')->middleware('auth');
Route::get('/edit_profile/penyelia2/daerah/{petugas}', 'HomeController@edit_profile_pnyeliaDaerah')->name('edit.pnyeliaDaerah')->middleware('auth');
Route::get('/edit_profile/pegawai_tinggi/daerah/{petugas}', 'HomeController@edit_profile_pegTinggiDaerah')->name('edit.pegTinggiDaerah')->middleware('auth');
// datatable example
Route::get('my-datatables', 'MyDatatablesController@index');
Route::get('get-data-my-datatables', ['as'=>'get.data','uses'=>'MyDatatablesController@getData']);
// ************
// Journal
Route::get('/journal','JournalController@index')->name('journal.show')->middleware('auth');
Route::get('/journal/kck_daerah','JournalController@indexKCK')->name('journal.show_kck')->middleware('auth');
// Route::get('/journal_pengarah','JournalController@indexPengarah')->middleware('auth');
Route::get('/journal/add','JournalController@add')->middleware('auth');
Route::post('/journal/add','JournalController@store')->middleware('auth');
Route::get('/journal/edit/{journal}','JournalController@edit')->middleware('auth');
Route::post('/journal/edit/{journal}','JournalController@updateEdit')->middleware('auth');
Route::post('/journal/update/{journal}','JournalController@update')->middleware('auth');
Route::get('/journal/delete/{journal}','JournalController@delete')->middleware('auth');
// guna row Journal
Route::get('/journal/action/{journal}','JournalController@action')->name('action');
Route::post('/journal/action/{journal}','JournalController@tindakan');
// Route::post('/journal/action/{journal}','JournalController@updateAction');
// *********
// guna row Comment
Route::post('articles/comment/{id}','CommentController@add')->name('articles.comment')->middleware(['auth']);
// **********'
Route::delete('articles/{id}/comment/{comment}/destroy','CommentController@destroy')->name('articles.comment.destroy')->middleware('auth');
Route::get('/view/{journal}', 'JournalController@view')->name('view')->middleware('auth');
// print
Route::get('/view/print/{journal}', 'PrintController@view_print')->name('journal.view_print')->middleware('auth');
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
Route::get('/rank','RankController@index')->middleware('auth');
Route::get('/rank/add','RankController@add')->middleware('auth');
Route::post('/rank/add','RankController@store')->middleware('auth');
Route::get('/rank/edit/{rank}','RankController@edit')->middleware('auth');
Route::post('/rank/edit/{rank}','RankController@update')->middleware('auth');
Route::get('/rank/delete/{rank}','RankController@delete')->middleware('auth');

Route::get('/category','CategoryController@index')->middleware('auth');
Route::get('/category/add','CategoryController@add')->middleware('auth');
Route::post('/category/add','CategoryController@store')->middleware('auth');
Route::get('/category/edit/{category}','CategoryController@edit')->middleware('auth');
Route::post('/category/edit/{category}','CategoryController@update')->middleware('auth');
Route::get('/category/delete/{category}','CategoryController@delete')->middleware('auth');

Route::get('/subcategory','SubCategoryController@index')->middleware('auth');
Route::get('/subcategory/add','SubCategoryController@add')->middleware('auth');
Route::post('/subcategory/add','SubCategoryController@store')->middleware('auth');
Route::get('/subcategory/edit/{subcategory}','SubCategoryController@edit')->middleware('auth');
Route::post('/subcategory/edit/{subcategory}','SubCategoryController@update')->middleware('auth');
Route::get('/subcategory/delete/{subcategory}','SubCategoryController@delete')->middleware('auth');

// tambah_seksyen_kontinjen
Route::get('/category_kontinjen','CategoryController@indexSeksyenKontinjen')->middleware('auth');
Route::get('/category_kontinjen/add','CategoryController@addSeksyenKontinjen')->middleware('auth');
Route::post('/category_kontinjen/add','CategoryController@storeSeksyenKontinjen')->middleware('auth');
Route::get('/category_kontinjen/edit/{category}','CategoryController@editSeksyenKontinjen')->middleware('auth');
Route::post('/category_kontinjen/edit/{category}','CategoryController@updateSeksyenKontinjen')->middleware('auth');
Route::get('/category_kontinjen/delete/{category}','CategoryController@deleteSeksyenKontinjen')->middleware('auth');

Route::get('/subcategory_kontinjen','SubCategoryController@indexSubSeksyenKontinjen')->middleware('auth');
Route::get('/subcategory_kontinjen/add','SubCategoryController@addSubSeksyenKontinjen')->middleware('auth');
Route::post('/subcategory_kontinjen/add','SubCategoryController@storeSubSeksyenKontinjen')->middleware('auth');
Route::get('/subcategory_kontinjen/edit/{subcategory}','SubCategoryController@editSubSeksyenKontinjen')->middleware('auth');
Route::post('/subcategory_kontinjen/edit/{subcategory}','SubCategoryController@updateSubSeksyenKontinjen')->middleware('auth');
Route::get('/subcategory_kontinjen/delete/{subcategory}','SubCategoryController@deleteSubSeksyenKontinjen')->middleware('auth');

// tambah negeri
Route::get('/state','StateController@index')->middleware('auth');
Route::get('/state/add','StateController@add')->middleware('auth');
Route::post('/state/add','StateController@store')->middleware('auth');
Route::get('/state/edit/{state}','StateController@edit')->middleware('auth');
Route::post('/state/edit/{state}','StateController@update')->middleware('auth');
Route::get('/state/delete/{state}','StateController@delete')->middleware('auth');

// tambah daerah
Route::get('/district','DistrictController@index')->middleware('auth');
Route::get('/district/add','DistrictController@add')->middleware('auth');
Route::post('/district/add','DistrictController@store')->middleware('auth');
Route::get('/district/edit/{district}','DistrictController@edit')->middleware('auth');
Route::post('/district/edit/{district}','DistrictController@update')->middleware('auth');
Route::get('/district/delete/{district}','DistrictController@delete')->middleware('auth');

// tambah_kontinjen
Route::get('/senarai_kontinjen','CategoryController@indexKontinjenlist')->middleware('auth');
Route::get('/kontinjen/add','CategoryController@addKontinjenlist')->middleware('auth');
Route::post('/kontinjen/add','CategoryController@storeKontinjenlist')->middleware('auth');
Route::get('/kontinjen/edit/{contingent}','CategoryController@editKontinjenlist')->middleware('auth');
Route::post('/kontinjen/edit/{contingent}','CategoryController@updateKontinjenlist')->middleware('auth');
Route::get('/kontinjen/delete/{contingent}','CategoryController@deleteKontinjenlist')->middleware('auth');

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
Route::get('jurnal_anggota_bahagian','StaffController@indexBukitKpp')->middleware('auth');
Route::get('anggota/tugasan/{staff}','StaffController@tugasan')->middleware('auth');
Route::get('senarai_anggota','StaffController@index')->middleware('auth');
Route::get('anggota/add','StaffController@add')->middleware('auth');
Route::get('/anggota/subcategory/{id}', 'StaffController@getSubcategory')->middleware('auth');
Route::post('anggota/add','StaffController@store')->middleware('auth');
Route::get('anggota/edit/{petugas}','StaffController@edit')->middleware('auth');
Route::post('anggota/edit/{petugas}','StaffController@update')->middleware('auth');
Route::get('anggota/delete/{petugas}','StaffController@delete')->middleware('auth');

// Penyelia-ba
Route::get('senarai_penyelia','SupervisorController@index')->middleware('auth');
Route::get('penyelia/add','SupervisorController@add')->middleware('auth');
Route::get('/penyelia/subcategory/{id}', 'SupervisorController@getSubcategory')->middleware('auth');
Route::post('penyelia/add','SupervisorController@store')->middleware('auth');
Route::get('penyelia/edit/{petugas}','SupervisorController@edit')->middleware('auth');
Route::post('penyelia/edit/{petugas}','SupervisorController@update')->middleware('auth');
Route::get('penyelia/delete/{petugas}','SupervisorController@delete')->middleware('auth');

// Penyelia2-ba
Route::get('senarai_penyelia_2','Supervisor2Controller@index')->middleware('auth');
Route::get('penyelia_2/add','Supervisor2Controller@add')->middleware('auth');
Route::get('/penyelia_2/subcategory/{id}', 'Supervisor2Controller@getSubcategoryPenyelia')->middleware('auth');
Route::post('penyelia_2/add','Supervisor2Controller@store')->middleware('auth');
Route::get('penyelia_2/edit/{petugas}','Supervisor2Controller@edit')->middleware('auth');
Route::post('penyelia_2/edit/{petugas}','Supervisor2Controller@update')->middleware('auth');
Route::get('penyelia_2/delete/{petugas}','Supervisor2Controller@delete')->middleware('auth');

// PegawaiTinggi-ba
Route::get('senarai_pegawai_tinggi','Supervisor2Controller@indexPegawaiTinggi')->middleware('auth');
Route::get('pegawai_tinggi/add','Supervisor2Controller@addPegawaiTinggi')->middleware('auth');
Route::get('/pegawai_tinggi/subcategory/{id}', 'Supervisor2Controller@getSubcategoryPegawaiTinggi')->middleware('auth');
Route::post('pegawai_tinggi/add','Supervisor2Controller@storePegawaiTinggi')->middleware('auth');
Route::get('pegawai_tinggi/edit/{pegawai}','Supervisor2Controller@editPegawaiTinggi')->middleware('auth');
Route::post('pegawai_tinggi/edit/{pegawai}','Supervisor2Controller@updatePegawaiTinggi')->middleware('auth');
Route::get('pegawai_tinggi/delete/{pegawai}','Supervisor2Controller@deletePegawaiTinggi')->middleware('auth');

//Petugas-kontinjen
Route::get('jurnal_anggota_kontinjen','StaffController@indexKontinjenKck')->middleware('auth');
Route::get('senarai_anggota_kontinjen','StaffController@indexKontinjen')->middleware('auth');
Route::get('anggota_kontinjen/add','StaffController@addKontinjen')->middleware('auth');
Route::get('/kontinjen/subcategory/{id}', 'StaffController@getSubcategoryKontinjen')->middleware('auth');
Route::post('anggota_kontinjen/add','StaffController@storeKontinjen')->middleware('auth');
Route::get('anggota_kontinjen/edit/{petugas}','StaffController@editKontinjen')->middleware('auth');
Route::post('anggota_kontinjen/edit/{petugas}','StaffController@updateKontinjen')->middleware('auth');
Route::get('anggota_kontinjen/delete/{petugas}','StaffController@deleteKontinjen')->middleware('auth');
Route::get('/anggota_kontinjen/maklumat_penuh/{petugas}','StaffController@detail')->middleware('auth');

// Penyelia-kontinjen
Route::get('senarai_penyelia_kontinjen','SupervisorController@indexKontinjen')->middleware('auth');
Route::get('penyelia_kontinjen/add','SupervisorController@addKontinjen')->middleware('auth');
Route::get('/kontinjen/subcategory/{id}', 'SupervisorController@getSubcategoryKontinjen')->middleware('auth');
Route::post('penyelia_kontinjen/add','SupervisorController@storeKontinjen')->middleware('auth');
Route::get('penyelia_kontinjen/edit/{petugas}','SupervisorController@editKontinjen')->middleware('auth');
Route::post('penyelia_kontinjen/edit/{petugas}','SupervisorController@updateKontinjen')->middleware('auth');
Route::get('penyelia_kontinjen/delete/{petugas}','SupervisorController@deleteKontinjen')->middleware('auth');
Route::get('senarai_admin_kontinjen','SupervisorController@indexAdminKontinjen')->middleware('auth');
Route::get('admin_kontinjen/add','SupervisorController@addAdminKontinjen')->middleware('auth');
Route::post('admin_kontinjen/add','SupervisorController@storeAdminKontinjen')->middleware('auth');
Route::get('admin_kontinjen/delete/{petugas}','SupervisorController@deleteAdminKontinjen')->middleware('auth');

// Penyelia 2-kontinjen
Route::get('senarai_penyelia_2_kontinjen','Supervisor2Controller@indexKontinjen')->middleware('auth');
Route::get('penyelia_2_kontinjen/add','Supervisor2Controller@addKontinjen')->middleware('auth');
Route::get('/kontinjen/subcategory/{id}', 'Supervisor2Controller@getSubcategoryKontinjen')->middleware('auth');
Route::post('penyelia_2_kontinjen/add','Supervisor2Controller@storeKontinjen')->middleware('auth');
Route::get('penyelia_2_kontinjen/edit/{petugas}','Supervisor2Controller@editKontinjen')->middleware('auth');
Route::post('penyelia_2_kontinjen/edit/{petugas}','Supervisor2Controller@updateKontinjen')->middleware('auth');
Route::get('penyelia_2_kontinjen/delete/{petugas}','Supervisor2Controller@deleteKontinjen')->middleware('auth');

// Pegawai Tinggi-kontinjen
Route::get('senarai_pegawai_tinggi_kontinjen','Supervisor2Controller@indexPegawaiTinggiKontinjen')->middleware('auth');
Route::get('pegawai_tinggi_kontinjen/add','Supervisor2Controller@addPegawaiTinggiKontinjen')->middleware('auth');
Route::post('pegawai_tinggi_kontinjen/add','Supervisor2Controller@storePegawaiTinggiKontinjen')->middleware('auth');
Route::get('pegawai_tinggi_kontinjen/edit/{petugas}','Supervisor2Controller@editPegawaiTinggiKontinjen')->middleware('auth');
Route::post('pegawai_tinggi_kontinjen/edit/{petugas}','Supervisor2Controller@updatePegawaiTinggiKontinjen')->middleware('auth');
Route::get('pegawai_tinggi_kontinjen/delete/{petugas}','Supervisor2Controller@deletePegawaiTinggiKontinjen')->middleware('auth');

// Petugas-daerah
Route::get('jurnal_anggota_daerah','StaffController@indexDaerahKckd')->middleware('auth');
Route::get('senarai_anggota_daerah','StaffController@indexDaerah')->middleware('auth');
Route::get('anggota_daerah/add','StaffController@addDaerah')->middleware('auth');
Route::get('/anggota_daerah/subcategory/{id}', 'StaffController@getSubcategoryDaerah')->middleware('auth');
Route::post('anggota_daerah/add','StaffController@storeDaerah')->middleware('auth');
Route::get('anggota_daerah/edit/{petugas}','StaffController@editDaerah')->middleware('auth');
Route::post('anggota_daerah/edit/{petugas}','StaffController@updateDaerah')->middleware('auth');
Route::get('anggota_daerah/delete/{petugas}','StaffController@deleteDaerah')->middleware('auth');

// Penyelia-daerah
Route::get('senarai_penyelia_daerah','SupervisorController@indexDaerah')->middleware('auth');
Route::get('penyelia_daerah/add','SupervisorController@addDaerah')->middleware('auth');
Route::get('/penyelia_daerah/subcategory/{id}', 'SupervisorController@getSubcategoryDaerah')->middleware('auth');
Route::post('penyelia_daerah/add','SupervisorController@storeDaerah')->middleware('auth');
Route::get('penyelia_daerah/edit/{petugas}','SupervisorController@editDaerah')->middleware('auth');
Route::post('penyelia_daerah/edit/{petugas}','SupervisorController@updateDaerah')->middleware('auth');
Route::get('penyelia_daerah/delete/{petugas}','SupervisorController@deleteDaerah')->middleware('auth');

// Penyelia 2-daerah
Route::get('senarai_penyelia_2_daerah','Supervisor2Controller@indexDaerah')->middleware('auth');
Route::get('penyelia_2_daerah/add','Supervisor2Controller@addDaerah')->middleware('auth');
Route::get('/penyelia_2_daerah/subcategory/{id}', 'Supervisor2Controller@getSubcategoryDaerah')->middleware('auth');
Route::post('penyelia_2_daerah/add','Supervisor2Controller@storeDaerah')->middleware('auth');
Route::get('penyelia_2_daerah/edit/{petugas}','Supervisor2Controller@editDaerah')->middleware('auth');
Route::post('penyelia_2_daerah/edit/{petugas}','Supervisor2Controller@updateDaerah')->middleware('auth');
Route::get('penyelia_2_daerah/delete/{petugas}','Supervisor2Controller@deleteDaerah')->middleware('auth');

// Pegawai Tinggi-daerah
Route::get('senarai_pegawai_tinggi_daerah','Supervisor2Controller@indexPegawaiTinggiDaerah')->middleware('auth');
Route::get('pegawai_tinggi_daerah/add','Supervisor2Controller@addPegawaiTinggiDaerah')->middleware('auth');
Route::get('/pegawai_tinggi_daerah/subcategory/{id}', 'Supervisor2Controller@getSubcategoryPegawaiTinggiDaerah')->middleware('auth');
Route::post('pegawai_tinggi_daerah/add','Supervisor2Controller@storePegawaiTinggiDaerah')->middleware('auth');
Route::get('pegawai_tinggi_daerah/edit/{petugas}','Supervisor2Controller@editPegawaiTinggiDaerah')->middleware('auth');
Route::post('pegawai_tinggi_daerah/edit/{petugas}','Supervisor2Controller@updatePegawaiTinggiDaerah')->middleware('auth');
Route::get('pegawai_tinggi_daerah/delete/{petugas}','Supervisor2Controller@deletePegawaiTinggiDaerah')->middleware('auth');

// Observer
Route::post('/observers/add','ObserverController@addObs')->name('obs');

// Chart statistik
Route::get('/bar-chart', 'ChartController@indexBar')->middleware('auth');
Route::get('/bar-chart/tajuk', 'ChartController@indexTajukBar')->middleware('auth');
Route::get('/pie-bahagian', 'ChartController@indexPieBah')->middleware('auth');