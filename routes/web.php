<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/reports', function () {
    return view('reports.reports');
});

Route::get('/about', function () {
    return view('about.about');
});
Route::get('/start-challenge', function () {
    return redirect('https://t.me/DallyChallengeBot?start=start_challenge');
});

Route::get('/categories', function () {
    $categories = DB::table('categories')->get();
    return view('categories.index', ['categories' => $categories]);
});

Route::get('/categories/add', function () {
    return view('categories.add');
});

Route::get('/categories/edit/{id}', function ($id) {
    $category = DB::table('categories')->where('id', $id)->first();

    return view('categories.edit', compact('category'));
});

Route::get('/categories/delete/{id}', function ($id) {
    $category = DB::table('categories')->where('id', '=', $id)->first();
    if ($category) {
        DB::table('categories')->where('id', '=', $id)->delete();
        return '<b style="color:green">Done Successfully</b>, please go back to  <a href="/categories">list page</a>';
    } else {
        return '<b style="color:red">Error</b>, not found!';
    }
});

Route::post('/categories', function (Request $request) {
    $categories = DB::table('categories')->where('title', '=', $request->new_title)->first();
    if ($categories) {
        return '<b style="color:red">Error</b>, title (' . $request->new_title . ') already exist!';
    } else {
        DB::table('categories')->insert([
            'title' => $request->new_title,
        ]);
        return '<b style="color:green">Done Successfully</b>, please go back to  <a href="/categories">list page</a>';
    }
});

Route::put('/categories', function (Request $request) {
    DB::table('categories')
        ->where('id', $request->id)
        ->update(['title' =>  $request->title]);
    return '<b style="color:green">Done Successfully</b>, please go back to  <a href="/categories">list page</a>';
});



//project


Route::get('/projects/add', function () {
    return view('projects.add_projects');
});

Route::get('/projects/edit/{id}', function ($id) {
    $project = DB::table('projects')
        ->join('categories', 'projects.category_id', '=', 'categories.id')
        ->select('projects.*', 'categories.title as category_title')
        ->where('projects.id', $id)
        ->first();

    return view('projects.edit_projects', compact('project'));
});

Route::put('/projects/update/{id}', function (Request $request, $id) {
    DB::table('projects')
        ->where('id', $id)
        ->update([
            'title' => $request->project_title,
            'category_id' => $request->category_id,
            'updated_at' => now(),
            'priority' =>  $request->priority,
        ]);

    return redirect('/projects')->with('success', 'تم تعديل المشروع بنجاح!');
});


Route::get('/projects', function () {
    $projects = DB::table('projects')
        ->join('categories', 'projects.category_id', '=', 'categories.id')
        ->select('projects.*', 'categories.title as category_title')
        ->get();

    return view('projects.index', ['projects' => $projects]);
});

Route::get('/projects/delete/{id}', function ($id) {

    DB::table('projects')->where('id', '=', $id)->delete();
    return '<b style="color:green">Done Successfully</b>, please go back to  <a href="/projects">list page</a>';
});

Route::post('/projects', function (Request $request) {
    if (empty($request->project_title)) {
        return '<b style="color:red">Error</b>, the title field cannot be empty!';
    }

    DB::table('projects')->insert([
        'title' => $request->project_title, // تغيير الحقل ليطابق النموذج
        'category_id' => $request->category_title,
        'created_at' => now(),
        'priority' =>  $request->priority,
    ]);

    return '<b style="color:green">Done Successfully</b>, please go back to <a href="/projects">list page</a>';
});

Route::put('/projects', function (Request $request) {
    DB::table('projects')
        ->where('id', $request->id)
        ->update(['title' =>  $request->title]);
    return '<b style="color:green">Done Successfully</b>, please go back to  <a href="/projects">list page</a>';
});

Route::post('/projects/set-priority', function () {
    DB::table('projects')->where('id', request('id'))->update(['priority' => request('priority')]);
    return redirect('/projects'); // إعادة تحميل الصفحة بعد التحديث
})->name('projects.setPriority');




//activites


// عرض قائمة الأنشطة
Route::get('/activities', function () {
    $activities = DB::table('activities')
        ->join('projects', 'activities.project_id', '=', 'projects.id')
        ->join('categories', 'projects.category_id', '=', 'categories.id')
        ->select('activities.*', 'projects.title as project_title', 'categories.title as category_title') // ← هون
        ->get();

    return view('activities.index', compact('activities'));
});


// حذف نشاط
Route::get('/activities/delete/{id}', function ($id) {
    $activity = DB::table('activities')->where('id', '=', $id)->first();
    if ($activity) {
        DB::table('activities')->where('id', '=', $id)->delete();
        return redirect('/activities')->with('success', 'تم حذف النشاط بنجاح!');
    } else {
        return redirect('/activities')->with('error', 'النشاط غير موجود!');
    }
});

// تعديل نشاط
Route::get('/activities/edit/{id}', function ($id) {
    $activity = DB::table('activities')->where('id', '=', $id)->first();

    $projects = DB::table('projects')->select('id', 'title')->get();
    return view('/activities.edit_activities')->with('activity', $activity)->with('projects', $projects);
});

// تعديل النشاط
Route::post('/activities', function (Request $request) {
    DB::table('activities')->insert([
        'title' => $request->activity_title,
        'project_id' => $request->project_id,
        'duration' => $request->duration, // ← تأكد من وجود هذا السطر
        'created_at' => now(),
    ]);

    return redirect('/activities')->with('success', 'تمت إضافة النشاط بنجاح!');
});


Route::get('/reports/r1', function () {
    //SELECT COUNT(*) AS c, categories.title AS category_title FROM `projects` JOIN categories ON categories.id = projects.category_id GROUP BY category_id;
    $data = DB::table('projects')
        ->join('categories', 'projects.category_id', '=', 'categories.id')
        ->selectRaw('COUNT(*) AS c, categories.title AS category_title')
        ->groupBy('category_id', 'categories.title')

        ->orderBy('c', 'DESC')
        ->get();

    return view('reports.r1', compact('data'));
});


Route::get('/reports/r2', function () {
    //SELECT COUNT(*) AS c, categories.title AS category_title FROM `projects` JOIN categories ON categories.id = projects.category_id GROUP BY category_id;
    $data = DB::table('projects')
        ->join('categories', 'projects.category_id', '=', 'categories.id')
        ->selectRaw('COUNT(*) AS c, categories.title AS category_title')
        ->groupBy('category_id', 'categories.title')

        ->orderBy('c', 'DESC')
        ->get();

    return view('reports.r2', compact('data'));
});

Route::get('/reports/r3', function () {
    $data = DB::table('projects')
        ->selectRaw('COUNT(*) AS c, priority')
        ->groupBy('priority')
        ->orderBy('priority')
        ->get();

    return view('reports.r3', compact('data'));
});


Route::get('/reports/r4', function () {
    //SELECT COUNT(*) AS c, categories.title AS category_title FROM `projects` JOIN categories ON categories.id = projects.category_id GROUP BY category_id;
    $data = DB::table('activities')
        ->join('projects', 'activities.project_id', '=', 'projects.id')
        ->selectRaw('COUNT(*) AS c, projects.title AS project_title')
        ->groupBy('project_id', 'projects.title')
        ->orderBy('c', 'DESC')
        ->get();

    return view('reports.r4', compact('data'));
});


Route::get('/reports/r5', function () {
    //SELECT COUNT(*) AS c, categories.title AS category_title FROM `projects` JOIN categories ON categories.id = projects.category_id GROUP BY category_id;
    $data = DB::table('activities')
        ->join('projects', 'activities.project_id', '=', 'projects.id')
        ->selectRaw('COUNT(*) AS c, projects.title AS project_title')
        ->groupBy('project_id', 'projects.title')
        ->orderBy('c', 'DESC')
        ->get();

    return view('reports.r5', compact('data'));
});

Route::get('/reports/r6', function () {
    //SELECT COUNT(*) AS c, categories.title AS category_title FROM `projects` JOIN categories ON categories.id = projects.category_id GROUP BY category_id;
    $data = DB::table('activities')
        ->join('projects', 'activities.project_id', '=', 'projects.id')
        ->selectRaw('SUM(duration) AS c, projects.title AS project_title')
        ->groupBy('project_id', 'projects.title')
        ->orderBy('c', 'DESC')
        ->get();

    return view('reports.r6', compact('data'));
});

Route::get('/reports/r7', function () {
    $activitiesCount = DB::table('activities')->get()->count();
    $projectsCount = DB::table('projects')->get()->count();
    $categoriesCount = DB::table('categories')->get()->count();
    $activitiesDuration = DB::table('activities')->selectRaw('SUM(duration) AS c')->first()->c;

    return view('reports.r7 ', compact('activitiesCount', 'projectsCount', 'categoriesCount', 'activitiesDuration'));
});


/*Route::get('/reports/r7', function () {
    //SELECT COUNT(*) AS c, categories.title AS category_title FROM `projects` JOIN categories ON categories.id = projects.category_id GROUP BY category_id;
        $data = DB::table('categories')
        $data = DB::table('projects')
        $data = DB::table('activities')
        ->selectRaw('COUNT(*) AS c, categories.title AS category_title')
                ->groupBy('category_id')
        ->selectRaw('COUNT(*) AS c, projects.title AS project_title')
                        ->groupBy('project_id')
        ->selectRaw('COUNT(*) AS c, activities.title AS activity_title')
                        ->groupBy('activity_id')
        ->selectRaw('SUM(duration) AS c, projects.title AS project_title')
                                ->groupBy('project_id')
        ->get();

    return view('reports.r7', compact('data'));
});*/

Route::post('/projects/update/{id}', function (Request $request, $id) {
    DB::table('projects')
        ->where('id', $id)
        ->update([
            'title' => $request->project_title,
            'category_id' => $request->category_id,
            'updated_at' => now(),
        ]);

    return redirect('/projects')->with('success', 'تم تعديل المشروع بنجاح!');
});



Route::get('/activities/add', function () {
    $projects = DB::table('projects')
        ->join('categories', 'projects.category_id', '=', 'categories.id')
        ->select('projects.id', 'projects.title')
        ->get();
    return view('activities.add_activities', compact('projects'));
});



Route::put('/activities/{id}', function (Request $request, $id) {
    DB::table('activities')->where('id', $id)->update([
        'title' => $request->activity_title,
        'project_id' => $request->project_id,
        'duration' => $request->duration,
        'updated_at' => now(),
    ]);

    return redirect('/activities')->with('success', 'تم تعديل النشاط بنجاح!');
});
