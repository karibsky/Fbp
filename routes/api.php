<?php

use Illuminate\Http\Request;
use App\Programs;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Получить заявки пользователей 
Route::post('getUsers', function (Request $request) {
    if($request->header('Authorization') == 'WuA3oli2D9k27NSTh3') {
        return [
            \App\User::all()
        ];
    }
    else {
        return abort(503);
    }
});

// Отправить актуальные программы 1С
Route::post('sendPrograms', function (Request $request) {
    if($request->header('Authorization') == 'WuA3oli2D9k27NSTh3') {
        $nameofprod = json_decode($request->getContent(), true);
        $products = $nameofprod['products'];
        for ($i = 0; $i < count($products); $i++) {
            if(Programs::where('id', $products[$i]['id'])->count() == 0) {
                $test = new Programs;
                $test->id = $products[$i]['id'];
                $test->name = $products[$i]['name'];
                $test->article = $products[$i]['article'];
                $test->save();
            }
            else
            {
                Programs::where('id', '=',  $products[$i]['id'] )->update(['name' => $products[$i]['name'], 'article' => $products[$i]['article']]);
            }
        }
        return 'success';
    }
    else {
        return abort(503);
    }
});

// Редактирование слайдера
Route::post('editSlider', function (Request $request) {
    if($request->header('Authorization') == 'WuA3oli2D9k27NSTh3') {
        $slider = json_decode($request->getContent(), true);
        $slide = $slider['sliders'];
        for ($i = 0; $i < count($slide); $i++) {
            \App\Slider::where('id', '=',  $slide[$i]['id'] )->update(['title' => $slide[$i]['title'], 'text' => $slide[$i]['text'],'image' => $slide[$i]['image']]);
        }
        return 'success';
    }
    else {
        return abort(503);
    }
});

// Добавление/Изменение услуг на главной
Route::post('editServices', function (Request $request) {
    if($request->header('Authorization') == 'WuA3oli2D9k27NSTh3') {
        $services = json_decode($request->getContent(), true);
        $service = $services['services'];
            if (\App\Services::where('id', '=', $service['id'])->count() != 0)
            {
                \App\Services::where('id', '=', $service['id'])->update([
                    'name' => $service['name'],
                    'fullName' => $service['fullName'],
                    'icon' => $service['icon'],
                    'picture' => $service['picture'],
                    'description' => $service['description'],
                    'section1' => $service['section1'],
                    'section2' => $service['section2'],
                    'section3' => $service['section3'],
                    'section4' => $service['section4'],
                    'sectionsDesc1' => serialize($service['sectionsDesc1']),
                    'sectionsDesc2' => serialize($service['sectionsDesc2']),
                    'sectionsDesc3' => serialize($service['sectionsDesc3']),
                    'sectionsDesc4' => serialize($service['sectionsDesc4'])
                ]);
            }
            else
            {
                \App\Services::create([
                    'id' => $service['id'],
                    'name' => $service['name'],
                    'fullName' => $service['fullName'],
                    'icon' => $service['icon'],
                    'picture' => $service['picture'],
                    'description' => $service['description'],
                    'section1' => $service['section1'],
                    'section2' => $service['section2'],
                    'section3' => $service['section3'],
                    'section4' => $service['section4'],
                    'sectionsDesc1' => serialize($service['sectionsDesc1']),
                    'sectionsDesc2' => serialize($service['sectionsDesc2']),
                    'sectionsDesc3' => serialize($service['sectionsDesc3']),
                    'sectionsDesc4' => serialize($service['sectionsDesc4'])
                ]);
            }
            return 'success';
    }
    else {
        return abort(503);
    }
});

// Добавление/изменение клиентов на главной
Route::post('editClients', function (Request $request) {
    if($request->header('Authorization') == 'WuA3oli2D9k27NSTh3') {
        $clients = json_decode($request->getContent(), true);
        $client = $clients['clients'];
        for ($i = 0; $i < count($client); $i++) {
            if(\App\Clients::where('id', $client[$i]['id'])->count() == 0) {
                App\Clients::create([
                    'id' => $client[$i]['id'],
                    'logo' => $client[$i]['logo'],
                    'name' => $client[$i]['name'], 
                    'url' => $client[$i]['url']]);
            }
            else
            {
                \App\Clients::where('id', '=',  $client[$i]['id'] )->update([
                    'logo' => $client[$i]['logo'],
                    'name' => $client[$i]['name'], 
                    'url' => $client[$i]['url']]);
            }
        }
        return 'success';
    }
    else {
        return abort(503);
    }
});

// Создание/изменение товаров в каталоге
Route::post('editCatalog', function (Request $request) {
    if($request->header('Authorization') == 'WuA3oli2D9k27NSTh3') {
        $catalog = json_decode($request->getContent(), true);
        $products = $catalog['products'];
        for ($i = 0; $i < count($products); $i++) {
            if(\App\Catalog::where('id', $products[$i]['id'])->count() == 0) {
                App\Catalog::create([
                    'id' => $products[$i]['id'],
                    'article' => $products[$i]['article'],
                    'name' => $products[$i]['name'],
                    'description' => $products[$i]['description'],
                    'category' => $products[$i]['category'],
                    'subcategory' => $products[$i]['subcategory'],
                    'price' => $products[$i]['price'],
                    'picture' => $products[$i]['picture'],
                    'redarea' => $products[$i]['redarea'],
                    'greenarea' => $products[$i]['greenarea']
                ]);
            }
            else
            {
                \App\Catalog::where('id', '=',  $products[$i]['id'] )->update([
                    'article' => $products[$i]['article'],
                    'name' => $products[$i]['name'],
                    'description' => $products[$i]['description'],
                    'category' => $products[$i]['category'],
                    'subcategory' => $products[$i]['subcategory'],
                    'price' => $products[$i]['price'],
                    'picture' => $products[$i]['picture'],
                    'redarea' => $products[$i]['redarea'],
                    'greenarea' => $products[$i]['greenarea']
                ]);
            }
        }
        return 'success';
    }
    else {
        return abort(503);
    }
});

// Добавление/изменение категорий товаров
Route::post('editCategories', function (Request $request) {
    if($request->header('Authorization') == 'WuA3oli2D9k27NSTh3') {
        $categories = json_decode($request->getContent(), true);
        $category = $categories['category'];
        for ($i = 0; $i < count($category); $i++) {
            if(\App\category::where('id', $category[$i]['id'])->count() == 0) {
                App\category::create([
                    'id' => $category[$i]['id'],
                    'text' => $category[$i]['text']
                ]);
            }
            else
            {
                \App\category::where('id', '=',  $category[$i]['id'] )->update([
                    'text' => $category[$i]['text']]);
            }
        }
        return 'success';
    }
    else {
        return abort(503);
    }
});

// Добавление/изменение подкатегорий (разделов) товаров
Route::post('editSubcategories', function (Request $request) {
    if($request->header('Authorization') == 'WuA3oli2D9k27NSTh3') {
        $subcategories = json_decode($request->getContent(), true);
        $subcategory = $subcategories['subcategory'];
        for ($i = 0; $i < count($subcategory); $i++) {
            if(\App\Subcategories::where('id', $subcategory[$i]['id'])->count() == 0) {
                App\Subcategories::create([
                    'id' => $subcategory[$i]['id'],
                    'idcategory' => $subcategory[$i]['idcategory'],
                    'text' => $subcategory[$i]['text']
                ]);
            }
            else
            {
                \App\subcategory::where('id', '=',  $subcategory[$i]['id'] )->update([
                    'idcategory' => $subcategory[$i]['idcategory'],
                    'text' => $subcategory[$i]['text']]);
            }
        }
        return 'success';
    }
    else {
        return abort(503);
    }
});

// Удаление записей из таблицы
Route::post('deleteTable', function (Request $request) {
    if($request->header('Authorization') == 'WuA3oli2D9k27NSTh3') {
        $deleteid = json_decode($request->getContent(), true);
        $var = $deleteid['deletefrom'];
        $id = $var['id'];
        $tableName = $var['table'];
        $table = DB::table($tableName)->delete($id);
        return 'success';
    }
    else
    {
        return abort(503);
    }
});

// Редактирование акций на странице "Акции"
Route::post('getRequests', function (Request $request) {
    if($request->header('Authorization') == 'WuA3oli2D9k27NSTh3') {
        $promos = json_decode($request->getContent(), true);
        $promo = $promos['promo'];
        if(\App\Promo::where('id', $promo[$i]['id'])->count() == 0) {
                App\Promo::create([
                    'id' => $promo[$i]['id'],
                    'title' => $promo[$i]['title'],
                    'text' => $promo[$i]['text'],
                    'url' => $promo[$i]['url']
                ]);
            }
            else
            {
                \App\Promo::where('id', '=',  $promo[$i]['id'] )->update([
                    'title' => $promo[$i]['title'],
                    'text' => $promo[$i]['text'],
                    'url' => $promo[$i]['url']]);
            }
    }
    else {
        return abort(503);
    }
});